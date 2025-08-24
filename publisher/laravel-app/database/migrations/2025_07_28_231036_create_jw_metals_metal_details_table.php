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
        Schema::create('jw_metals.metal_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('metal_id');
            $table->unsignedBigInteger('hallmark_id');
            $table->unsignedBigInteger('colour_id');
            $table->timestamps();

            $table->foreign('metal_id')->references('id')->on('jw_metals.metals');
            $table->foreign('hallmark_id')->references('id')->on('jw_metals.hallmarks');
            $table->foreign('colour_id')->references('id')->on('jw_metals.colours');

            $table->unique(['metal_id', 'hallmark_id', 'colour_id'], 'unique_jw_metals_metal_details');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_metals.metal_details');
    }
};
