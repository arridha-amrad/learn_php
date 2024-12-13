<?php

use Core\App;
use Core\Database;
use Core\Response;
use Core\Validator;

$curr_user_id = 1;

$post_id = $_GET["post_id"];
$body = $_POST["body"];

$errors = [];

$db = App::resolve(Database::class);

// check if record exists
$note = $db->query("select * from notes where id = :id", [
  "id" => $post_id
])->find_or_fail();

// validate
if (!Validator::string($body, 1, 100)) {
  $errors["body"] = "a description no more than 100 characters is required";
}

if (!empty($errors)) {
  return view("notes/edit.view.php", [
    "heading" => "Edit Note",
    "title" => "Edit Note",
    "errors" => $errors,
    "note" => $note,
  ]);
}

// check is user authorized
authorize($note["user_id"] === $curr_user_id, Response::FORBIDDEN);

// perform update
$db->query("update notes set body = :body where id = :id", [
  "id" => $post_id,
  "body" => $body
]);

header("location: /note?id=$post_id");
exit();