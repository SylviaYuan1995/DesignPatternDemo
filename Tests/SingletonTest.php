<?php

namespace DesignPattern\Tests;

use DesignPattern\Creational\Singleton\CurrentUser;
use PHPUnit\Framework\TestCase;

/**
 * 测试单例模式
 * Class SingletonTest
 * @package Creational\Singleton\Tests
 */
class SingletonTest extends TestCase
{

    public function testUniqueness()
    {
        $firstCall = CurrentUser::getInstance('token1', ['name' => 'Sylvia', 'sex' => '女']);
        $firstUserInfo = $firstCall::getUserInfo();
        $this->assertInstanceOf(CurrentUser::class, $firstCall);
        $secondCall = CurrentUser::getInstance('token2', ['name' => 'Tom', 'sex' => '男']);
        $secondUserInfo = $secondCall::getUserInfo();
        $this->assertSame($firstCall, $secondCall);
        $this->assertSame($firstUserInfo, $secondUserInfo);
    }

    /**
     * @throws \ReflectionException
     */
    public function testNoConstructor()
    {
        $obj = CurrentUser::getInstance('token1', ['name' => 'Sylvia', 'sex' => '女']);

        $refl = new \ReflectionObject($obj);
        $meth = $refl->getMethod('__construct');
        $this->assertTrue($meth->isPrivate());
    }
}