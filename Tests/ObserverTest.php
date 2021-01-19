<?php

namespace DesignPattern\Tests;

use DesignPattern\Behavioral\Observer\User;
use DesignPattern\Behavioral\Observer\UserObserver;
use PHPUnit\Framework\TestCase;

/**
 * 观察者模式测试
 * Class ObserverTest
 * @package DesignPattern\Tests
 */
class ObserverTest extends TestCase
{

    protected $observer;

    protected function setUp(): void
    {
        $this->observer = new UserObserver();
    }

    /**
     * 测试通知
     */
    public function testNotify()
    {
        $this->expectOutputString('DesignPattern\Behavioral\Observer\User 被更新');
        $subject = new User();

        $subject->attach($this->observer);
        $subject->property = 123;
    }

    /**
     * 测试订阅
     */
    public function testAttachDetach()
    {
        $subject = new User();
        $reflection = new \ReflectionProperty($subject, 'observers');

        $reflection->setAccessible(true);
        /** @var \SplObjectStorage $observers */
        $observers = $reflection->getValue($subject);

        $this->assertInstanceOf('SplObjectStorage', $observers);
        $this->assertFalse($observers->contains($this->observer));

        $subject->attach($this->observer);
        $this->assertTrue($observers->contains($this->observer));

        $subject->detach($this->observer);
        $this->assertFalse($observers->contains($this->observer));
    }

}