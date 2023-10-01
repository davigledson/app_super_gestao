<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use App\Http\Controllers\Controller;
use App\Models\Fornecedor;
use App\Models\ProdutoDetalhe;
use Illuminate\Http\Request;
use App\Models\Unidade;
use App\Models\Item;
use App\Models\ItemDetalhe;
class ProdutoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //$produtos = Produto::paginate(10);
        $produtos = Item::with(['itemDetalhe','fornecedor'])->paginate(10);

        // foreach ($produtos as $key => $produto) {
        //     //print_r($produto->getAttributes());
        //    // echo '<br><br>';

        //     $produtoDetalhe = ProdutoDetalhe::where('produto_id',$produto->id)->first();
        // //sem o first seria uma collection

        // if(isset($produtoDetalhe)){
        //     //print_r($produtoDetalhe->getAttributes());

        //     $produtos[$key]['comprimento'] = $produtoDetalhe->comprimento;
        //     $produtos[$key]['largura']=$produtoDetalhe->largura;

        //     $produtos[$key]['altura']=$produtoDetalhe->altura;


        // }
        // }

//echo '<hr>';

    //dd($fornecedores);
    return View('app.produto.index',['produtos'=> $produtos],['request'=> $request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $unidades = Unidade::all();
        $fornecedores = Fornecedor::all();
        return View('app.produto.create',[
            'unidades' => $unidades,
            'fornecedores'=>$fornecedores,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        //$produto = new Produto();

        // PARA TRATAMENTO DE DADOS

        // $nome= $request->get('nome');
        // $descricao = $request->get('descricao');

        // $nome =strtoupper($nome);
        // $produto->nome = $nome;
        // $produto->descricao = $descricao;
        // $produto->save();

        $regras =[
            'nome'=>'required|min:3|max:40',
            'descricao'=>'required|min:3|max:2000',
            'peso'=>'required|integer',
            'unidade_id'=>'exists:unidades,id',
            'fornecedor_id'=>'exists:fornecedores,id',
        ];
        $feedback = [
            'required'=>' O campo :attribute deve ser preenchido',
            'nome.min'=>' O campo nome deve ter no mínimo 3 caracteres',
            'nome.max'=>' O campo nome deve ter no máximo 40 caracteres',
            'descricao.min'=>' O campo descrição  deve ter no mínimo 3 caracteres',
            'descricao.max'=>' O campo descrição deve ter no máximo 2000 caracteres',
            'peso.integer'=>'o campo peso dever um numero inteiro',
            'unidade_id.exists'=>'A unidade de medida informada não existe',
            'fornecedor_id.exists'=>'O fornecedor informado não existe',

        ];

        $request->validate($regras,$feedback);
 Item::create($request->all());
        return redirect()->route('produto.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        //dd($produto);
        return view('app.produto.show',['produto' => $produto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produto $produto)
    {
        $unidades =Unidade::all();
        $fornecedores = Fornecedor::all();
        return view('app.produto.edit',[
            'produto' => $produto,
            'unidades' => $unidades,
            'fornecedores'=>$fornecedores,
        ]);

        // return view('app.produto.create',[
        //     'produto' => $produto,
        //     'unidades' => $unidades,
        // ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $produto)
    {
        //
       //print_r($request->all()) ; //payload
       //print_r($produto->getAttributes() ); // instancia do objeto no estado anterior
        //dd($produto);
        $regras =[
            'nome'=>'required|min:3|max:40',
            'descricao'=>'required|min:3|max:2000',
            'peso'=>'required|integer',
            'unidade_id'=>'exists:unidades,id',
            'fornecedor_id'=>'exists:fornecedores,id',

        ];
        $feedback = [
            'required'=>' O campo :attribute deve ser preenchido',
            'nome.min'=>' O campo nome deve ter no mínimo 3 caracteres',
            'nome.max'=>' O campo nome deve ter no máximo 40 caracteres',
            'descricao.min'=>' O campo descrição  deve ter no mínimo 3 caracteres',
            'descricao.max'=>' O campo descrição deve ter no máximo 2000 caracteres',
            'peso.integer'=>'o campo peso dever um numero inteiro',
            'unidade_id.exists'=>'A unidade de medida informada não existe',
            'fornecedor_id.exists'=>'O fornecedor informado não existe',


        ];

        $request->validate($regras,$feedback);
       $produto->update($request->all());
       return redirect()->route('produto.show',['produto'=>$produto->id]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        //
        //dd($produto);
        $produto->delete();

         return redirect()->route('produto.index',['produto'=>$produto->id]);
    }
}
