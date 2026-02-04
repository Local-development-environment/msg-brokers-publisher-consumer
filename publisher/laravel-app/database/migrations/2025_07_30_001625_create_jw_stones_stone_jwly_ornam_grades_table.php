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
        Schema::create('jw_stones.stone_jwly_ornam_grades', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jwly_ornam_grade_id');
            $table->timestamps();

            $table->foreign('jwly_ornam_grade_id')->references('id')->on('jw_stones.stone_jwly_ornam_grades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_stones.stone_jwly_ornam_grades');
    }
};
