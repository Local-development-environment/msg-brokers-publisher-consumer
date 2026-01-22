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
        Schema::create('jw_properties.brooches', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->unsignedBigInteger('brooch_clasp_id');
            $table->unsignedBigInteger('brooch_type_id');
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->jsonb('dimensions');
            $table->timestamps();

            $table->foreign('id')->references('id')->on('jewelleries.jewelleries');
            $table->foreign('brooch_clasp_id')->references('id')->on('jw_properties.brooch_clasps');
            $table->foreign('brooch_type_id')->references('id')->on('jw_properties.brooch_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_properties.brooches');
    }
};
