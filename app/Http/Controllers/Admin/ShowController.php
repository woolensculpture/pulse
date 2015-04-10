<?php namespace WITR\Http\Controllers\Admin;

use WITR\Http\Requests;
use WITR\Http\Controllers\Controller;
use WITR\Show;
use Input;

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
	public function create()
	{
		$input = Input::all();
		$show = new Show($input);

		$fileShow = Input::file('show_picture');
		$filenameShow = $fileShow->getClientOriginalName();
		$file->move(public_path().'/img/shows', $filenameShow);
		$show->show_picture = $filenameShow;

		$fileSlider = Input::file('slider_picture');
		$filenameSlider = $fileSlider->getClientOriginalName();
		$file->move(public_path().'/img/shows', $filenameSlider);
		$show->slider_picture = $filenameSlider;

		$show->save();
		return redirect()->route('admin.shows.index');
	}

	public function edit($id)
	{
		$show = Show::findOrFail($id);

		$oldFilenameShow = $show->show_picture;
		$oldFilenameSlider = $show->slider_picture;

		$show->fill(Input::all());
		if (Input::hasFile('show_picture')) 
		{
			File::delete(public_path().'/img/shows/'.$oldFilenameShow);
			$fileShow = Input::file('show_picture');
			$filenameShow = $fileShow->getClientOriginalName();
			$file->move(public_path().'/img/shows', $filenameShow);
			$show->show_picture = $filenameShow;
		}

		if (Input::hasFile('slider_picture')) 
		{
			File::delete(public_path().'/img/shows/'.$oldFilenameSlider);
			$fileSlider = Input::file('slider_picture');
			$filenameSlider = $fileSlider->getClientOriginalName();
			$file->move(public_path().'/img/shows', $filenameSlider);
			$show->slider_picture = $filenameSlider;
		}

		$show->save();
		return view('admin.shows.edit', ['show' => $show]);
	}

	public function update($id)
	{
		$show = Show::findOrFail($id);
		$show->fill(Input::all());
		$show->save();
		return redirect()->route('admin.shows.index');
	}

	public function delete($id)
	{
		$show = Show::findOrFail($id);
		File::delete(public_path().'/img/shows/'.$show->show_picture);
		File::delete(public_path().'/img/shows/'.$show->slider_picture);
		Show::destroy($id);
		return redirect()->route('admin.shows.index');
	}
}