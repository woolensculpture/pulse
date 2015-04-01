<?php namespace WITR\Http\Controllers;

use WITR\Http\Requests;
use WITR\Http\Controllers\Controller;
use WITR\Services\IcecastReader;

use Illuminate\Http\Request;

class DJController extends Controller {

	public function __construct()
	{
		$this->middleware('dj');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return 'test';
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function listeners(IcecastReader $icecast, $studio = 'studio-x')
	{
		$listeners = $icecast->get($studio);
		return view('dj.listeners', compact('listeners'));
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}
