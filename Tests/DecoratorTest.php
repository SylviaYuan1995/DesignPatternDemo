<?php


namespace DesignPattern\Tests;


use DesignPattern\Structural\Decorator\RenderJson;
use DesignPattern\Structural\Decorator\RenderXml;
use DesignPattern\Structural\Decorator\WebService;
use PHPUnit\Framework\TestCase;

class DecoratorTest extends TestCase
{
    protected $service;

    protected function setUp(): void
    {
        $this->service = new WebService(array('foo' => 'bar'));

    }

    public function testJsonDecorator()
    {
        // Wrap service with a JSON decorator for renderers
        $service = new RenderJson($this->service);
        // Our Renderer will now output JSON instead of an array
        $this->assertEquals('{"foo":"bar"}', $service->renderData());
    }

    public function testXmlDecorator()
    {
        // Wrap service with a XML decorator for renderers
        $service = new RenderXml($this->service);
        // Our Renderer will now output XML instead of an array
        $xml = '<?xml version="1.0"?><foo>bar</foo>';
        $this->assertXmlStringEqualsXmlString($xml, $service->renderData());
    }

    /**
     * The first key-point of this pattern :
     */
    public function testDecoratorMustImplementsRenderer()
    {
        $className = 'DesignPattern\Structural\Decorator\Decorator';
        $interfaceName = 'DesignPattern\Structural\Decorator\RendererInterface';
        $this->assertTrue(is_subclass_of($className, $interfaceName));
    }

}