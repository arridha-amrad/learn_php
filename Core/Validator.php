<?php

class Validator
{
  public static function string($text, $min = 1, $max = INF)
  {
    $value = trim($text);
    return strlen($value) >= $min && strlen($value) <= $max;
  }

  public static function email($text)
  {
    return filter_var($text, FILTER_VALIDATE_EMAIL);
  }
}
