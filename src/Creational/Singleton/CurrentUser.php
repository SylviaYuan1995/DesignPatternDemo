<?php

namespace DesignPattern\Creational\Singleton;

/**
 * 单例模式demo
 * Class CurrentUser
 * @package DesignPattern\Creational\Singleton
 */
class  CurrentUser
{
    private static $instance = null; //当前类的实例（私有）
    private static $token = ''; //当前用户的token值（私有）
    private static $userInfo = [];  //当前用户基本信息数组（私有）

    private function __construct($token, $userInfo)  //私有的构造方法，从而禁止从外部用 new 关键字创建实例（私有）
    {
        self::$token = $token;
        self::$userInfo = $userInfo;
    }

    private function __clone()   //克隆方法私有化,从而禁止从外部通过 clone 关键字创建实例（私有）
    {

    }

    public static function getInstance($token, $userInfo) //用于生成当前类的实例（公共）
    {
        //如果$instance变量中保存的不是当前类的实例
        if (!self::$instance instanceof self) {
            //那么就new一个当前类,并保存在$instance中
            self::$instance = new self($token, $userInfo);
        }
        //否则直接返回$instance
        return self::$instance;
    }

    public static function getToken() //用于获取当前用户 token
    {
        return self::$token;
    }

    public static function getUserInfo()  //用于获取当前用户信息数组 userInfo
    {
        return self::$userInfo;
    }
}

