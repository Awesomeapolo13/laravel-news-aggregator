<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class DownloadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('downloads')->insert($this->getData());
    }

    public function getData()
    {
        $faker = Factory::create('ru_RU');
        $data = [];

        for ($i = 0; $i < 15; $i++) {
            $data[] = [
                'name' => $faker->name(),
                'phone' => $faker->regexify('^((8|\+7)[\- ]?)?(\(?\d{3}\)?[\- ]?)?[\d\- ]{7,10}$'),
                'email' => $faker->email,
                'info' => $faker->text(mt_rand(100, 200)),
                'news_id' => $faker->numberBetween(1, 10),
                'created_at' => now(),
                // можно указать таймзону внутри now()
                'updated_at' => now(),
            ];
        }

        return $data;
    }
}
