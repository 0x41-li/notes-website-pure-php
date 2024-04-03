<?php

use Core\App;
use Core\Auth;
use Core\Database;
use Core\Request;
use Core\Response;
use Core\Validator;

// Get the form suubmitted data
$email = Request::post("email");
$password = Request::post("password");

// validate the form
$errors = [];

if (!Validator::string($email, 7, 255) || !Validator::email($email)) {
  $errors["email"] = "Please provide a valid email";
}

if (!Validator::string($password, 7, 255)) {
  $errors["password"] = "Please provide a password that has min 7 characters and max 255 characters";
}

if (!empty($errors)) {
  view("auth/login.view.php", ["errors" => $errors]);
  exit();
}

// check if the user exist
$db = App::resolve(Database::class);
$user = $db->query("SELECT * FROM users WHERE email = :email", [":email" => $email])->find();

if (!$user) {
  $errors["login"] = "The provided email and password doesn't match our database records";
  view("auth/login.view.php", ["errors" => $errors]);
}


// Check if the password provided match the user's hashed pass on the database
if (!password_verify($password, $user["password"])) {
  $errors["login"] = "The provided email and password doesn't match our database records";
  view("auth/login.view.php", ["errors" => $errors]);
}

// log the user in
Auth::login($user);

// redirect the user to the notes
Response::redirect("/notes");
