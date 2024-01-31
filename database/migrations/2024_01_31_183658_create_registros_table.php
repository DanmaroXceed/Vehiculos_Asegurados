<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('registros', function (Blueprint $table) {
            $table->id();
            $table->string('elemento', 50);
            $table->date('fecha');
            $table->timestamps();
        });

        Schema::table('registros', function (Blueprint $table){
            $table->unsignedBigInteger('vehiculo_id');
            $table->foreign('vehiculo_id')->references('id')->on('vehiculos')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('aseguramiento_id');
            $table->foreign('aseguramiento_id')->references('id')->on('aseguramientos')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('lugar_id');
            $table->foreign('lugar_id')->references('id')->on('lugares')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('recibimiento_id');
            $table->foreign('recibimiento_id')->references('id')->on('recibimientos')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('cargo_id');
            $table->foreign('cargo_id')->references('id')->on('cargos')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('unidad_id');
            $table->foreign('unidad_id')->references('id')->on('unidads')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('distrito_id');
            $table->foreign('distrito_id')->references('id')->on('distritos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registros');
    }
};
