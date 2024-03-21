<?php

$urlPath = parse_url($_SERVER["REQUEST_URI"])["path"];

$routes = [
  "/" => "controllers/HomeController.php",
  "/about" => "controllers/AboutController.php",
  "/contact-us" => "controllers/ContactController.php"
];

if (array_key_exists($urlPath, $routes)) {
  require_once $routes[$urlPath];
} else {
  abort();
}
