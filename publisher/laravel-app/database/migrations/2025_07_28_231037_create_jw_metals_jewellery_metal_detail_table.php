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
        Schema::create('jw_metals.jewellery_metal_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('metal_detail_id');
            $table->unsignedBigInteger('jewellery_id');
            $table->timestamps();

            $table->foreign('metal_detail_id')->references('id')->on('jw_metals.metal_details');
            $table->foreign('jewellery_id')->references('id')->on('jewelleries.jewelleries');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_metals.jewellery_metal_detail');
    }
};
