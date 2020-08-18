<?php

namespace Alarm;

// BEGIN (write your solution here)
use Alarm\states\BellState;
use Alarm\states\State;
use Alarm\states\ClockState;

class AlarmClock
{
    private $state;
    public $minutes;
    public $hours;
    public $alarmMinutes;
    public $alarmHours;
    public $alarmOn;

    public function __construct($hours = 12, $minutes = 0, $alarmHours = 6, $alarmMinutes = 0)
    {
        $this->hours = $hours;
        $this->minutes = $minutes;
        $this->alarmHours = $alarmHours;
        $this->alarmMinutes = $alarmMinutes;
        $this->state = new ClockState($this);
        $this->alarmOn = false;
    }
    public function isAlarmTime()
    {
        return ($this->minutes === $this->alarmMinutes) && ($this->hours === $this->alarmHours);
    }

    public function clickH()
    {
        $this->state->clickH();
        if ($this->isAlarmOn() && $this->isAlarmTime()) {
            $this->state = new BellState($this);
        }
    }
    public function clickM()
    {
        $this->state->clickM();
        if ($this->isAlarmOn() && $this->isAlarmTime()) {
            $this->state = new BellState($this);
        }
    }

    public function setState($state)
    {
        $this->state = $state;
    }

    public function clickMode()
    {
        $this->state->clickMode();
    }

    public function longClickMode()
    {
        $this->alarmOn = !$this->alarmOn;
    }

    public function isAlarmOn()
    {
        return $this->alarmOn;
    }
    public function getCurrentMode()
    {
        return $this->state->getCurrentMode();
    }
    public function getHours()
    {
        return $this->hours;
    }
    public function getMinutes()
    {
        return $this->minutes;
    }
    public function getAlarmHours()
    {
        return $this->alarmHours;
    }
    public function getAlarmMinutes()
    {
        return $this->alarmMinutes;
    }

    public function tick()
    {
        $timeInMinutes = $this->hours * 60 + $this->minutes + 1;
        $this->hours = intdiv($timeInMinutes, 60) % 24;
        $this->minutes = $timeInMinutes % 60;
        if ($this->isAlarmOn() && $this->isAlarmTime()) {
            $this->state = new BellState($this);
        } else {
            $this->state->tick();
        }
    }
}
// END
