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
        Schema::create('jw_properties.bead_metrics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bead_size_id');
            $table->unsignedBigInteger('bead_id');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->timestamps();

            $table->foreign('bead_size_id')->references('id')->on('jw_properties.bead_sizes')->cascadeOnDelete();
            $table->foreign('bead_id')->references('id')->on('jw_properties.beads')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_properties.bead_metrics');
    }
};
