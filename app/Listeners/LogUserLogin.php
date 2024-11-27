<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use App\Models\UserLog;

class LogUserLogin
{
    public function handle(Login $event)
    {
        UserLog::create([
            'user_id' => $event->user->id,
            'action' => 'Login',
            'description' => 'O usuário fez login.',
            'ip_address' => request()->ip(),
        ]);
    }
}
