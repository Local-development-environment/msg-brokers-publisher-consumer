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
        Schema::create('jw_metals.colour_combinations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('golden_colour_id');
            $table->unsignedBigInteger('metal_id');
            $table->timestamps();

            $table->foreign('golden_colour_id')->references('id')->on('jw_metals.golden_colours');
            $table->foreign('metal_id')->references('id')->on('jw_metals.metals');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_metals.colour_combinations');
    }
};
