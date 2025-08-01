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
        Schema::create('inserts.stones', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stone_type_id');
            $table->string('name')->unique();
            $table->string('description');
            $table->string('slug')->unique();
            $table->boolean('is_natural');
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->foreign('stone_type_id')->references('id')->on('inserts.stone_types');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inserts.stones');
    }
};
