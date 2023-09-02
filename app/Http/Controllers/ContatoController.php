<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ContatoController extends Controller
{
    public function Contato(){
        return view('site.contato'); //site/principal - tbm dar certo
    }

}
