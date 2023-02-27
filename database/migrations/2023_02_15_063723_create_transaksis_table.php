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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('outlets_id')->required();
            $table->foreign('outlets_id')->references('id')->on('outlets')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->string('kode_invoice',100);
            $table->unsignedBigInteger('members_id')->required();
            $table->foreign('members_id')->references('id')->on('members')
            ->onUpdate('cascade')
            ->onDelete('cascade');
            $table->dateTime('tgl');
            $table->dateTime('batas_waktu');
            $table->dateTime('tgl_bayar')->nullable();
            $table->integer('biaya_tambahan')->nullable();
            $table->integer('diskon')->nullable();
            $table->integer('pajak');
            $table->enum('status_laundry',['baru','proses','selesai','diambil']);
            $table->enum('status_dibayar',['dibayar','belum_dibayar']);
            $table->unsignedBigInteger('users_id')->required();
            $table->foreign('users_id')->references('id')->on('users')
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
        Schema::dropIfExists('transaksis');
    }
};
