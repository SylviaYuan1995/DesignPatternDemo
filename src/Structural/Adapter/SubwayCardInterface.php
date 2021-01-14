<?php

namespace DesignPattern\Structural\Adapter;

/**
 * 交通卡接口
 * Interface SubwayCardInterface
 * @package Structural\Adapter
 */
interface SubwayCardInterface
{

    //读取卡信息
    public function readCard();

    //记录进站
    public function enterStation();

    //出站进行扣费
    public function outStationAndCost();

}