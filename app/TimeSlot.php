<?php namespace WITR;

use Illuminate\Database\Eloquent\Model;

class TimeSlot extends Model {

	protected $table = 'schedule';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['dj', 'show', 'day', 'hour'];

	public $timestamps = false;

	public function dj()
	{
		return $this->hasOne('WITR\User', 'dj');
	}

	public function show()
	{
		return $this->hasOne('WITR\Show', 'show');
	}
}
