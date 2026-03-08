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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id('idReservation');
            $table->integer('idUser');
            $table->integer('idSeance');
            $table->integer('nbPlace');
            $table->dateTime('dateReservation');
            $table->decimal('montantTotal');
            $table->timestamps();   $table->id('idReservation');
            $table->integer('idUser');
            $table->integer('idSeance');
            $table->integer('nbPlace');
            $table->dateTime('dateReservation');
            $table->decimal('montantTotal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
