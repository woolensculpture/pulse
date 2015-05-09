<?php namespace WITR\Http\Requests\Admin\AlbumReview;

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
			'band_name' => 'required',
			'album_name' => 'required',
			'review' => 'required',
			'img_name' => 'sometimes|image'
		];
	}

	public function messages() 
	{
		return [
			'img_name.required' => 'The album cover is required.',
			'img_name.image' => 'The album cover should be an image.',
			'band_name.required' => 'The artist field is required',
			'album_name.required' => 'The album field is required',
		];
	}

}
