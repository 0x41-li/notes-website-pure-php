<?php

namespace Core;

class Router
{
  protected $routes = [];

  public function add($uri, $controller, $method)
  {
    $this->routes[] = [
      "uri" => $uri,
      "controller" => $controller,
      "method" => $method,
    ];
  }

  public function get($uri, $controller)
  {
    $this->add($uri, $controller, "GET");
  }

  public function post($uri, $controller)
  {
    $this->add($uri, $controller, "POST");
  }

  public function delete($uri, $controller)
  {
    $this->add($uri, $controller, "DELETE");
  }

  public function put($uri, $controller)
  {
    $this->add($uri, $controller, "PUT");
  }

  public function patch($uri, $controller)
  {
    $this->add($uri, $controller, "PATCH");
  }

  public function resolve($uri, $method)
  {
    foreach ($this->routes as $route) {
      if ($route["uri"] === $uri && $route["method"] === strtoupper($method)) {
        require_once base_path($route["controller"]);
      }
    }

    Response::notFound();
  }
}
