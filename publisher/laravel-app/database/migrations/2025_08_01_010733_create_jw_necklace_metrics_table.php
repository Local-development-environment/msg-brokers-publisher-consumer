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
        Schema::create('properties.jw_necklace_metrics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('necklace_size_id');
            $table->unsignedBigInteger('jw_necklace_prop_id');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->timestamps();

            $table->foreign('necklace_size_id')->references('id')->on('properties.necklace_sizes');
            $table->foreign('jw_necklace_prop_id')->references('id')->on('properties.jw_necklace_props');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties.jw_necklace_metrics');
    }
};
