<?php

namespace Http\Repositories;

use Core\App;
use Core\Database;
use Core\Auth;

class NotesRepository
{
  protected static $errors = [];
  protected static $lastInsertedId = NULL;
  public static function create($title, $content)
  {
    // check if the email already exist
    $db = App::resolve(Database::class);

    // Insert the note
    $db->query(
      'INSERT INTO notes (title, content, user_id) VALUES (:title, :content, :user_id)',
      [
        ':title' => $title,
        ':content' => $content,
        ':user_id' => Auth::user("id")
      ]
    );

    // Get the id of the last inserted user
    static::$lastInsertedId = $db->lastInsertedId();

    return empty(static::$errors);
  }

  public static function update($id, $title, $content)
  {
    $db = App::resolve(Database::class);

    $db->query(
      'UPDATE notes set title = :title,  content = :content WHERE id = :id',
      [
        ':title' => $title,
        ':content' => $content,
        ':id' => $id,
      ]
    );
  }

  public static function exists($id)
  {
    $db = App::resolve(Database::class);

    $note = $db->query(
      "SELECT * FROM notes WHERE id = :id",
      [
        ":id" => $id
      ]
    )->find();

    if (!$note)
      return false;

    return true;
  }

}