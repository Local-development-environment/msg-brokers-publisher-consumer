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
        Schema::create('jw_properties.ring_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ring_type_id');
            $table->unsignedBigInteger('ring_id');
            $table->timestamps();

            $table->foreign('ring_type_id')->references('id')->on('jw_properties.ring_types');
            $table->foreign('ring_id')->references('id')->on('jw_properties.rings');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_properties.ring_details');
    }
};
