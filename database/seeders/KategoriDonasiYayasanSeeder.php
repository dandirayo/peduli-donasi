<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriDonasiYayasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('kategori_donasi_yayasan')->insert([
           [
               'yayasan_id' => 1,
               'kategori_donasi_id' => 1
           ],
            [
                'yayasan_id' => 1,
                'kategori_donasi_id' => 2
            ],
            [
                'yayasan_id' => 1,
                'kategori_donasi_id' => 3
            ],
            [
                'yayasan_id' => 2,
                'kategori_donasi_id' => 3
            ],
            [
                'yayasan_id' => 2,
                'kategori_donasi_id' => 1
            ],
            [
                'yayasan_id' => 2,
                'kategori_donasi_id' => 2
            ],
        ]);
    }
}
