<?php

namespace DesignPattern\Structural\DataMapper;

use Doctrine\DBAL\DBALException;
use Doctrine\DBAL\DriverManager;

/**
 * 数据映射类
 * 数据库的连接与修改，这里用的是扩展包DBAL适配器，用于连接各种数据库并进行操作  composer require doctrine/dbal:3.0.0 进行下载安装
 */
class UserMapper
{
    protected $table = 'users';
    protected $adapter;

    /**
     * UserMapper constructor.
     * @throws DBALException
     */
    public function __construct()
    {
        $connectionParams = array(
            'dbname' => 'design_pattern',
            'user' => 'root',
            'password' => '123456',
            'host' => '127.0.0.1:3316',
            'driver' => 'pdo_mysql',
        );

        $adapter = DriverManager::getConnection($connectionParams);
        $this->adapter = $adapter;
    }


    /**
     * 将用户对象保存到数据库
     *
     * @param User $user
     * @return bool
     * @throws DBALException
     */
    public function save(User $user)
    {
        // $data的键名对应数据库表字段
        $data = array(
            'user_id' => $user->getUserId(),
            'name' => $user->getName(),
        );
        // 如果没有指定ID则在数据库中创建新纪录，否则更新已有记录
        if (null === ($id = $user->getUserId())) {
            unset($data['user_id']);
            $this->adapter->insert($this->table, $data);
            return true;
        } else {
            $this->adapter->update($this->table, $data, array('user_id ' => $id));
            return true;
        }
    }

    /**
     * 基于ID在数据库中查找用户并返回用户实例
     * @param $id
     * @return mixed
     * @throws DBALException
     * @throws \InvalidArgumentException
     */
    public function findById($id)
    {
        $result = $this->adapter->executeQuery("select * from ".$this->table." where user_id = ".$id)->fetch();

        if (empty($result)) {
            throw new \InvalidArgumentException("User #$id not found");
        }
        return $this->mapObject($result);
    }

    /**
     * 获取数据库所有记录并返回用户实例数组
     * @return array
     * @throws DBALException
     */
    public function findAll()
    {
        $resultSet = $this->adapter->executeQuery("select * from ".$this->table)->fetchAll();
        $entries = array();

        foreach ($resultSet as $row) {
            $entries[] = $this->mapObject($row);
        }

        return $entries;
    }

    /**
     * 映射表记录到对象
     *
     * @param array $row
     *
     * @return User
     */
    protected function mapObject(array $row)
    {
        $entry = new User();
        $entry->setUserID((int)$row['user_id']);
        $entry->setName($row['name']);

        return $entry;
    }

}
