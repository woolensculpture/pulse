<?php

use WITR\Schedule\Show;
use Carbon\Carbon;

class ShowTest extends TestCase {

	/** @test */
	public function it_should_get_air_date()
	{
		$show = new Show;

		$show->airsDayOfWeek(1);
		$this->assertEquals('Sunday', $show->getAirDate());

		$show->airsDayOfWeek(3);
		$this->assertEquals('Tuesday', $show->getAirDate());
	}

	/** @test */
	public function it_should_get_the_relative_day_for_a_show()
	{
		$show = new Show;
		$show->startsAt(1);
		$show->endsAt(1);

		$today = Carbon::now()->dayOfWeek();
		$show->airsDayOfWeek($today);
		$this->assertEquals('Today', $service->getRelativeAirDate());

		$tomorrow = Carbon::now()->addDay()->dayOfWeek();
		$show->airsDayOfWeek($tomorrow);
		$this->assertEquals('Tomorrow', $service->getRelativeAirDate());

		$nextDay = $tomorrow->addDay();
		$show->airsDayOfWeek($nextDay);
		$this->assertEquals($show->getRelativeAirDate(), $show->getAirDate());
	}

}
