<?php


namespace Core;

class Request
{
  public static function post($key)
  {
    return $_POST[$key] ?? null;
  }

  public static function get($key)
  {
    return $_GET[$key] ?? null;
  }
}
