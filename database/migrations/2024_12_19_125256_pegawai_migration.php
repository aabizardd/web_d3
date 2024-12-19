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
        Schema::create('pegawai', function (Blueprint $table) {
            $table->id();
            $table->longText('foto_pegawai')->nullable();
            $table->string('nama_pegawai')->nullable();
            $table->string('golongan')->nullable();
            $table->string('jabatan')->nullable();
            $table->longText('tentang')->nullable();
            $table->unsignedBigInteger('id_divisi')->nullable();

            $table->foreign('id_divisi')->references('id')->on('divisi')->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pegawai');
    }
};
