<?php

use Core\App;
use Core\Database;
use Core\Auth;


$db = App::resolve(Database::class);

$id = $_GET["id"] ?? null;

$note = $db->query(
  "SELECT * FROM notes WHERE id = :id",
  [
    ":id" => $id
  ]
)->findOrFail();



authorize(Auth::user("id") == $note["user_id"]);

$heading = $note['title'];

view("/notes/show.view.php", ["heading" => $heading, "note" => $note]);
