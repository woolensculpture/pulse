<?php namespace WITR\Http\Controllers\Admin;

use WITR\Http\Requests;
use WITR\Http\Controllers\Controller;
use WITR\Eboard;
use Input;

use Illuminate\Http\Request;

class NewPositionController extends Controller {

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
		return view('admin.eboard.new_position');
	}

	/**
	* Save the new eboard position.
	*
	*@return Response
	*/
	public function save()
	{
		$input = Input::all();
		$position = new Eboard($input);
		$position->save();
		return redirect()->route('admin.eboard.eboard');
	}

}
