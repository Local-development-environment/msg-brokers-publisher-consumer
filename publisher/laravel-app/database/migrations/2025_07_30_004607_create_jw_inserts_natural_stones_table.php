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
        Schema::create('jw_inserts.natural_stones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stone_id');
            $table->unsignedBigInteger('stone_group_id');
            $table->unsignedBigInteger('stone_grade_id');
            $table->unsignedBigInteger('stone_family_id');
            $table->timestamps();

            $table->foreign('stone_id')->references('id')->on('jw_inserts.stones');
            $table->foreign('stone_group_id')->references('id')->on('jw_inserts.stone_groups');
            $table->foreign('stone_grade_id')->references('id')->on('jw_inserts.stone_grades');
            $table->foreign('stone_family_id')->references('id')->on('jw_inserts.stone_families');

            $table->unique(['stone_id', 'stone_group_id', 'stone_family_id', 'stone_grade_id'], 'natural_stones_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_inserts.natural_stones');
    }
};
