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
        Schema::create('properties.jw_earring_props', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jewellery_id');
            $table->unsignedBigInteger('earring_clasp_id');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->timestamps();

            $table->foreign('jewellery_id')->references('id')->on('jewelleries.jewelleries');
            $table->foreign('earring_clasp_id')->references('id')->on('properties.earring_clasps');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties.jw_earring_props');
    }
};
