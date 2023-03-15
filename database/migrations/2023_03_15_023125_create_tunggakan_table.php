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
        Schema::create('tunggakan', function (Blueprint $table) {
            $table->id();
            $table->string('id_petugas');
            $table->string('nisn');
            $table->string('nama');
            $table->string('id_spp');
            $table->string('bulan_tunggakan');
            $table->string('total_tunggakan');
            $table->string('sisa_bulan');
            $table->string('sisa_tunggakan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tunggakan');
    }
};
