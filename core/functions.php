<?php

use Core\Response;
use Core\Session;

function dd($data)
{
  echo "<pre>";
  var_dump($data);
  echo "</pre>";

  die();
}

function dump($data)
{
  echo "<pre>";
  var_dump($data);
  echo "</pre>";
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
  if (!$condition)
    Response::forbidden();

  return $condition;
}

function urlIs($slug)
{
  return $_SERVER["REQUEST_URI"] === $slug;
}

function old($key)
{
  return Session::get("old")[$key] ?? "";
}