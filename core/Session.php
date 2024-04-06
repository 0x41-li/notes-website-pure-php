<?php

namespace Core;

class Session
{
  public static function add($key, $value)
  {
    return $_SESSION[$key] = $value;
  }

  public static function get($key)
  {
    return $_SESSION["_flash"][$key] ?? $_SESSION[$key] ?? NULL;
  }

  public static function flash($key, $value)
  {
    $_SESSION["_flash"][$key] = $value;
  }

  public static function unFlash()
  {
    unset($_SESSION["_flash"]);
  }
}