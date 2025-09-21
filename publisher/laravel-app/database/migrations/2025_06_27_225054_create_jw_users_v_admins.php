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
        DB::statement(
            <<<'SQL'
                CREATE VIEW jw_users.v_admins AS
                select
                    jua.id,
                    jua.auth_user_id,
                    jua.admin_email,
                    jua.admin_phone,
                    jua.password,
                    juut.name as type,
                    juu.first_name,
                    juu.middle_name,
                    juu.last_name,
                    juu.register_phone_id,
                    rp.phone as register_phone,
                    g.name as gender
                from
                jw_users.admins as jua
                join jw_users.auth_users as juau on jua.auth_user_id = juau.id
                join jw_users.user_types as juut on juau.user_type_id = juut.id
                join jw_users.users as juu on juau.user_id = juu.id
                join jw_users.register_phones rp on juu.register_phone_id = rp.id
                join jw_users.genders g on juu.gender_id = g.id
            SQL
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW jw_users.v_admins;');
    }
};
