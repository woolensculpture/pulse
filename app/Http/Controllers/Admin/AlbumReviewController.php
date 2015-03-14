<?php namespace WITR\Http\Controllers\Admin;

use WITR\Http\Requests;
use WITR\Http\Controllers\Controller;
use WITR\AlbumReview;
use Input;

use Illuminate\Http\Request;

class AlbumReviewController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$reviews = AlbumReview::all();
		return view('admin.reviews.index', ['reviews' => $reviews]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function new_review()
	{
		return view('admin.reviews.create');
	}

	/**
	* Save the new eboard position.
	*
	*@return Response
	*/
	public function create()
	{
		$input = Input::all();
		$review = new AlbumReview($input);
		$review->save();
		return redirect()->route('admin.reviews.index');
	}

	public function edit($id)
	{
		$review = AlbumReview::findOrFail($id);

		return view('admin.reviews.edit', ['review' => $review]);
	}

	public function update($id)
	{
		$review = AlbumReview::findOrFail($id);
		$review->fill(Input::all());
		$review->save();
		return redirect()->route('admin.reviews.index');
	}

	public function delete($id)
	{
		AlbumReview::destroy($id);
		return redirect()->route('admin.reviews.index');
	}

}