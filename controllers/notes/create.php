<?php

require_once base_path("core/Database.php");

require_once base_path("core/Validator.php");

$config = require(base_path('config.php'));

$db = new Database($config['database']);

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

  if (!Validator::string($_POST["title"], 1, 255)) {
    $errors["title"] = "The title is required, and cannot be more than 255 characters";
  }

  if (!Validator::string($_POST["body"], 1, 255)) {
    $errors["body"] = "The body is required, and cannot be more than 1000 characters";
  }


  if (empty($errors)) {
    $db->query(
      'INSERT INTO notes (title, body, user_id) VALUES (:title, :body, :user_id)',
      [
        ':title' => $_POST['title'],
        ':body' => $_POST['body'],
        ':user_id' => 1
      ]
    );
  }
}

$heading = "Create A New Note";

view("notes/create.view.php", ["heading" => $heading, "errors" => $errors]);
