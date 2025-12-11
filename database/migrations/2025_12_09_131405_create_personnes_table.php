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
        Schema::create('personnes', function (Blueprint $table) {
            $table->id('idPers');
            $table->string('nomPers');
            $table->string('prePers');
            $table->date('dateNaissPers');
            $table->string('lieuNaissPers');
            $table->string('photoPers');
            $table->text('biblio');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personnes');
    }
};
