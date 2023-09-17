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

        $regras = [
            'nome'=>'required |min:3|max:40|unique:site_contatos',
            'telefone'=>'required',
            'email'=>'email',

            'motivo_contatos_id'=>'required',
            'mensagem'=>'required |max:2000'
        ];

        $feedback = [
            'nome.min'=>'O campo nome precisa ter no minimo 3 caracteres',
            'nome.max'=>'O campo nome deve ter no máximo 40 caracteres',
            'nome.unique'=> 'O nome informado já está em uso',

            'email.email'=> 'O email é informado não é válido',

            'mensagem.max'=> 'A mensagem deve ter no máximo 2000 caracteres',

            'required'=> ' O campo :attribute deve ser preenchido',

        ];

        $request->validate($regras,$feedback);

        SiteContato::create($request->all());
        return redirect()->route('site.index');

    }

}
