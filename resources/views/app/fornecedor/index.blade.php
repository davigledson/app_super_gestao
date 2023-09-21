@extends('app.layouts.basico')
 @section('titulo','Cliente')
@section('conteudo')

<div class='conteudo-pagina'>
<div class='titulo-pagina-2'>
<p>Fornecedor</p>
</div>

<div class='menu'>
<ul>
<li>

<li>

<a href='{{route('app.fornecedor.adicionar')}}'>
Novo
</a>

</li>
<li>

<a href='{{route('app.fornecedor')}}'>
Consulta
</a>

</li>
</ul>
</div>

<div class='informacao-pagina'>
<div style='width:30%;margin-left: auto;margin-right: auto;'>
    <form method="post" action="{{route('app.fornecedor.listar')}}">
    @csrf
        <input type="text" name="nome" placeholder="Nome" class="borda-preta">
        <input type="text" name="site" placeholder="Site" class="borda-preta">
        <input type="text" name="uf" placeholder="UF" class="borda-preta">
        <input type="text" name="email" placeholder="Bmail" class="borda-preta">
        <input type="submit" value="Pesquisar">
    </form>
</div>
</div>
</div>
@endsection
