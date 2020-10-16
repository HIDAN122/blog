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
            $parentId = rand(null,4);
            $name = 'Категорія ' . $i;
            $categories[] = array(
                'name' => $name,
                'slug' => Str::slug($name),
                'created_at' => $createdAt,
                'parent_id' => $parentId
            );
        }
        \DB::table('categories')->insert($categories);
    }
}
