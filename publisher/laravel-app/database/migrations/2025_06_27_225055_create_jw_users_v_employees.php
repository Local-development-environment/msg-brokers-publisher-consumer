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
                CREATE VIEW jw_users.v_employees AS
                select
                    jue.id,
                    jue.auth_user_id,
                    jue.work_email,
                    jue.work_phone,
                    jue.password,
                    jue.birthday,
                    jue.experience,
                    jue.position,
                    juut.name as user_type,
                    juu.first_name,
                    juu.middle_name,
                    juu.last_name,
                    up.phone as personal_phone,
                    g.name as gender
                from
                jw_users.employees as jue
                join jw_users.auth_users as juau on jue.auth_user_id = juau.id
                join jw_users.user_types as juut on juau.user_type_id = juut.id
                join jw_users.users as juu on juau.user_id = juu.id
                join jw_users.user_phones up on juu.phone_id = up.id
                join jw_users.genders g on juu.gender_id = g.id
            SQL
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW jw_users.v_employees;');
    }
};
