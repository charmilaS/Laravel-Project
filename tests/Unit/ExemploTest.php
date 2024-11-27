<?php

namespace Tests\Unit;

use Tests\TestCase; // Importante: herdar de TestCase do Laravel
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ExemploTest extends TestCase
{
    
    public function test_soma_numeros()
    {
        $resultado = 2 + 2;
        $this->assertEquals(4, $resultado);
    }

    public function test_validar_email()
    {
        $email = 'teste@exemplo.com';
        $this->assertTrue(filter_var($email, FILTER_VALIDATE_EMAIL) !== false);
    }
}