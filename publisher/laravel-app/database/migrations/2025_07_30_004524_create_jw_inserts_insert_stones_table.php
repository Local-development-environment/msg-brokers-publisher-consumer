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
        Schema::create('jw_inserts.insert_stones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stone_id');
            $table->unsignedBigInteger('colour_id');
            $table->unsignedBigInteger('facet_id');
            $table->timestamps();

            $table->foreign('stone_id')->references('id')->on('jw_inserts.stones');
            $table->foreign('colour_id')->references('id')->on('jw_inserts.colours');
            $table->foreign('facet_id')->references('id')->on('jw_inserts.facets');

            $table->unique(['stone_id', 'colour_id', 'facet_id'], 'insert_stones_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_inserts.insert_stones');
    }
};
