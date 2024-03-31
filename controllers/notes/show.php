<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$id = $_GET["id"] ?? null;

$current_user = 1;

$note = $db->query(
  "SELECT * FROM notes WHERE id = :id",
  [
    ":id" => $id
  ]
)->findOrFail();

authorize($current_user === $note["user_id"]);

$heading = $note['title'];

view("/notes/show.view.php", ["heading" => $heading, "note" => $note]);
