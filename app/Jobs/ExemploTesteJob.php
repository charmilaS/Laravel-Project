<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ExemploTesteJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct()
    {
        //
    }

    public function handle()
    {
        // Simulando um processamento
        Log::info('Job de teste executado com sucesso!');
        
        // Opcional: Simulando um job que pode falhar
        if (rand(1, 10) > 8) {
            throw new \Exception('Erro aleatório de teste');
        }
    }
}