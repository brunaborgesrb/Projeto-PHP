<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class quilometroTest extends TestCase
{
    public function test_validoConverterAnosLuzParaKm()
    {
        $lightYears = 1; 

        $response = $this->postJson('/api/quilometros', [
            'light_years' => $lightYears,
        ]);

        $response->assertStatus(200);

        $response->assertJson([
            'quilometros' => number_format($lightYears * 9.4607e12, 4, '.', ''),
        ]);
    }

    public function test_anosLuzVazio()
    {

        $response = $this->postJson('/api/quilometros', []);

        $response->assertStatus(400);

        $response->assertJson([
            'erro' => 'parâmetros inválidos',
        ]);
    }


     public function test_anoLuzComLetra()
     {

         $response = $this->postJson('/api/quilometros', [
             'light_years' => 'a',
         ]);
 
         $response->assertStatus(400);
 
         $response->assertJson([
             'erro' => 'parâmetros inválidos',
         ]);
     }

    public function test_anosLuzNegativo()
    {

        $response = $this->postJson('/api/quilometros', [
            'light_years' => -100,
        ]);

        $response->assertStatus(400);

        $response->assertJson([
            'erro' => 'parâmetros inválidos',
        ]);
    }
}
