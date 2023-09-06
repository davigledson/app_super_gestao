<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function Contato(){
        var_dump($_POST);
        return view('site.contato',['titulo'=>'Contato (teste)']); //site/principal - tbm dar certo
    }

}
