<?php namespace WITR;

use Illuminate\Database\Eloquent\Model;

class Video extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'videos';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['artist', 'song', 'album', 'review', 'url_tag'];

	public $timestamps = false;

	public $timestamps = false;

}
