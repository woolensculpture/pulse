<?php namespace WITR\Http\Controllers\Admin;

use WITR\Http\Requests\Admin\Event as Requests;
use WITR\Http\Controllers\Controller;
use WITR\Event;
use Carbon\Carbon;
use Input;
use File;

use Illuminate\Http\Request;

class EventController extends Controller {

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
	* @return Response
	*/
	public function create(Requests\CreateRequest $request)
	{
		$input = $request->all();
		$event = new Event($input);
		$event->date = Carbon::createFromFormat('m/d/Y', $input['date']);
		$event->type = 'SLIDER';
		$file = $request->file('picture');
		$filename = Carbon::now()->timestamp . '-' . $file->getClientOriginalName();
		$file->move(public_path() . '/img/events/', $filename);
		$event->picture = $filename;
		$event->save();
		return redirect()->route('admin.events.index')
			->with('success', 'Event Saved!');
	}

	public function edit($id)
	{
		$event = Event::findOrFail($id);

		return view('admin.events.edit', ['event' => $event]);
	}

	public function update(Requests\UpdateRequest $request, $id)
	{
		$event = Event::findOrFail($id);
		$event->fill($request->except(['date', 'picture']));

		if ($request->hasFile('picture'))
		{
			$oldFilename = $event->picture;
			$file = $request->file('picture');
			$filename = Carbon::now()->timestamp . '-' . $file->getClientOriginalName();
			$file->move(public_path().'/img/events/', $filename);
			$event->picture = $filename;
			File::delete(public_path().'/img/events/'.$oldFilename);
		}

		$date = Carbon::createFromFormat('m/d/Y', $request->input('date'));
		$event->date = $date;

		$event->save();
		return redirect()->route('admin.events.index')
			->with('success', 'Event Saved!');
	}

	public function delete($id)
	{
		$event = Event::findOrFail($id);
		File::delete(public_path().'/img/events/'.$event->picture);
		Event::destroy($id);
		return redirect()->route('admin.events.index');
	}

}