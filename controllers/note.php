<?php

$heading = "Note";

$title = "Note";

$config = require "config.php";

$db = new Database($config["database"]);
$query = "select * from notes where id = :id";

$post_id = $_GET["id"];

$note = $db->query($query, ['id' => $post_id])->fetch();

require "views/note.views.php";
