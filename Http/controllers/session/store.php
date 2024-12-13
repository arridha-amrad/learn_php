<?php


use Core\Authenticator;
use Core\Session;
use Http\Forms\LoginForm;

// get input
$email = $_POST["email"];
$password = $_POST["password"];

// validate input
$form = new LoginForm();

if ($form->validate($email, $password)) {

    if (Authenticator::attempt($email, $password)) {
        redirect("/");
    }

    $form->error('general', 'Invalid email and password');
}

Session::flash("errors", $form->errors());

return redirect("/login");


// return view("session_create.view.php", [
//     "title" => "Login",
//     "errors" => $form->errors()
// ]);
