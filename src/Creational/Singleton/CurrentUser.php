<?php

namespace DesignPattern\Creational\Singleton;

class  CurrentUser
{
    private static $token = '';
    private static $userInfo = [];

    //1.创建一个静态私有属性,用于保存当前类的实例
    private static $instance = null;

    //2.构造方法私有化,从而禁止从外部用new关键字创建实例
    private function __construct($token, $userInfo)
    {
        self::$token = $token;
        self::$userInfo = $userInfo;
    }

    //3.克隆方法私有化,从而禁止从外部通过clone关键字创建实例
    private function __clone()
    {

    }

    //4.定义公共静态方法,用于生成当前类的实例
    public static function getInstance($token, $userInfo)
    {
        //如果$instance变量中保存的不是当前类的实例
        if (!self::$instance instanceof self) {
            //那么就new一个当前类,并保存在$instance中
            self::$instance = new self($token, $userInfo);
        }
        //否则直接返回$instance
        return self::$instance;
    }

    public static function getToken()
    {
        return self::$token;
    }

    public static function getUserInfo()
    {
        return self::$userInfo;
    }

}
