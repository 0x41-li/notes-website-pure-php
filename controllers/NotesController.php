<?php

require_once __DIR__ . "/../Database.php";
$config = require(__DIR__ . '/../config.php');

$heading = "My Notes";

$db = new Database($config['database']);
$notes = $db->query('SELECT * FROM notes');

require __DIR__ . "/../views/notes.view.php";
