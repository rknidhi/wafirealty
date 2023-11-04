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
        Schema::create('projets', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('location',255)->nullable();
            $table->enum('type',['Independent Floors','Retail Shops','Lockable Office Space','Studio Apartment','Office','Premium Residential Apartments'])->nullable();
            $table->string('builder',255)->nullable();
            $table->string('project_name',255)->nullable();
            $table->string('price',255)->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projets');
    }
};
