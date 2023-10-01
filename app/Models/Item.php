<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{

    use HasFactory;
    protected $table= 'produtos';
    protected $fillable = ['nome','descricao','peso','unidade_id','fornecedor_id'];

    public function ItemDetalhe()
    //public function produtoDetalhe()
    {
        return $this->hasOne('App\Models\ItemDetalhe','produto_id','id');
        //produto tem 1 produto detalhe
    }

    public function fornecedor(){
        return $this->belongsTo('App\Models\Fornecedor');
    }
}
