<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('seja-bem-vindo');
});

Route::get('/sobre-nos', function () {
    return view('sobre-nos');
});


Route::get('/contato', function () {
    return view('contato');
});
