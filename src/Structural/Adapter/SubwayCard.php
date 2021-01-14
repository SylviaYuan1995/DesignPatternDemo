<?php

namespace DesignPattern\Structural\Adapter;

/**
 * 交通卡
 * Class SubwayCard
 * @package Structural\Adapter
 */
class SubwayCard implements SubwayCardInterface
{
    public function readCard()
    {
        //作为交通卡，通过NFC 或者其他技术，读取卡信息
    }

    public function enterStation()
    {
        //记录进站
    }

    public function outStationAndCost()
    {
        //记录出站对卡信息进行扣费操作
    }
}