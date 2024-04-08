<?php

use Core\Request;
use Core\Response;
use Core\Session;
use Http\Repositories\NotesRepository;
use Http\Forms\CreateNoteForm;


// Get data submitted
$title = Request::post("title");
$content = Request::post("content");

// Check if validating the above data fails
if (!CreateNoteForm::validate($title, $content)) {
  // flashing errors & old data
  Session::flash("errors", CreateNoteForm::errors());
  Session::flash("old", [
    "title" => $title,
    "content" => $content,
  ]);

  // Redirect
  Response::redirect("/note/create");
}

// Insert a new note into the db
NotesRepository::create($title, $content);

// redirect
Response::redirect("/notes");