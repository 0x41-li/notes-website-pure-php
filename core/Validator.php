<?php

namespace Core;

class Validator
{
  public static function string(mixed $value, $min = 1, $max = INF)
  {
    if (!is_string($value))
      return false;

    $value = trim($value);

    return strlen($value) >= $min && strlen($value) <= $max;
  }

  public static function email(string $email): bool|string
  {
    return filter_var($email, FILTER_VALIDATE_EMAIL);
  }
}
