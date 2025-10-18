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
        Schema::create('jw_properties.necklace_metrics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('neck_size_id');
            $table->unsignedBigInteger('necklace_id');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->timestamps();

            $table->foreign('neck_size_id')->references('id')->on('jw_properties.neck_sizes')->cascadeOnDelete();
            $table->foreign('necklace_id')->references('id')->on('jw_properties.necklaces')->cascadeOnDelete();

            $table->unique(['neck_size_id', 'necklace_id'],'unique_neck_size_necklace');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_properties.necklace_metrics');
    }
};
