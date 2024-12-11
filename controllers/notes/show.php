<?php

use Core\App;
use Core\Database;
use Core\Response;

$db = App::resolve(Database::class);

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
