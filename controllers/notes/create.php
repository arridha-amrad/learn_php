<?php

$heading = "Create Note";
$title = "Create Note";

require "Validator.php";

$config = require "config.php";
$db = new Database($config["database"]);

if ($_SERVER["REQUEST_METHOD"] === "POST") {

	$errors = [];
	$body = $_POST["body"];

	if (!Validator::string($body, 1, 100)) {
		$errors["body"] = "a description no more than 5 characters is required";
	}

	if (empty($errors)) {
		$db->query("insert into notes(body, user_id) values(:body, :user_id)", [
			"body" => $body,
			"user_id" => 1
		]);

		$body = "";
	}
}

require "views/notes/create.views.php";
