<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Fornecedor extends Model
{
    //use SoftDeletes;
    use HasFactory;
    protected $table='fornecedores';
    protected $fillable =['nome','site','uf','email'];
    //CASO USA O METODO CREATE E APARECER ESSE ERRO -ATIVAR A VARIAVEL DE $fillable

    //PHP Parse error: Unexpected character "" (ASCII 22)  la.com','uf'=>'SP','email'=>'sp@gmail.com']) in vendor\psy\psysh\src\Exception\ParseErrorException.php on line 38.
    public function produtos(){
        return $this->hasMany('App\Models\Item','fornecedor_id','id');

        //COMO ESTA COM NOMES PADROES PODERIA OMITIR ESSAS INFORMAÇOES

        //return $this->hasMany('App\Models\Item');



    }

}
