<?php

namespace DesignPattern\Structural\Facade;
/**
 * 操作系统
 */
class Linux implements OsInterface
{
    /**
     * 停止操作系统
     */
    public function halt()
    {

    }

    public function getName()
    {
        return 'Linux';
    }
}