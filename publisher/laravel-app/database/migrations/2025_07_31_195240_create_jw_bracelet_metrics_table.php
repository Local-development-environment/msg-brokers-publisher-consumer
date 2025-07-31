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
        Schema::create('properties.jw_bracelet_metrics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bracelet_size_id');
            $table->unsignedBigInteger('jw_bracelet_prop_id');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->timestamps();

            $table->foreign('bracelet_size_id')->references('id')->on('properties.bracelet_sizes');
            $table->foreign('jw_bracelet_prop_id')->references('id')->on('properties.jw_bracelet_props');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties.jw_bracelet_metrics');
    }
};
