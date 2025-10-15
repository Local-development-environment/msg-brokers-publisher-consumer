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
        Schema::create('jw_properties.bead_sizes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('length_name_id');
            $table->decimal('value', 4, 1)->unique();
            $table->string('unit')->default('см');
            $table->timestamps();

            $table->foreign('length_name_id')->references('id')->on('jw_properties.length_names')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_properties.bead_sizes');
    }
};
