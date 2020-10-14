<?php

use Illuminate\Database\Seeder;

class CommentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker\Factory::create();
        $createdAt = $faker->dateTimeBetween('-3 month', '-2 month');
        $count = rand(1, 20);
        $message = $faker->realText(100);
        $subject = $faker->sentence(rand(2, 5), true);
        for ($i = 0; $i <= $count; $i++) {
            $comments[] = [
                'message' => $message,
                'subject' => $subject,
                'user_id' => rand(1,10),
                'post_id' => rand(1, 10),
                'created_at' => $createdAt
            ];
        }
        \DB::table('comments')->insert($comments);
    }
}
