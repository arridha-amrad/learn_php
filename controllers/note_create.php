<?php

$heading = "Create Note";
$title = "Create Note";

$config = require "config.php";
$db = new Database($config["database"]);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

	$errors = [];
	$body = $_POST["body"];

	if (strlen($body) === 0) {
		$errors["body"] = "description is required";
	}

	if (strlen($body) > 5) {
		$errors["body"] = "description is too long";
	}

	if (empty($errors)) {
		$db->query("insert into notes(body, user_id) values(:body, :user_id)", [
			"body" => $body,
			"user_id" => 1
		]);
	}
}

require "views/note_create.views.php";
