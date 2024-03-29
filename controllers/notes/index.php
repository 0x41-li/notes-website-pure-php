<?php

require_once base_path("core/Database.php");

$config = require(base_path('config.php'));

$heading = "My Notes";

$db = new Database($config['database']);
$notes = $db->query('SELECT * FROM notes')->findAllOrFail();

view('notes/index.view.php', ["heading" => $heading, "notes" => $notes]);
