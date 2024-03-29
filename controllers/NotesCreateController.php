<?php

require_once __DIR__ . "/../Database.php";
require_once __DIR__ . "/../Validator.php";

$config = require(__DIR__ . '/../config.php');

$db = new Database($config['database']);


if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $errors = [];

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

require_once __DIR__ . "/../views/notes-create.php";
