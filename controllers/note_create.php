<?php

$heading = "Create Note";
$title = "Create Note";

$config = require "config.php";
$db = new Database($config["database"]);

if ($_SERVER["REQUEST_METHOD"] === "POST") {
	// dd($_POST);
	$db->query("insert into notes(body, user_id) values(:body, :user_id)", [
		"body" => $_POST["body"],
		"user_id" => 1
	]);
}

require "views/note_create.views.php";
