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
        Schema::create('promotions.jewellery_jw_promotion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jewellery_id');
            $table->unsignedBigInteger('jw_promotion_id');
            $table->smallInteger('priority');
            $table->dateTime('start');
            $table->dateTime('end');
            $table->timestamps();

            $table->foreign('jewellery_id')->references('id')->on('jewelleries.jewelleries');
            $table->foreign('jw_promotion_id')->references('id')->on('promotions.jw_promotions');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promotions.jewellery_jw_promotion');
    }
};
