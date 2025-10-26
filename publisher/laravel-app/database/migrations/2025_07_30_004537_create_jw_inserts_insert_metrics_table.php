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
        Schema::create('jw_inserts.insert_metrics', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary();
            $table->integer('quantity');
            $table->decimal('weight', 8, 3);
            $table->string('unit')->default('карат');
            $table->jsonb('dimensions');
            $table->timestamps();

            $table->foreign('id')->references('id')->on('jw_inserts.inserts');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_inserts.insert_metrics');
    }
};
