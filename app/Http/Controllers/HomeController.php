<?php namespace WITR\Http\Controllers;

use WITR\Eboard;
use WITR\SystemSetting;

class HomeController extends Controller {

	/**
	 * Show the application dashboard to the user.
	 *
	 * @return Response
	 */
	public function index()
	{
        $banner = SystemSetting::frontPageBannerText();
		return view('home.index')->withBanner($banner);
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
