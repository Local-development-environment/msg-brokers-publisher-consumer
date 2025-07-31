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
        Schema::create('medias.jw_set_videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jw_video_id');
            $table->string('name');
            $table->boolean('is_active');
            $table->timestamps();

            $table->foreign('jw_video_id')->references('id')->on('medias.jw_videos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medias.jw_set_videos');
    }
};
