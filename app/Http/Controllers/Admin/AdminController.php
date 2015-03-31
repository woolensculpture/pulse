<?php namespace WITR\Http\Controllers\Admin;

use WITR\Http\Requests;
use WITR\Http\Controllers\Controller;

use Illuminate\Http\Request;

class AdminController extends Controller {

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
		return view('admin.index');
	}

}
