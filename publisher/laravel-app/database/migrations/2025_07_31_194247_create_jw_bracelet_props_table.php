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
        Schema::create('properties.jw_bracelet_props', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jewellery_id')->unique();
            $table->unsignedBigInteger('jw_clasp_id');
            $table->unsignedBigInteger('body_part_id');
            $table->timestamps();

            $table->foreign('jewellery_id')->references('id')->on('jewelleries.jewelleries');
            $table->foreign('jw_clasp_id')->references('id')->on('properties.jw_clasps');
            $table->foreign('body_part_id')->references('id')->on('properties.body_parts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties.jw_bracelet_props');
    }
};
