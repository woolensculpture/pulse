<?php

namespace WITR\Schedule;

use Carbon\Carbon;

class ScheduleTime
{

    protected $datetime;

    public static function now()
    {
        return ScheduleTime::fromDate(Carbon::now('America/New_York'));
    }

    public static function setTestNow($now)
    {
        Carbon::setTestNow($now);
    }

    public function value()
    {
        return $this->datetime;
    }

    public static function fromDate($datetime)
    {
        $scheduleTime = new ScheduleTime();

        $scheduleTime->datetime = $datetime;

        return $scheduleTime;
    }

    public function dayOfWeek()
    {
        $day = $this->datetime->dayOfWeek;
        if ($this->datetime->hour < 1)
        {
            $day--;
        }
        return $day;
    }

    public function hour()
    {
        $hour = $this->datetime->hour;
        if ($hour == 0) {
            return 24;
        } else {
            return $hour;
        }
    }

    public function __get($name)
    {
        if ($name == 'dayOfWeek')
        {
            return $this->dayOfWeek();
        }
        return $this->datetime->$name;
    }

    public function __call($method, $arguments)
    {
        if (method_exists($this, $method))
        {
            return $this->$method();
        }
        call_user_func_array(array($this->datetime, $method), $arguments);
        return $this;
    }
}
