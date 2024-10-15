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
        Schema::create('file_rapat', function (Blueprint $table) {
            $table->id();
            $table->string('nama_file')->nullable();
            $table->longText('file')->nullable();
            $table->longText('link')->nullable();
            $table->string('keperluan')->nullable();
            $table->longText('catatan')->nullable();

            $table->unsignedBigInteger('id_rapat')->nullable();
            $table->foreign('id_rapat')->references('id')->on('rapat')->constrained()
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
        Schema::dropIfExists('file_rapat');
    }
};
