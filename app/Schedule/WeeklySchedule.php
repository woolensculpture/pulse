<?php

namespace WITR\Schedule;

use Illuminate\Support\Collection;

class WeeklySchedule extends Collection
{

    public static function fromTimeSlots(Collection $timeSlots)
    {
        $scheduledShows = new Collection();
        $timeSlots = $timeSlots->reduce(function($scheduledShows, $timeslot) {
            $scheduledShow = $scheduledShows->last();
            if (static::showContinuesIntoCurrentTimeslot($scheduledShow, $timeslot))
            {
                $scheduledShow->extendShowByHour();
            } 
            else
            {
                $show = ScheduledShow::fromShowAndDJ($timeslot->show(), $timeslot->dj());
                $show->startsAt($timeslot->hour);
                $show->airsDayOfWeek($timeslot->day);
                $scheduledShows->push($show);
            }
            return $scheduledShows;
        }, $scheduledShows);
        $weeklySchedule = new WeeklySchedule($timeSlots);

        return $weeklySchedule;
    }

    private static function showContinuesIntoCurrentTimeslot($scheduledShow, $timeslot)
    {
        return $scheduledShow != null 
            && $scheduledShow->djId() == $timeslot->dj()->id
            && $scheduledShow->showId() == $timeslot->show()->id;
    }

    public function scheduleFor($weekday)
    {
        return $this->filter(function($timeslot) use ($weekday) {
            return $timeslot->airDayOfWeek() == $weekday;
        });
    }
}
