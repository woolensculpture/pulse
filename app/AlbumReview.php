<?php namespace WITR;

use Illuminate\Database\Eloquent\Model;

class AlbumReview extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'album_reviews';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['band_name', 'album_name', 'review', 'img_name'];

	public $timestamps = false;

}