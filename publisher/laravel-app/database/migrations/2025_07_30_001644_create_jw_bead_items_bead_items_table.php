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
        Schema::create('jw_bead_items.bead_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stone_id');
            $table->unsignedBigInteger('stone_treatment_id');
            $table->timestamps();

            $table->foreign('stone_id')->references('id')->on('jw_stones.stones');
            $table->foreign('stone_treatment_id')->references('id')->on('jw_stones.stone_treatments');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_bead_items.bead_items');
    }
};
