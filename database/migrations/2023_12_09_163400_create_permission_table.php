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
        Schema::create('permission', function (Blueprint $table) {
            $table->id();
            $table->string('userid',1000)->nullable();
            $table->string('username',2000)->nullable();
            $table->string('module',2000)->nullable();  
            $table->enum('view',[0,1])->default(0);
            $table->enum('add',[0,1])->default(0);
            $table->enum('edit',[0,1])->default(0);
            $table->enum('delete',[0,1])->default(0);
            $table->enum('download',[0,1])->default(0);
            $table->enum('fieldedit',[0,1])->default(0);
            $table->enum('status',['active','inactive'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('permission');
    }
};
