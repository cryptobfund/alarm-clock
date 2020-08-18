<?php

namespace Alarm\states;

// BEGIN (write your solution here)
class BellState
{
    private $state;

    public function __construct($state)
    {
        $this->state = $state;
    }
    public function getCurrentMode()
    {
        return 'bell';
    }

    public function clickMode()
    {
        $this->state->setState(new clockState($this->state));
    }

    public function clickH()
    {
        return;
    }

    public function clickM()
    {
        return;
    }

    public function tick()
    {
        $this->clickMode();
    }

    public function isAlarmOn()
    {
        return false;
    }
}
// END
