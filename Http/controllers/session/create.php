<?php

use Core\Session;

view("session_create.view.php", [
  'errors' => Session::get('errors') ?? [],
  'title' => "Login"
]);
