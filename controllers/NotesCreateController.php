<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
  dd($_POST);
}

$heading = "Create A New Note";

require_once __DIR__ . "/../views/notes-create.php";
