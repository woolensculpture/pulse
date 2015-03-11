<?php namespace WITR\Commands;

use WITR\Commands\Command;
use WITR\TimeSlot;

use Illuminate\Contracts\Bus\SelfHandling;
use Carbon\Carbon;

class GetSlideshow extends Command implements SelfHandling {

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
		$allTimeSlots = TimeSlot::all();
		$date = Carbon::now();

	}

}
