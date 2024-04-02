<?php

use Core\App;
use Core\Database;
use Core\Response;

$db = App::resolve(Database::class);

$id = $_POST["id"];

$currentUser = 1;

$note = $db->query(
  'SELECT * FROM notes WHERE id = :id',
  [
    ":id" => $id
  ]
)->findOrFail();

authorize($currentUser === $note["user_id"]);

$db->query('DELETE FROM notes WHERE id = :id', [":id" => $id]);

Response::redirect("/notes");
