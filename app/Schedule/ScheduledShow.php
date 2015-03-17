<?php

namespace WITR\Schedule;

use WITR\Show;
use WITR\User;
use Carbon\Carbon;

class ScheduledShow
{

    protected $show;
    protected $dj;
    protected $startingHour;
    protected $endingHour;
    protected $id;
    protected $dayOfWeek;

    public static function fromShowAndDJ($show, $dj)
    {
        $scheduledShow = new ScheduledShow();

        $scheduledShow->show = $show;
        $scheduledShow->dj = $dj;

        return $scheduledShow;
    }

    public function dj()
    {
        return $this->dj->dj_name;
    }

    public function djId()
    {
        return $this->dj->id;
    }

    public function show()
    {
        return $this->show->name;
    }

    public function showId()
    {
        return $this->show->id;
    }

    public function djPicture()
    {
        return $this->dj->picture;
    }

    public function showPicture()
    {
        return $this->show->show_picture;
    }

    public function sliderPicture()
    {
        return $this->show->slider_picture;
    }

    public function sliderStyle()
    {
        return $this->show->style;
    }

    public function startsAt($startingHour)
    {
        $this->startingHour = $startingHour;
        $this->endingHour = $startingHour;
        $this->extendShowByHour();
    }

    public function start()
    {
        return $this->startingHour;
    }

    public function end()
    {
        return $this->endingHour;
    }

    public function extendShowByHour()
    {
        $this->endingHour++;
    }

    public function timespan()
    {
        $suffix = $this->endingHour < 12 ? 'AM' : 'PM';
        $endingHour = $this->hourAdjusted($this->endingHour);
        $startingHour = $this->hourAdjusted($this->startingHour);
        return $startingHour . ' - ' . $endingHour . ' ' . $suffix;
    }

    private function hourAdjusted($hour)
    {
        while ($hour > 12) {
            $hour -= 12;
        }
        return $hour;
    }

    public function airsDayOfWeek($airsDayOfWeek)
    {
        $this->dayOfWeek = $airsDayOfWeek;
    }

    public function getAirDate()
    {
        return Weekday::display($this->dayOfWeek);
    }

    public function getRelativeAirDate()
    {
        $day = ScheduleTime::now()->dayOfWeek();
        if ($this->dayOfWeek == $day)
        {
            return 'Today';
        }
        else if ($this->dayOfWeek == $day + 1)
        {
            return 'Tomorrow';
        }
        else 
        {
            return $this->getAirDate();
        }
    }


    public function airDayOfWeek()
    {
        return $this->dayOfWeek;
    }

    public function showDescription()
    {
        return $this->show->description;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function id()
    {
        return $this->id;
    }

    public function nowPlaying()
    {
        $today = ScheduleTime::now();

        if ($this->airDayOfWeek() != $today->dayOfWeek())
        {
            return false;
        }

        if ($this->startingHour > $today->hour() || $this->endingHour <= $today->hour())
        {
            return false;
        }

        return true;
    }
}
