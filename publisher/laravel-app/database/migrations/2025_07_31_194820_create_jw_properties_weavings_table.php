<?php

use Domain\Inserts\InsertMetrics\Enums\InsertMetricEnum;
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
        Schema::create('jw_properties.weavings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('base_weaving_id');
            $table->string('name')->unique();
            $table->text('description');
            $table->string('slug')->unique();
            $table->timestamps();

            $table->foreign('base_weaving_id')->references('id')->on('jw_properties.base_weavings');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_properties.weavings');
    }
};
