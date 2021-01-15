<?php


namespace DesignPattern\Structural\Decorator;

/**
 * 渲染成XML
 * Class RenderXml
 * @package DesignPattern\Structural\Decorator
 */
class RenderXml extends Decorator
{
    public function renderData()
    {
        $data = $this->renderer->renderData();

        $doc = new \DOMDocument();
        foreach ($data as $key => $val) {
            $doc->appendChild($doc->createElement($key, $val));
        }

        return $doc->saveXML();

    }
}