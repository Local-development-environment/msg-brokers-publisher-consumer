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
            $table->unsignedBigInteger('id')->primary();
            $table->unsignedBigInteger('stone_family_id');
            $table->timestamps();

            $table->foreign('id')->references('id')->on('jw_inserts.stones');
            $table->foreign('stone_family_id')->references('id')->on('jw_inserts.stone_families');
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
