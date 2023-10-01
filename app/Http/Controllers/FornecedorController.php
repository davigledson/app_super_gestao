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

public function listar(Request $request){
    //dd($request->all());
    $fornecedores = Fornecedor::with(['produtos'])->where('nome','like','%'.$request->input('nome').'%')
    ->where('site','like','%'.$request->input('site').'%')
    ->where('uf','like','%'.$request->input('uf').'%')
    ->where('email','like','%'.$request->input('email').'%')
    ->paginate(5);

    //dd($fornecedores);
    return View('app.fornecedor.listar',['fornecedores'=> $fornecedores],['request'=> $request->all()]);
}

public function adicionar(Request $request){
    $msg = '';

    //inclusao
    if($request->input('_token') != '' and $request->input('id') == ''){
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


        //edição
    }

    if($request->input('_token') != '' && $request->input('id') != '') {
            $fornecedor = Fornecedor::find($request->input('id'));
            $update = $fornecedor->update($request->all());

            if($update) {
                $msg = 'Atualização realizado com sucesso';
            } else {
                $msg = 'Erro ao tentar atualizar o registro';
            }

            return redirect()->route('app.fornecedor.editar', ['id' => $request->input('id'), 'msg' => $msg]);
        }
    return View('app.fornecedor.adicionar',['msg'=>$msg]);

}

    public function editar($id, $msg=''){
    //echo 'chegamos até aqui'.$id;
    $fornecedor = Fornecedor::find($id);

    return View('app.fornecedor.adicionar',['fornecedor'=> $fornecedor,'msg' => $msg]);
}

public function excluir($id){
    echo"chegamos até aqui $id";
    Fornecedor::find($id)->delete();
    //Fornecedor::find($id)->forceDelete(); - deletar permanentes
    return redirect()->route('app.fornecedor');
}
}


