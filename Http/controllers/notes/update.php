<?php

use Core\Request;
use Core\Session;
use Core\Response;
use Core\Auth;
use Http\Forms\CreateNoteForm;
use Http\Repositories\NotesRepository;

// Data
$id = Request::post("id");
$title = Request::post("title");
$content = Request::post("content");

$currentUser = Auth::user("id");

// If the note doesn't exist return not found 
if (!NotesRepository::exists($id))
  Response::notFound();


// Check if the user is authorize to edit it
authorize($currentUser == $currentUser);


// If the form data is not validated 
if (!CreateNoteForm::validate($title, $content)) {
  // flash errors & old data
  Session::flash("errors", CreateNoteForm::errors());
  Session::flash("old", [
    "title" => $title,
    "content" => $content
  ]);

  // Redirect
  Response::redirect("/note/edit?id={$id}");

}


// update the record
NotesRepository::update($id, $title, $content);

// redirect to the edited note
Response::redirect("/note?id={$id}");
