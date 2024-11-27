@extends('layouts.app')

@section('content')
<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <h1 class="text-3xl font-semibold text-gray-800 mb-6">Configurações</h1>
                
                @if(session('status'))
                    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-6" role="alert">
                        <p>{{ session('status') }}</p>
                    </div>
                @endif

                <div class="bg-gray-100 p-6 rounded-lg shadow-inner">
                    <h2 class="text-xl font-semibold text-gray-700 mb-4">Autenticação em dois fatores</h2>
                    <div class="flex items-center justify-between">
                        <p class="text-gray-600">
                            Status atual: 
                            @if(auth()->user()->two_factor_enabled)
                                <span class="font-semibold text-green-600">Ativada</span>
                            @else
                                <span class="font-semibold text-red-600">Desativada</span>
                            @endif
                        </p>
                        <form method="POST" action="{{ route('settings.toggleTwoFactor') }}">
                            @csrf
                            <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition duration-150 ease-in-out">
                                @if(auth()->user()->two_factor_enabled)
                                    Desativar
                                @else
                                    Ativar
                                @endif
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection