<?php


namespace DesignPattern\Tests;

use DesignPattern\Structural\Facade\Bios;
use DesignPattern\Structural\Facade\Facade as Computer;
use DesignPattern\Structural\Facade\Linux;
use PHPUnit\Framework\TestCase;

/**
 * FacadeTest用于测试门面模式
 */
class FacadeTest extends TestCase
{

    public function testComputerOn()
    {
        //注册门面
        $bios = new Bios();
        $os = new Linux();
        $facade = new Computer($bios, $os);

        // 用户直接使用门面，界面简单；对客户屏蔽子系统组件
        $facade->turnOn();
        // 且用户也可以访问较低的组件
        $this->assertEquals('Linux', $os->getName());
    }
}