<?php namespace WITR\Http\Controllers\Admin;

use WITR\Http\Requests\Admin\Video as Requests;
use WITR\Http\Controllers\Controller;
use WITR\Video;
use Input;

use Illuminate\Http\Request;

class VideoController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('editor');
	}

	/**
	 * Display a listing of the Videos.
	 *
	 * @return Response
	 */
	public function index()
	{
		$videos = Video::orderBy('artist', 'asc')->get();
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
	public function create(Requests\CreateRequest $request)
	{
		$input = $request->all();
		$video = new Video($input);
		$video->save();
		return redirect()->route('admin.videos.index')
			->with('success', 'Video Review Saved!');
	}

	public function edit($id)
	{
		$video = Video::findOrFail($id);

		return view('admin.videos.edit', ['video' => $video]);
	}

	public function update(Requests\UpdateRequest $request, $id)
	{
		$video = Video::findOrFail($id);
		$video->fill($request->all());
		$video->save();
		return redirect()->route('admin.videos.index')
			->with('success', 'Video Review Saved!');
	}

	public function delete($id)
	{
		Video::destroy($id);
		return redirect()->route('admin.videos.index')
			->with('success', 'Video Review Deleted!');
	}

}
