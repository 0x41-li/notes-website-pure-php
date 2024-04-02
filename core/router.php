<?php

namespace Core;

use Core\Middleware\Middleware;

class Router
{
  protected $routes = [];

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

  // add midlleware to the array
  public function only($middleware_name)
  {
    $this->routes[array_key_last($this->routes)]["middleware"] = $middleware_name;
  }

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
