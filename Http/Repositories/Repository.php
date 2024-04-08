<?php


namespace Http\Repositories;


class Repository
{

  protected static $errors = [];
  protected static $lastInsertedId = NULL;

  public static function errors()
  {
    return static::$errors;
  }

  public static function lastInsertedId()
  {
    return static::$lastInsertedId ?? NULL;
  }

}