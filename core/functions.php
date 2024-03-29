<?php

use Core\Response;

function dd($data)
{
  echo "<pre>";
  var_dump($data);
  echo "</pre>";

  die();
}

function abort($code = 404)
{
  http_response_code($code);

  view("/{$code}.view.php");

  die();
}

function base_path($path = "")
{
  return BASE_PATH . $path;
}

function view($view, $data = [])
{
  extract($data);

  require base_path("views/" . $view);
}

function is_post_request()
{
  return strtolower($_SERVER["REQUEST_METHOD"]) === "post";
}

function authorize($condition)
{
  if (!$condition) abort(Response::FORBIDDEN);

  return $condition;
}
