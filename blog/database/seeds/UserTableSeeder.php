<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $firstName = $faker->firstName;
        $lastName = $faker->lastName;
        for ($i = 0; $i <= 50; $i++) {
            $users[] = [
                'first_name' => $firstName,
                'last_name' => $lastName,
                'email' => $faker->email,
                'password' => $faker->password
            ];
        }
        \DB::table('users')->insert($users);
    }
}
