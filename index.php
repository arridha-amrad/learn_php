<?php

require "functions.php";
// require "router.php";

// connect to mysql db
$dsn = "mysql:host=127.0.0.1;port=3306;dbname=learn_php;user=root;charset=utf8mb4";
// dsn = data source name

$pdo = new PDO($dsn);

$statement = $pdo->prepare('select * from posts');
$statement->execute();
$posts = $statement->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post) {
    echo "<li>{$post['title']}</li>";
}
