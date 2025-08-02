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
        Schema::create('properties.jw_bead_props', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jewellery_id')->unique();
            $table->unsignedBigInteger('jw_clasp_id');
            $table->unsignedBigInteger('bead_base_id');
            $table->timestamps();

            $table->foreign('jewellery_id')->references('id')->on('jewelleries.jewelleries');
            $table->foreign('jw_clasp_id')->references('id')->on('properties.jw_clasps');
            $table->foreign('bead_base_id')->references('id')->on('properties.bead_bases');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties.jw_bead_props');
    }
};
