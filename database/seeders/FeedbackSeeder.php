<?php

namespace Database\Seeders;

use Faker\Factory;
use Illuminate\Database\Seeder;

class FeedbackSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('feedbacks')->insert($this->getData());
    }

    public function getData()
    {
        $faker = Factory::create('en_EN');

        $data = [];

        for ($i = 0; $i < 10; $i++) {
            $data[] = [
                'name' => $faker->name(),
                'comment' => $faker->text(mt_rand(100, 250)),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        return $data;
    }
}
