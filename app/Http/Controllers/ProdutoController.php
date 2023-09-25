<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Unidade;

class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $produtos = Produto::paginate(10);


    //dd($fornecedores);
    return View('app.produto.index',['produtos'=> $produtos],['request'=> $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unidades = Unidade::all();
        return View('app.produto.create',[
            'unidades' => $unidades
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Produto::create($request->all());
        //$produto = new Produto();

        // PARA TRATAMENTO DE DADOS

        // $nome= $request->get('nome');
        // $descricao = $request->get('descricao');

        // $nome =strtoupper($nome);
        // $produto->nome = $nome;
        // $produto->descricao = $descricao;
        // $produto->save();
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        //
    }
}
