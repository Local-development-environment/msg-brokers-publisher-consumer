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
        Schema::create('jw_inserts.stone_optical_effects', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->unsignedBigInteger('optical_effect_id');
            $table->timestamps();

            $table->foreign('optical_effect_id')->references('id')->on('jw_inserts.optical_effects');
            $table->foreign('id')->references('id')->on('jw_inserts.stones');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_inserts.stone_optical_effects');
    }
};
