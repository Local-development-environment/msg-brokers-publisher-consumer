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
        Schema::create('jw_inserts.stone_exteriors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stone_id');
            $table->unsignedBigInteger('stone_colour_id');
            $table->unsignedBigInteger('facet_id');
            $table->timestamps();

            $table->foreign('stone_id')->references('id')->on('jw_inserts.stones');
            $table->foreign('stone_colour_id')->references('id')->on('jw_inserts.stone_colours');
            $table->foreign('facet_id')->references('id')->on('jw_inserts.facets');

            $table->unique(['stone_id', 'stone_colour_id', 'facet_id'], 'stone_exteriors_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_inserts.stone_exteriors');
    }
};
