<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUser = 1;

$note = $db->query(
  'SELECT * FROM notes WHERE id = :id',
  [
    ":id" => $_GET["id"]
  ]
)->findOrFail();

authorize($currentUser === $note["user_id"]);

$heading = $note['title'];

view("/notes/show.view.php", ["heading" => $heading, "note" => $note]);
