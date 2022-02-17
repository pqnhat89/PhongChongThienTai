<?php

namespace App\Enums;

use MyCLabs\Enum\Enum;
use Illuminate\Support\Facades\Auth;

class UserRole extends Enum
{
    const Admin = 1;
    const User = 0;

    public static function isAdmin()
    {
        return Auth::user()->role == self::Admin;
    }

    public static function isUser()
    {
        return Auth::user()->role == self::User;
    }
}
