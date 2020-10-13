<?php

use Illuminate\Database\Seeder;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();

        $title = $faker->sentence(rand(2, 5), true);
        $description = $faker->realText(200);
        $count = rand(40, 70);
        for ($i = 0; $i <= $count; $i++) {
            $posts[] = [
                'category_id' => rand(1, 20),
                'user_id' => rand(1, 50),
                'title' => $title,
                'description' => $description
            ];
        }
        \DB::table('posts')->insert($posts);
    }
}
