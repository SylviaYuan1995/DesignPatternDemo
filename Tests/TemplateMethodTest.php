<?php
namespace DesignPattern\Tests;


use DesignPattern\Behavioral\TemplateMethod\BeachJourney;
use DesignPattern\Behavioral\TemplateMethod\CityJourney;
use PHPUnit\Framework\TestCase;

/**
 * 模板方法测试
 */
class TemplateMethodTest extends TestCase
{

    public function testBeach()
    {
        $journey = new BeachJourney();
        $this->expectOutputRegex('#sun-bathing#');
        $journey->takeATrip();
    }

    public function testCity()
    {
        $journey = new CityJourney();
        $this->expectOutputRegex('#drink#');
        $journey->takeATrip();
    }

    /**
     * 在PHPUnit中如何测试抽象模板方法
     */
    public function testLasVegas()
    {
        $journey = $this->getMockForAbstractClass('DesignPattern\Behavioral\TemplateMethod\Journey');
        $journey->expects($this->once())
            ->method('enjoyVacation')
            ->will($this->returnCallback(array($this, 'mockUpVacation')));
        $this->expectOutputRegex('#Las Vegas#');
        $journey->takeATrip();
    }

    public function mockUpVacation()
    {
        echo "Fear and loathing in Las Vegas\n";
    }
}