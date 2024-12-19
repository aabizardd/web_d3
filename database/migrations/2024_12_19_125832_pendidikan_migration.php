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
        Schema::create('pendidikan', function (Blueprint $table) {
            $table->id();

            $table->string('nama_universitas')->nullable();
            $table->string('jurusan')->nullable();
            $table->integer('tahun_lulus')->nullable();

            $table->unsignedBigInteger('id_pegawai')->nullable();
            $table->foreign('id_pegawai')->references('id')->on('pegawai')->constrained()
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
        Schema::dropIfExists('pendidikan');
    }
};
