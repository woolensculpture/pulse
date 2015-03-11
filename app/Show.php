<?php namespace WITR;

use Illuminate\Database\Eloquent\Model;

class Show extends Model {

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'description', 'show_picture', 'slider_picture', 'active', 'style'];

}
