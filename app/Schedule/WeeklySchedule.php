<?php

namespace WITR\Schedule;

use Illuminate\Support\Collection;

class WeeklySchedule extends Collection
{

    public static function fromTimeSlots(Collection $timeSlots)
    {
        $timeSlots = $timeSlots->map(function($timeslot) {
            return ScheduledShow::fromShowAndDJ($timeslot->show(), $timeslot->dj());
        });
        $weeklySchedule = new WeeklySchedule($timeSlots);

        return $weeklySchedule;
    }

    public function scheduleFor($weekday)
    {
        return $this->map(function($timeslot) use ($weekday) {
            //return $timeslot->day == $weekday;
            return false;
        });
    }
}
