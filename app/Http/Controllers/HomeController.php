<?php namespace WITR\Http\Controllers;

use WITR\Eboard;

class HomeController extends Controller {

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
		return view('home.index');
	}

	public function defaultDan()
	{
		return view('home.default');
	}

	public function about()
	{
		return view('about');
	}

	public function contact()
	{
		$eboard = Eboard::all();
		return view('contact', ['eboard' => $eboard]);
	}

	public function listen()
	{
		$pulseMounts = app('config')['witr.icecast.mounts.studio-x']; 
		$undergroundMounts = app('config')['witr.icecast.mounts.studio-a']; 
		return view('listen', compact('pulseMounts', 'undergroundMounts'));
	}

}
