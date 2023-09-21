<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends Controller
{
    //
    public function index(Request $request){
        $erro ='';
        if($request->get('erro')==1){
            $erro ='Usuário ou senha não existe';
        }

        if($request->get('erro')==2){
            $erro ='Necessario realizar login para ter acesso a página';
        }

        return view('site.login',['titulo' => 'Login','erro'=>$erro]);
    }

    public function autenticar(Request $request){
        //regras de validacao
        $regras =[
            'usuario' => 'email',
            'senha'=>'required',
        ];
        $feedback = [
            'usuario.email' => 'O campo usuario (e-mail) é obrigatorio ',
            'senha.required' => 'O campo senha é obrigatório'
        ];

        //se não passa pelo validade
        $request->validate($regras,$feedback);

        $email = $request->get('usuario');
        $password = $request->get('senha');



        print_r($request->all());

        //iniciar o Model User
        $user = (new User());
        $usuario = $user->where('email', $email)->where('password', $password)->get()->first();

        if(isset($usuario->name)){
            session_start();
            $_SESSION['nome'] = $usuario->name;
            $_SESSION['email'] = $usuario->email;

            return redirect()->route('app.clientes');

        } else {
            //echo "Usuario não existe";
            return redirect()->route('site.login',['erro'=>1]);

        }
        //$usuario = $usuario;

       // print_r($usuario);
    }
}
