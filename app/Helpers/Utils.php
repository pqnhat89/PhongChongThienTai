<?php

namespace App\Helpers;

use App\Enums\PostType;
use Illuminate\Support\Facades\DB;

class Utils
{
    public static function getLogo()
    {
        return DB::table('logo')->first();
    }

    public static function getCarousel()
    {
        $carousel = DB::table('carousel');
        if (request()->route()->getName() != 'admin') {
            $carousel = $carousel->where('active', true);
        }
        return $carousel->get();
    }

    public static function getTeam()
    {
        $team = DB::table('team');
        if (request()->route()->getName() != 'admin') {
            $team = $team->where('active', true);
        }
        return $team->get();
    }

    public static function getPost($type = null)
    {
        $post = DB::table('post')
            ->where('type', '!=', PostType::PAGE);
        if ($type) {
            $post = $post->where('type', $type);
        }
        return $post->orderBy('updated_at')->get();
    }
}
