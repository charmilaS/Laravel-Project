@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Resultados dos Testes</h1>

    <div class="row">
        <div class="col-md-4">
            <div class="card bg-info text-white">
                <div class="card-body">
                    <h5>Total de Testes</h5>
                    <p class="display-4">{{ $resultados['total'] }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white">
                <div class="card-body">
                    <h5>Testes Passaram</h5>
                    <p class="display-4">{{ $resultados['passou'] }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-danger text-white">
                <div class="card-body">
                    <h5>Testes Falharam</h5>
                    <p class="display-4">{{ $resultados['falhou'] }}</p>
                </div>
            </div>
        </div>
    </div>

    <div class="card mt-4">
        <div class="card-header">Detalhes dos Testes</div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>Nome do Teste</th>
                        <th>Status</th>
                        <th>Mensagem</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($resultados['detalhes'] as $teste)
                    <tr class="{{ $teste['status'] == 'passou' ? 'table-success' : 'table-danger' }}">
                        <td>{{ $teste['nome'] }}</td>
                        <td>
                            <span class="badge {{ $teste['status'] == 'passou' ? 'bg-success' : 'bg-danger' }}">
                                {{ ucfirst($teste['status']) }}
                            </span>
                        </td>
                        <td>{{ $teste['mensagem'] }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection