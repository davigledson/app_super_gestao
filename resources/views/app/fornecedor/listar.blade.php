@extends('app.layouts.basico')
 @section('titulo','Cliente')
@section('conteudo')

<div class='conteudo-pagina'>
<div class='titulo-pagina-2'>
<p>Fornecedor - Listar</p>
</div>

<div class='menu'>
<ul>
<li>
<a href='{{route('app.fornecedor.adicionar')}}'>
Cadastrar
</a>

</li>
<li>

<a href='{{route('app.fornecedor')}}'>
Novo
</a>

</li>
</ul>
</div>

<div class='informacao-pagina'>
<div style='width:90%;margin-left: auto;margin-right: auto;'>
    ... Lista ...

        <table border='1' width='100%'>
            <thead>
            <tr>
                <th>Nome</th>
                <th>Site</th>
                <th>UF</th>
                <th>Email</th>


            </tr>
            </thead>
            <tbody>

            @foreach ($fornecedores as $fornecedor)
                <tr>
                    <td>{{$fornecedor->nome}}</td>
                    <td>{{$fornecedor->site}}</td>
                    <td>{{$fornecedor->uf}}</td>
                    <td>{{$fornecedor->email}}</td>
                    <td> <a href='{{route('app.fornecedor.editar',$fornecedor->id)}}'>Editar</a> </td>
                    <td><a href='{{route('app.fornecedor.excluir',$fornecedor->id)}}'>Excluir</a></td>
                </tr>
            @endforeach

            </tbody>

        </table>
         {{$fornecedores->appends($request)->links()}}
            {{--
        {{$fornecedores->count()}} - Total de registros por página

        {{$fornecedores->total()}} - Total de registros por da consulta
        {{$fornecedores->firstItem()}} - primeiro registro da pagina
        {{$fornecedores->lastItem()}} - Númoero do ultimo registro da pagina --}}

        Exibindo {{$fornecedores->count()}} - fornecedores de {{$fornecedores->total()}} de ({{$fornecedores->firstItem()}} a  {{$fornecedores->lastItem()}})
</div>
</div>
</div>
@endsection
