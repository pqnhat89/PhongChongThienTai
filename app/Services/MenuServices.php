<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class MenuServices
{
	/**
	 * @param $type
	 * @return Collection
	 */
	public static function getMenu($type): Collection
	{
		return DB::table('post')->where('type', $type)->orderBy('id', 'DESC')->get();
	}
	
}
