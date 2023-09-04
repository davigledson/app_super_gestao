<h3>Fornecedor</h3>

{{-- Fica o comentário que será descartado pelo interpretador do blade --}}

@php
 //Para comentários de uma linha

 
@endphp 
br
echo 'php puro';



@if(count($fornecedores)>0 && count($fornecedores)<10)

 <h3>Existem alguns Fornecedorres cadastrados</h3>

 @elseif(count($fornecedores)>10)
<h3>Existem varios Fornecedorres cadastrados</h3>

@else
<h3>Existem nenhum Fornecedorres cadastrados</h3>

@endif