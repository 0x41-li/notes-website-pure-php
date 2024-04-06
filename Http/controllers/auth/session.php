<?php

use Core\Auth;
use Core\Request;
use Core\Response;
use Core\Session;
use Http\Forms\LoginForm;

// Get the form suubmitted data
$email = Request::post("email");
$password = Request::post("password");

if (LoginForm::validate($email, $password)) {
  if (Auth::attempt($email, $password)) {
    Response::redirect("/notes");
  }
}

Session::flash("errors", LoginForm::errors());

// PRG with errors
Response::redirect("/login");