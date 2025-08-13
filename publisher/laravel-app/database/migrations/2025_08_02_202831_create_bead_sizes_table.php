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
        Schema::create('properties.bead_sizes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('length_name_id');
            $table->decimal('value', 4, 1)->unique();
            $table->string('unit')->default('sm');
            $table->timestamps();

            $table->foreign('length_name_id')->references('id')->on('properties.length_names');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties.bead_sizes');
    }
};
