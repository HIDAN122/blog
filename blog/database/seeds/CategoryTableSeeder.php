<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
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

        for ($i = 1; $i <= 20; $i++) {
            $name = 'Категорія ' . $i;
            $categories[] = array(
                'name' => $name,
                'slug' => Str::slug($name),
                'created_at' => $createdAt
            );
        }
        \DB::table('categories')->insert($categories);
    }
}
