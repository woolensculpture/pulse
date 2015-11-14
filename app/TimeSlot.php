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
		return $this->belongsTo('WITR\DJ', 'dj', 'id');
	}

	public function showForTimeslot()
	{
		return $this->belongsTo('WITR\Show', 'show', 'id');
	}
}
