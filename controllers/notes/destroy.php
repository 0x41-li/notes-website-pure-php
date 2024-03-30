<?php

use Core\Database;
use Core\Response;

$config = require(base_path('config.php'));
$db = new Database($config['database']);

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
