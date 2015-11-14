<?php namespace WITR\Http\Controllers\Admin;

use WITR\Http\Requests;
use WITR\Http\Controllers\Controller;
use WITR\Schedule\WeeklySchedule;
use WITR\TimeSlot;

use Illuminate\Http\Request;

class ScheduleController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('editor');
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$schedule = WeeklySchedule::fromTimeSlots(TimeSlot::with('djForTimeslot', 'showForTimeslot')->get());
		return view('admin.schedule.index')->withSchedule($schedule);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
		$input = $request->all();
		$timeslots = TimeSlot::all();

		foreach ($timeslots as $timeslot) {
			$dj = $input['dj_' . $timeslot->id];
			$show = $input['show_' . $timeslot->id];
			$timeslot->dj = $dj;
			$timeslot->show = $show;
			$timeslot->save();
		}
	}
}
