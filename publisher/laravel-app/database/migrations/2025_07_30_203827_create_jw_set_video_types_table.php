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
        Schema::create('medias.jw_set_video_types', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('video_type_id');
            $table->unsignedBigInteger('jw_set_video_id');
            $table->string('src');
            $table->timestamps();

            $table->foreign('video_type_id')->references('id')->on('medias.video_types');
            $table->foreign('jw_set_video_id')->references('id')->on('medias.jw_set_videos');

            $table->unique(['video_type_id', 'jw_set_video_id'], 'unique_jw_set_video_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medias.jw_set_video_types');
    }
};
