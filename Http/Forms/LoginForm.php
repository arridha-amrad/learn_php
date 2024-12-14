<?php

namespace Http\Forms;

use Core\ValidationException;
use Core\Validator;

class LoginForm
{
	private $errors = [];

	public function __construct(public array $attributes)
	{
		if (!Validator::email($attributes['email'])) {
			$this->errors["email"] = "Invalid email";
		}

		if (! Validator::string($attributes['password'], 1, 3)) {
			$this->errors["password"] = "Password requires 3 characters";
		}
	}

	public static function validate($attributes)
	{

		$instance = new static($attributes);

		return $instance->failed() ? $instance->throw() : $instance;
	}

	public function throw()
	{
		ValidationException::throws($this->errors(), $this->attributes);
	}

	public function failed()
	{
		return count($this->errors);
	}

	public function errors()
	{
		return $this->errors;
	}

	public function error($key, $message)
	{
		$this->errors[$key] = $message;

		return $this;
	}
}
