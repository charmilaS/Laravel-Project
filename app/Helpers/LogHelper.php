<?php

namespace App\Helpers;

use App\Models\UserLog;

class LogHelper
{
    public static function logAction($userId, $action, $description = null)
    {
        UserLog::create([
            'user_id' => $userId,
            'action' => $action,
            'description' => $description,
            'ip_address' => request()->ip(),
        ]);
    }
}
