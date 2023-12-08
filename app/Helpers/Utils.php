<?php

namespace App\Helpers;

use App\Enums\Setting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\DB;
use Spatie\Analytics\Facades\Analytics;
use Spatie\Analytics\OrderBy;
use Spatie\Analytics\Period;
use Google\Analytics\Data\V1beta\FilterExpression;
use Google\Analytics\Data\V1beta\Filter;
use Carbon\Carbon;

class Utils
{
	public const START_DATE = "2023-11-30 00:00:00";
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
	public static function getTotalVisit($path) {
		// Get the analytics data
		$analytic = DB::table('analytics')->where('path', $path)->first();

        return $analytic->view ?? 0;
	}

	// Get pageView of specify path
	public static function getUrlPageViewFromGA($path) {
		$dimensionFilter = new FilterExpression([
			'filter' => new Filter([
				'field_name' => 'pagePath',
				'string_filter' => new Filter\StringFilter([
					'match_type' => Filter\StringFilter\MatchType::EXACT,
					'value' => $path,
					'case_sensitive' => false
				])
			])
		]);

		 $result = Analytics::get(
			Period::create(new Carbon(Utils::START_DATE), Carbon::now()),
			['screenPageViews'],
			['pagePath'],
			10000,
			[
                OrderBy::metric('screenPageViews', true),
            ],
			0,
			$dimensionFilter
		);
		return $result[0] ?? [];
	}

	public static function countPostByType($type) {
		return DB::table('post')
		->select('id')
		->where('type', $type)
		->count();
	}
}
