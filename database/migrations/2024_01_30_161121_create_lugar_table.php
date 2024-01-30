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
        Schema::create('lugares', function (Blueprint $table) {
            $table->id();
            $table->uuid('est_id');
            $table->uuid('mun_id');
            $table->uuid('loc_id');

            $table->foreign(['est_id', 'mun_id', 'loc_id'])->references(['est_id', 'mun_id', 'loc_id'])->on('localidades')->onDelete('cascade');

            $table->string('calle', 80);
            $table->string('numero', 20);
            $table->string('colonia', 80);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lugares');
    }
};
