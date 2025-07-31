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
        Schema::create('medias.jw_pictures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jw_media_id');
            $table->timestamps();

            $table->foreign('jw_media_id')->references('id')->on('medias.jw_medias')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medias.jw_pictures');
    }
};
