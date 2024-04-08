<?php

namespace Http\Forms;

use Http\Forms\Form;
use Core\Validator;


class CreateNoteForm extends Form
{
  protected static $errors = [];

  public static function validate($title, $content)
  {
    if (!Validator::string($title, 1, 255)) {
      static::$errors["title"] = "The title is required, and cannot be more than 255 characters";
    }

    if (!Validator::string($content, 1, 1000)) {
      static::$errors["content"] = "The description is required, and cannot be more than 1000 characters";
    }

    return empty(static::$errors);
  }

}