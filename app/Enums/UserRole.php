<?php

namespace App\Enums;

use MyCLabs\Enum\Enum;
use Illuminate\Support\Facades\Auth;

class UserRole extends Enum
{
    const SUPPER = 1;
    const ADMIN = 0;

    public static function isSupper()
    {
        return Auth::user()->role == self::SUPPER;
    }

    public static function isAdmin()
    {
        return Auth::user()->role == self::ADMIN;
    }
}
