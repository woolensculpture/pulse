<?php namespace WITR;

use Illuminate\Database\Eloquent\Model;

class Event extends Model {

	use FileUploadTrait;

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

	protected $uploadDirectories = [
		'picture' => '/img/events/',
	];
}