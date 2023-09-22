<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Fornecedor;
class FornecedorController extends Controller
{
//     public function index(){
//         $fornecedores =[
//             0 => [
//             'nome'=>'Fornecedor 1',
//              'status'=>'N'
//              ,'cnpj'=>'0',
//              'ddd'=>'11',
//              'telefone'=>'0000-0000'
//             ],
//             1 => [
//                 'nome'=>'Fornecedor 2',
//              'status'=>'S',
//              'cnpj'=>'0sdfsdff',
//              'ddd'=>'84',
//              'telefone'=>'0000-0000'
//             ],
//             2 => [
//                 'nome'=>'Fornecedor 3',
//              'status'=>'S',
//              'cnpj'=>'0sdfsdff',
//              'ddd'=>'',
//              'telefone'=>'0000-0000'
//             ],

//     ];

//         return view('app.fornecedor.index',compact('fornecedores'));
//         //return view('app.fornecedor.index');
//     }
//
public function index(){
    return View('app.fornecedor.index');
}

public function listar(){
    return View('app.fornecedor.listar');
}

public function adicionar(Request $request){
    $msg = '';

    if($request->input('_token') != ''){
        $regras =[
            'nome'=> 'required|min:3|max:40',
            'site'=> 'required',
            'uf'=> 'required|min:2|max:3',
            'email'=> 'email',
        ];
        $feedback =[
            'required'=> 'O campo :attribute deve ser preenchido',
            'nome.min'=>  'O campo :attribute deve ter no minimo 3 caracteres',
            'nome.max'=>  'O campo :attribute deve ter no máximo 40 caracteres',
            'uf.min'=>  'O campo :attribute deve ter no mínimo 2 caracteres',
            'uf.max'=>  'O campo :attribute deve ter no máximo 3 caracteres',
            'email.email'=>  'O campo :attribute não foi preenchido corretamente',
        ];

        $request->validate($regras,$feedback);
       // echo 'Chegamos até aqui';
        $fornecedor = new Fornecedor();
        $fornecedor->create($request->all());

        $msg ='Cadastrado realizado com sucesso';
        //cadastro

    }
return View('app.fornecedor.adicionar',['msg'=>$msg]);
}
}
