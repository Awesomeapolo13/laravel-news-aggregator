<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategoriesHasNewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('categories_has_news')->insert($this->getData());
    }

    public function getData()
    {
        $faker = Factory::create('ru_RU');
        $data = [];

        for ($i = 0; $i < 15; $i++) {
            $data[] = [
                'category_id' => $faker->numberBetween(1, 10),
                'news_id' => $faker->numberBetween(1, 10),
            ];
        }

        return $data;
    }
}
