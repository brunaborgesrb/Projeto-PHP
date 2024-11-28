<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConversionController extends Controller
{
    const LIGHT_YEAR_TO_KM = 9.4607e12; // 1 ano-luz em km

    public function anosLuz(Request $request)
    {
        //Essa função faz a conversão de Kilometros para anos luz.
        try {
            
                $validatedData = $request->validate(
                    [
                        'kilometers' => 'required|numeric|min:0',
                    ]

                );
    
            $kilometers = $request->kilometers;
            $lightYears = $kilometers / self::LIGHT_YEAR_TO_KM;
                
            return response()->json([
                'anoLuz' => round($lightYears, 4), 
            ], 200, ['Content-Type' => 'application/json; charset=UTF-8']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            
            return  response(json_encode(['erro' => "parâmetros inválidos"], JSON_UNESCAPED_UNICODE), 400, ['Content-Type' => 'application/json; charset=UTF-8']);
        }
    }

    public function kilometros(Request $request)
    {
        //Essa função faz a conversão de anos luz para quilometros.
        try {
            
            $validatedData = $request->validate(
                [
                    'light_years' => 'required|numeric|min:0',
                ]

            );

            $lightYears = $request->light_years;
            $kilometers = $lightYears * self::LIGHT_YEAR_TO_KM;
            
        return response()->json([
            'quilometros' => number_format($kilometers, 4, '.', ''), 
        ], 200, ['Content-Type' => 'application/json; charset=UTF-8']);
    } catch (\Illuminate\Validation\ValidationException $e) {
        
        return  response(json_encode(['erro' => "parâmetros inválidos"], JSON_UNESCAPED_UNICODE), 400, ['Content-Type' => 'application/json; charset=UTF-8']);
    }

        
    }
}
