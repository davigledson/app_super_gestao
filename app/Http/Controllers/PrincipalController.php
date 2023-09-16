<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\MotivoContato;
use Illuminate\Http\Request;

class PrincipalController extends Controller
{
    //

    public function Principal()

    {$motivo_contatos = MotivoContato::all();
        //dd($motivo_contatos);

        return view('site.principal',['motivo_contatos'=>$motivo_contatos]); //site/principal - tbm dar certo
    }
}
