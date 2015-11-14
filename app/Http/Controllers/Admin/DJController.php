<?php 

namespace WITR\Http\Controllers\Admin;

use WITR\Http\Requests\Admin\DJ as Requests;
use WITR\Http\Controllers\Controller;
use WITR\DJ;
use WITR\TimeSlot;
use Input;
use File;
use Hash;

use Illuminate\Http\Request;
use Illuminate\Contracts\Auth\PasswordBroker;

class DJController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin');
	}

	/**
	 * Display a listing of the djs.
	 *
	 * @return Response
	 */
	public function index()
	{
		$djs = DJ::orderBy('name', 'asc')->get();
		return view('admin.djs.index', ['djs' => $djs]);
	}

	public function create()
	{
		return view('admin.djs.create'); 
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function store(Requests\CreateRequest $request)
	{
		$dj = new DJ($request->all());

		if($request->hasFile('picture'))
		{
			$file = $request->file('picture');
			$dj->uploadFile('picture', $file);
		}
		else
		{
			$dj->picture = 'default.jpg';
		}

		$dj->save();

		return redirect()->route('admin.djs.index')
			->with('success', 'DJ Created!');
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$dj = DJ::findOrFail($id);

		return view('admin.djs.edit', ['dj' => $dj]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Requests\UpdateRequest $request, $id)
	{
		$dj = DJ::findOrFail($id);
		$dj->fill($request->except(['picture']));

		if($request->hasFile('picture'))
		{
			$file = $request->file('picture');
			$dj->uploadFile('picture', $file);
		}

		$dj->save();
		return redirect()->route('admin.djs.index')
			->with('success', 'DJ Saved!');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		$timeslots = TimeSlot::where('dj', $id)->count();
		if ($timeslots > 0) {
			return redirect()->back()->with('error', 'Remove DJ from schedule before deleting.');
		}

		$dj = DJ::findOrFail($id);
		File::delete(public_path().'/img/djs/'.$dj->picture);
		DJ::destroy($id);
		return redirect()->route('admin.djs.index')
			->with('success', 'DJ Deleted!');
	}

}
