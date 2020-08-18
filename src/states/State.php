<?php

namespace Alarm\states;

interface State
{
    public function incrementH();
    public function incrementM();
    public function tick();
}
