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
                        jug.name as gender,
                        jup.phone,
                        -- c.personal_email,
                        jsonb_agg(
                            case
                                when a.work_email notnull then
                                    jsonb_build_object(
                                        'type', juut.name,
                                        'admin_email', a.work_email,
                                        'work_phone', a.work_phone,
                                        'personal_phone', jup.phone
                                    )
                                when c.personal_email notnull then
                                    jsonb_build_object(
                                        'type', juut.name,
                                        'customer_email', c.personal_email,
                                        'personal_phone', jup.phone,
                                        'birthday', c.birthday
                                    )
                                when e.work_email notnull then
                                    jsonb_build_object(
                                        'type', juut.name,
                                        'employee_email', e.work_email,
                                        'work_phone', e.work_phone,
                                        'personal_phone', jup.phone,
                                        'birthday', e.birthday,
                                        'experience', e.experience,
                                        'position', e.position
                                    )
                                end
                        ) as type
                        from
                        jw_users.users as juu
                        join jw_users.genders as jug on juu.gender_id = jug.id
                        join jw_users.user_phones as jup on juu.phone_id = jup.id
                        left join jw_users.auth_users as juau on juu.id = juau.user_id
                        left join jw_users.user_types as juut on juau.user_type_id = juut.id
                        left join jw_users.admins a on juau.id = a.auth_user_id
                        left join jw_users.customers c on juau.id = c.auth_user_id
                        left join jw_users.employees e on juau.id = e.auth_user_id
                        group by juu.id,jug.name,jup.phone
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
