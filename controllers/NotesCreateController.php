<?php

require_once __DIR__ . "/../Database.php";
$config = require(__DIR__ . '/../config.php');

$db = new Database($config['database']);


if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $db->query(
    'INSERT INTO notes (title, body, user_id) VALUES (:title, :body, :user_id)',
    [
      ':title' => $_POST['title'],
      ':body' => $_POST['body'],
      ':user_id' => 1
    ]
  );
}

$heading = "Create A New Note";

require_once __DIR__ . "/../views/notes-create.php";
