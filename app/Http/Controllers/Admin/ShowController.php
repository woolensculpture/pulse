<?php namespace WITR\Http\Controllers\Admin;

use WITR\Http\Requests\Admin\Show as Requests;
use WITR\Http\Controllers\Controller;
use WITR\Show;
use Input;
use File;
use Carbon\Carbon;

use Illuminate\Http\Request;

class ShowController extends Controller {

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
		$shows = Show::all();
		return view('admin.shows.index', ['shows' => $shows]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function new_show()
	{
		return view('admin.shows.create');
	}

	/**
	* Save the new eboard position.
	*
	*@return Response
	*/
	public function create(Requests\CreateRequest $request)
	{
		$show = new Show($request->except(['show_picture', 'slider_picture']));

		$fileShow = $request->file('show_picture');
		$filenameShow = Carbon::now()->timestamp . '-' . $fileShow->getClientOriginalName();
		$fileShow->move(public_path() . '/img/shows/', $filenameShow);
		$show->show_picture = $filenameShow;

		$fileSlider = $request->file('slider_picture');
		$filenameSlider = Carbon::now()->timestamp . '-' . $fileSlider->getClientOriginalName();
		$fileSlider->move(public_path() . '/img/slider/', $filenameSlider);
		$show->slider_picture = $filenameSlider;

		$show->save();
		return redirect()->route('admin.shows.index')
			->with('success', 'Show Saved!');
	}

	public function edit($id)
	{
		$show = Show::findOrFail($id);

		return view('admin.shows.edit', ['show' => $show]);
	}

	public function update(Requests\UpdateRequest $request, $id)
	{
		$show = Show::findOrFail($id);
		$oldFilenameShow = $show->show_picture;
		$oldFilenameSlider = $show->slider_picture;
		$show->fill($request->except(['show_picture', 'slider_picture']));

		if ($request->hasFile('show_picture')) 
		{
			File::delete(public_path() . '/img/shows/' . $oldFilenameShow);
			$fileShow = $request->file('show_picture');
			$filenameShow = Carbon::now()->timestamp . '-' . $fileShow->getClientOriginalName();
			$fileShow->move(public_path() . '/img/shows', $filenameShow);
			$show->show_picture = $filenameShow;
		}

		if ($request->hasFile('slider_picture')) 
		{
			File::delete(public_path() . '/img/slider/' . $oldFilenameSlider);
			$fileSlider = $request->file('slider_picture');
			$filenameSlider = Carbon::now()->timestamp . '-' . $fileSlider->getClientOriginalName();
			$fileSlider->move(public_path() . '/img/slider', $filenameSlider);
			$show->slider_picture = $filenameSlider;
		}

		$show->save();
		return redirect()->route('admin.shows.index')
			->with('success', 'Show Saved!');
	}

	public function delete($id)
	{
		$show = Show::findOrFail($id);
		File::delete(public_path() . '/img/shows/' . $show->show_picture);
		File::delete(public_path() . '/img/slider/' . $show->slider_picture);
		Show::destroy($id);
		return redirect()->route('admin.shows.index')
			->with('success', 'Show Deleted!');
	}
}