<?php

use Core\App;
use Core\Auth;
use Core\Database;
use Core\Request;
use Core\Response;
use Core\Validator;

// Get the form suubmitted data
$name = Request::post("name");
$email = Request::post("email");
$password = Request::post("password");

// validate the form
$errors = [];

if (!Validator::string($name, 3, 20)) {
  $errors["name"] = "Please provide a real name, must be min 3 characters, and max 20 characters";
}

if (!Validator::string($email, 7, 255) || !Validator::email($email)) {
  $errors["email"] = "Please provide a valid email";
}

if (!Validator::string($password, 7, 255)) {
  $errors["password"] = "Please provide a password that has min 7 characters and max 255 characters";
}

if (!empty($errors)) {
  view("registration/create.view.php", ["errors" => $errors]);
  exit();
}

// check if the email already exist
$db = App::resolve(Database::class);
$user_with_same_email = $db->query("SELECT * FROM users WHERE email = :email", [":email" => $email])->find();

if ($user_with_same_email) {
  view(
    "registration/create.view.php",
    [
      "errors" =>
      [
        "email" => "This email is already in use"
      ]
    ]
  );
  exit();
}

// hash the password
$hashed_password = password_hash($password, PASSWORD_BCRYPT);

// store the new user
$db->query(
  "INSERT INTO users (name, email, password) VALUES(:name, :email, :password)",
  [
    ":name" => $name,
    ":email" => $email,
    ":password" => $hashed_password
  ]
);

// log the user in
Auth::login($user);

// redirect the user to the notes
Response::redirect("/notes");
