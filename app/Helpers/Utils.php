<?php

namespace App\Helpers;

use App\Enums\Setting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;

class Utils
{
    public static function getLogo()
    {
        return self::getSettingByName(Setting::LOGO);
    }
	
	/**
	 * @return array
	 */
	public static function getSetting(): array
	{
		$result = [];
		$settingName = array_values(Setting::toArray());
		foreach ($settingName as $value) {
			$setting = self::getSettingByName($value);
			$result[$value] = $setting->content ?? '';
		}
        return $result;
    }
	
	/**
	 * @param $name
	 * @return Model|Builder|object|null
	 */
	public static function getSettingByName($name) {
		return DB::table('setting')->where('name', $name)->first();
	}
}
