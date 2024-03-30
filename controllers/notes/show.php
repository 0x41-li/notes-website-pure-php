<?php

use Core\Database;

$config = require(base_path('config.php'));
$db = new Database($config['database']);

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
