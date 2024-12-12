<?php

$router->get("/", "controllers/index.php");
$router->get("/about", "controllers/about.php");
$router->get("/contact", "controllers/contact.php");

$router->get("/notes", "controllers/notes/index.php")->only("auth");
$router->post("/notes", "controllers/notes/store.php");

$router->get("/notes/create", "controllers/notes/create.php");
$router->get("/notes/edit", "controllers/notes/edit.php");

$router->get("/note", "controllers/notes/show.php");
$router->delete("/note", "controllers/notes/destroy.php");
$router->put("/note", "controllers/notes/update.php");

$router->get("/register", "controllers/registration/create.php")->only("guest");
$router->post("/register", "controllers/registration/store.php");
