<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SiteContato;
use App\Models\MotivoContato;

class ContatoController extends Controller
{
    public function Contato(Request $request){

        $motivo_contatos = MotivoContato::all();
        //dd($request);
        //var_dump($_POST);

        //TEM ESSA FORMA DE FAZER


        // $contato->nome = $request->input('nome');
        // $contato->telefone = $request->input('telefone');
        // $contato->email = $request->input('email');
        // $contato->motivo = $request->input('motivo');
        // $contato->mensagem = $request->input('mensagem');

        //TEM ESSA MAIS ECONOMICA (FILL)
        // $contato->fill($request->all());
        // $contato->save();

        //TEM PELO METODO CREATE




        //  print_r($contato->getAttributes());
        return view('site.contato',[
            'titulo'=>'Contato (teste)',
            'motivo_contatos'=> $motivo_contatos
        ]); //site/principal - tbm dar certo
    }

    public function salvar(Request $request){
//realiza a validacao dos dados
$request->validate([
    'nome'=>'required |min:3|max:40',
    'telefone'=>'required',
    'email'=>'required',
     'mensagem'=>'required |max:2000',
    'motivo'=>'required',
]);
        SiteContato::create($request->all());

    }

}
