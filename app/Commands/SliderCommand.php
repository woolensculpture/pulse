<?php namespace WITR\Commands;

use WITR\Commands\Command;
use WITR\TimeSlot;
use WITR\Event;
use WITR\Schedule\WeeklySchedule;
use WITR\Slideshow\Slides;

use Illuminate\Contracts\Bus\SelfHandling;

class SliderCommand extends Command implements SelfHandling {

	/**
	 * Create a new command instance.
	 *
	 * @return void
	 */
	public function __construct()
	{
		//
	}

	/**
	 * Execute the command.
	 *
	 * @return void
	 */
	public function handle()
	{
		$timeslots = TimeSlot::with('djForTimeslot', 'showForTimeslot')->get();
		$shows = WeeklySchedule::mergeFromTimeSlots($timeslots);
		$showSlides = $shows->getShowsForSlideshow();

		$slides = new Slides();
		$slides->addShows($showSlides);

		$events = Event::where('type', 'SLIDER')->take(10)->get();
		if (!$events->isEmpty()) {
			$event = $events->random();
			$slides->addEvent($events->random());
		}
	}

}
