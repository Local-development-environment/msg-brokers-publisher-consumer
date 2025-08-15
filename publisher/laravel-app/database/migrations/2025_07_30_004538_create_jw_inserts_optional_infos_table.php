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
        Schema::create('jw_inserts.optional_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('metric_id')->unique();
            $table->json('info');
            $table->timestamps();

            $table->foreign('metric_id')->references('id')->on('jw_inserts.metrics');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_inserts.optional_infos');
    }
};
