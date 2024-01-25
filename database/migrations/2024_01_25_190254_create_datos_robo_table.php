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
        Schema::create('datos_robo', function (Blueprint $table) {
            $table->id();
            $table->string('lugar', 50);
            $table->date('fecha');
            $table->timestamps();
        });

        Schema::table('datos_robo', function (Blueprint $table){
            $table->unsignedBigInteger('fuente_id');
            $table->foreign('fuente_id')->references('id')->on('fuentes_info')
                ->onUpdate('cascade')
                ->onDelete('cascade')
                ->nullable();
            
            $table->unsignedBigInteger('forma_robo_id');
            $table->foreign('forma_robo_id')->references('id')->on('formas_robo')
                ->onUpdate('cascade')
                ->onDelete('cascade')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datos_robo');
    }
};
