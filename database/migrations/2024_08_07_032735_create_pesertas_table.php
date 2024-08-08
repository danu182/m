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
        Schema::create('pesertas', function (Blueprint $table) {
            $table->id();

            $table->string('nomor_peserta')->nullable();

            $table->string('nama_peserta');
            $table->string('sex');
            $table->string('tempat_lahir')->nullable();
            $table->date('tgl_lahir')->nullable();
            
            $table->text('alamat')->nullable();
            $table->string('ktp_peserta')->nullable();
            $table->string('tlp_peserta')->nullable();
            
            $table->integer('status')->default(1);
            $table->timestamps();
            // $table->softDeletes();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesertas');
    }
};
