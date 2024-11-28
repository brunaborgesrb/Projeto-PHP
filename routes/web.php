<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConversionController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/', function () {
    return view('km_to_anos_luz'); // Página inicial
});

Route::get('/anos-luz-para-km', function () {
    return view('anos_luz_to_km'); // Nova página
});

