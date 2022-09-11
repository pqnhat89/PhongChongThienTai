<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class PostServices
{
	/**
	 * @param $type
	 * @return Collection
	 */
	public static function getPostByType($type): Collection
	{
		return DB::table('post')->where('type', $type)->orderBy('id', 'DESC')->get();
	}
	
}
