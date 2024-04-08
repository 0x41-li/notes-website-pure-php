<?php

use Core\App;
use Core\Auth;
use Core\Database;

// Grab the database
$db = App::resolve(Database::class);

// find the note
$id = $_GET["id"] ?? null;

$note = $db->query(
  "SELECT * FROM notes WHERE id = :id",
  [
    ":id" => $id
  ]
)->findOrFail();

// check if the user is authorized to see this note
authorize(Auth::user("id") == $note["user_id"]);

// return the edit view form
$heading = "Edit Note";
view("notes/edit.view.php", ["heading" => $heading, "note" => $note]);
