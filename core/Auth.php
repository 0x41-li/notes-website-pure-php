<?php


namespace Core;


class Auth
{
  public static $user;

  public function __construct()
  {
    session_start();

    if (isset($_SESSION["user"])) {
      static::$user = $_SESSION["user"];
    }
  }

  public static function login($user)
  {
    $_SESSION["user"] = [
      "name" => $user["name"], "email" => $user["email"]
    ];

    static::$user = $_SESSION["user"];
  }

  public static function logout()
  {
    // unset the session array
    $_SESSION = [];


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
