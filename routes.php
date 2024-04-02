<?php

$router->get("/", "HomeController.php");
$router->get("/about", "AboutController.php");
$router->get("/contact", "ContactController.php");


$router->group(function ($router) {
  $router->get("/notes", "notes/index.php");
  $router->get("/note", "notes/show.php");
  $router->get("/note/create", "notes/create.php");
  $router->get("/note/edit", "notes/edit.php");

  $router->post("/notes", "notes/store.php");
  $router->patch("/note", "notes/update.php");
  $router->delete("/note", "notes/destroy.php");
})->only("auth");


$router->group(function ($router) {
  $router->get("/register", "registration/create.php");
  $router->post("/register", "registration/store.php");
})->only("guest");
