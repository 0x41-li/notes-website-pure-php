<?php

namespace Core\Middleware;

use Core\Response;
use Core\Auth;


class AuthMiddleware
{
  public function handle()
  {
    if (!Auth::is_logged_in()) {
      Response::redirect("/login");
    }
  }
}
