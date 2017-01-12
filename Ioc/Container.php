<?php
class Container
{
    protected static $registry = [];

    public static function bind($name, $resolver)
    {
        self::$registry[$name] = $resolver;
    }

    public static function make($name)
    {
    	if(isset(static::$registry[$name])){
    		$resolver = static::$registry[$name];
    		return $resolver();
    	}
    	throw new Exception('alias does not exist in the IoC registry');
    }
}
