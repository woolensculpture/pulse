<?php namespace WITR;

use Illuminate\Database\Eloquent\Model;

class Show extends Model {

	use FileUploadTrait;

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

	protected $uploadDirectories = [
		'show_picture' => '/img/shows/',
		'slider_picture' => '/img/slider/'
	];

}
