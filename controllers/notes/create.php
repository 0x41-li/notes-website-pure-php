<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$errors = [];

$heading = "Create A New Note";

view("notes/create.view.php", ["heading" => $heading, "errors" => $errors]);
