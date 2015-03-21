<?php

namespace WITR\Schedule;

use Illuminate\Support\Collection;

class WeeklySchedule extends Collection
{

    public static function mergeFromTimeSlots(Collection $timeSlots)
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
                $show = ScheduledShow::fromShowAndDJ($timeslot->showForTimeslot, $timeslot->djForTimeslot);
                $show->setId($timeslot->id);
                $show->startsAt($timeslot->hour);
                $show->airsDayOfWeek($timeslot->day);
                $scheduledShows->push($show);
            }
            return $scheduledShows;
        }, $scheduledShows);
        $weeklySchedule = new WeeklySchedule($timeSlots);

        return $weeklySchedule;
    }

    public static function fromTimeSlots(Collection $timeSlots)
    {
        $timeSlots = $timeSlots->map(function($timeslot) {
            $show = ScheduledShow::fromShowAndDJ($timeslot->showForTimeslot, $timeslot->djForTimeslot);
            $show->setId($timeslot->id);
            $show->startsAt($timeslot->hour);
            $show->airsDayOfWeek($timeslot->day);
            return $show;
        });

        return new WeeklySchedule($timeSlots);
    }

    private static function showContinuesIntoCurrentTimeslot($scheduledShow, $timeslot)
    {
        return $scheduledShow != null 
            && $scheduledShow->djId() == $timeslot->djForTimeslot->id
            && $scheduledShow->showId() == $timeslot->showForTimeslot->id
            && $scheduledShow->airDayOfWeek() == $timeslot->day;
    }

    public function scheduleFor($weekday)
    {
        return $this->filter(function($timeslot) use ($weekday) {
            return $timeslot->airDayOfWeek() == $weekday;
        });
    }

    public function getShowsForSlideshow()
    {
        $shows = new Collection();
        $first = $this->first(function ($key, $show) {
            return $show->nowPlaying();
        });
        $shows->push($first);
        $nonPulseShows = $this->filter(function ($show) {
            return strtolower($show->show()) != 'the pulse of music';
        });

        $shows = $shows->merge($nonPulseShows->take(2));

        do
        {
            $random = $nonPulseShows->random();
            $exists = $shows->filter(function($show) use($random) {
                return $show->showId() == $random->showId();
            });
        } while(!$exists->isEmpty());

        $shows->push($random);

        return $shows;
    }
}
