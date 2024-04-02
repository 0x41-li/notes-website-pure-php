<?php

$router->get("/", "HomeController.php");
$router->get("/about", "AboutController.php");
$router->get("/contact", "ContactController.php");

$router->get("/notes", "notes/index.php")->only("auth");
$router->get("/note", "notes/show.php");
$router->get("/note/create", "notes/create.php");
$router->get("/note/edit", "notes/edit.php");

$router->post("/notes", "notes/store.php")->only("auth");
$router->patch("/note", "notes/update.php");
$router->delete("/note", "notes/destroy.php");


$router->get("/register", "registration/create.php")->only("guest");
$router->post("/register", "registration/store.php")->only("guest");
