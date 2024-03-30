<?php

use Core\Database;

$config = require(base_path('config.php'));
$db = new Database($config['database']);

$errors = [];

$heading = "Create A New Note";

view("notes/create.view.php", ["heading" => $heading, "errors" => $errors]);
