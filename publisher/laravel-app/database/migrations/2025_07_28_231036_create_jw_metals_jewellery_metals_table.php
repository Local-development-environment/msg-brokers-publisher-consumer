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
        Schema::create('jw_metals.jewellery_metals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jewellery_id');
            $table->unsignedBigInteger('precious_metal_id');
            $table->unsignedBigInteger('hallmark_id');
            $table->timestamps();

            $table->foreign('precious_metal_id')->references('id')->on('jw_metals.precious_metals');
            $table->foreign('hallmark_id')->references('id')->on('jw_metals.hallmarks');
            $table->foreign('jewellery_id')->references('id')->on('jewelleries.jewelleries');

            $table->unique(['precious_metal_id', 'hallmark_id', 'jewellery_id'], 'unique_jewellery_metals');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_metals.jewellery_metals');
    }
};
