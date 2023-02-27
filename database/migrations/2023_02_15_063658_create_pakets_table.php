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
        Schema::create('pakets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('outlets_id')->required();
            $table->foreign('outlets_id')->references('id')->on('outlets')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->enum('jenis',['pakaian','selimut','bed_cover']);
            $table->string('nama_paket',50);
            $table->integer('harga');
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pakets');
    }
};
