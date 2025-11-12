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
        Schema::create('jw_metals.metals', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->unsignedBigInteger('metal_hallmark_id');
            $table->timestamps();

            $table->foreign('metal_hallmark_id')->references('id')->on('jw_metals.metal_hallmarks');
            $table->foreign('id')->references('id')->on('jewelleries.jewelleries');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_metals.metals');
    }
};
