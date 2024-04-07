<?php

use Core\Router;
use Core\Session;

// webroot dir
const BASE_PATH = __DIR__ . "/../";

// Require useful functions 
require_once BASE_PATH . "/core/functions.php";

// autoloading
spl_autoload_register(function ($class) {
  $class = str_replace("\\", DIRECTORY_SEPARATOR, $class);

  require base_path("{$class}.php");
});

// bootstrap the webapp
require_once base_path("/bootstrap.php");

// initializing the router
$router = new Router();

// Regiter the routes
require_once base_path("routes.php");

// Get uri slug and the method
$uri = parse_url($_SERVER["REQUEST_URI"])["path"];
$method = $_POST["_method"] ?? $_SERVER["REQUEST_METHOD"];

// resolve the current visited path
$router->resolve($uri, $method);

// unflash flash messages
Session::unFlash();