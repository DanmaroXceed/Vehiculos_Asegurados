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
        Schema::create('localidades', function (Blueprint $table) {
            $table->uuid('est_id');
            $table->uuid('mun_id');
            $table->uuid('loc_id');
            $table->string('descripcion',100);

            $table->timestamps();
            $table->primary(['est_id', 'mun_id', 'loc_id']);
            $table->foreign(['est_id', 'mun_id'])->references(['est_id', 'mun_id'])->on('municipios')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('localidades');
    }
};
