<?php

namespace Alarm\states;

// BEGIN (write your solution here)
class AlarmState implements State
{
    private $state;

    public function __construct($state)
    {
        $this->state = $state;
    }

    public function clickMode()
    {
        $this->state->setState(new ClockState($this->state));
    }


    public function tick()
    {
        return;
    }

    public function isAlarmOn()
    {
        return true;
    }

    public function getCurrentMode()
    {
        return 'alarm';
    }
    public function incrementH()
    {
        if ($this->state->alarmHours === 23) {
            $this->state->alarmHours = 0;
        } else {
            $this->state->alarmHours += 1;
        }
    }

    public function incrementM()
    {
        if ($this->state->alarmMinutes === 59) {
            $this->state->alarmMinutes = 0;
        } else {
            $this->state->alarmMinutes += 1;
        }
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
