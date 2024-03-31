<?php

use Core\Validator;
use Core\Response;

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);


$currentUser = 1;

// find the note
$note = $db->query(
  'SELECT * FROM notes WHERE id = :id',
  [
    ":id" => $_POST["id"]
  ]
)->findOrFail();

// check if the user is authorize to edit it
authorize($currentUser === $note["user_id"]);


// validate the edit form
$errors = [];

if (!Validator::string($_POST["title"], 1, 255)) {
  $errors["title"] = "The title is required, and cannot be more than 255 characters";
}

if (!Validator::string($_POST["body"], 1, 1000)) {
  $errors["body"] = "The body is required, and cannot be more than 1000 characters";
}

if (!empty($errors)) {
  $heading = "Edit Note";

  view("notes/edit.view.php", ["heading" => $heading, "errors" => $errors, "note" => $note]);

  die();
}


// update the record
$db->query(
  'UPDATE notes set title = :title,  body = :body WHERE id = :id',
  [
    ':title' => $_POST['title'],
    ':body' => $_POST['body'],
    ':id' => $_POST['id'],
  ]
);

// redirect to the edited note
Response::redirect("/note?id={$note["id"]}");
