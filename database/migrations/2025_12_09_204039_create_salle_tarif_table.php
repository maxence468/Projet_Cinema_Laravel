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
        Schema::create('salle_tarif', function (Blueprint $table) {
            $table->unsignedBigInteger('idSalle')->default(1);
            $table->unsignedBigInteger('idTarif')->default(1);

            $table->foreign('idSalle')->references('idSalle')->on('salles');
            $table->foreign('idTarif')->references('idTarif')->on('tarifs');

            $table->primary(['idSalle', 'idTarif']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salle_tarif');
    }
};
