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

	public function setUrlTagAttribute($value)
    {
    	parse_str( parse_url( $value, PHP_URL_QUERY ), $params );
		if (isset($params['v']) || array_key_exists('v', $params)) {
			$this->attributes['url_tag'] = $params['v'];
		} else {
			$this->attributes['url_tag'] = $value;
		}	
    }
}
