<?php


namespace DesignPattern\Structural\Decorator;

/**
 * 渲染成 Json
 * Class RenderXml
 * @package DesignPattern\Structural\Decorator
 */
class RenderJson extends Decorator
{
    public function renderData()
    {
        $output = $this->renderer->renderData();
        return json_encode($output);
    }
}