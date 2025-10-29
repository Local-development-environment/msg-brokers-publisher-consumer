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
        Schema::create('jw_medias.medias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jewellery_id');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('producer_id');
            $table->string('name');
            $table->boolean('is_active');
            $table->timestamps();

            $table->foreign('jewellery_id')->references('id')->on('jewelleries.jewelleries');
            $table->foreign('category_id')->references('id')->on('jw_medias.categories');
            $table->foreign('producer_id')->references('id')->on('jw_medias.producers');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_medias.medias');
    }
};
