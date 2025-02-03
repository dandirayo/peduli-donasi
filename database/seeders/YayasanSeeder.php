<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class YayasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('yayasan')->insert([
            [
                'user_id' => 2,
                'name' => 'Yayasan Tradisi Gim Rakyat',
                'city' => 'Bekasi',
                'address' => 'Jl. Kenari IV Blok D3 No.7, RT.007/RW.0013, Jatibening, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia',
                'contact' => '+62 812-9964-6016',
                'bank_name' => 'BCA',
                'bank_number' => '512345678',
                'bank_owner' => 'Yayasan TGR',
                'description' => 'Yayasan Tradisi Gim Rakyat adalah yayasan yang bergerak untuk meningkat budaya daerah agar anak-anak sekolah dapat melestarikan budaya daerah mereka masing-masing',
                'donation_purposes' => 'Membantu Anak-anak Yatim disekitar daerah Jakarta Timur.',
                'logo' => 'logo\1 Yayasan Tradisi Gim Rakyat.PNG'
            ],
            [
                'user_id' => 3,
                'name' => 'Yayasan Rahmatan Lil-Alamin',
                'city' => 'Jakarta Timur',
                'address' => 'Jl. H. Naman no.60 RT/RW 12/03 Kel. Pondok KelapaKec. Duren Sawit – Jakarta Timur, 13450',
                'contact' => '(021) 86905367',
                'bank_name' => ' Mandiri ',
                'bank_number' => '166-000-089-495-6',
                'bank_owner' => 'YRLA foundation Group',
                'description' => 'Yayasan Rahmatan Lil-Alamin dalam kiprahnya sampai hari ini memiliki perjalanan sejarah yang unik dan berliku, pasang-surut dialami oleh para pengurusnya. Fenomena social yang ada disekeliling kita seperti kondisi anak-anak yatim, fakir miskin, kaum dhuafa, anak-anak terlantar, dan yang lainnya seperti bukan bagian dari tanggung jawab kita sebagai bagian dari bangsa yang kita cintai ini.',
                'donation_purposes' => 'Membantu Anak-anak Yatim disekitar daerah Jakarta Timur, karena itu merupakan tanggung jawab dari Yayasan Ini',
                'logo' => 'logo\2 Yayasan Rahmatan.png'
            ],
            [
                'user_id' => 4,
                'name' => 'Yayasan Karya Anak Bangsa',
                'city' => 'Jakarta Pusat',
                'address' => 'Jl. Cempaka Putih Tengah No. 42, Jakarta Pusat, DKI Jakarta, 10510',
                'contact' => '(021) 4288 5380',
                'bank_name' => 'BRI ',
                'bank_number' => '0384-01-003954-53-6',
                'bank_owner' => 'Yayasan KAB',
                'description' => 'YKAB adalah yayasan yang berfokus pada pengembangan kapasitas anak-anak dan remaja melalui pendidikan dan pelatihan.',
                'donation_purposes' => 'Membantu mengembangkan kapasitas anak-anak di sekolah',
                'logo' => 'logo\3 Yayasan Karya Anak Bangsa.png'
            ],
            [
                'user_id' => 5,
                'name' => 'Yayasan Sayangi Tunas Cilik',
                'city' => 'Jakarta Selatan',
                'address' => 'Jl. Dr. Setiabudi No. 190, Jakarta Selatan, DKI Jakarta, 12920',
                'contact' => '0812-3456-789',
                'bank_name' => 'Mandiri ',
                'bank_number' => '117-00-0695900-5',
                'bank_owner' => 'Yayasan STC',
                'description' => 'YSTC adalah yayasan yang berfokus pada peningkatan kualitas hidup anak-anak yang membutuhkan melalui pendidikan, kesehatan, dan kesempatan ekonomi.',
                'donation_purposes' => 'Meningkatkan Kualitas Hidup anak-anak yang mebutuhkan',
                'logo' => 'logo\4 Yayasan Sayangi Tunas Cilik.jpg'
            ],
            [
                'user_id' => 6,
                'name' => 'Yayasan Masyarakat Ekonomi Syariah',
                'city' => 'Jakarta Selatan',
                'address' => 'Jl. Jend. Sudirman Kav. 45-46, Jakarta Selatan, DKI Jakarta, 12930',
                'contact' => '(021) 579 43306',
                'bank_name' => 'BRI ',
                'bank_number' => '4519-01-000889-50-9',
                'bank_owner' => 'Yayasan MES',
                'description' => 'Yayasan Masyarakat Ekonomi Syariah adalah yayasan yang berfokus pada pengembangan masyarakat melalui pendidikan dan pemberdayaan ekonomi yang berbasis syariah.',
                'donation_purposes' => 'Mengembangkan masyarakat melalui pendidikan dan pemberdayaan ekonomi berbasis Syariah',
                'logo' => 'logo\5 Yayasan Masyarakat Ekonomi Syariah.jpg'
            ],
            [
                'user_id' => 7,
                'name' => 'Yayasan Bina Bakti',
                'city' => 'Jakarta Selatan',
                'address' => 'Jl. Tebet Timur Dalam III No. 10, Jakarta Selatan, DKI Jakarta, 12810',
                'contact' => '(021) 8370 4567',
                'bank_name' => 'BRI ',
                'bank_number' => '0384-01-004761-53-0',
                'bank_owner' => 'Yayasan BB',
                'description' => 'Yayasan Bina Bakti adalah yayasan yang berfokus pada pendidikan dan peningkatan kualitas hidup anak-anak melalui program bantuan dan pendidikan.',
                'donation_purposes' => 'Membantu pendidikan dan kualitas hidup anak-anak',
                'logo' => 'logo\6 Yayasan Bina Bakti.png'
            ],
            [
                'user_id' => 8,
                'name' => 'Yayasan Anak Cendekia',
                'city' => 'Jakarta Pusat',
                'address' => 'Jl. Raden Saleh Raya No. 47, Jakarta Pusat, DKI Jakarta, 10430',
                'contact' => '(021) 3908 722',
                'bank_name' => 'BNI ',
                'bank_number' => '069-069-56-666',
                'bank_owner' => 'Yayasan AC',
                'description' => 'Yayasan Anak Cendekia adalah yayasan yang berfokus pada pendidikan dan peningkatan kualitas hidup anak-anak melalui program bantuan dan pendidikan.',
                'donation_purposes' => 'Untuk Mengembangkan Implementasi Teknologi Hijau dan Ramah Lingkungan',
                'logo' => 'logo\7 Yayasan Anak Cendekia.jpg'
            ],
            [
                'user_id' => 9,
                'name' => 'Yayasan Keberlanjutan Indonesia',
                'city' => 'Jakarta Pusat',
                'address' => 'Jl. Kramat Raya No. 111, Jakarta Pusat, DKI Jakarta, 10430',
                'contact' => '(021) 3585 5647',
                'bank_name' => 'BNI ',
                'bank_number' => '0384-01-005368-53-7',
                'bank_owner' => 'Yayasan KI',
                'description' => 'Yayasan Keberlanjutan Indonesia adalah yayasan yang berfokus pada pengembangan dan implementasi teknologi hijau dan ramah lingkungan.',
                'donation_purposes' => 'Untuk Mengembangkan Implementasi Teknologi Hijau dan Ramah Lingkungan',
                'logo' => 'logo\8 Yayasan Keberlanjutan Indonesia.png'
            ],
            [
                'user_id' => 10,
                'name' => 'Yayasan Putera Sampoerna',
                'city' => 'DKI Jakarta',
                'address' => 'Jl. Jend. Sudirman Kav. 52-53, Jakarta Selatan, DKI Jakarta, 12190',
                'contact' => '(021) 579 1338',
                'bank_name' => 'BRI ',
                'bank_number' => '0384-01-004721-53-7',
                'bank_owner' => 'Yayasan PS',
                'description' => 'Yayasan Putera Sampoerna adalah yayasan yang berfokus pada pendidikan, pengembangan sumber daya manusia, dan konservasi lingkungan.',
                'donation_purposes' => 'Membantu mengembangkan SDM  dan Konservasi lingkungan',
                'logo' => 'logo\9 Yayasan Putera Sampoerna.jpeg'
            ],
            [
                'user_id' => 11,
                'name' => 'Yayasan Kebahagiaan Anak Bangsa',
                'city' => 'Tanggerang',
                'address' => 'Jl. Salak Raya No.1, RT.04/RW.03, Pd. Benda, Kec. Pamulang, Kota Tangerang Selatan, Banten 15416',
                'contact' => '0823-1138-1112',
                'bank_name' => 'XXX',
                'bank_number' => '512345678',
                'bank_owner' => 'Yayasan KAB',
                'description' => 'Banyak bapak, ibu, kakek, nenek, anak-anak di luar sana yang hidup tak berkecukupan dan kurang layak sehingga mereka harus berjuang bertahan dengan rasa lapar dan dahaga. Nasi dan lauk pauk yang kita nikmati sehari-hari belum tentu mereka rasakan.
                Kami mengajak #Sahabat YAKAB untuk membantu mereka yang membutuhkan pada program Sedekah Jumat Berbagi Nasi Box Gratis untuk Masyarakat Prasejahtera.
                Donasi yang terkumpul akan dialokasikan untuk pengadaan nasi box  dibagikan kepada masyarakat Prasejahtera ',
                'donation_purposes' => 'Membantu Kegiatan Sosial',
                'logo' => 'logo\10 Yayasan Kebahagiaan Anak Bangsa.jpg'
            ],
            [
                'user_id' => 12,
                'name' => 'Yayasan Marhamah Robbani',
                'city' => 'Kota Bekasi',
                'address' => 'Jl. KH. Agus Salim No.V, RT.001/RW.008, Bekasi Jaya, Kec. Bekasi Tim., Kota Bks, Jawa Barat 17112',
                'contact' => '0818-0787-1020',
                'bank_name' => 'XXX',
                'bank_number' => '512345678',
                'bank_owner' => 'Yayasan MR',
                'description' => 'Membantu Kegiatan Sosial',
                'donation_purposes' => 'Membantu Kegiatan Sosial',
                'logo' => 'logo\11 Yayasan Marhamah Robbani.png'
            ],
            [
                'user_id' => 13,
                'name' => 'Yayasan Al-Furqon',
                'city' => 'Kota Bekasi',
                'address' => 'Jl. KH. Agus Salim No.V, RT.001/RW.008, Bekasi Jaya, Kec. Bekasi Tim., Kota Bks, Jawa Barat 17112',
                'contact' => '0818-0787-1020',
                'bank_name' => 'BCA',
                'bank_number' => '512345678',
                'bank_owner' => 'Yayasan YPAF',
                'description' => 'Membantu Kegiatan Sosial',
                'donation_purposes' => 'Membantu Kegiatan Sosial',
                'logo' => 'logo\12 Yayasan Al-Furqon.PNG'
            ],

        ]);
    }
}
