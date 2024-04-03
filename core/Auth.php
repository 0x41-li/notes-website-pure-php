<?php


namespace Core;


class Auth
{
  public static $user;

  public function __construct()
  {
    session_start();

    static::$user = $_SESSION["user"] ?? NULL;
  }

  public static function login($user)
  {
    // Preventing session fixation attack
    session_regenerate_id();

    // Mark the user login
    $_SESSION["user"] = [
      "id" => $user["id"],
      "name" => $user["name"],
      "email" => $user["email"]
    ];

    // Store this on the user static var on this class
    static::$user = $_SESSION["user"];
  }

  public static function logout()
  {
    // unset the the user array
    static::$user = [];

    // unset the session array
    unset($_SESSION);


    // remove the session cookie
    $params = session_get_cookie_params();

    setcookie(
      session_name(),
      "",
      time() - 3600,
      $params["path"],
      $params["domain"],
      $params["secure"],
      $params["httponly"]
    );

    // destory the session, by removing the file from the temp dir
    session_destroy();
  }

  public static function user()
  {
    return static::$user ?? null;
  }


  public static function is_logged_in()
  {
    return isset(static::$user);
  }
}
