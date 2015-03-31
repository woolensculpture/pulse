<?php namespace WITR\Http\Controllers\Admin;

use WITR\Http\Requests;
use WITR\Http\Controllers\Controller;
use WITR\Eboard;
use Input;

use Illuminate\Http\Request;

class EboardController extends Controller {

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
		$eboard = Eboard::all();
		return view('admin.eboard.index', ['eboard' => $eboard]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function new_position()
	{
		return view('admin.eboard.create');
	}

	/**
	* Save the new eboard position.
	*
	*@return Response
	*/
	public function create()
	{
		$input = Input::all();
		$position = new Eboard($input);
		$position->save();
		return redirect()->route('admin.eboard.index');
	}

	public function edit($id)
	{
		$position = Eboard::findOrFail($id);

		return view('admin.eboard.edit', ['eboard' => $position]);
	}

	public function update($id)
	{
		$position = Eboard::findOrFail($id);
		$position->fill(Input::all());
		$position->save();
		return redirect()->route('admin.eboard.index');
	}

	public function delete($id)
	{
		Eboard::destroy($id);
		return redirect()->route('admin.eboard.index');
	}

}
