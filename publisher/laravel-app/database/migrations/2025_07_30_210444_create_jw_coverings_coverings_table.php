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
        Schema::create('jw_coverings.coverings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jewellery_id');
            $table->unsignedBigInteger('covering_type_id');
            $table->unsignedBigInteger('covering_shade_id');
            $table->timestamps();

            $table->foreign('jewellery_id')->references('id')->on('jewelleries.jewelleries');
            $table->foreign('covering_type_id')->references('id')->on('jw_coverings.covering_types');
            $table->foreign('covering_shade_id')->references('id')->on('jw_coverings.covering_shades');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_coverings.coverings');
    }
};
