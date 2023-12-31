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
                <th>Nome do Fornecedor</th>
                <th>Site do Fornecedor</th>
                <th>Peso</th>
                <th>Comprimento</th>
                <th>Altura</th>
                <th>Largura</th>

                <th></th>
                <th></th>
                <th></th>
                <th></th>


            </tr>
            </thead>
            <tbody>

            @foreach ($produtos as $produto)
                <tr>
                    <td>{{$produto->nome}}</td>
                    <td>{{$produto->descricao}}</td>
                    <td>{{$produto->fornecedor->nome}}</td>
                    <td>{{$produto->fornecedor->site}}</td>
                    <td>{{$produto->peso}}</td>
                    <td>{{$produto->unidade_id}}</td>

                   <td>{{$produto->itemDetalhe->comprimento ?? ''}}</td>

                    <td>{{$produto->itemDetalhe->altura ?? ''}}</td>
                     <td>{{$produto->itemDetalhe->largura ?? ''}}</td>

                     <td><a href='{{route('produto.show',['produto'=>$produto->id])}}'>Visualizar</a> </td>
                     <td>
                     <form id='form_{{$produto->id}}' method='post' action='{{route('produto.destroy',['produto'=>$produto->id])}}'>

                     @method('DELETE')
                     @csrf
                     {{-- <button type='submit'>Excluir</button> --}}
                     <a hred='#' onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>

                     </form>
                        </td>
                    <td><a href='{{route('produto.edit',['produto'=>$produto->id])}}'>Editar</a></td>

                </tr>
                <tr>
                <td colspan='12'>
                Exibir o ID do Pedido
                <p>Pedidos</p>
                @foreach ($produto->pedidos as $pedido)
               
                <a href='{{route('pedido-produto.create',['pedido'=>$pedido->id])}}'>
                   Pedido: {{ $pedido->id}},
                </a>
                @endforeach
                </td>
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
