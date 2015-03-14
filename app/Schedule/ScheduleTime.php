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
        $day = $this->datetime->dayOfWeek + 1;
        if ($this->datetime->hour < 1)
        {
            $day--;
        }
        return $day;
    }

    public function hour()
    {
        return $this->datetime->hour;
    }
}
