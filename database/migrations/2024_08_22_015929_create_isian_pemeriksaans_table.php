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
        Schema::create('isian_pemeriksaans', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('pemeriksaan_id');
            $table->string('kategori_isian');
            

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('isian_pemeriksaans');
    }
};
