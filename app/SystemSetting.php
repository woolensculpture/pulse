<?php namespace WITR;

use Illuminate\Database\Eloquent\Model;

class SystemSetting extends Model {

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['value', 'enabled'];

	const AskDestlerTextID = 1;
	const DJHoursFormLocationID = 2;
	const CDSignoutFormLocationID = 3;
	const FrontPageBannerTextID = 4;

	public static function scopeAskDestlerText()
	{
		return self::find(self::AskDestlerTextID);
	}

	public static function scopeDjHoursFormLocation()
	{
		return self::find(self::DJHoursFormLocationID);
	}

	public static function scopeCdSignoutFormLocation()
	{
		return self::find(self::CDSignoutFormLocationID);
	}

	public static function scopeFrontPageBannerText()
	{
		return self::find(self::FrontPageBannerTextID);
	}
}
