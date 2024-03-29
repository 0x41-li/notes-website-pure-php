<?php

const BASE_PATH = __DIR__ . "/../";

require_once BASE_PATH . "/core/functions.php";


spl_autoload_register(function ($class) {
  $class = str_replace("\\", "/", $class);

  require base_path("{$class}.php");
});

require_once base_path("core/router.php");
