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
        Schema::create('jw_inserts.stones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('type_origin_id');
            $table->string('name')->unique();
            $table->string('alt_name');
            $table->string('description');
            $table->string('slug')->unique();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->foreign('type_origin_id')->references('id')->on('jw_inserts.type_origins');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_inserts.stones');
    }
};
