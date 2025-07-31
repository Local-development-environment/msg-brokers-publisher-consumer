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
        Schema::create('jewelleries.jewelleries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jw_prcs_metal_prop_id');
            $table->unsignedBigInteger('jw_category_id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('part_number')->unique();
            $table->string('approx_weight');
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->foreign('jw_prcs_metal_prop_id')->references('id')->on('metals.jw_prcs_metal_props');
            $table->foreign('jw_category_id')->references('id')->on('jewelleries.jw_categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jewelleries.jewelleries');
    }
};
