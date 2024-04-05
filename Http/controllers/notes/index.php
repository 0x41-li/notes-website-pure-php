<?php

use Core\App;
use Core\Auth;
use Core\Database;

$db = App::resolve(Database::class);

$notes = $db->query(
  'SELECT * FROM notes WHERE user_id = :user_id',
  [
    ":user_id" => Auth::user("id")
  ]
)->findAll();


$heading = "My Notes";

view('notes/index.view.php', ["heading" => $heading, "notes" => $notes]);
