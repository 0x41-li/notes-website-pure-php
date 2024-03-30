<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$notes = $db->query('SELECT * FROM notes')->findAllOrFail();

$heading = "My Notes";

view('notes/index.view.php', ["heading" => $heading, "notes" => $notes]);
