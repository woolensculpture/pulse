<?php namespace WITR;

use Illuminate\Database\Eloquent\Model;

class Show extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'shows';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'description', 'show_picture', 'slider_picture', 'active', 'style'];

	public $timestamps = false;

}
