<?php

namespace App\Http\Controllers;

use App\Jobs\DataProcessJob;


abstract class Controller
{
    

    public function executarProcessamento()
    {
        // Dispatch do job para fila
        DataProcessJob::dispatch();
    
        // Dispatch com delay
        DataProcessJob::dispatch()->delay(now()->addMinutes(5));
    }
}
