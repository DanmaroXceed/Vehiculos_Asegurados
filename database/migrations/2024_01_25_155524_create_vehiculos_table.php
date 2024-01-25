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
        Schema::create('vehiculos', function (Blueprint $table) {
            $table->id();
            $table->string('color', 30);
            $table->string('anio_mod', 4);
            $table->string('s_orig', 20);
            $table->string('s_apo', 20);
            $table->string('no_motor', 20);
            $table->string('placas', 10);
            $table->text('cond_vehi', 300);
            $table->string('or_sob');
            $table->timestamps();
        });

        Schema::table('vehiculos', function (Blueprint $table){
            $table->unsignedBigInteger('clasific_id');
            $table->foreign('clasific_id')->references('id')->on('clasific_vehi')->after('id')->nullable()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('tipo_id');
            $table->foreign('tipo_id')->references('id')->on('tipo_vehi')->after('id')->nullable()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('marca_id');
            $table->foreign('marca_id')->references('id')->on('marcas')->after('id')->nullable()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->unsignedBigInteger('submarca_id');
            $table->foreign('submarca_id')->references('id')->on('submarcas')->after('id')->nullable()
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehiculos');
    }
};
