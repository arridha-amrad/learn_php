<?php

$heading = "Note";

$title = "Note";

$config = require "config.php";

$db = new Database($config["database"]);
$query = "select * from notes where id = :id";

$post_id = $_GET["id"];

$curr_user_id = 1;

$note = $db->query($query, ['id' => $post_id])->find_or_fail();

// dd($note);

authorize($note["user_id"] === $curr_user_id, Response::FORBIDDEN);

require "views/note.views.php";
