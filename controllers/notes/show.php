<?php

use Core\Database;
use Core\Response;

$config = require(base_path('config.php'));
$db = new Database($config['database']);

$currentUser = 1;

$id = $_GET['id'];
$note = $db->query('SELECT * FROM notes WHERE id = :id', [":id" => $id])->findOrFail();

if ($currentUser !== $note["user_id"]) abort(Response::FORBIDDEN);

$heading = $note['title'];

view("/notes/show.view.php", ["heading" => $heading, "note" => $note]);
