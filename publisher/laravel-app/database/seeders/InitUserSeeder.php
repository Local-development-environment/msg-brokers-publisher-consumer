<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class InitUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        DB::table('jw_users.genders')->truncate();
        DB::table('jw_users.register_phones')->truncate();
        DB::table('jw_users.user_types')->truncate();
        DB::table('jw_users.users')->truncate();
        DB::table('jw_users.user_user_type')->truncate();
        DB::table('jw_users.admins')->truncate();
        DB::table('jw_users.customers')->truncate();
        DB::table('jw_users.employees')->truncate();
        Schema::enableForeignKeyConstraints();

        $genders = ['мужчина', 'женщина'];
        $userTypes = ['employee','customer','admin'];

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

        for ($i = 0; $i < 15; $i++) {
            $genderId = DB::table('jw_users.genders')->pluck('id')->random();

            $phoneId = $this->storePhoneNumber();

            $userId = DB::table('jw_users.users')->insertGetId([
                'register_phone_id' => $phoneId,
                'gender_id' => $genderId,
                'first_name' => ($genderId === 1) ? $faker->firstNameMale : $faker->firstNameFemale,
                'middle_name' => $faker->firstNameMale,
                'last_name' => $faker->lastName,
                'is_active' => 1,
                'created_at' => now(),
            ]);

            if ($i < 5) {
                $authUser = DB::table('jw_users.user_user_type')->insertGetId([
                    'user_id' => $userId,
                    'user_type_id' => DB::table('jw_users.user_types')->where('name', 'employee')->first()->id,
                    'created_at' => now(),
                ]);

                DB::table('jw_users.employees')->insert([
                    'user_user_type_id' => $authUser,
                    'employee_email' => 'employee' . '-' . $i . '@example.com',
                    'employee_phone' => $this->getPhoneNumber(),
                    'password' => bcrypt('password'),
                    'birthday' => $faker->dateTimeBetween('-50 years', '-20 years'),
                    'experience' => $faker->numberBetween(1,10),
                    'position' => $faker->jobTitle,
                    'created_at' => now(),
                ]);
            } elseif ($i < 10) {
                $authUser = DB::table('jw_users.user_user_type')->insertGetId([
                    'user_id' => $userId,
                    'user_type_id' => DB::table('jw_users.user_types')->where('name', 'customer')->first()->id,
                    'created_at' => now(),
                ]);

                DB::table('jw_users.customers')->insert([
                    'user_user_type_id' => $authUser,
                    'personal_email' => 'customer' . '-' . $i . '@example.com',
                    'password' => bcrypt('password'),
                    'birthday' => $faker->dateTimeBetween('-50 years', '-20 years'),
                    'created_at' => now(),
                ]);
            } else {
                $authUser = DB::table('jw_users.user_user_type')->insertGetId([
                    'user_id' => $userId,
                    'user_type_id' => DB::table('jw_users.user_types')->where('name', 'admin')->first()->id,
                    'created_at' => now(),
                ]);

                DB::table('jw_users.admins')->insert([
                    'user_user_type_id' => $authUser,
                    'admin_email' => 'admin' . '-' . $i . '@example.com',
                    'admin_phone' => $this->getPhoneNumber(),
                    'password' => bcrypt('password'),
                    'created_at' => now(),
                ]);
            }
        }

        $this->additionalAuth();
    }

    private function storePhoneNumber(): string
    {
        $phone = $this->getPhoneNumber();

        return DB::table('jw_users.register_phones')->insertGetId([
            'phone' => $phone,
            'created_at' => now(),
        ]);
    }

    private function getPhoneNumber(): string
    {
        $code = Factory::create()->randomDigitNotNull;

        return '+' . $code . Factory::create()->numerify('(###)###-####');
    }

    private function additionalAuth(): void
    {
        $adminUserId = DB::table('jw_users.user_user_type')
            ->where('user_type_id', DB::table('jw_users.user_types')->where('name', 'admin')->pluck('id')->random())
            ->first()->user_id;

        $customerUserId = DB::table('jw_users.user_user_type')
            ->where('user_type_id', DB::table('jw_users.user_types')->where('name', 'customer')->pluck('id')->random())
            ->first()->user_id;

        $authUser = DB::table('jw_users.user_user_type')->insertGetId([
            'user_id' => $adminUserId,
            'user_type_id' => DB::table('jw_users.user_types')->where('name', 'customer')->first()->id,
            'created_at' => now(),
        ]);

        DB::table('jw_users.customers')->insert([
            'user_user_type_id' => $authUser,
            'personal_email' => 'customer' . '-' . DB::table('jw_users.users')->count() + 1 . '@example.com',
            'password' => bcrypt('password'),
            'birthday' => Factory::create()->dateTimeBetween('-50 years', '-20 years'),
            'created_at' => now(),
        ]);

        $authUser = DB::table('jw_users.user_user_type')->insertGetId([
            'user_id' => $customerUserId,
            'user_type_id' => DB::table('jw_users.user_types')->where('name', 'employee')->first()->id,
            'created_at' => now(),
        ]);

        DB::table('jw_users.employees')->insert([
            'user_user_type_id' => $authUser,
            'employee_email' => 'employee' . '-' . DB::table('jw_users.users')->count() + 1 . '@example.com',
            'employee_phone' => $this->getPhoneNumber(),
            'password' => bcrypt('password'),
            'birthday' => Factory::create()->dateTimeBetween('-50 years', '-20 years'),
            'experience' => Factory::create()->numberBetween(1,10),
            'position' => Factory::create()->jobTitle,
            'created_at' => now(),
        ]);

    }
}
