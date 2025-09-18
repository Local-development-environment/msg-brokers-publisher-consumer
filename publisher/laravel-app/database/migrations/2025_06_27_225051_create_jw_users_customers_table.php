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
        Schema::create('jw_users.customers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('auth_user_id');
            $table->string('personal_email');
            $table->string('password');
            $table->date('birthday');
            $table->timestamps();

            $table->foreign('auth_user_id')->references('id')->on('jw_users.auth_users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_users.customers');
    }
};
