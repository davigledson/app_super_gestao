@if(isset($pedido->id))
<form method="post" action="{{route('pedido.update',['pedido'=> $pedido->id])}}">
    @csrf
    @method('PUT')
@else
<form method="post" action="{{route('pedido.store')}}">
    @csrf
@endif
<select name="produto_id" >
            <option value="">-- Selecione um produto --</option>
            @foreach ($produtos as $produto)
                    <option value="{{$produto->id}}" {{($pedido->produto_id ?? old('produto_id')) == $produto->id ? 'selected' : ''}}>{{$produto->nome}}</option>
            @endforeach

        </select>
        {{$errors->has('produto_id') ? $errors->first('produto_id') : ''}}








        <input type="submit" value="Cadastrar ">
    </form>
