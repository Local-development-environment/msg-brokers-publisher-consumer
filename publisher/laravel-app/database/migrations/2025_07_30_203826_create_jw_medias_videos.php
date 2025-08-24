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
        Schema::create('jw_medias.videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('video_media_id');
            $table->string('name');
            $table->boolean('is_active');
            $table->timestamps();

            $table->foreign('video_media_id')->references('id')->on('jw_medias.video_medias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_medias.videos');
    }
};
