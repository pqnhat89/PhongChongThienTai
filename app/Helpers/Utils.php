<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class Utils
{
    public static function getLogo()
    {
        return DB::table('setting')->where('name', 'logo')->first();
    }
}
