<?php

use Core\App;
use Core\Database;
use Core\Response;

$db = App::resolve(Database::class);

$post_id = $_GET["post_id"];

$curr_user_id = 1;

$note = $db->query("select * from notes where id = :id", [
  "id" => $post_id
])->find_or_fail();

authorize($note["user_id"] === $curr_user_id, Response::FORBIDDEN);

view("notes/edit.view.php", [
	"heading" => "Edit Note",
	"title" => "Edit Note",
	"errors" => [],
  "note" => $note
]);
