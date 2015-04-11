<?php namespace WITR\Http\Requests\DJ;

use WITR\Http\Requests\Request;

class TicketRequest extends Request {

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
			'equipment' => 'required',
			'issue' => 'required'
		];
	}

}
