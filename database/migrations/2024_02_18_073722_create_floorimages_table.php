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
        Schema::create('floorimages', function (Blueprint $table) {
            $table->id();
            $table->string('pid')->nullable();
            $table->string('image_path')->nullable();
            $table->string('room')->nullable();
            $table->string('totalplan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('floorimages');
    }
};
