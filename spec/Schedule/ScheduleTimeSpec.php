<?php

namespace spec\WITR\Schedule;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Carbon\Carbon;

class ScheduleTimeSpec extends ObjectBehavior
{
    function it_should_use_new_york_time_for_now_constructor()
    {
    	$this->beConstructedThrough('now');
    	$this->value()->eq(Carbon::now('America/New_York'))->shouldBe(true);
    }

    function it_should_be_constructed_from_date()
    {
    	$this->beConstructedThrough('fromDate', [Carbon::now()]);
    	$this->value()->eq(Carbon::now('America/New_York'))->shouldBe(true);
    }

    function it_should_return_previous_day_of_week_if_before_1_am()
    {
    	$day = Carbon::create(2015, 3, 3, 0);
    	$this->beConstructedThrough('fromDate', [$day]);
    	$this->dayOfWeek()->shouldBe(2);
    }

    function it_should_return_correct_day_of_week_if_after_1_am()
    {
    	$day = Carbon::create(2015, 3, 3, 1);
    	$this->beConstructedThrough('fromDate', [$day]);
    	$this->dayOfWeek()->shouldBe(3);
    }

    function it_should_return_correct_hour()
    {
    	$day = Carbon::create(2015, 3, 3, 5);
    	$this->beConstructedThrough('fromDate', [$day]);
    	$this->hour()->shouldBe(5);
    }
}
