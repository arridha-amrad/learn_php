<?php

namespace Core;

use Exception;

class ValidationException extends Exception
{
    public readonly array $errors;
    public readonly array $old;

    public static function throws($errors, $old)
    {
        $instance = new static;

        $instance->errors = $errors;
        $instance->old = $old;

        throw $instance;
    }
}
