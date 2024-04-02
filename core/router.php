<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
  protected $routes = [];
  protected $group_routes = [];

  public function add($uri, $controller, $method)
  {
    $this->routes[] = [
      "uri" => $uri,
      "controller" => $controller,
      "method" => $method,
      "middleware" => NULL
    ];

    return $this;
  }

  public function get($uri, $controller)
  {
    return $this->add($uri, $controller, "GET");
  }

  public function post($uri, $controller)
  {
    return $this->add($uri, $controller, "POST");
  }

  public function delete($uri, $controller)
  {
    return $this->add($uri, $controller, "DELETE");
  }

  public function put($uri, $controller)
  {
    return $this->add($uri, $controller, "PUT");
  }

  public function patch($uri, $controller)
  {
    return $this->add($uri, $controller, "PATCH");
  }

  // Added middlewares
  public function only($middleware_name)
  {
    // check if there's a group middleware by checking the group_middleware property
    // if so then it means this a call from a group function
    if (isset($this->group_routes)) {

      // Go over each route on the group route
      // and add the middleware
      foreach ($this->group_routes as $key => $group_route) {
        $this->group_routes[$key]["middleware"] = $middleware_name;
      }

      // Merge the group routes with the main routes
      $this->routes = array_merge($this->routes, $this->group_routes);

      // Unset the group routes
      $this->group_routes = [];

      return;
    }

    $this->routes[array_key_last($this->routes)]["middleware"] = $middleware_name;
  }

  public function group($callback)
  {

    $group_router = new self();

    $callback($group_router);


    $this->group_routes = $group_router->routes;

    return $this;
  }

  // resolve the current path
  public function resolve($uri, $method)
  {
    foreach ($this->routes as $route) {
      if ($route["uri"] === $uri && $route["method"] === strtoupper($method)) {
        // Apply middleware, if it exist
        // The check if existence is on the Middleware's resolve method
        Middleware::resolve($route["middleware"]);

        require_once base_path("Http/controllers/" . $route["controller"]);
        exit();
      }
    }

    Response::notFound();
  }
}
