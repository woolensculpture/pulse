<?php namespace WITR\Http\Controllers\Admin;

use WITR\Http\Requests;
use WITR\Http\Controllers\Controller;
use WITR\Event;
use Carbon\Carbon;
use Input;

use Illuminate\Http\Request;

class EventController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$events = Event::where('type', 'SLIDER')->get();
		return view('admin.events.index', ['events' => $events]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function new_event()
	{
		return view('admin.events.create');
	}

	/**
	* Save the new eboard position.
	*
	*@return Response
	*/
	public function create()
	{
		$input = Input::all();
		$event = new Event($input);
		$date = Carbon::createFromFormat('m/d/Y', Input::input('date'));
		$event->date = $date;
		$event->type = 'SLIDER';
		$event->save();
		return redirect()->route('admin.events.index');
	}

	public function edit($id)
	{
		$event = Event::findOrFail($id);

		return view('admin.events.edit', ['event' => $event]);
	}

	public function update($id)
	{
		$event = Event::findOrFail($id);
		$event->fill(Input::all());
		$date = Carbon::createFromFormat('m/d/Y', Input::input('date'));
		$event->date = $date;
		$event->save();
		return redirect()->route('admin.events.index');
	}

	public function delete($id)
	{
		Event::destroy($id);
		return redirect()->route('admin.events.index');
	}

}