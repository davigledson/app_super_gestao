<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteContato;
class ContatoController extends Controller
{
    public function Contato(Request $request){
        //dd($request);
        //var_dump($_POST);

        //TEM ESSA FORMA DE FAZER

        $contato = new SiteContato();
        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo = $request->input('motivo');
        // $contato->mensagem = $request->input('mensagem');

        //TEM ESSA MAIS ECONOMICA (FILL)
        // $contato->fill($request->all());
        // $contato->save();

        //TEM PELO METODO CREATE
        $contato->create($request->all());
        

         print_r($contato->getAttributes());
        return view('site.contato',['titulo'=>'Contato (teste)']); //site/principal - tbm dar certo
    }

}
