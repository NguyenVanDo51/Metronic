<?php


namespace App;


class Computer
{
    public $monitor;
    public $keyboard;

    public function __construct(Monitor $monitor, Keyboard $keyboard)
    {
        $this->keyboard = $keyboard;
        $this->monitor = $monitor;
    }
}
