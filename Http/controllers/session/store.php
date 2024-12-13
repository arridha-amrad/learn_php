<?php


use Core\App;
use Core\Database;
use Http\Forms\LoginForm;

// get input
$email = $_POST["email"];
$password = $_POST["password"];

// validate input
$form = new LoginForm();
if (! $form->validate($email, $password)) {
  return view("session_create.view.php", [
    "title" => "Login",
    "errors" => $form->errors()
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
