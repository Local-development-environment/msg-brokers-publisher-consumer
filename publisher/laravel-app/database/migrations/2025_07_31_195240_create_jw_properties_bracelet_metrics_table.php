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
        Schema::create('jw_properties.bracelet_metrics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bracelet_size_id');
            $table->unsignedBigInteger('bracelet_id');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->timestamps();

            $table->foreign('bracelet_size_id')->references('id')->on('jw_properties.bracelet_sizes')->cascadeOnDelete();
            $table->foreign('bracelet_id')->references('id')->on('jw_properties.bracelets')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_properties.bracelet_metrics');
    }
};
