<h3>Fornecedor</h3>

{{-- Fica o comentário que será descartado pelo interpretador do blade --}}





@isset($fornecedores)

@forelse($fornecedores as $indice=>$fornecedor)

Iteração atual: {{$loop->iteration}}
    Fornecedor {{$fornecedor['nome']}}
    <br>
    Status @{{$fornecedor['status']}}
    CNPJ: {{ $fornecedor['cnpj'] ?? 'Vazio'  }}
    Telefone: {{ $fornecedor['ddd'] ?? 'Vazio'  }} {{ $fornecedor['telefone'] ?? 'Vazio'  }}
@if($loop->first)
Primeira iteração do loop
@endif

@if($loop->last)
ultima iteração do loop <br>

Total de registros {{$loop->count}}
@endif

<hr>
@empty
Vazio
@endforelse()



@endisset



