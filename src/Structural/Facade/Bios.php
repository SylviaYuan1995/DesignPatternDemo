<?php

namespace DesignPattern\Structural\Facade;
/**
 * BIOS "Basic Input Output System"的缩略词，基本输入输出系统
 * Interface BiosInterface
 * @package DesignPattern\Structural\Facade
 */
class Bios implements BiosInterface
{
    /**
     * 执行BIOS
     */
    public function execute()
    {

    }

    /**
     * 等待停止
     */
    public function waitForKeyPress()
    {

    }

    /**
     * 启动操作系统
     *
     * @param OsInterface $os
     */
    public function launch(OsInterface $os)
    {

    }

    /**
     * 关闭BIOS
     */
    public function powerDown()
    {

    }
}