<?php

namespace App\Services;

use App\Enums\PostType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;
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
		return DB::table('post')->where('type', $type)->orderBy('id', 'DESC')->limit(10)->get();
	}
	
	/**
	 * @param $title
	 * @return Model|Builder|object|null
	 */
	public static function getPageByTitle($title) {
		return DB::table('post')->where('type', PostType::PAGE)->where('title', $title)->first();
	}
	
}
