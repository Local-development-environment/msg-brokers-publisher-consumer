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
        Schema::create('jw_properties.necklaces', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->unsignedBigInteger('clasp_id');
            $table->timestamps();

            $table->foreign('id')->references('id')->on('jewelleries.jewelleries')->cascadeOnDelete();
            $table->foreign('clasp_id')->references('id')->on('jw_properties.clasps')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_properties.necklaces');
    }
};
