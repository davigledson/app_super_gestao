
<form method="post" action="{{route('pedido-produto.store',['pedido'=>$pedido])}}">
    @csrf

<select name="produto_id" >
            <option value="">-- Selecione um produto --</option>
            @foreach ($produtos as $produto)
                    <option value="{{$produto->id}}" {{(old('produto_id')) == $produto->id ? 'selected' : ''}}>{{$produto->nome}}</option>
            @endforeach

        </select>
        {{$errors->has('produto_id') ? $errors->first('produto_id') : ''}}

        <input type='number' name='quantidade' value='{{old('quantidade') ? old('quantidade') : ''}}' placeholder='Quantidade' class='borda-preta'>

        {{$errors->has('quantidade') ? $errors->first('quantidade') : ''}}








        <input type="submit" value="Cadastrar ">
    </form>
