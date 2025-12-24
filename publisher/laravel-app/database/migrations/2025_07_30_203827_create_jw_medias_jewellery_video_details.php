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
        Schema::create('jw_medias.jewellery_video_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('video_type_id');
            $table->unsignedBigInteger('jewellery_video_id');
            $table->string('src');
            $table->timestamps();

            $table->foreign('video_type_id')->references('id')->on('jw_medias.video_types');
            $table->foreign('jewellery_video_id')->references('id')->on('jw_medias.jewellery_videos');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_medias.jewellery_video_details');
    }
};
