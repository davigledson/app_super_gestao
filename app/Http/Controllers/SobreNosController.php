<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class SobreNosController extends Controller
{

    public function __construct()
    {
$this->middleware('log.acesso');
    }
    public function SobreNos(){
        return view('site.sobre-nos'); //site/principal - tbm dar certo
    }
}
