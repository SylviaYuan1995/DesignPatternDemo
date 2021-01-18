<?php

namespace DesignPattern\Structural\DependencyInjection;

/**
 * 终极炸弹
 */
class UltraBomb implements SuperModuleInterface
{
    public function activate(array $targets)
    {
        $str = '';
        foreach ($targets as $target) {
            $str .= "对" . $target . "使用 UltraBomb\n";
        }
        return $str;
    }
}