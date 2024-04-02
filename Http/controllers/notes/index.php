<?php

use Core\App;
use Core\Auth;
use Core\Database;

$db = App::resolve(Database::class);

$notes = $db->query('SELECT * FROM notes')->findAllOrFail();

$user = Auth::user();

$heading = "My Note (" . $user['name'] . ")";

view('notes/index.view.php', ["heading" => $heading, "notes" => $notes]);
