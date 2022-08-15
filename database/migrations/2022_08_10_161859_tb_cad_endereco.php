<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TbCadEndereco extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_cad_endereco', function (Blueprint $table) {
            $table->increments('cod_id');
            $table->string('cod_cep', 8);
            $table->string('des_rua');
            $table->string('cod_numero', 10);
            $table->string('des_complemeto')->nullable();
            $table->string('des_bairro');
            $table->string('des_cidade');
            $table->timestamps();
            $table->softDeletes('deleted_at', $precision = 0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tb_cad_endereco');

    }
}
