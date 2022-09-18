<?php

namespace App\Services;

use App\Enums\BannerTitle;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class BannerServices
{
	/**
	 * @param $title
	 * @return Builder|Model|object
	 */
	public static function getBannerByTitle($title)
	{
		return DB::table('banner')->where('title', $title)->first();
	}
	
	/**
	 * @return Collection
	 */
	public static function getSidebarBanner(): Collection
	{
		return DB::table('banner')->whereNotIn('title', array_values(BannerTitle::toArray()))->get();
	}
	
	/**
	 * @return array
	 */
	public static function getDefaultBanner(): array
	{
		$result = [];
		$title = array_values(BannerTitle::toArray());
		foreach ($title as $value) {
			$banner = self::getBannerByTitle($value);
			$result[$value] = $banner->image ?? '';
		}
		return $result;
	}
	
}
