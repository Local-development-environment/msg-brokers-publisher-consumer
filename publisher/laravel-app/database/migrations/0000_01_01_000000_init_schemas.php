<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement('CREATE SCHEMA inserts');
        DB::statement('CREATE SCHEMA jewelleries');
        DB::statement('CREATE SCHEMA metals');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP SCHEMA IF EXISTS inserts CASCADE');
        DB::statement('DROP SCHEMA IF EXISTS jewelleries CASCADE');
        DB::statement('DROP SCHEMA IF EXISTS metals CASCADE');
    }
};
