<?php

namespace App\Helpers;

use App\Model\Role;
use Auth;

class GlobalHelper
{
    public static function checkAdmin()
    {
        return Auth::user()->role_id === Role::$roles['Admin'];
    }
}
