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
Telefone: {{ $fornecedores[1]['ddd'] ?? 'Vazio'  }} {{ $fornecedores[1]['telefone'] ?? 'Vazio'  }}

@switch ($fornecedores[2]['ddd'])
    @case('11')
        Sao paulo - SP
        @break
    @case('32')
    Juiz de fora -MG
        @break

     @case('84')
    Barauna-RN
        @break

    @default
    Estado não identificado





@endswitch
@endisset



