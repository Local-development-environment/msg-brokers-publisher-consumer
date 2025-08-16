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
        Schema::create('jw_inserts.optical_effect_stone', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('optical_effect_id');
            $table->unsignedBigInteger('stone_id')->unique();
            $table->timestamps();

            $table->foreign('optical_effect_id')->references('id')->on('jw_inserts.optical_effects');
            $table->foreign('stone_id')->references('id')->on('jw_inserts.stones');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_inserts.optical_effect_stone');
    }
};
