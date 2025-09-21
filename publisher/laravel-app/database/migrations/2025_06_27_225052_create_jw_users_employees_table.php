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
        Schema::create('jw_users.employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_user_type_id');
            $table->string('employee_email');
            $table->string('employee_phone');
            $table->string('password');
            $table->date('birthday');
            $table->integer('experience');
            $table->string('position');
            $table->timestamps();

            $table->foreign('user_user_type_id')->references('id')->on('jw_users.user_user_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jw_users.employees');
    }
};
