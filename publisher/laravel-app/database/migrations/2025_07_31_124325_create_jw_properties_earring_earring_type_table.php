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
        Schema::create('jw_properties.earring_earring_type', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('earring_id')->unique();
            $table->unsignedBigInteger('earring_type_id');
            $table->timestamps();

            $table->foreign('earring_id')->references('id')->on('jw_properties.earrings');
            $table->foreign('earring_type_id')->references('id')->on('jw_properties.earring_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_properties.earring_earring_type');
    }
};
