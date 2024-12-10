<?php

$heading = "My Notes";

$title = "My Notes";

$config = require "config.php";

$db = new Database($config["database"]);
$query = "select * from notes where user_id = :user_id";

$curr_user_id = 1;
$notes = $db->query($query, ['user_id' => $curr_user_id])->get();

require "views/notes/index.views.php";
