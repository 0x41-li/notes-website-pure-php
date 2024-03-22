<?php

require_once __DIR__ . "/../functions.php";
require_once __DIR__ . "/../router.php";
require_once __DIR__ . "/../Database.php";

$config = require(__DIR__ . '/../config.php');

$db = new Database($config['database']);
