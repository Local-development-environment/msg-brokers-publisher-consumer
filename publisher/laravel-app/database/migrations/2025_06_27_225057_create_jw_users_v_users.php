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
                CREATE VIEW jw_users.v_users AS
                    select
                        juu.id,
                        juu.first_name,
                        juu.middle_name,
                        juu.last_name,
                        juu.register_phone_id,
                        jug.name as gender,
                        jurp.phone,
                        -- c.personal_email,
                        jsonb_agg(
                            case
                                when a.admin_email notnull then
                                    jsonb_build_object(
                                        'type', juut.name,
                                        'admin_email', a.admin_email,
                                        'admin_phone', a.admin_phone,
                                        'personal_phone', jurp.phone
                                    )
                                when c.personal_email notnull then
                                    jsonb_build_object(
                                        'type', juut.name,
                                        'personal_email', c.personal_email,
                                        'personal_phone', jurp.phone,
                                        'birthday', c.birthday
                                    )
                                when e.employee_email notnull then
                                    jsonb_build_object(
                                        'type', juut.name,
                                        'employee_email', e.employee_email,
                                        'employee_phone', e.employee_phone,
                                        'personal_phone', jurp.phone,
                                        'birthday', e.birthday,
                                        'experience', e.experience,
                                        'position', e.position
                                    )
                                end
                        ) as type
                        from
                        jw_users.users as juu
                        join jw_users.genders as jug on juu.gender_id = jug.id
                        join jw_users.register_phones as jurp on juu.register_phone_id = jurp.id
                        left join jw_users.user_user_type as uut on juu.id = uut.user_id
                        left join jw_users.user_types as juut on uut.user_type_id = juut.id
                        left join jw_users.admins a on uut.id = a.user_user_type_id
                        left join jw_users.customers c on uut.id = c.user_user_type_id
                        left join jw_users.employees e on uut.id = e.user_user_type_id
                        group by juu.id,jug.name,jurp.phone
            SQL
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::statement('DROP VIEW jw_users.v_users;');
    }
};
