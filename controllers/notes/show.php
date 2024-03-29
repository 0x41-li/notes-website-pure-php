<?php

use Core\Database;
use Core\Response;

$config = require(base_path('config.php'));
$db = new Database($config['database']);

$id = $_GET['id'];
$currentUser = 1;

if (is_post_request()) {

  $id = $_POST['id'];
  $note = $db->query('SELECT * FROM notes WHERE id = :id', [":id" => $id])->findOrFail();

  authorize($currentUser === $note["user_id"]);

  $db->query('DELETE FROM notes WHERE id = :id', [":id" => $id]);

  header("location: /notes");
} else {
  $note = $db->query('SELECT * FROM notes WHERE id = :id', [":id" => $id])->findOrFail();

  authorize($currentUser === $note["user_id"]);

  $heading = $note['title'];

  view("/notes/show.view.php", ["heading" => $heading, "note" => $note]);
}
