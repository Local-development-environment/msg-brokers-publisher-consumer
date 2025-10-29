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
            $table->unsignedInteger('id')->primary();
            $table->string('extension');
            $table->string('src');
            $table->string('alt');
            $table->timestamps();

            $table->foreign('id')->references('id')->on('jw_medias.medias');
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
