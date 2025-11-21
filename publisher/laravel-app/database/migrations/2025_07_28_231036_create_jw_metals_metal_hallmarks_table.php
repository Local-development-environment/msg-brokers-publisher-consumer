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
        Schema::create('jw_metals.metal_hallmarks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('metal_type_id');
            $table->unsignedBigInteger('hallmark_id');
            $table->timestamps();

            $table->foreign('metal_type_id')->references('id')->on('jw_metals.metal_types');
            $table->foreign('hallmark_id')->references('id')->on('jw_metals.hallmarks');

            $table->unique(['metal_type_id', 'hallmark_id'], 'unique_metal_hallmarks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_metals.metal_hallmarks');
    }
};
