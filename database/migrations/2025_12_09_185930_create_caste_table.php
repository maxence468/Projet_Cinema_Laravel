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
        Schema::create('caste', function (Blueprint $table) {
            $table->unsignedBigInteger('idFilm');
            $table->unsignedBigInteger('idPers');
            $table->string('nomJoue');
            $table->string('preJoue');
            $table->boolean('principale');
            $table->boolean('secondaire');

            $table->foreign('idFilm')->references('idFilm')->on('films');
            $table->foreign('idPers')->references('idPers')->on('personnes');

            $table->primary(['idFilm', 'idPers']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('casting');
    }
};
