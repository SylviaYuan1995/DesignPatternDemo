<?php

namespace DesignPattern\Behavioral\Observer;

use SplSubject;

class UserObserver implements \SplObserver
{

    /**
     * 收到观察对象被更新的消息，进行操作
     * @link https://php.net/manual/en/splobserver.update.php
     * @param SplSubject $subject <p>
     * 这个 <b>SplSubject</b>通知观察者更新
     * </p>
     * @return void
     * @since 5.1.0
     */
    public function update(SplSubject $subject)
    {
        echo get_class($subject) . ' 被更新';
    }
}