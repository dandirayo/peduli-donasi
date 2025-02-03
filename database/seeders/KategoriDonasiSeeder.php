<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriDonasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_donasi')->insert([
            [
                'name' => 'Makanan',
                'css_class_name_color' => 'bg-success',
                'css_class_name_icon' => 'fa-bowl-food'
            ],
            [
                'name' => 'Pakaian',
                'css_class_name_color' => 'bg-primary',
                'css_class_name_icon' => 'fa-shirt'
            ],
            [
                'name' => 'Alat Tulis',
                'css_class_name_color' => 'bg-secondary',
                'css_class_name_icon' => 'fa-pencil'
            ],
        ]);
    }
}
