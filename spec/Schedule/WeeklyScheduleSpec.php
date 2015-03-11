<?php

namespace spec\WITR\Schedule;

use PhpSpec\ObjectBehavior;
use Prophecy\Argument;
use Illuminate\Support\Collection;
use WITR\TimeSlot;
use WITR\Show;
use WITR\User;
use WITR\Schedule\Weekday;
use Laracasts\TestDummy\Factory;

class WeeklyScheduleSpec extends ObjectBehavior
{
    function it_is_initializable()
    {
        $this->shouldHaveType('WITR\Schedule\WeeklySchedule');
    }

    function it_should_get_all_scheduled_show_for_a_weekday()
    {
    	$this->beConstructedThrough('fromTimeSlots', [$this->getTimeSlots()]);
    	$this->scheduleFor(Weekday::SUNDAY)->shouldNotBeEmpty();
    }

    function it_should_map_time_slots_to_scheduled_shows()
    {
    	$this->beConstructedThrough('fromTimeSlots', [$this->getTimeSlots()]);
    	$this->first()->shouldHaveType('WITR\Schedule\ScheduledShow');
    }

    private function getTimeSlots()
    {
    	for ($day = Weekday::SUNDAY; $day <= Weekday::SATURDAY; $day++) 
        {
        	for ($hour = 1; $hour <= 24; $hour++)
        	{
        		$slots[] = new TimeSlotTestWrapper(new TimeSlot([
        			'show' => 1,
        			'dj' => 1,
        			'day' => $day,
        			'hour' => $hour
        		]));
        	}
        }

        return new Collection($slots);
    }
}

class TimeSlotTestWrapper
{
	protected $slot;

	public function __construct(TimeSlot $slot)
	{
		$this->slot = $slot;
	}

	public function show()
	{
		return new Show([
			'name' => 'The Pulse of Music'
		]);
	}

	public function dj()
	{
		return new User([
			'dj_name' => 'Philosopher'
		]);
	}

	public function __call($method, $arguments)
    {
        return call_user_func_array(array($this->slot, $method), $arguments);
    }

    public function __set($name, $value)
    {
        $this->slot->$name = $value;
    }

    public function __get($name)
    {
        return $this->slot->$name;
    }
}
