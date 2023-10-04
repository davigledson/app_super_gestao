<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;
    public function produtos(){
        //return $this->belongsToMany('App\Models\Produto','pedidos_produtos');

        return $this->belongsToMany('App\Models\Item','pedidos_produtos','pedido_id','produto_id')->withPivot('id','created_at','updated_at');

        /*
         1 parâmetro = modelo do relacionamento NxN em relação o Modelo que estamos implementando

         2 parâmetro = É a tabela auxiliar que armazena os registros de relacionamento

         3 parâmetro = Representa o nome da FK da tabela mapeada pelo modelo na tabela de relacionamento

         4 parâmetro = Representa o nome da FK da tabela mapeada pelo model utilizada no relacionamento
         */
    }
}
