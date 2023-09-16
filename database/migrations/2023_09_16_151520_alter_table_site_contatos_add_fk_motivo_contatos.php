<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

              //adicionando a coluna motivo_contato_id
              Schema::table('site_contatos', function (Blueprint $table) {
                $table->unsignedBigInteger('motivo_contatos_id');
            });

            //atribuindo motivo_contato para motivo_contato_id
            DB::statement('update site_contatos set motivo_contatos_id = motivo_contatos');

            //criando a fk e remover a coluna motivo_contato
            Schema::table('site_contatos', function (Blueprint $table) {
                $table->foreign('motivo_contatos_id')->references('id')->on('motivo_contatos');

                $table->dropColumn('motivo_contatos');
            });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //criar a coluna motivo_contato e revendo a fk
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->integer('motivo_contatos');
            $table->dropForeign('site_contatos_motivo_contatos_id_foreign');
        });

        //atribuindo motivo_contato_id para motivo_contato
        DB::statement('update site_contatos set  motivo = motivo_contatos_id');

        //removendo a coluna motivo_contato_id
        Schema::table('site_contatos', function (Blueprint $table) {
            $table->dropColumn('motivo_contatos_id');
        });

    }
};
