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
        Schema::create('jw_properties.bracelets', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jewellery_id')->unique();
            $table->unsignedBigInteger('clasp_id');
            $table->unsignedBigInteger('body_part_id');
            $table->unsignedBigInteger('bracelet_base_id');
            $table->timestamps();

            $table->foreign('jewellery_id')->references('id')->on('jewelleries.jewelleries')->cascadeOnDelete();
            $table->foreign('clasp_id')->references('id')->on('jw_properties.clasps')->cascadeOnDelete();
            $table->foreign('body_part_id')->references('id')->on('jw_properties.body_parts')->cascadeOnDelete();
            $table->foreign('bracelet_base_id')->references('id')->on('jw_properties.bracelet_bases')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_properties.bracelets');
    }
};
