<?php

namespace Database\Seeders;

use App\Components\Biblioteca;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tb_cad_endereco')->insert([
            'cod_cep' => '09112150',
            'des_rua' => Str::random(10),
            'cod_numero' => Str::random(4),
            'des_complemeto' =>Str::random(4),
            'des_bairro' => Str::random(10),
            'des_cidade' => Str::random(10),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
