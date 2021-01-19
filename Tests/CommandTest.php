<?php

namespace DesignPattern\Tests;

use DesignPattern\Behavioral\Command\HelloCommand;
use DesignPattern\Behavioral\Command\Invoker;
use DesignPattern\Behavioral\Command\Receiver;
use PHPUnit\Framework\TestCase;

/**
 * 命令配器模式
 * Class CommandTest
 * @package Creational\Singleton\Tests
 */
class CommandTest extends TestCase
{

    /**
     * @var Invoker
     */
    protected $invoker;

    /**
     * @var Receiver
     */
    protected $receiver;

    protected function setUp(): void
    {
        $this->invoker = new Invoker();
        $this->receiver = new Receiver();
    }

    public function testInvocation()
    {
        $this->invoker->setCommand(new HelloCommand($this->receiver));
        $this->expectOutputString('Hello World');
        $this->invoker->run();
    }
}