<?php namespace WITR\Http\Requests\Admin\Video;

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
			'artist' => 'required',
			'song' => 'required',
			'album' => 'required',
			'review' => 'required',
			'url_tag' => 'required'
		];
	}

	public function messages()
	{
		return [
			'url_tag.required' => 'The YouTube URL is required.',
		];
	}

}
