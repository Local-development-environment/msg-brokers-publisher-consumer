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
        Schema::create('jw_stones.stone_natural_families', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stone_family_id');
            $table->timestamps();

            $table->foreign('stone_family_id')->references('id')->on('jw_stones.stone_families');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_stones.stone_natural_families');
    }
};
