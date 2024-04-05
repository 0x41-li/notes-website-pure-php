<?php

namespace Core;

class Response
{
  const NOT_FOUND = 404;
  const FORBIDDEN = 403;


  public static function forbidden()
  {
    static::abort(self::FORBIDDEN);

    die();
  }

  public static function notFound()
  {
    static::abort(self::NOT_FOUND);

    die();
  }

  public static function redirect($location)
  {
    header("Location: $location");

    die();
  }

  public static function abort($code)
  {
    http_response_code($code);

    view("{$code}.view.php");

    die();
  }
}
