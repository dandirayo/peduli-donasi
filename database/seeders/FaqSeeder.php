<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FaqSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('faq')->insert([
            [
               'title' => "Jenis Barang Donasi",
               'description' => 'Barang bekas, sembako, uang, pakaian, perelngkapan sekolah, dan kebutuhan sehari-hari.'
            ],
            [
                'title' => "Donasi",
                'description' => 'Donasi bentuk bantuan berupa barang kepada Yayasan sosial yang membutuhkan, baik untuk keperluan sosial, kemanusiaan, bencana alam, pendidikan, kesehatan, atau kegiatan lainnya yang bertujuan untuk membantu peningkatan kualitas hidup orang lain. '
            ],
            [
                'title' => "Artikel",
                'description' => 'Artikel memberikan informasi kabar kebaikan dalam dalam donasi.'
            ],
            [
                'title' => "Forum",
                'description' => ' Forum diskusi untuk interaksi antara Donatur dengan Yayasan dalam mengenai Informasi Donasi dengan pertanyaan dan jawaban.'
            ],
            [
                'title' => "Notifikasi",
                'description' => 'Notifikasi merupakan pemberitahuan berupa pesan singkat yang di sampaikan kepada Donatur dan Yayasan.'
            ],
        ]);
    }
}
