<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            YayasanSeeder::class,
            ProgramYayasanSeeder::class,
            ActivityYayasanSeeder::class,
            ArticleSeeder::class,
            KategoriDonasiSeeder::class,
            KategoriDonasiYayasanSeeder::class,
            FaqSeeder::class,
            DiscussionSeeder::class,
            DiscussionDetailSeeder::class
        ]);
    }
}
