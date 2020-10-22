<?php

use Illuminate\Database\Seeder;

class CategoryTableSeeder extends Seeder
{
    protected $data = [
        [
            'name' => 'EA-Sports',
            'slug' => 'ea_sports',
            'childs' => [
                [
                    'name' => 'Support EA',
                    'slug' => 'support_ea',
                ],
                [
                    'name' => 'Fifa 21',
                    'slug' => 'fifa_21',
                ]
            ]
        ],
        [
            'name' => 'Activision',
            'slug' => 'activision',
            'childs' => [
                [
                    'name' => 'Support Activision',
                    'slug' => 'support_activision',
                ],
                [
                    'name' => 'Call of Duty',
                    'slug' => 'call_of_duty',
                ],
                [
                    'name' => 'Sekiro',
                    'slug' => 'sekiro',
                ]
            ]
        ],
        [
            'name' => 'CD Projekt RED',
            'slug' => 'cd_projekt_red',
            'childs' => [
                [
                    'name' => 'Support CPR',
                    'slug' => 'support_cpr',
                ],
                [
                    'name' => 'Witcher',
                    'slug' => 'witcher',
                ],
                [
                    'name' => 'Cyberpunk 2077',
                    'slug' => 'cyberpunk_2077',

                ]
            ]
        ],
        [
            'name' => 'Ubisoft',
            'slug' => 'ubisoft',
            'childs' => [
                [
                    'name' => 'Support Ubisoft',
                    'slug' => 'support_ubi',
                ],
                [
                    'name' => 'Assassin`s Creed',
                    'slug' => 'assassins_creed',
                ],
                [
                    'name' => 'Far Cry',
                    'slug' => 'far_cry',
                ],
                [
                    'name' => 'Watch Dogs',
                    'slug' => 'watch_dogs',
                ]
            ]
        ]
    ];

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data as $datum) {

            $childs = [];
            if (isset($datum['childs'])) {
                $childs = $datum['childs'];
                unset($datum['childs']);
            }

            $cat = \App\Models\Category::create(array_merge($datum, [
                'parent_id' => 0
            ]));

            if ($cat) {

                foreach ($childs as $child) {

                    $cat->childs()->create($child);
                }
            }
        }

//        $faker = Faker\Factory::create();
//        $createdAt = $faker->dateTimeBetween('-3 month', '-2 month');
//
//        for ($i = 1; $i <= 20; $i++) {
//            $parentId = rand(null,4);
//            $name = 'Категорія ' . $i;
//            $categories[] = array(
//                'name' => $name,
//                'slug' => Str::slug($name),
//                'created_at' => $createdAt,
//                'parent_id' => $parentId
//            );
//        }
//        \DB::table('categories')->insert($categories);
    }
}
