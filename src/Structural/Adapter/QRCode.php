<?php

namespace DesignPattern\Structural\Adapter;

class QRCode implements QRCodeInterface
{
    //识别二维码
    public function qrCodeRecognition(){

    }

    //调用第三方的信息并记录进出站
    public function enterOutStation(){

    }

    //调用第三方的消费接口：将费用信息给到第三方，然后得到扣费结果
    public function cost(){

    }

}
