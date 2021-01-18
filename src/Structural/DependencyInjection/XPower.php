<?php

namespace DesignPattern\Structural\DependencyInjection;
/**
 * X-超能量
 */
class XPower implements SuperModuleInterface
{
    public function activate(array $targets)
    {
        $str = '';
        foreach ($targets as $target) {
            $str .= "对" . $target . "使用 XPower\n";
        }
        return $str;
    }
}