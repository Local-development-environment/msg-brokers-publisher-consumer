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
        Schema::create('jw_properties.chain_metrics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chain_size_id');
            $table->unsignedBigInteger('chain_id');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->timestamps();

            $table->foreign('chain_size_id')->references('id')->on('jw_properties.chain_sizes')->cascadeOnDelete();
            $table->foreign('chain_id')->references('id')->on('jw_properties.chains')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_properties.chain_metrics');
    }
};
