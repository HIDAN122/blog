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
//        $faker = Faker\Factory::create();

        for ($i = 1; $i <= 20; $i++) {
            $name = 'Категорія ' . $i;
            $categories[] = array(
                'name' => $name,
                'slug' => Str::slug($name),
            );
        }
        \DB::table('categories')->insert($categories);
    }
}
