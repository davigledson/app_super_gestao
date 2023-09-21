<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

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
    return View('app.fornecedor');
}
}
