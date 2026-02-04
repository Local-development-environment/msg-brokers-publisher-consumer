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
        Schema::create('jw_stone_exteriors.stone_type_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stone_type_cut_id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->timestamps();

            $table->foreign('stone_type_cut_id')->references('id')->on('jw_stone_exteriors.stone_type_cuts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_stone_exteriors.stone_type_forms');
    }
};
