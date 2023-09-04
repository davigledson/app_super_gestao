<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FornecedorController extends Controller
{
    public function index(){
        $fornecedores =['a',
        'a',
        'a',
        'a',
        'a',
        'a',
        'a',
        'a',
        'a',
        'a',
        'a',
        'a',
        'a',
        'a',
        'a',
        'a',
        'a',
        'a'];
        return view('app.fornecedor.index',compact('fornecedores'));
    }
}
