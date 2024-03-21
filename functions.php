<?php

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

  require_once __DIR__ . "/views/{$code}.view.php";

  die();
}
