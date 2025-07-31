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
        Schema::create('inserts.insert_visual_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stone_id');
            $table->unsignedBigInteger('stone_colour_id');
            $table->unsignedBigInteger('stone_shape_id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->timestamps();

            $table->foreign('stone_id')->references('id')->on('inserts.stones');
            $table->foreign('stone_colour_id')->references('id')->on('inserts.stone_colours');
            $table->foreign('stone_shape_id')->references('id')->on('inserts.stone_shapes');

            $table->unique(['stone_id', 'stone_colour_id', 'stone_shape_id'], 'visual_details_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inserts.insert_visual_details');
    }
};
