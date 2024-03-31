<?php

$router->get("/", "controllers/HomeController.php");
$router->get("/about", "controllers/AboutController.php");
$router->get("/contact", "controllers/ContactController.php");

$router->get("/notes", "controllers/notes/index.php");
$router->get("/note", "controllers/notes/show.php");
$router->get("/note/create", "controllers/notes/create.php");
$router->get("/note/edit", "controllers/notes/edit.php");

$router->post("/notes", "controllers/notes/store.php");
$router->patch("/note", "controllers/notes/update.php");
$router->delete("/note", "controllers/notes/destroy.php");
