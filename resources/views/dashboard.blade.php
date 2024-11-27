@extends('layouts.app')

@section('content')
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-lg">
                <div class="card-body">
                    <h1 class="card-title text-center mb-4">Bem-vindo ao Nosso Sistema</h1>
                    <p class="lead text-center mb-5">Gerencie seus testes, jobs e segurança em um só lugar.</p>

                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center">
                                    <i class="bi bi-clipboard-check text-primary mb-3" style="font-size: 2rem;"></i>
                                    <h5 class="card-title">Testes</h5>
                                    <p class="card-text">Execute e monitore seus testes de forma eficiente.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center">
                                    <i class="bi bi-gear text-success mb-3" style="font-size: 2rem;"></i>
                                    <h5 class="card-title">Jobs</h5>
                                    <p class="card-text">Gerencie e acompanhe seus jobs em tempo real.</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card h-100 border-0 shadow-sm">
                                <div class="card-body text-center">
                                    <i class="bi bi-shield-lock text-danger mb-3" style="font-size: 2rem;"></i>
                                    <h5 class="card-title">Autenticação de Dois Fatores</h5>
                                    <p class="card-text">Aumente a segurança da sua conta com 2FA.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
@endpush