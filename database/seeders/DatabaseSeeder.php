<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // после создания сидеров регистрируем , чтобы можно было запистить
        $this->call([
            CategorySeeder::class,
            NewsSeeder::class,
        ]);
        // \App\Models\User::factory(10)->create();
    }
}
