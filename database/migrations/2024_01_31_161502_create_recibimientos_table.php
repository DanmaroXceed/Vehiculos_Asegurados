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
        Schema::create('recibimientos', function (Blueprint $table) {
            $table->id();
            $table->string('aut_rec', 50);
            $table->string('titular', 50);
            $table->string('cpet_inv', 20);

            $table->timestamps();
        });

        Schema::table('recibimientos', function (Blueprint $table){
            $table->unsignedBigInteger('delito_id');
            $table->foreign('delito_id')->references('id')->on('delitos')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('recibimientos');
    }
};
