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
                    jue.user_user_type_id,
                    jue.employee_email,
                    jue.employee_phone,
                    jue.password,
                    jue.birthday,
                    jue.experience,
                    jue.position,
                    juut.name as user_type,
                    juu.first_name,
                    juu.middle_name,
                    juu.last_name,
                    juu.register_phone_id,
                    rp.phone as personal_phone,
                    g.name as gender
                from
                jw_users.employees as jue
                join jw_users.user_user_type as uut on jue.user_user_type_id = uut.id
                join jw_users.user_types as juut on uut.user_type_id = juut.id
                join jw_users.users as juu on uut.user_id = juu.id
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
        DB::statement('DROP VIEW jw_users.v_employees;');
    }
};
