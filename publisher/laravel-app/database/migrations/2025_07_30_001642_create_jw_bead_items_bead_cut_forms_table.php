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
        Schema::create('jw_bead_items.bead_cut_forms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bead_type_cut_id');
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->timestamps();

            $table->foreign('bead_type_cut_id')->references('id')->on('jw_bead_items.bead_type_cuts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_bead_items.bead_cut_forms');
    }
};
