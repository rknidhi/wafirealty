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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('title',2000)->nullable();
            $table->string('add_by',255)->nullable();
            $table->string('description',2000)->nullable();
            $table->string('metatitle',2000)->nullable();
            $table->string('metadescription',2000)->nullable();
            $table->string('siteid',20)->nullable();
            $table->string('category',2000)->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
    
};
