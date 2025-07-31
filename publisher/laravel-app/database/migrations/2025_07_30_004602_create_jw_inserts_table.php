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
        Schema::create('inserts.jw_inserts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('jewellery_id');
            $table->unsignedBigInteger('insert_visual_detail_id');
            $table->unsignedBigInteger('jw_insert_metric_id');
            $table->timestamps();

            $table->foreign('jewellery_id')->references('id')->on('jewelleries.jewelleries');
            $table->foreign('insert_visual_detail_id')->references('id')->on('inserts.insert_visual_details');
            $table->foreign('jw_insert_metric_id')->references('id')->on('inserts.jw_insert_metrics');

            $table->unique(['jewellery_id', 'insert_visual_detail_id', 'jw_insert_metric_id'],'jw_inserts_unique');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inserts.jw_inserts');
    }
};
