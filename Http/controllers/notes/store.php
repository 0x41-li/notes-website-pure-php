<?php

use Core\Validator;
use Core\Response;

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$errors = [];

if (!Validator::string($_POST["title"], 1, 255)) {
  $errors["title"] = "The title is required, and cannot be more than 255 characters";
}

if (!Validator::string($_POST["body"], 1, 1000)) {
  $errors["body"] = "The body is required, and cannot be more than 1000 characters";
}

$heading = "Create A New Note";
if (!empty($errors)) {
  view("notes/create.view.php", ["heading" => $heading, "errors" => $errors]);
  die();
}

$db->query(
  'INSERT INTO notes (title, body, user_id) VALUES (:title, :body, :user_id)',
  [
    ':title' => $_POST['title'],
    ':body' => $_POST['body'],
    ':user_id' => 1
  ]
);

Response::redirect("/notes");