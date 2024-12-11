<?php

namespace Core;

class App {

  protected static $container;
  

  public static function set_container($container)
  {
    static::$container = $container;
  }


  private static function container()
  {
    return static::$container;
  }


  public static function resolve($key)
  {
    return static::container()->resolve($key);
  }


  public static function bind($key, $function)
  {
    static::$container->bind($key, $function);
  }

}