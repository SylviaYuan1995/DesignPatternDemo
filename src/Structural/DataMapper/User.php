<?php

namespace DesignPattern\Structural\DataMapper;

/**
 * 数据库记录在内存的表现层
 */
class User
{
    /**
     * @var int
     */
    protected $userId;

    /**
     * @var string
     */
    protected $name;


    /**
     * @param null $id
     * @param null $name
     */
    public function __construct($id = null, $name = null)
    {
        $this->userId = $id;
        $this->name = $name;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserID($userId)
    {
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }
}