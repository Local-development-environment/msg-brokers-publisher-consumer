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
        Schema::create('jw_medias.media_catalog', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jewellery_id');
            $table->unsignedBigInteger('media_type_id');
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->boolean('is_active');
            $table->timestamps();

            $table->foreign('jewellery_id')->references('id')->on('jewelleries.jewelleries');
            $table->foreign('media_type_id')->references('id')->on('jw_medias.media_types');
            $table->foreign('id')->references('id')->on('jw_medias.jewellery_videos');
            $table->foreign('id')->references('id')->on('jw_medias.jewellery_pictures');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_medias.media_catalog');
    }
};
