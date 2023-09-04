<h3>Fornecedor</h3>

{{-- Fica o comentário que será descartado pelo interpretador do blade --}}

@php
 //Para comentários de uma linha

 
@endphp 
br
echo 'php puro';



@isset($fornecedores)
@for($i = 0; isset($fornecedores[$i]); $i++)

    Fornecedor {{$fornecedores[$i]['nome']}}
    <br>
    Status {{$fornecedores[$i]['status']}}
    CNPJ: {{ $fornecedores[$i]['cnpj'] ?? 'Vazio'  }}
    Telefone: {{ $fornecedores[$i]['ddd'] ?? 'Vazio'  }} {{ $fornecedores[$i]['telefone'] ?? 'Vazio'  }}

<hr>
 
@endfor

@endisset



