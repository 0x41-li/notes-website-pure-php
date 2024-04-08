<?php

use Core\Session;

$heading = "Create A New Note";

view("notes/create.view.php", [
  "heading" => $heading,
  "errors" => Session::get("errors")
]);
