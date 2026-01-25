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
        Schema::create('jw_properties.rings', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->unsignedBigInteger('ring_finger_id');
            $table->unsignedBigInteger('ring_type_id');
            $table->jsonb('dimensions');
            $table->timestamps();

            $table->foreign('id')->references('id')->on('jewelleries.jewelleries');
            $table->foreign('ring_finger_id')->references('id')->on('jw_properties.ring_fingers');
            $table->foreign('ring_type_id')->references('id')->on('jw_properties.ring_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_properties.rings');
    }
};
