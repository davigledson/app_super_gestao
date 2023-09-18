<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AutenticacaoMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$metodo_autenticacao,$perfil): Response
    {
        echo $metodo_autenticacao .' - '. $perfil .'<br>';
        if($metodo_autenticacao == 'padrao'){
            echo 'Verificar o usuario e senha no banco de dados' . '<br>' .' - '. $perfil;
        }
        if($metodo_autenticacao == 'ldap'){
            echo 'Verificar o usuário e senha no AD' .' - '. $perfil . '<br>';
        }
        if($perfil == 'visintante'){
            echo 'Exibir apenas alguns recursos';
        } else {
            echo 'Carregar o perfil do banco de dados';
        }
        if(false){
             return $next($request);
        }else{
             return Response('Acesso negado! Rota exige autenticação.');
        }


    }
}
