<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MotivoContato;

class MotivoContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
         MotivoContato::create(['motivo_contatos'=> 'Dúvida']);
        MotivoContato::create(['motivo_contatos'=>'Elogio']);
        MotivoContato::create(['motivo_contatos'=>'Reclamação']);
    }
}
