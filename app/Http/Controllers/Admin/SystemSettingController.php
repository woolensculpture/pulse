<?php namespace WITR\Http\Controllers\Admin;

use WITR\Http\Requests;
use WITR\Http\Controllers\Controller;
use WITR\SystemSetting;

use Illuminate\Http\Request;

class SystemSettingController extends Controller {

	public function __construct()
	{
		$this->middleware('auth');
		$this->middleware('admin');
	}
	
	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$settings = SystemSetting::all();
		return view('admin.settings.index')
			->withSettings($settings);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update(Request $request)
	{
		$input = $request->all();
		$settings = SystemSetting::all();

		foreach ($settings as $setting) {
			$value = $input['value_' . $setting->id];
			$setting->value = $value;

            $enabled_id = 'enabled_' . $setting->id;
            if (array_key_exists($enabled_id, $input)) {
                $setting->enabled = $input[$enabled_id];
            } else {
                $setting->enabled = 1;
            }

			$setting->save();
		}

		return redirect()->route('admin.settings')
			->with('success', 'Settings Saved!');
	}
}
