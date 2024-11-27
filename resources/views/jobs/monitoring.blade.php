@extends('layouts.app')

@section('content')
<div class="container-fluid p-4">
    <div class="card">
        <div class="card-header bg-primary text-white">
            <h2 class="mb-0">Monitoramento de Filas e Jobs</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <h3>Jobs Pendentes</h3>
                    @if($jobs->count() > 0)
                        <table class="table table-striped table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Fila</th>
                                    <th>Job</th>
                                    <th>Tentativas</th>
                                    <th>Criado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($jobs as $job)
                                <tr>
                                    <td>{{ $job->id }}</td>
                                    <td>{{ $job->queue }}</td>
                                    <td>{{ $job->job_name }}</td>
                                    <td>{{ $job->attempts }}</td>
                                    <td>{{ $job->created_at_formatted }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-info">Nenhum job pendente</div>
                    @endif
                </div>

                <div class="col-md-6">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3>Jobs Falhados</h3>
                        <div>
                            <form action="{{ route('jobs.limpar') }}" method="POST" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i> Limpar Jobs
                                </button>
                            </form>
                            <form action="{{ route('jobs.tentar') }}" method="POST" class="d-inline ml-2">
                                @csrf
                                <button type="submit" class="btn btn-warning btn-sm">
                                    <i class="fas fa-redo"></i> Tentar Novamente
                                </button>
                            </form>
                        </div>
                    </div>

                    @if($failed_jobs->count() > 0)
                        <table class="table table-striped table-bordered table-danger">
                            <thead class="thead-dark">
                                <tr>
                                    <th>ID</th>
                                    <th>Conexão</th>
                                    <th>Fila</th>
                                    <th>Erro</th>
                                    <th>Falhou em</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($failed_jobs as $job)
                                <tr>
                                    <td>{{ $job->id }}</td>
                                    <td>{{ $job->connection }}</td>
                                    <td>{{ $job->queue }}</td>
                                    <td>
                                        <small class="text-danger">
                                            {{ Str::limit($job->exception, 100) }}
                                        </small>
                                    </td>
                                    <td>{{ $job->failed_at_formatted }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <div class="alert alert-success">Nenhum job falhado</div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .table-danger {
        border-color: #dc3545;
    }
</style>
@endpush