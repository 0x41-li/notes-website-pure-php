<?php

require_once __DIR__ . "/../Database.php";
$config = require(__DIR__ . '/../config.php');

$db = new Database($config['database']);


if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $errors = [];

  if (strlen($_POST["title"]) === 0) {
    $errors["title"] = "The title is required";
  } else  if (strlen($_POST["title"]) > 255) {
    $errors["title"] = "The title has exceeded the allowed length of 255";
  }

  if (strlen($_POST["body"]) === 0) {
    $errors["body"] = "The body is required";
  } else  if (strlen($_POST["body"]) > 1000) {
    $errors["body"] = "The body has exceeded the allowed length of 255";
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
