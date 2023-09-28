<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemDetalhe extends Model
{
    use HasFactory;
    protected $table= 'produtos_detalhes';
    protected $fillable = ['produto_id','comprimento','largura','altura','unidade_id'];

    public function item()
    //public function produto()
    {
        return $this->belongsTo('App\Models\Item','produto_id','id');
    }
}
