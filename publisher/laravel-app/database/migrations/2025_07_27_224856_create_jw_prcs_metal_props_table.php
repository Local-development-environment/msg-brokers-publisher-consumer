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
        Schema::create('metals.jw_prcs_metal_props', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prcs_metal_id');
            $table->unsignedBigInteger('prcs_metal_hallmark_id');
            $table->unsignedBigInteger('prcs_metal_colour_id');
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->timestamps();

            $table->foreign('prcs_metal_id')->references('id')->on('metals.prcs_metals');
            $table->foreign('prcs_metal_hallmark_id')->references('id')->on('metals.prcs_metal_hallmarks');
            $table->foreign('prcs_metal_colour_id')->references('id')->on('metals.prcs_metal_colours');

            $table->unique(['prcs_metal_id', 'prcs_metal_hallmark_id', 'prcs_metal_colour_id'], 'unique_jw_prcs_metal_props');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('metals.jw_prcs_metal_props');
    }
};
