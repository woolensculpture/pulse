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

    public static function fromShowAndDJ(Show $show, User $dj)
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

        if ($this->endingHour > 24) 
        {
            $this->endingHour -= 24;
        }
    }

    public function timespan()
    {
        $suffix = $this->endingHour < 12 ? 'AM' : 'PM';
        $endingHour = $this->endingHourAdjusted();
        return $this->startingHour . ' - ' . $endingHour . ' ' . $suffix;
    }

    private function endingHourAdjusted()
    {
        $endingHour = $this->endingHour;
        if ($endingHour > 12) {
            $endingHour -= 12;
        }
        return $endingHour;
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
        $today = Carbon::now()->dayOfWeek + 1;
        if ($this->dayOfWeek == $today)
        {
            return 'Today';
        }
        else if ($this->dayOfWeek == $today + 1)
        {
            return 'Tomorrow';
        }
        else 
        {
            return $this->getAirDate();
        }
    }

}
