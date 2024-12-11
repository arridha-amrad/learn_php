<?php

$config = require base_path("config.php");

$db = new Database($config["database"]);
$query = "select * from notes where user_id = :user_id";

$curr_user_id = 1;
$notes = $db->query($query, ['user_id' => $curr_user_id])->get();

view("notes/index.views.php", [
	"heading" => "My Notes",
	"title" => "Notes",
	"notes" => $notes,
]);
