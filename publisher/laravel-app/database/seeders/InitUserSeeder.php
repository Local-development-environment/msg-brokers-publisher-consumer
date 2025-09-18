<?php

namespace Database\Seeders;

use Faker\Factory;
use Faker\Generator;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Faker\Generator as Faker;

class InitUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('jw_users.genders')->truncate();
        DB::table('jw_users.user_phones')->truncate();
        DB::table('jw_users.user_types')->truncate();
        DB::table('jw_users.users')->truncate();
        DB::table('jw_users.auth_users')->truncate();
        DB::table('jw_users.admins')->truncate();
        DB::table('jw_users.customers')->truncate();
        DB::table('jw_users.employees')->truncate();
        Schema::enableForeignKeyConstraints();

        $genders = ['мужчина', 'женщина'];
        $userTypes = ['employee','customer','admin'];
        $users = [];

        foreach ($genders as $gender) {
            DB::table('jw_users.genders')->insert([
                'name' => $gender,
                'created_at' => now(),
            ]);
        }

        foreach ($userTypes as $type) {
            DB::table('jw_users.user_types')->insert([
                'name' => $type,
                'created_at' => now(),
            ]);
        }
        $faker = Factory::create();
//        dd(DB::table('jw_users.genders')->pluck('id')->random());

        for ($i = 0; $i < 5; $i++) {
            $genderId = DB::table('jw_users.genders')->pluck('id')->random();
            $phoneId = DB::table('jw_users.user_phones')->insertGetId([
                'phone' => $faker->e164PhoneNumber,
                'created_at' => now(),
            ]);

            $userId = DB::table('jw_users.users')->insertGetId([
                'phone_id' => $phoneId,
                'gender_id' => $genderId,
                'first_name' => ($genderId === 1) ? $faker->firstNameMale : $faker->firstNameFemale,
                'middle_name' => $faker->firstNameMale,
                'last_name' => $faker->lastName,
                'is_active' => 1,
                'created_at' => now(),
            ]);

            $authUser = DB::table('jw_users.auth_users')->insertGetId([
                'user_id' => $userId,
                'user_type_id' => DB::table('jw_users.user_types')->where('name', 'employee')->first()->id,
                'created_at' => now(),
            ]);

            DB::table('jw_users.employees')->insert([
                'auth_user_id' => $authUser,
                'work_email' => $faker->email,
                'work_phone' => $faker->e164PhoneNumber,
                'password' => bcrypt('password'),
                'birthday' => $faker->dateTimeBetween('-50 years', '-20 years'),
                'experience' => $faker->numberBetween(1,10),
                'position' => $faker->jobTitle,
                'created_at' => now(),
            ]);
        }

        for ($i = 0; $i < 5; $i++) {
            $genderId = DB::table('jw_users.genders')->pluck('id')->random();
            $phoneId = DB::table('jw_users.user_phones')->insertGetId([
                'phone' => $faker->e164PhoneNumber,
                'created_at' => now(),
            ]);

            $userId = DB::table('jw_users.users')->insertGetId([
                'phone_id' => $phoneId,
                'gender_id' => $genderId,
                'first_name' => ($genderId === 1) ? $faker->firstNameMale : $faker->firstNameFemale,
                'middle_name' => $faker->firstNameMale,
                'last_name' => $faker->lastName,
                'is_active' => 1,
                'created_at' => now(),
            ]);

            $authUser = DB::table('jw_users.auth_users')->insertGetId([
                'user_id' => $userId,
                'user_type_id' => DB::table('jw_users.user_types')->where('name', 'admin')->first()->id,
                'created_at' => now(),
            ]);

            DB::table('jw_users.admins')->insert([
                'auth_user_id' => $authUser,
                'work_email' => $faker->email,
                'work_phone' => $faker->e164PhoneNumber,
                'password' => bcrypt('password'),
                'created_at' => now(),
            ]);
        }

        for ($i = 0; $i < 5; $i++) {
            $genderId = DB::table('jw_users.genders')->pluck('id')->random();
            $phoneId = DB::table('jw_users.user_phones')->insertGetId([
                'phone' => $faker->e164PhoneNumber,
                'created_at' => now(),
            ]);

            $userId = DB::table('jw_users.users')->insertGetId([
                'phone_id' => $phoneId,
                'gender_id' => $genderId,
                'first_name' => ($genderId === 1) ? $faker->firstNameMale : $faker->firstNameFemale,
                'middle_name' => $faker->firstNameMale,
                'last_name' => $faker->lastName,
                'is_active' => 1,
                'created_at' => now(),
            ]);

            $authUser = DB::table('jw_users.auth_users')->insertGetId([
                'user_id' => $userId,
                'user_type_id' => DB::table('jw_users.user_types')->where('name', 'customer')->first()->id,
                'created_at' => now(),
            ]);

            DB::table('jw_users.customers')->insert([
                'auth_user_id' => $authUser,
                'personal_email' => $faker->email,
                'password' => bcrypt('password'),
                'birthday' => $faker->dateTimeBetween('-50 years', '-20 years'),
                'created_at' => now(),
            ]);
        }
    }
}
