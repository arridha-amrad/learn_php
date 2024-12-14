<?php

use Core\Authenticator;
use Http\Forms\LoginForm;

$form = LoginForm::validate($attributes = [
    'email' => $_POST['email'],
    'password' => $_POST['password']
]);

if (Authenticator::attempt($attributes['email'], $attributes['password'])) {
    redirect("/");
}

$form->error('general', 'Invalid email and password')->throw();
