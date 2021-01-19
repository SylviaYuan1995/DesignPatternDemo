<?php

namespace DesignPattern\Behavioral\Command;

/**
 * Receiver 接受调用请求类
 */
class Receiver
{
    /**
     * @param string $str
     */
    public function write($str)
    {
        echo $str;
    }
}