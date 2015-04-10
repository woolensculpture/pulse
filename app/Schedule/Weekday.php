<?php

namespace WITR\Schedule;

abstract class Weekday {
	const SUNDAY = 0;
    const MONDAY = 1;
    const TUESDAY = 2;
    const WEDNESDAY = 3;
    const THURSDAY = 4;
    const FRIDAY = 5;
    const SATURDAY = 6;	

    protected static $days = [
        Weekday::SUNDAY => 'Sunday',
        Weekday::MONDAY => 'Monday',
        Weekday::TUESDAY => 'Tuesday',
        Weekday::WEDNESDAY => 'Wednesday',
        Weekday::THURSDAY => 'Thursday',
        Weekday::FRIDAY => 'Friday',
        Weekday::SATURDAY => 'Saturday'
    ];

    public static function display($weekday) 
    {
    	return static::$days[$weekday];
    }
}