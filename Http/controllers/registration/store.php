<?php

use Core\Auth;
use Core\Request;
use Core\Response;
use Core\Session;
use Http\Repositories\UsersRepository;
use Http\Forms\RegisterForm;

// Get the form suubmitted data
$name = Request::post("name");
$email = Request::post("email");
$password = Request::post("password");

// validate the form
if (RegisterForm::validate($name, $email, $password)) {
  if (UsersRepository::create($name, $email, $password)) {
    // log the user
    Auth::login(
      [
        "id" => UsersRepository::lastInsertedId(),
        "name" => $name,
        "email" => $email,
      ]
    );

    // redirect the user to their notes
    Response::redirect("/notes");
  }
}


// PRG with errors & old data
$errors = RegisterForm::errors() ?? UsersRepository::errors();
Session::flash("errors", $errors);
Session::flash("old", [
  "name" => $name,
  "email" => $email,
]);

// redirect
Response::redirect("/register");