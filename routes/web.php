<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalController;
use App\Http\Controllers\SobreNosController;
use App\Http\Controllers\ContatoController;
use App\Http\Controllers\FornecedorController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TesteController;
use App\Http\Middleware\LogAcessoMiddleware;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\PedidoProdutoController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\ProdutoDetalheController;

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

Route::get('/',[$PrincialControler::class,'Principal'])->name('site.index')->middleware('log.acesso');

Route::get('/sobre-nos', [SobreNosController::class,'SobreNos'])->name('site.sobrenos');
Route::get('/contato', [ContatoController::class,'Contato'])->name('site.contato');
Route::post('/contato', [ContatoController::class,'salvar'])->name('site.contato');

Route::get('/login/{erro?}',[LoginController::class,'index'])->name('site.login');
Route::post('/login',[LoginController::class,'autenticar'])->name('site.login');

Route::middleware('autenticacao:padrao,visitante')->prefix('/app')->group(function(){
    Route::get('/home',[HomeController::class,'index'])->name('app.home');
    Route::get('/sair', [LoginController::class,'sair'])->name('app.sair');



    Route::get('/fornecedor',[FornecedorController::class,'index'] )->name('app.fornecedor');
    Route::get('/fornecedor/adicionar',[FornecedorController::class,'adicionar'] )->name('app.fornecedor.adicionar');
    Route::post('/fornecedor/adicionar',[FornecedorController::class,'adicionar'] )->name('app.fornecedor.adicionar');

    Route::get('/fornecedor/editar/{id}/{msg?}',    [FornecedorController::class,'editar'])->name('app.fornecedor.editar');
    Route::get('/fornecedor/excluir/{id}',    [FornecedorController::class,'excluir'])->name('app.fornecedor.excluir');

    Route::post('/fornecedor/listar',[FornecedorController::class,'listar'] )->name('app.fornecedor.listar');
    Route::get('/fornecedor/listar',[FornecedorController::class,'listar'] )->name('app.fornecedor.listar');

    //produto
    Route::resource('produto', ProdutoController::class);

    //produtos detalhes
    Route::resource('produto-detalhe', ProdutoDetalheController::class);

    Route::resource('cliente',ClienteController::class);
    Route::resource('pedido',PedidoController::class);
    //Route::resource('pedido-produto',PedidoProdutoController::class);

    Route::get('pedido-produto/create/{pedido}',[PedidoProdutoController::class,'create'])->name('pedido-produto.create');

    Route::post('pedido-produto/store/{pedido}',[PedidoProdutoController::class,'store'])->name('pedido-produto.store');
   // Route::delete('pedido-produto.destroy/{pedido}/{produto}',[PedidoProdutoController::class,'destroy'])->name('pedido-produto.destroy');

    Route::delete('pedido-produto.destroy/{pedidoProduto}/{pedido_id}',[PedidoProdutoController::class,'destroy'])->name('pedido-produto.destroy');


});

// Route::get('/rota1', function(){
//     echo 'rota 1';

// })->name('site.rota1');

// Route::get('/rota2', function(){
//  return redirect()->route('site.rota1');
// })->name('site.rota2');

Route::get('/teste/{p1}/{p2}', [TesteController::class,'teste'])->name('teste');



Route::fallback(function(){
    echo 'A rota acessada não existente';
});



//Route::redirect('/rota2','/rota1');

// /TESTE PARA APRENDIZADO

//nome, categoria, assunto, mensagem

// Route::get('/contato/{nome}/{categoria_id}', function(
//     string $nome ='sem nome',
//     int $categoria_id = 1, //1 = informacao

//      ) {
//  echo 'estamo aqui '.$nome . '-'. $categoria_id. '-';
// })->where('categoria_id','[0-9]+')->where('nome','[A-Za-z]+');
