<h3>Fornecedor</h3>

{{-- Fica o comentário que será descartado pelo interpretador do blade --}}

@php
 //Para comentários de uma linha

 
@endphp 
br
echo 'php puro';


@isset($fornecedores)
Fornecedor {{$fornecedores[1]['nome']}}
<br>
Status {{$fornecedores[1]['status']}}
CNPJ: {{ $fornecedores[1]['cnpj'] ?? 'Vazio'  }}
@endisset



