<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHabitatgesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('habitatges', function (Blueprint $table) {
            $table->id()->primarykey();
            $table->foreignId('user_id');
            $table->foreignId('categoria_id');
            $table->foreignId('tipuscategoria_id');
            $table->string('nom', 128);
            $table->integer('m2');
            $table->integer('capacitat_max');
            $table->string('provincia', 128);
            $table->string('ciutat', 128);
            $table->string('codiPostal', 128);
            $table->string('adreça', 128);
            $table->string('descripcio', 800);
            $table->integer('preu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('habitatges');
    }
}
