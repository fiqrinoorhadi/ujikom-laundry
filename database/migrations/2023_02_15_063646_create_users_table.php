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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama',30);
            $table->string('username',15);
            $table->string('password',255);
            $table->unsignedBigInteger('outlets_id')->required();
            $table->foreign('outlets_id')->references('id')->on('outlets')
                    ->onUpdate('cascade')
                    ->onDelete('cascade');
            $table->enum('role',['admin','kasir','owner']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
