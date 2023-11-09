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
            $table->string('brand',255)->nullable();
            $table->string('project_name',255)->nullable();
            $table->string('price',255)->nullable();
            $table->string('metatitle',255)->nullable();
            $table->string('metadescription',255)->nullable();
            $table->string('configurations',255)->nullable();
            $table->enum('status',['Under Construction','Ready To Move','Sold'])->nullable();
            $table->string('rera_no',255)->nullable();
            $table->string('area',255)->nullable();
            $table->string('about_partner',2000)->nullable();
            $table->string('about_project',2000)->nullable();
            $table->string('why_choose',2000)->nullable();
            $table->string('specification',2000)->nullable();
            $table->string('amenities',2000)->nullable();
            $table->string('about_developer',255)->nullable();
            $table->string('map_location',255)->nullable();
            $table->enum('home_project',[0,1])->nullable();
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
