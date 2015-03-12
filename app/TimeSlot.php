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

	public function djForTimeslot()
	{
		return $this->hasOne('WITR\User', 'id', 'dj');
	}

	public function showForTimeslot()
	{
		return $this->hasOne('WITR\Show', 'id', 'show');
	}
}
