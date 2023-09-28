<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Unidade;
use Illuminate\Http\Request;
use App\Models\ProdutoDetalhe;
use App\Models\ItemDetalhe;
class ProdutoDetalheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        echo 'chegamos até aqui';
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $unidades = Unidade::all();
        return view('app.produto_detalhe.create',[
            'unidades' => $unidades
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        ProdutoDetalhe::create($request->all());
        echo 'Cadatro realizado com sucesso';
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
    public function edit($id)
    {
        //
        $produtoDetalhe = ItemDetalhe::find($id);

        $unidades = Unidade::all();
        return view('app.produto_detalhe.edit',[
            'produto_detalhe' => $produtoDetalhe,
            'unidades' => $unidades,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ProdutoDetalhe $produtoDetalhe)
    {
        //
        $produtoDetalhe->update($request->all());
        echo 'Atualização realizada com sucesso';
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
