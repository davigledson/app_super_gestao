<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use  Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        //criando a coluna em que produtos que vai receber a dk de fornecedores
        Schema::table('produtos', function (Blueprint $table){
            //inserir um registro de fornecedor para estabelecer o relacionamento (para não dar erro)

            $fornecedor_id = DB::table('fornecedores')->insertGetId([
                'nome'=>'Fornecedor Padrão SG',
                'uf'=>'SP',
                'site'=>'fornecedorpadragaosg.com.br',
                'email'=>'contatopadragaosg.com.br',
            ]);

            $table->unsignedBigInteger('fornecedor_id')->default($fornecedor_id)->after('id');
            $table->foreign('fornecedor_id')->references('id')->on('fornecedores');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::table('produtos', function (Blueprint $table){
            //inserir um registro de fornecedor para estabelecer o relacionamento (para não dar erro)
            $table->dropForeign('produtos_fornecedor_id_foreign');
            $table->dropColumn('fornecedor_id');

        });

    }
};
