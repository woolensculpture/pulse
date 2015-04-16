<?php namespace WITR\Http\Requests\Admin\Event;

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
			'picture' => 'required|image_size:670,344',
			'date' => 'required|date|date_format:m/d/Y',
			'url' => 'sometimes|url',
			'name' => 'required'
		];
	}

}
