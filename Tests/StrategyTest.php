<?php
namespace DesignPattern\Tests;


use DesignPattern\Behavioral\Strategy\DateComparator;
use DesignPattern\Behavioral\Strategy\IdComparator;
use DesignPattern\Behavioral\Strategy\ObjectCollection;
use PHPUnit\Framework\TestCase;

/**
 * 策略模式测试
 */
class StrategyTest extends TestCase
{

    public function getIdCollection()
    {
        return array(
            array(
                array(array('id' => 2), array('id' => 1), array('id' => 3)),
                array('id' => 1)
            ),
            array(
                array(array('id' => 3), array('id' => 2), array('id' => 1)),
                array('id' => 1)
            ),
        );
    }

    public function getDateCollection()
    {
        return array(
            array(
                array(array('date' => '2014-03-03'), array('date' => '2015-03-02'), array('date' => '2013-03-01')),
                array('date' => '2013-03-01')
            ),
            array(
                array(array('date' => '2014-02-03'), array('date' => '2013-02-01'), array('date' => '2015-02-02')),
                array('date' => '2013-02-01')
            ),
        );
    }

    /**
     * @dataProvider getIdCollection
     * @param $collection
     * @param $expected
     */
    public function testIdComparator($collection, $expected)
    {
        $obj = new ObjectCollection($collection);
        $obj->setComparator(new IdComparator());
        $elements = $obj->sort();

        $firstElement = array_shift($elements);
        $this->assertEquals($expected, $firstElement);
    }

    /**
     * @dataProvider getDateCollection
     * @param $collection
     * @param $expected
     */
    public function testDateComparator($collection, $expected)
    {
        $obj = new ObjectCollection($collection);
        $obj->setComparator(new DateComparator());
        $elements = $obj->sort();

        $firstElement = array_shift($elements);
        $this->assertEquals($expected, $firstElement);
    }
}