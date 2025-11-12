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
        Schema::create('jw_coverings.covering_exteriors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('covering_type_id');
            $table->string('name');
            $table->string('slug');
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->foreign('covering_type_id')->references('id')->on('jw_coverings.covering_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_coverings.covering_exteriors');
    }
};
