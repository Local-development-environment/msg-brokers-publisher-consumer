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
        Schema::create('jw_inserts.grown_stones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stone_id');
            $table->unsignedBigInteger('stone_family_id');
            $table->timestamps();

            $table->foreign('stone_id')->references('id')->on('jw_inserts.stones');
            $table->foreign('stone_family_id')->references('id')->on('jw_inserts.stone_families');

            $table->unique(['stone_id', 'stone_family_id'], 'grown_stones_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_inserts.grown_stones');
    }
};
