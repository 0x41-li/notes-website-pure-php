<?php

use Core\Auth;
use Core\Response;

Auth::logout();

Response::redirect("/login");
