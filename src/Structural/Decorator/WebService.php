<?php


namespace DesignPattern\Structural\Decorator;

class WebService implements RendererInterface
{
    protected $data;

    public function __construct($data)
    {
        $this->data = $data;
    }


    public function renderData()
    {
        return $this->data;
    }

}