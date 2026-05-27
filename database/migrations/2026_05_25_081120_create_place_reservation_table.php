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
        Schema::create('place_reservation', function (Blueprint $table) {
            $table->unsignedBigInteger('idReservation');
            $table->unsignedBigInteger('idTarif');

            $table->foreign('idReservation')->references('idReservation')->on('reservations');
            $table->foreign('idTarif')->references('idTarif')->on('tarifs');

            $table->integer('nbPlace');

            $table->primary(['idReservation', 'idTarif']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('place_reservation');
    }
};
