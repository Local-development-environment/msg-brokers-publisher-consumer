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
        Schema::create('jw_inserts.imitation_stones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stone_id')->unique();
            $table->timestamps();

            $table->foreign('stone_id')->references('id')->on('jw_inserts.stones');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_inserts.imitation_stones');
    }
};
