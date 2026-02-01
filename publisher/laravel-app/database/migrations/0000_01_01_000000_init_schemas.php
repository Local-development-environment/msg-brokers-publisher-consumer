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
        DB::statement('CREATE SCHEMA jw_inserts');
        DB::statement('CREATE SCHEMA jewelleries');
        DB::statement('CREATE SCHEMA jw_metals');
        DB::statement('CREATE SCHEMA jw_medias');
        DB::statement('CREATE SCHEMA jw_properties');
        DB::statement('CREATE SCHEMA jw_promotions');
        DB::statement('CREATE SCHEMA jw_views');
        DB::statement('CREATE SCHEMA jw_users');
        DB::statement('CREATE SCHEMA spatie');
        DB::statement('CREATE SCHEMA jw_stones');
        DB::statement('CREATE SCHEMA jw_stone_exteriors');
        DB::statement('CREATE SCHEMA jw_bead_items');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP SCHEMA IF EXISTS jw_inserts CASCADE');
        DB::statement('DROP SCHEMA IF EXISTS jewelleries CASCADE');
        DB::statement('DROP SCHEMA IF EXISTS jw_metals CASCADE');
        DB::statement('DROP SCHEMA IF EXISTS jw_medias CASCADE');
        DB::statement('DROP SCHEMA IF EXISTS jw_properties CASCADE');
        DB::statement('DROP SCHEMA IF EXISTS jw_promotions CASCADE');
        DB::statement('DROP SCHEMA IF EXISTS jw_views CASCADE');
        DB::statement('DROP SCHEMA IF EXISTS jw_users CASCADE');
        DB::statement('DROP SCHEMA IF EXISTS spatie CASCADE');
        DB::statement('DROP SCHEMA IF EXISTS jw_stones CASCADE');
        DB::statement('DROP SCHEMA IF EXISTS jw_stone_exteriors CASCADE');
        DB::statement('DROP SCHEMA IF EXISTS jw_bead_items CASCADE');
    }
};
