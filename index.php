<?php

require "functions.php";
require "Database.php";
// require "router.php";

$config = require "config.php";

$db = new Database($config["database"]);
$posts = $db->query("select * from posts")->fetchAll();
$post = $db->query("select * from posts where id = 1")->fetch();

dd($post['title']);

foreach ($posts as $post) {
    echo "<li>{$post['title']}</li>";
}
