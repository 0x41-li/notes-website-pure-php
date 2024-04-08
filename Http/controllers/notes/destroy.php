<?php

use Core\App;
use Core\Database;
use Core\Response;
use Core\Auth;
use Core\Request;

$db = App::resolve(Database::class);

$id = Request::post("id");

$currentUser = Auth::user("id");

$note = $db->query(
  'SELECT * FROM notes WHERE id = :id',
  [
    ":id" => $id
  ]
)->findOrFail();

authorize($currentUser == $note["user_id"]);

$db->query('DELETE FROM notes WHERE id = :id', [":id" => $id]);

Response::redirect("/notes");
