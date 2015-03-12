<?php

namespace WITR\Schedule;

abstract class Weekday {
	const SUNDAY = 1;
    const MONDAY = 2;
    const TUESDAY = 3;
    const WEDNESDAY = 4;
    const THURSDAY = 5;
    const FRIDAY = 6;
    const SATURDAY = 7;	

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