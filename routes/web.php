<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;

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

// Route::get('/', function () {
//     return view('seja-bem-vindo');
// });
$PrincialControler = new PrincipalController();
Route::get('/',[$PrincialControler::class,'Principal']);

Route::get('/sobre-nos', [SobreNosController::class,'SobreNos']);

//nome, categoria, assunto, mensagem
Route::get('/contato', [ContatoController::class,'Contato']);
Route::get('/contato/{nome}/{categoria}/{assunto}/{mensagem}', function(string $nome, string $categoria,string $assunto, string $mensagem){
 echo 'estamo aqui'.$nome . '-'. $categoria. '-'. $assunto . '-'. $mensagem;
});
