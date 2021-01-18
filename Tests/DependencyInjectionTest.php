<?php

namespace DesignPattern\Tests;

use DesignPattern\Structural\DependencyInjection\Superman;
use DesignPattern\Structural\DependencyInjection\UltraBomb;
use DesignPattern\Structural\DependencyInjection\XPower;
use PHPUnit\Framework\TestCase;

/**
 * 依赖注入模式
 * Class SingletonTest
 * @package Creational\Singleton\Tests
 */
class DependencyInjectionTest extends TestCase
{
    protected $config;
    protected $source;


    public function testDependencyInjection()
    {
        // 超能力模组
        $superModule = new XPower();
        // 初始化一个超人，并注入一个超能力模组依赖
        $superMan = new Superman($superModule);
        $result1 = $superMan->fire(['user1', 'user2']);
        $this->assertEquals("对user1使用 XPower\n对user2使用 XPower\n", $result1);


        // 超能力模组
        $superModule2 = new UltraBomb();
        // 初始化一个超人，并注入一个超能力模组依赖
        $superMan2 = new Superman($superModule2);
        $result2 = $superMan2->fire(['user3']);
        $this->assertEquals("对user3使用 UltraBomb\n", $result2);

    }

}