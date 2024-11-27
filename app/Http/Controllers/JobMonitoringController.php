<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JobMonitoringController extends Controller
{
    public function index()
    {
        // Jobs pendentes
        $jobs = DB::table('jobs')
            ->select(
                'id', 
                'queue', 
                DB::raw('JSON_UNQUOTE(JSON_EXTRACT(payload, "$.displayName")) as job_name'),
                'attempts',
                'created_at'
            )
            ->orderBy('created_at', 'desc')
            ->get()
            ->map(function($job) {
                $job->created_at_formatted = Carbon::parse($job->created_at)->diffForHumans();
                return $job;
            });

        // Jobs falhados
        $failed_jobs = DB::table('failed_jobs')
            ->select(
                'id', 
                'connection', 
                'queue', 
                'exception',
                'failed_at'
            )
            ->orderBy('failed_at', 'desc')
            ->get()
            ->map(function($job) {
                $job->failed_at_formatted = Carbon::parse($job->failed_at)->diffForHumans();
                return $job;
            });

        return view('jobs.monitoring', compact('jobs', 'failed_jobs'));
    }

    // Método para limpar jobs falhados
    public function limparJobsFalhados()
    {
        DB::table('failed_jobs')->truncate();
        return redirect()->back()->with('success', 'Jobs falhados limpos com sucesso!');
    }

    // Método para tentar novamente jobs falhados
    public function tentarJobsFalhados()
    {
        \Artisan::call('queue:retry all');
        return redirect()->back()->with('success', 'Tentativa de reprocessamento de todos os jobs falhados iniciada!');
    }
}