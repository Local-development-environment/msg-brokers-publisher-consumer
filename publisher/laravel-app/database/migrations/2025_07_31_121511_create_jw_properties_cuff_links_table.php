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
        Schema::create('jw_properties.cuff_links', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->unsignedBigInteger('cuff_link_form_id');
            $table->unsignedBigInteger('cuff_link_clasp_id');
            $table->unsignedBigInteger('cuff_link_type_id');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->jsonb('dimensions');
            $table->timestamps();

            $table->foreign('id')->references('id')->on('jewelleries.jewelleries');
            $table->foreign('cuff_link_form_id')->references('id')->on('jw_properties.cuff_link_forms');
            $table->foreign('cuff_link_clasp_id')->references('id')->on('jw_properties.cuff_link_clasps');
            $table->foreign('cuff_link_type_id')->references('id')->on('jw_properties.cuff_link_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_properties.cuff_links');
    }
};
