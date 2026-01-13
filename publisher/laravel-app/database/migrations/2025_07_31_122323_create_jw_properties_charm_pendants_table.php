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
        Schema::create('jw_properties.charm_pendants', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->integer('quantity');
            $table->decimal('price', 10, 2);
            $table->jsonb('dimensions');
            $table->timestamps();

            $table->foreign('id')->references('id')->on('jewelleries.jewelleries');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_properties.charm_pendants');
    }
};
