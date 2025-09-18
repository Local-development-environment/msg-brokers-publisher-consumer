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
        Schema::create('jw_users.users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('gender_id');
            $table->unsignedBigInteger('phone_id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->boolean('is_active');
            $table->timestamps();

            $table->foreign('gender_id')->references('id')->on('jw_users.genders');
            $table->foreign('phone_id')->references('id')->on('jw_users.user_phones');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_users.users');
    }
};
