<?php namespace WITR\Http\Controllers\Admin;

use WITR\Http\Requests;
use WITR\Http\Controllers\Controller;
use WITR\Video;
use Input;

use Illuminate\Http\Request;

class VideoController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$videos = Video::all();
		return view('admin.videos.index', ['videos' => $videos]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function new_review()
	{
		return view('admin.videos.create');
	}

	/**
	* Save the new eboard position.
	*
	*@return Response
	*/
	public function create()
	{
		$input = Input::all();
		$video = new Video($input);
		$video->save();
		return redirect()->route('admin.videos.index');
	}

	public function edit($id)
	{
		$video = Video::findOrFail($id);

		return view('admin.videos.edit', ['video' => $video]);
	}

	public function update($id)
	{
		$video = Video::findOrFail($id);
		$video->fill(Input::all());
		$video->save();
		return redirect()->route('admin.videos.index');
	}

	public function delete($id)
	{
		Video::destroy($id);
		return redirect()->route('admin.videos.index');
	}

}