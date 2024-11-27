<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Process;

class TestResultadoController extends Controller
{
    public function index()
    {
        // Usar Process para capturar saída dos testes
        $processo = Process::run('php artisan test');
        $output = $processo->output();

        // Processar a saída
        $resultados = $this->processarResultadosTeste($output);

        return view('testes.resultados', compact('resultados'));
    }

    private function processarResultadosTeste($output)
    {
        $resultados = [
            'total' => 0,
            'passou' => 0,
            'falhou' => 0,
            'detalhes' => []
        ];

        // Padrões de expressão regular para capturar informações
        $padraoTeste = '/(?P<classe>[\w\\\\]+)::(?P<metodo>[\w]+)\s*(?P<status>PASS|FAIL)/';
        $padraoResumo = '/Tests:\s*(?P<total>\d+)\s*(\w+),\s*(?P<passou>\d+)\s*passed,\s*(?P<falhou>\d+)\s*failed/';

        // Encontrar todos os testes
        preg_match_all($padraoTeste, $output, $matches, PREG_SET_ORDER);
        
        foreach ($matches as $teste) {
            $resultados['total']++;
            $status = strtolower($teste['status']);
            
            if ($status === 'pass') {
                $resultados['passou']++;
            } else {
                $resultados['falhou']++;
            }

            $resultados['detalhes'][] = [
                'nome' => $teste['classe'] . '::' . $teste['metodo'],
                'status' => $status,
                'mensagem' => $status === 'pass' ? 'Teste passou com sucesso' : 'Teste falhou'
            ];
        }

        // Tentar capturar resumo final para validar
        if (preg_match($padraoResumo, $output, $resumo)) {
            $resultados['total'] = (int)$resumo['total'];
            $resultados['passou'] = (int)$resumo['passou'];
            $resultados['falhou'] = (int)$resumo['falhou'];
        }

        return $resultados;
    }
}