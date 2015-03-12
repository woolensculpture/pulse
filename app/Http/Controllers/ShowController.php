<?php namespace WITR\Http\Controllers;

use WITR\Http\Requests;
use WITR\Http\Controllers\Controller;

use Illuminate\Http\Request;

use WITR\TimeSlot;
use WITR\Schedule\WeeklySchedule;

class ShowController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function schedule()
	{
		$schedule = WeeklySchedule::mergeFromTimeSlots(TimeSlot::with('djForTimeslot', 'showForTimeslot')->get());
		return view('schedule.schedule')->withSchedule($schedule);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
