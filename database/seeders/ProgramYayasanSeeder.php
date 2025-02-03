<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramYayasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('program_yayasan')->insert([
            [
                'yayasan_id' => 1,
                'title' => 'Yayasan Tradisi Gim Rakyat',
                'description' => 'Melestarikan Budaya Daerah dengan karya dan mainan Tradisional',
                'image' => 'program\Baju Bekas 3.jpg'
            ],
            [
                'yayasan_id' => 1,
                'title' => 'Program Yayasan Rahmatan Lil-Alamin',
                'description' => 'Membantu Anak-anak Yatim disekitar daerah Jakarta Timur.',
                'image' => 'program\Barang Bekas 3.jpeg'
            ],
            [
                'yayasan_id' => 1,
                'title' => 'Yayasan Karya Anak Bangsa ',
                'description' => 'Membantu mengembangkan kapasitas anak-anak di sekolah',
                'image' => 'program\Barang Bekas 4.jpeg'
            ],
        ]);
    }
}
