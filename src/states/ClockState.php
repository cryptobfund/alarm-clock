<?php

namespace Alarm\states;

// BEGIN (write your solution here)
class ClockState implements State
{
    private $state;

    public function __construct($state)
    {
        $this->state = $state;
    }

    public function clickMode()
    {
        $this->state->setState(new AlarmState($this->state));
    }

    public function isAlarmOn()
    {
        return false;
    }

    public function getCurrentMode()
    {
        return 'clock';
    }

    public function incrementH()
    {
        if ($this->state->hours === 23) {
            $this->state->hours = 0;
        } else {
            $this->state->hours += 1;
        }
    }
    public function incrementM()
    {
        if ($this->state->minutes === 59) {
            $this->state->minutes = 0;
        } else {
            $this->state->minutes += 1;
        }
    }
    public function tick()
    {
        return;
    }
    public function clickH()
    {
        $this->incrementH();
    }
    public function clickM()
    {
        $this->incrementM();
    }
}
// END
