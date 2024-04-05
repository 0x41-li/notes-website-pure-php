<?php


namespace Core;


class Auth
{
  public static $user;
  public static $errors;

  public function __construct()
  {
    session_start();

    static::$user = $_SESSION["user"] ?? NULL;
  }

  public static function attempt($email, $password)
  {
    // initialize the errors array
    $db = App::resolve(Database::class);

    // Check if the user exist on the db
    $user = $db->query(
      "SELECT * FROM users WHERE email = :email",
      [
        ":email" => $email
      ]
    )->find();


    // if user doesn't exist on the db
    if ($user) {

      // Check if the password provided match the user's hashed pass on the db
      if (password_verify($password, $user["password"])) {

        // authenticate the user 
        Auth::login($user);

        return true;
      }
    }

    return false;
  }

  public static function login($user)
  {
    // Preventing session fixation attack
    session_regenerate_id(true);

    // Mark the user logged in
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

  public static function user($key = NULL)
  {
    if (!isset($key))
      return static::$user ?? NULL;

    return static::$user[$key] ?? NULL;
  }


  public static function is_logged_in()
  {
    return isset(static::$user);
  }

  public static function errors()
  {
    return static::$errors;
  }

  public static function addError($key, $value)
  {
    static::$errors[$key] = $value;
  }

}
