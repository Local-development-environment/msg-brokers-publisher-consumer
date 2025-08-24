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
        Schema::create('jw_medias.picture_medias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('media_id');
            $table->timestamps();

            $table->foreign('media_id')->references('id')->on('jw_medias.medias')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_medias.picture_medias');
    }
};
