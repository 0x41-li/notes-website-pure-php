<?php

namespace Core;

use Core\App;
use Core\Database;

class UserRepository
{
  protected static $errors = [];
  protected static $lastInsertedId = NULL;
  public static function create($name, $email, $password)
  {
    // check if the email already exist
    $db = App::resolve(Database::class);
    $user_with_same_email = $db->query("SELECT * FROM users WHERE email = :email", [":email" => $email])->find();

    // if user exist on the db
    // ! this error leaks if an email exists on the db
    if ($user_with_same_email) {
      static::$errors["register"] = "User with this email already exist";
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

    // Get the id of the last inserted user
    static::$lastInsertedId = $db->lastInsertedId();

    return empty(static::$errors);
  }

  public static function errors()
  {
    return static::$errors;
  }

  public static function lastInsertedId()
  {
    return static::$lastInsertedId ?? NULL;
  }
}