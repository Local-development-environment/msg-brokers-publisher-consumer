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
        Schema::create('jw_inserts.stone_item_grades', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->unsignedBigInteger('stone_grade_id')->index();
            $table->timestamps();

            $table->foreign('stone_grade_id')->references('id')->on('jw_inserts.stone_grades');
            $table->foreign('id')->references('id')->on('jw_inserts.group_grades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_inserts.stone_item_grades');
    }
};
