<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteContato;
use Carbon\Factory;
use Database\Factories\SiteContatoFactory;

class SiteContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        // $contato = new SiteContato();
        // $contato->nome ='Sistema SG';
        // $contato->telefone =' 84 97041665';
        // $contato->email ='contato@gmail.com';
        // $contato->motivo= 1;
        // $contato->mensagem ='Sejá ben-vindo ao sistema';
        // $contato->save();

        SiteContato::factory()->count(100)->create();

    }
}
