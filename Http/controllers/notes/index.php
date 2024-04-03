<?php

use Core\App;
use Core\Auth;
use Core\Database;

$db = App::resolve(Database::class);

$user = Auth::user();

$notes = $db->query('SELECT * FROM notes WHERE user_id = :user_id', [":user_id" => $user["id"]])->findAllOrFail();

$heading = "My Notes";

view('notes/index.view.php', ["heading" => $heading, "notes" => $notes]);
