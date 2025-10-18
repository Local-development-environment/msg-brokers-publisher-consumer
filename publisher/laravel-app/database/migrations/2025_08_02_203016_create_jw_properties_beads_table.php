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
        Schema::create('jw_properties.beads', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->unsignedBigInteger('clasp_id');
            $table->unsignedBigInteger('bead_base_id');
            $table->timestamps();

            $table->foreign('id')->references('id')->on('jewelleries.jewelleries')->cascadeOnDelete();
            $table->foreign('clasp_id')->references('id')->on('jw_properties.clasps')->cascadeOnDelete();
            $table->foreign('bead_base_id')->references('id')->on('jw_properties.bead_bases')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_properties.beads');
    }
};
