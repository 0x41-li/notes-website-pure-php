<?php

require_once __DIR__ . "/../Database.php";

$config = require(__DIR__ . '/../config.php');
$db = new Database($config['database']);

$currentUser = 1;

$id = $_GET['id'];
$note = $db->query('SELECT * FROM notes WHERE id = :id', [":id" => $id])->findOrFail();


if ($currentUser !== $note["user_id"]) abort(Response::FORBIDDEN);

$heading = $note['title'];

require __DIR__ . "/../views/note.view.php";
