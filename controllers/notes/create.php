<?php

$errors = [];

$heading = "Create A New Note";

view("notes/create.view.php", ["heading" => $heading, "errors" => $errors]);
