<?php

$routes = require(base_path('/routes.php'));
$urlPath = parse_url($_SERVER["REQUEST_URI"])["path"];

function routeToController($urlPath, $routes)
{
  if (array_key_exists($urlPath, $routes)) {
    require_once base_path($routes[$urlPath]);
  } else {
    abort();
  }
}

routeToController($urlPath, $routes);
