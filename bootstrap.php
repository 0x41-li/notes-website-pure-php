<?php

use Core\App;
use Core\Auth;
use Core\Database;
use Core\Container;

// Initialize a new container
$container = new Container();

// Set the container on the App class
App::setContainer($container);

// Bind the database for user on the webapp
App::bind(Database::class, function () {
  $config = require(base_path('config.php'));

  return new Database($config['database']);
});

// Initialize the Auth class
new Auth();
