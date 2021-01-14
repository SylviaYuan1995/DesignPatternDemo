<?php

namespace DesignPattern\Tests;

use PHPUnit\Framework\TestCase;
use DesignPattern\Structural\Adapter\QRCode;
use DesignPattern\Structural\Adapter\SubwayCard;
use DesignPattern\Structural\Adapter\SubwayCardAdapter;
use DesignPattern\Structural\Adapter\SubwayCardInterface;

/**
 * 测试单例模式
 * Class SingletonTest
 * @package Creational\Singleton\Tests
 */
class AdapterTest extends TestCase
{
    /**
     * @return array
     */
    public function getSubwayCard()
    {
        return array(
            array(new SubwayCard()),
            // 我们在适配器中引入了电子书
            array(new SubwayCardAdapter(new QRCode()))
        );
    }

    /**
     * 地铁闸机后台地铁卡，不知道还有二维码
     * 实际上第一个是地铁卡， 第二个是二维码
     * 但是对地铁闸机后台来说代码一致，不需要做任何改动
     *
     * @param SubwayCardInterface $subwayCard
     *
     * @dataProvider getSubwayCard
     */
    public function testSubwayTurnstile(SubwayCardInterface $subwayCard)
    {
        $this->assertTrue(method_exists($subwayCard, 'readCard'));
        $this->assertTrue(method_exists($subwayCard, 'enterStation'));
        $this->assertTrue(method_exists($subwayCard, 'outStationAndCost'));
    }
}