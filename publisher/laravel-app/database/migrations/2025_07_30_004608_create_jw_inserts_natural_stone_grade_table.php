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
        Schema::create('jw_inserts.natural_stone_grade', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('natural_stone_id')->unique();
            $table->unsignedBigInteger('stone_grade_id');
            $table->timestamps();

            $table->foreign('natural_stone_id')->references('id')->on('jw_inserts.natural_stones');
            $table->foreign('stone_grade_id')->references('id')->on('jw_inserts.stone_grades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_inserts.natural_stone_grade');
    }
};
