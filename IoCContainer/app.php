<?php

/**
 * Created by PhpStorm.
 * User: jack
 * Date: 3/24/2018
 * Time: 8:11 PM
 */
class Application
{
    protected static $bindings = [];
    protected static $resolved = [];

    public static function bind($name, Callable $resolver)
    {
        static::$bindings[$name] = $resolver;
    }

    public static function make($name)
    {
        if (isset(static::$bindings[$name])){
            $resolver = static::$bindings[$name];
            return $resolver();
        }
        throw new Exception("service can not be resolved by this IOC container");
    }
}
