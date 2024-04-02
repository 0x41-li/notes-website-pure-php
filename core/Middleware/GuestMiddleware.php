<?php

namespace Core\Middleware;

use Core\Auth;
use Core\Response;

class GuestMiddleware
{
  public function handle()
  {
    if (Auth::is_logged_in()) {
      Response::redirect("/");
    }
  }
}
