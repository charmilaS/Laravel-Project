<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\ExemploTesteJob;

class GerarJobsTeste extends Command
{
    protected $signature = 'jobs:gerar';
    protected $description = 'Gera jobs de teste para monitoramento';

    public function handle()
    {
        // Gera jobs de sucesso
        for ($i = 0; $i < 5; $i++) {
            ExemploTesteJob::dispatch();
            $this->info("Job de sucesso $i gerado");
        }

        // Gera alguns jobs que provavelmente irão falhar
        for ($i = 0; $i < 3; $i++) {
            ExemploTesteJob::dispatch();
            $this->info("Job potencialmente falho $i gerado");
        }

        return 0;
    }
}