<?php

namespace Core\Middleware;

use Core\Middleware\GuestMiddleware;
use Core\Middleware\AuthMiddleware;

class Middleware
{
  public const MAP = [
    "guest" => GuestMiddleware::class,
    "auth" => AuthMiddleware::class
  ];


  public static function resolve($middleware_name)
  {
    if (!$middleware_name) {
      return;
    }


    $middleware = static::MAP[$middleware_name];

    (new $middleware())->handle();
  }
}
