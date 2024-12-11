<?php

$config = require base_path("config.php");

$db = new Database($config["database"]);
$query = "select * from notes where id = :id";

$post_id = $_GET["id"];

$curr_user_id = 1;

$note = $db->query($query, ['id' => $post_id])->find_or_fail();

authorize($note["user_id"] === $curr_user_id, Response::FORBIDDEN);

view("notes/show.views.php", [
  "heading" => "Note",
  "title" => "Note",
  "note" => $note,
]);
