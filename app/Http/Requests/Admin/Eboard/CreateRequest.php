<?php namespace WITR\Http\Requests\Admin\Eboard;

use WITR\Http\Requests\Request;

class CreateRequest extends Request {

	/**
	 * Determine if the user is authorized to make this request.
	 *
	 * @return bool
	 */
	public function authorize()
	{
		return true;
	}

	/**
	 * Get the validation rules that apply to the request.
	 *
	 * @return array
	 */
	public function rules()
	{
		return [
			'position' => 'required',
			'name' => 'required',
			'email' => 'required|email',
			'hours' => 'required'
		];
	}

}
