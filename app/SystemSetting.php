<?php namespace WITR;

use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model {

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['value'];

	const AskDestlerTextID = 1;
	const DJHoursFormLocationID = 2;
	const CDSignoutFormLocationID = 3;

	public static function scopeAskDestlerText()
	{
		return self::find(self::AskDestlerTextID);
	}

	public static function scopeDJHoursFormLocation()
	{
		return self::find(self::DJHoursFormLocationID);
	}

	public static function scopeCDSignoutFormLocation()
	{
		return self::find(self::CDSignoutFormLocationID);
	}

}
