<?php


namespace DesignPattern\Structural\Decorator;

/**
 * 装饰器： 必须实现 RendererInterface 接口, 这是装饰器模式的主要特点，
 * 否则的话就不是装饰器而只是个包裹类
 * Class Decorator
 * @package DesignPattern\Structural\Decorator
 */
abstract class Decorator implements RendererInterface
{
    /** @var $renderer RendererInterface */
    protected $renderer;

    public function __construct(RendererInterface $renderer)
    {
        $this->renderer = $renderer;
    }
}