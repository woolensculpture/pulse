<?php namespace WITR;

use Illuminate\Database\Eloquent\Model;

class Eboard extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'eboard';

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['position', 'name', 'email', 'hours'];

	public $timestamps = false;

}
