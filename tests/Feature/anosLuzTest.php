<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class anosLuzTest extends TestCase
{
    public function test_validoConverterKmParaAnosLuz()
    {
        
        $kilometers = 9461000000000;  

        $response = $this->postJson('/api/anosLuz', [
            'kilometers' => $kilometers,
        ]);

        $response->assertStatus(200);

        $response->assertJson([
            'anoLuz' => round($kilometers / 9461000000000, 4),  // Conversion 1:1 for this test
        ]);
    }

    
    public function test_kilometroVazio()
    {
 
        $response = $this->postJson('/api/anosLuz', []);

        $response->assertStatus(400);

        $response->assertJson([
            'erro' => 'parâmetros inválidos',
        ]);
    }

     
     public function test_kilometroComLetra()
     {
         
         $response = $this->postJson('/api/anosLuz', [
             'kilometers' => 'a',
         ]);

         $response->assertStatus(400);

         $response->assertJson([
             'erro' => 'parâmetros inválidos',
         ]);
     }

    public function test_kilometroNegativo()
    {
        // Enviando a requisição com valor negativo no campo 'kilometers'
        $response = $this->postJson('/api/anosLuz', [
            'kilometers' => -100,
        ]);

        // Verifica se a resposta tem o status 400 Bad Request
        $response->assertStatus(400);

        // Verifica se a resposta contém o erro de 'parâmetros inválidos'
        $response->assertJson([
            'erro' => 'parâmetros inválidos',
        ]);
    }
}

