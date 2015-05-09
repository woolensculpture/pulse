<?php namespace WITR\Http\Requests\Admin\Show;

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
			'name' => 'required',
			'slider_picture' => 'required|image_size:670,344',
			'show_picture' => 'required|image_size:150,150',
			'style' => 'required'
		];
	}

	public function messages()
	{
		return [
			'slider_picture.image_size' => 'The slider picture must be :width wide and :height tall.',
			'show_picture.image_size' => 'The show picture must be :width wide and :height tall.',
		];
	}

}
