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
//        DB::statement('CREATE SCHEMA public');
        DB::statement('CREATE SCHEMA inserts');
        DB::statement('CREATE SCHEMA jewelleries');
        DB::statement('CREATE SCHEMA metals');
        DB::statement('CREATE SCHEMA medias');
        DB::statement('CREATE SCHEMA properties');
        DB::statement('CREATE SCHEMA coverages');
        DB::statement('CREATE SCHEMA promotions');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP SCHEMA IF EXISTS inserts CASCADE');
        DB::statement('DROP SCHEMA IF EXISTS jewelleries CASCADE');
        DB::statement('DROP SCHEMA IF EXISTS metals CASCADE');
        DB::statement('DROP SCHEMA IF EXISTS medias CASCADE');
        DB::statement('DROP SCHEMA IF EXISTS properties CASCADE');
        DB::statement('DROP SCHEMA IF EXISTS coverages CASCADE');
        DB::statement('DROP SCHEMA IF EXISTS promotions CASCADE');
    }
};
