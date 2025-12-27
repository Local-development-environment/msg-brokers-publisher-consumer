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
        Schema::create('jw_medias.review_pictures', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->string('alt_name');
            $table->string('src');
            $table->string('extension');
            $table->boolean('is_active');
            $table->timestamps();

            $table->foreign('id')->references('id')->on('jw_medias.media_reviews');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_medias.review_pictures');
    }
};
