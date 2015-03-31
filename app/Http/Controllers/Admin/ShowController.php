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

		$file_show = Input::file('show_picture');
		$filename_show = $file_show->getClientOriginalName();
		$file->move(public_path().'img/shows', $filename_show);
		$show->show_ipcture = $filename_show;

		$file_slider = Input::file('slider_picture');
		$filename_slider = $file_slider->getClientOriginalName();
		$file->move(public_path().'img/shows', $filename_slider);
		$show->slider_picture = $filename_slider;

		$show->save();
		return redirect()->route('admin.shows.index');
	}

	public function edit($id)
	{
		$show = Show::findOrFail($id);

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
		Show::destroy($id);
		return redirect()->route('admin.shows.index');
	}
}