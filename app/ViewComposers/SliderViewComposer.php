<?php

namespace WITR\ViewComposers;

use WITR\TimeSlot;
use WITR\Event;
use WITR\Schedule\WeeklySchedule;
use WITR\Slideshow\Slides;
use Carbon\Carbon;
use Illuminate\View\View;

class SliderViewComposer {

	/**
	 * Bind data to the view.
	 *
	 * @param  View  $view
	 * @return void
	 */
	public function compose(View $view)
	{
		$timeslots = TimeSlot::with('djForTimeslot', 'showForTimeslot')->get();
		$shows = WeeklySchedule::mergeFromTimeSlots($timeslots);
		$showSlides = $shows->getShowsForSlideshow();

		$slides = Slides::forShows($showSlides);

		$events = Event::where('type', 'SLIDER')
			->where('date', '>=', Carbon::today('America/New_York'))
			->get();
		if (!$events->isEmpty()) {
			$slides->addEvent($events->random());
		}

		$view->with('slides', $slides);
	}
}