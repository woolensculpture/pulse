<?php namespace WITR;

use Illuminate\Database\Eloquent\Model;

class Role extends Model {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'user_roles';
    
    public $timestampts = false;
}
