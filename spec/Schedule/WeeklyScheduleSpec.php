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
    	$schedule = $this->scheduleFor(Weekday::SUNDAY);
    	$schedule->shouldNotBeEmpty();
    	$schedule->first()->shouldHaveType('WITR\Schedule\ScheduledShow');
    }

    function it_should_map_time_slots_to_scheduled_shows()
    {
    	$this->beConstructedThrough('fromTimeSlots', [$this->getTimeSlots()]);
    	$this->first()->shouldHaveType('WITR\Schedule\ScheduledShow');
    }

    function it_should_merge_time_slots()
    {
    	$this->beConstructedThrough('fromTimeSlots', [$this->getTimeSlots()]);
    	$this->first()->timespan()->shouldBe('1 - 3 AM');
    }

    private function getTimeSlots()
    {
    	for ($day = Weekday::SUNDAY; $day <= Weekday::SATURDAY; $day++) 
        {
        	for ($hour = 1; $hour <= 24; $hour++)
        	{
				$id = ($hour - 1) % 4 < 2 ? 1 : 2;
        		$slots[] = new TimeSlotTestWrapper(new TimeSlot([
        			'show' => $id,
        			'dj' => $id,
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

	public function showForTimeslot()
	{
		$show = new Show([
			'name' => 'The Pulse of Music'
		]);
		$show->id = ($this->slot->hour - 1) % 4 < 2 ? 1 : 2;
		return $show;
	}

	public function djForTimeslot()
	{
		$user = new User([
			'dj_name' => 'Philosopher'
		]);
		$user->id = ($this->slot->hour - 1) % 4 < 2 ? 1 : 2;
		return $user;
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
