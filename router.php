<?php

$urlPath = parse_url($_SERVER["REQUEST_URI"])["path"];
$routes = require(__DIR__ . '/routes.php');

if (array_key_exists($urlPath, $routes)) {
  require_once $routes[$urlPath];
} else {
  abort();
}
