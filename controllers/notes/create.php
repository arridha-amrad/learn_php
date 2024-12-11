<?php

require base_path("Core/Validator.php");

$config = require base_path("config.php");
$db = new Database($config["database"]);

$errors = [];

if ($_SERVER["REQUEST_METHOD"] === "POST") {

	$body = $_POST["body"];

	if (!Validator::string($body, 1, 100)) {
		$errors["body"] = "a description no more than 5 characters is required";
	}

	if (empty($errors)) {
		$db->query("insert into notes(body, user_id) values(:body, :user_id)", [
			"body" => $body,
			"user_id" => 1,
		]);

		$body = "";
	}
}

view("notes/create.views.php", [
	"heading" => "Create A New Note",
	"title" => "Create Note",
	"errors" => $errors,
]);
