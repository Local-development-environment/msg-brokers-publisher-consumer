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
        Schema::create('jw_medias.pictures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('picture_media_id');
            $table->string('name');
            $table->string('extension');
            $table->string('src');
            $table->string('alt')->nullable();
            $table->boolean('is_active')->default(false);
            $table->timestamps();

            $table->foreign('picture_media_id')->references('id')->on('jw_medias.picture_medias');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_medias.pictures');
    }
};
