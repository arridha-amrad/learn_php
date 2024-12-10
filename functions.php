<?php

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

function authorize($condition, $status = Response::FORBIDDEN)
{
    if (! $condition) {
        abort($status);
    }
}
