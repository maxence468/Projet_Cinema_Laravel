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
        Schema::create('notes', function (Blueprint $table) {
            $table->unsignedBigInteger('idFilm');
            $table->unsignedBigInteger('idUser');

            $table->foreign('idFilm')->references('idFilm')->on('films');
            $table->foreign('idUser')->references('idUser')->on('users');

            $table->integer('note');

            $table->primary(['idFilm', 'idUser']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notes');
    }
};
