<?php namespace WITR\Http\Requests\Admin\Show;

use WITR\Http\Requests\Request;

class UpdateRequest extends Request {

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
			'name' => 'required',
			'slider_picture' => 'sometimes|image_size:670,344',
			'show_picture' => 'sometimes|image_size:150,150',
			'style' => 'required'
		];
	}

}
