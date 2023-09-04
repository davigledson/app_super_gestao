<h3>Fornecedor</h3>

{{-- Fica o comentário que será descartado pelo interpretador do blade --}}

@php
 //Para comentários de uma linha

 
@endphp 
br
echo 'php puro';



@isset($fornecedores)

@foreach($fornecedores as $indice=>$fornecedor)
    Fornecedor {{$fornecedor['nome']}}
    <br>
    Status {{$fornecedor['status']}}
    CNPJ: {{ $fornecedor['cnpj'] ?? 'Vazio'  }}
    Telefone: {{ $fornecedor['ddd'] ?? 'Vazio'  }} {{ $fornecedor['telefone'] ?? 'Vazio'  }}

<hr>
@endforeach()



@endisset



