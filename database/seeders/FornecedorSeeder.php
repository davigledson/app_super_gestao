<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fornecedor;
use Illuminate\Support\Facades\DB;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //instanciando o objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome ='Fornecedor 100';
        $fornecedor->site ='Fornecedor100.com.br';
        $fornecedor->uf ='CE';
        $fornecedor->email ='contact@contact.com.br';
        $fornecedor->save();

        // o metodo create (atencao para o atributo fillable da classe)
        Fornecedor::create([
            'nome' => 'Fornecedor 200',
            'site' => 'Fornecedor100.com.br',
            'uf' => 'RN',
            'email'=> 'contato200@gmail.com'
        ]);

        //insert
        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 300',
            'site' => 'Fornecedor300.com.br',
            'uf' => 'SP',
            'email'=> 'contato300@gmail.com'
        ]);

    }
}
