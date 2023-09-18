<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function index(){
        return view('site.login',['titulo' => 'Login']);
    }

    public function autenticar(){
        return 'Chegamos até aqui';
    }
}
