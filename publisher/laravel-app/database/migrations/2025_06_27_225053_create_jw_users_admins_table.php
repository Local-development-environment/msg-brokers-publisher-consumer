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
        Schema::create('jw_users.admins', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('auth_user_id')->index();
            $table->string('work_email');
            $table->string('work_phone');
            $table->string('password');
            $table->timestamps();

            $table->foreign('auth_user_id')->references('id')->on('jw_users.auth_users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_users.admins');
    }
};
