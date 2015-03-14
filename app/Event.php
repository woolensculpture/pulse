<?php namespace WITR;

use Illuminate\Database\Eloquent\Model;

class Event extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'events';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['type', 'name', 'date', 'picture', 'url'];

	public $timestamps = false;
}