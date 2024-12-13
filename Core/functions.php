<?php

use Core\Response;

function dd($value)
{
    echo "<pre>";
    var_dump($value);
    echo "</pre>";

    die();
    // any script below it won't be executed
}

function url_is($url)
{
    return $_SERVER["REQUEST_URI"] === $url;
}

function abort($code = Response::NOT_FOUND)
{
    http_response_code($code);

    require base_path("views/{$code}.php");
    die();
}

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (!$condition) {
        abort($status);
    }
}

function base_path($path)
{
    return BASE_PATH . $path;
}

function view($path, $attributes = [])
{
    extract($attributes);
    require base_path("views/{$path}");
}

function login($user)
{
    $_SESSION["user"] = [
        'email' => $user['email'],
        'name' => $user['name']
    ];

    session_regenerate_id(true);
}

function logout()
{
    $_SESSION = [];

    session_destroy();

    $params = session_get_cookie_params();

    setcookie("PHPSESSID", "", time() - 3600, $params["path"], $params["domain"], $params["secure"], $params["httponly"]);
}

function redirect($path)
{
    header("location: {$path}");
    exit();
}
