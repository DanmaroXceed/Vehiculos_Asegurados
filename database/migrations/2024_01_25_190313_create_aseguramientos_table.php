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
        Schema::create('aseguramientos', function (Blueprint $table) {
            $table->id();
            $table->text('personas', 350);
            $table->string('deposito', 50);
            $table->date('fecha');
            $table->timestamps();
        });

        Schema::table('aseguramientos', function (Blueprint $table){
            $table->unsignedBigInteger('motivo_id');
            $table->foreign('motivo_id')->references('id')->on('motivos')->nullable()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            
            $table->unsignedBigInteger('autoridad_as_id');
            $table->foreign('autoridad_as_id')->references('id')->on('autoridades')->nullable()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('datos_robo_id');
            $table->foreign('datos_robo_id')->references('id')->on('datos_robo')->nullable()
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aseguramientos');
    }
};
