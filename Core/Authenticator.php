<?php

namespace Core;

use Core\App;
use Core\Database;

class Authenticator
{

    public static function attempt($email, $password)
    {
        $user = App::resolve(Database::class)
            ->query("select * from users where email = :email", [
                'email' => $email
            ])->find();

        if ($user && password_verify($password, $user['password'])) {
            login($user);
            return true;
        }

        return false;
    }
}
