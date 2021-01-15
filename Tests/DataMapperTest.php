<?php

namespace DesignPattern\Tests;

use DesignPattern\Structural\DataMapper\User;
use DesignPattern\Structural\DataMapper\UserMapper;
use PHPUnit\Framework\InvalidArgumentException;
use PHPUnit\Framework\TestCase;

/**
 * 测试数据映射模式
 * Class DataMapperTest
 * @package Creational\Singleton\Tests
 */
class DataMapperTest extends TestCase
{

    public function getNewUser()
    {
        return array(array(new User(null, 'Sylvia')));
    }


    public function getExistingUser()
    {
        return array(array(new User(1, 'Sylvia1')));
    }

    /**
     * @param User $user
     *
     * @dataProvider getNewUser
     *
     * @throws \Doctrine\DBAL\DBALException
     */
    public function testCreate(User $user)
    {
        $result = (new UserMapper())->save($user);
        $this->assertIsBool($result);
    }

    /**
     * @param User $user
     * @dataProvider getExistingUser
     * @throws \Doctrine\DBAL\DBALException
     */
    public function testUpdate(User $user)
    {
        $updateResult = (new UserMapper())->save($user);
        $this->assertIsBool($updateResult);
    }

    /**
     * @param User $existing
     * @dataProvider getExistingUser
     * @throws \Doctrine\DBAL\DBALException
     */
    public function testFindById(User $existing)
    {
        $user = (new UserMapper())->findById(1);
        $this->assertEquals($existing, $user);
    }


    /**
     * @dataProvider getExistingUser
     * @throws \Doctrine\DBAL\DBALException
     */
    public function testFindAll()
    {

        $users = (new UserMapper())->findAll();
        $this->assertIsArray($users);
        foreach ($users as $user) {
            $this->assertIsObject($user);
        }
    }

}