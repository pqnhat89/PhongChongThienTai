<?php

namespace App\Helpers;

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

    public static function getPost()
    {
        return DB::table('post')->orderBy('updated_at')->limit(10)->get();
    }

    public static function getTeam()
    {
        $team = DB::table('team');
        if (request()->route()->getName() != 'admin') {
            $team = $team->where('active', true);
        }
        return $team->get();
    }
}
