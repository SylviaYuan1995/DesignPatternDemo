<?php

namespace DesignPattern\Structural\Adapter;

/**
 * 适配器：将二维码刷地铁接口通过本适配器转化为闸机所用的地铁卡刷地铁的方式
 * Class SubwayCardAdapter
 * @package Structural\Adapter
 */
class SubwayCardAdapter implements SubwayCardInterface
{

    /** @var QRCodeInterface */
    protected $qrCode;

    public function __construct(QRCodeInterface $qrCode)
    {
        $this->qrCode = $qrCode;
    }

    public function readCard()
    {
        $this->qrCode->QRCodeRecognition();
    }

    public function enterStation()
    {
        $this->qrCode->enterOutStation();
    }

    public function outStationAndCost()
    {
        $this->qrCode->enterOutStation();
        $this->qrCode->cost();
    }
}

