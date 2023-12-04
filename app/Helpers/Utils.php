<?php

namespace App\Helpers;

use App\Enums\Setting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Spatie\Analytics\Facades\Analytics;
use Spatie\Analytics\Period;

class Utils
{
	public const START_DATE = "2023-11-01 00:00:00";
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

	// Get total visit
	public static function getTotalVisit() {
		// Get the analytics data
		$startDate = new Carbon(Utils::START_DATE);
		$endDate = Carbon::now();

		$period = Period::create($startDate, $endDate);
		$analyticsData = Analytics::fetchVisitorsAndPageViews($period);

		$totalVisits = $analyticsData[0]['screenPageViews'];
		return $totalVisits ?? 1;
	}
}
