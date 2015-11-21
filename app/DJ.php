<?php namespace WITR;

use Illuminate\Database\Eloquent\Model;

class DJ extends Model {

	use FileUploadTrait;

	protected $table = 'djs';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'picture', 'realname'];

	protected $uploadDirectories = [
		'picture' => '/img/djs/',
	];
}