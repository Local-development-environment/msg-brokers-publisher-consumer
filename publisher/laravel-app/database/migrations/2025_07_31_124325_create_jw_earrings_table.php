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
        Schema::create('properties.jw_earrings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jw_earring_prop_id')->unique();
            $table->unsignedBigInteger('earring_type_id')->unique();
            $table->timestamps();

            $table->foreign('jw_earring_prop_id')->references('id')->on('properties.jw_earring_props');
            $table->foreign('earring_type_id')->references('id')->on('properties.earring_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties.jw_earrings');
    }
};
