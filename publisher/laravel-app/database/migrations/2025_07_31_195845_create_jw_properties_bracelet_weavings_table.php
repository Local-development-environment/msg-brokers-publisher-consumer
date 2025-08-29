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
        Schema::create('jw_properties.bracelet_weavings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('weaving_id');
            $table->unsignedBigInteger('bracelet_id');
            $table->string('fullness');
            $table->float('diameter', 3, 2);
            $table->timestamps();

            $table->foreign('weaving_id')->references('id')->on('jw_properties.weavings')->cascadeOnDelete();
            $table->foreign('bracelet_id')->references('id')->on('jw_properties.bracelets')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_properties.bracelet_weavings');
    }
};
