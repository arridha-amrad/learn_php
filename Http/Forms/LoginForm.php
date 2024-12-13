<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm
{
	private $errors = [];

	public function validate($email, $password)
	{
		if (!Validator::email($email)) {
			$this->errors["email"] = "Invalid email";
		}

		if (! Validator::string($password, 1, 3)) {
			$this->errors["password"] = "Password requires 3 characters";
		}

		return empty($this->errors);
	}

	public function errors()
	{
		return $this->errors;
	}
}
