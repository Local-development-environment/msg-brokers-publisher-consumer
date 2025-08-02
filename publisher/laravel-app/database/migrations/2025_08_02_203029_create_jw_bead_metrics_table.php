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
        Schema::create('properties.jw_bead_metrics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bead_size_id');
            $table->unsignedBigInteger('jw_bead_prop_id');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->timestamps();

            $table->foreign('bead_size_id')->references('id')->on('properties.bead_sizes');
            $table->foreign('jw_bead_prop_id')->references('id')->on('properties.jw_bead_props');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties.jw_bead_metrics');
    }
};
