<?php

$heading = "My Notes";

$title = "My Notes";

$config = require "config.php";

$db = new Database($config["database"]);
$query = "select * from notes where user_id = :user_id";

$notes = $db->query($query, ['user_id' => 2])->fetchAll();

require "views/notes.views.php";
