<?php

use Core\Database;
use Core\Response;

$config = require base_path("config.php");

$db = new Database($config["database"]);

$post_id = $_POST["post_id"];
$query_fetch = "select * from notes where id = :id";
$note = $db->query($query_fetch, ['id' => $post_id])->find_or_fail();


$curr_user_id = 1;
authorize($note["user_id"] === $curr_user_id, Response::FORBIDDEN);

$db->query("delete from notes where id = :id", ["id" => $post_id]);

header("location: /notes");
exit();
