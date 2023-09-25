@extends('app.layouts.basico')
 @section('titulo','Produto')
@section('conteudo')

<div class='conteudo-pagina'>
<div class='titulo-pagina-2'>
<p>Produtos - listagem</p>
</div>

<div class='menu'>
<ul>
<li>

<li><a href='{{route('produto.create')}}'>Novo</a></li>
<li>

<a href='{{route('app.fornecedor')}}'>Consulta</a></li>
</ul>
</div>


<div class='informacao-pagina'>
<div style='width:90%;margin-left: auto;margin-right: auto;'>
    ... Lista ...

        <table border='1' width='100%'>
            <thead>
            <tr>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Peso</th>
                <th>Unidade ID</th>


            </tr>
            </thead>
            <tbody>

            @foreach ($produtos as $produto)
                <tr>
                    <td>{{$produto->nome}}</td>
                    <td>{{$produto->descricao}}</td>
                    <td>{{$produto->peso}}</td>
                    <td>{{$produto->unidade_id}}</td>
                    <td>  </td>
                    <td></td>
                </tr>
            @endforeach

            </tbody>

        </table>
         {{$produtos->appends($request)->links()}}
            {{--
        {{$produtos->count()}} - Total de registros por página

        {{$produtos->total()}} - Total de registros por da consulta
        {{$produtos->firstItem()}} - primeiro registro da pagina
        {{$produtos->lastItem()}} - Númoero do ultimo registro da pagina --}}

        Exibindo {{$produtos->count()}} - produtos de {{$produtos->total()}} de ({{$produtos->firstItem()}} a  {{$produtos->lastItem()}})
</div>
</div>
</div>
@endsection
