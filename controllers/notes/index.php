<?php

use Core\Database;

$config = require(base_path('config.php'));
$db = new Database($config['database']);

$notes = $db->query('SELECT * FROM notes')->findAllOrFail();

$heading = "My Notes";

view('notes/index.view.php', ["heading" => $heading, "notes" => $notes]);
