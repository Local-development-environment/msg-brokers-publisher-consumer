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
        Schema::create('properties.jw_bracelet_weavings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bracelet_weaving_id');
            $table->unsignedBigInteger('jw_bracelet_prop_id');
            $table->string('fullness');
            $table->float('diameter', 3, 2);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties.jw_bracelet_weavings');
    }
};
