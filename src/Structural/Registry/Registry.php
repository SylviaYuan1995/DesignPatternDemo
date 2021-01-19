<?php

namespace DesignPattern\Structural\Registry;

abstract class Registry
{
    const LOGGER = 'logger';

    protected static $storedValues = array();

    public static function set($key, $value)
    {
        self::$storedValues[$key] = $value;
    }

    public static function get($key)
    {
        return self::$storedValues[$key];
    }
    // 通常会有一些方法来检查密钥是否已经注册，等等。 ...
}