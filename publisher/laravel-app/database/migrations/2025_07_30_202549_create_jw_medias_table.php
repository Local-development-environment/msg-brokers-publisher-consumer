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
        Schema::create('medias.jw_medias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jewellery_id');
            $table->unsignedBigInteger('jw_media_category_id');
            $table->unsignedBigInteger('jw_media_producer_id');
            $table->timestamps();

            $table->foreign('jewellery_id')->references('id')->on('jewelleries.jewelleries');
            $table->foreign('jw_media_category_id')->references('id')->on('medias.jw_media_categories');
            $table->foreign('jw_media_producer_id')->references('id')->on('medias.jw_media_producers');

            $table->unique(['jewellery_id', 'jw_media_category_id', 'jw_media_producer_id'], 'unique_jw_medias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medias.jw_medias');
    }
};
