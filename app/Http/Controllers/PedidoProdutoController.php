<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pedido;
use App\Models\PedidoProduto;
use App\Models\Produto;

class PedidoProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Pedido $pedido)
    {
        //
        $produtos = Produto::all();
        //$pedido->produtos; //eager loading
        return view('app.pedido_produto.create',[
            'pedido' => $pedido,
            'produtos'=>$produtos
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request,Pedido $pedido)
    {

        $regras = [
            'produto_id' =>'exists:produtos,id',
            'quantidade'=> 'required'
        ];
        $feedback = [
            'produto_id.exists' =>' O produto informado não existe',
            'required' => 'O campo :attribute deve possuir um valor válido'
        ];

        $request->validate($regras,$feedback);

        //echo $pedido->id . ' - ' . $request->get('produto_id');

        // $pedidoProduto = new PedidoProduto();
        // $pedidoProduto->pedido_id = $pedido->id;
        // $pedidoProduto->produto_id =  $request->get('produto_id');
        // $pedidoProduto->quantidade = $request->get('quantidade');
        // $pedidoProduto->save();

        // 1 FORMA DE FAZER
        //$pedido->produtos //os registros do relacionamento
        // $pedido->produtos()->attach(
        //     $request->get('produto_id'),
        //     [
        //         'quantidade'=>$request->get('quantidade'),

        //     ]
        // );  //objeto
        //pedido_id

        // OUTRA FORMA DE FAZER
        $pedido->produtos()->attach([
            $request->get('produto_id') => ['quantidade'=> $request->get('quantidade')]
            ]);

        return redirect()->route('pedido-produto.create',['pedido'=>$pedido->id]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
