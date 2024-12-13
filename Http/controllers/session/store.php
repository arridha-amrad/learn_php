<?php

// get input

use Core\Validator;
use Core\App;
use Core\Database;

$email = $_POST["email"];
$password = $_POST["password"];

// validate input
$errors = [];

if (! Validator::email($email)) {
  $errors["email"] = "Invalid email";
}

if (!Validator::string($password, 1)) {
  $errors["password"] = "Password is required";
}

if (! empty($errors)) {
  return view("session_create.view.php", [
    "title" => "Login",
    "errors" => $errors
  ]);
}


// check if user exists against db
$db = App::resolve(Database::class);

$user = $db->query("select * from users where email = :email", [
  'email' => $email
])->find();

// no
if (! $user) {
  $errors["general"] = "Email not found";
  return view("session_create.view.php", [
    'title' => "Login",
    "errors" => $errors
  ]);
}

// yes, check if password match
if (! password_verify($password, $user["password"])) {
  $errors["general"] = "Invalid Credentials";
  return view("session_create.view.php", [
    'title' => "Login",
    "errors" => $errors
  ]);
}

// yes
login($user);

header("location: /");
exit();
