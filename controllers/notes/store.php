<?php

use Core\App;
use Core\Database;
use Core\Validator;

require base_path("Core/Validator.php");

$db = App::resolve(Database::class);

$errors = [];

$curr_user_id = 1;

$body = $_POST["body"];

if (!Validator::string($body, 1, 100)) {
  $errors["body"] = "a description no more than 100 characters is required";
}

if (!empty($errors)) {
  return view("notes/create.views.php", [
    "heading" => "Create A New Note",
    "title" => "Create Note",
    "errors" => $errors,
  ]);
}

$db->query("insert into notes(body, user_id) values(:body, :user_id)", [
  "body" => $body,
  "user_id" => $curr_user_id,
]);

$body = "";

header("location: /notes");
exit();
