<?php

use Core\App;
use Core\Database;
use Core\Validator;

$name = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];

// validate
$errors = [];
if (! Validator::string($name, 3, 50)) {
  $errors["name"] = "Name requires minimal 3 characters and maximal 50 characters";
}
if (! Validator::email($email)) {
  $errors["email"] = "Invalid email";
}
if (! Validator::string($password, 3)) {
  $errors["password"] = "Password requires minimal 3 characters";
}

if (! empty($errors)) {
  return view("registration.view.php", [
    'title' => 'Register',
    'errors' => $errors
  ]);
}

// is email already registered
$db = App::resolve(Database::class);

$user = $db->query("SELECT * FROM users WHERE email = :email", [
  "email" => $email
])->find();

// yes -> error
if ($user) {
  $errors["general"] = "Email has been registered";
  return view("registration.view.php", [
    'title' => 'Register',
    'errors' => $errors
  ]);
}

// no -> store
$db->query("INSERT INTO users (name, email, password) VALUES (:name, :email, :password)", [
  'name' => $name,
  'email' => $email,
  'password' => $password
]);

$_SESSION['user'] = [
  'email' => $email,
  'name' => $name
];

// redirect to /
header("location: /");
exit();
