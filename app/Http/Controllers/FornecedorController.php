<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        $fornecedores =[
            0 => ['nome'=>'Fornecedor 1', 'status'=>'N','cnpj'=>'0'],
            1 => ['nome'=>'Fornecedor 2', 'status'=>'S','cnpj'=>'0sdfsdff'],
      
    ];
        return view('app.fornecedor.index',compact('fornecedores'));
        //return view('app.fornecedor.index');
    }
}
