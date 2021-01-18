<?php

namespace DesignPattern\Structural\DependencyInjection;

class Superman
{
    protected $module;

    public function __construct(SuperModuleInterface $module)
    {
        $this->module = $module;
    }

    public function fire(array $targets){
        return $this->module->activate($targets);
    }
}