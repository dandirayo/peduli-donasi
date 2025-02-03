<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('articles')->insert([
            [
                'user_id' => 1,
                'title' => 'Cara Praktis Memilah Pakaian Bekas Layak Pakai untuk Donasi',
                'description' => 'Akhir-akhir ini, kita disuguhi berita yang bisa dikatakan miris terkait bantuan pakaian untuk korban gempa di Cianjur. Bagaimana tumpukan pakaian donasi tersebut menumpuk layaknya tumpukan sampah. Kita tidak bisa menyalahkan siapa-siapa dalam hal ini. Banyak faktor yang menyebabkan kondisi demikian. Pertama, keadaan darurat dan beberapa kali terjadinya gempa susulan membuat warga, relawan, dan tenaga-tenaga medis, serta pemerintah yang ada di sana sibuk untuk menyelamatkan jiwa masyarakat terlebih dahulu. Dengan demikian, banyaknya bantuan dari masyarakat sekitar seperti mie, pakaian, dan kebutuhan lainnya seakan terlantar. Kedua, sebagai donatur kita juga harus introspeksi diri. Jangan-jangan kondisi pakaian yang kita sumbangkan tersebut dalam keadaan tidak layak pakai. Alih-alih ingin memberikan bantuan untuk saudara-saudara kita, yang terjadi malah kita menyumbang tumpukan sampah. Karena, bila kondisi pakaian yang disumbangkan sudah robek, bolong-bolong, dan tidak layak. Siapakah orang yang mau menggunakannya, betul gak? Oleh karena itu, sebelum menggalang donasi pakaian untuk korban bencana alam, baik korban gempa, longsor, banjir, dan bencana-bencana lainnya. Kita harus bijak untuk memilah dan memilih mana pakaian yang masih bagus dan pantas untuk disumbangkan, dan mana pakaian yang harus dibuang atau dijadikan kain lap. ',
                'image' => 'images\article\Barang Bekas 3.jpeg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 1,
                'title' => 'Banyak Barang Tak Terpakai di Rumah? Donasikan Saja',
                'description' => 'Donasi pakaian layak pakai adalah bentuk kebaikan yang sangat bermanfaat bagi masyarakat yang kurang mampu. Dengan memberikan pakaian yang masih layak pakai, kita bisa membantu memenuhi kebutuhan dasar mereka dan membuat mereka merasa lebih berharga. Pakaian yang layak pakai bisa berupa baju, celana, rok, atau pakaian lain yang masih dalam kondisi baik dan bisa digunakan kembali. Donasi pakaian layak pakai bisa diberikan ke berbagai organisasi sosial, seperti panti asuhan, rumah singgah, atau lembaga amal lainnya. Menjadi donatur pakaian layak pakai tidaklah sulit. Kita bisa memulainya dengan mengumpulkan pakaian yang sudah tidak kita gunakan lagi dan memastikan bahwa pakaian tersebut masih dalam kondisi baik. Setelah itu, kita bisa menghubungi lembaga sosial yang membutuhkan dan mengirimkan pakaian tersebut.',
                'image' => 'images\article\Barang Bekas 2.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 1,
                'title' => 'Donasi Lewat Pakaian Layak Pakai',
                'description' => 'Donasi pakaian layak pakai adalah bentuk kebaikan yang sangat bermanfaat bagi masyarakat yang kurang mampu. Dengan memberikan pakaian yang masih layak pakai, kita bisa membantu memenuhi kebutuhan dasar mereka dan membuat mereka merasa lebih berharga.

                Pakaian yang layak pakai bisa berupa baju, celana, rok, atau pakaian lain yang masih dalam kondisi baik dan bisa digunakan kembali. Donasi pakaian layak pakai bisa diberikan ke berbagai organisasi sosial, seperti panti asuhan, rumah singgah, atau lembaga amal lainnya.
                
                Menjadi donatur pakaian layak pakai tidaklah sulit. Kita bisa memulainya dengan mengumpulkan pakaian yang sudah tidak kita gunakan lagi dan memastikan bahwa pakaian tersebut masih dalam kondisi baik. Setelah itu, kita bisa menghubungi lembaga sosial yang membutuhkan dan mengirimkan pakaian tersebut.
                
                Namun, ada beberapa hal yang perlu diperhatikan sebelum melakukan donasi pakaian layak pakai. Pertama, pastikan pakaian yang akan didonasikan benar-benar layak pakai dan tidak rusak. Kedua, pastikan pakaian tersebut bersih dan tidak membawa bau yang tidak sedap. Terakhir, sertakan informasi mengenai ukuran dan jenis pakaian yang didonasikan agar lembaga sosial yang menerima dapat memanfaatkannya dengan baik.
                
                Donasi pakaian layak pakai merupakan bentuk kebaikan yang sederhana namun sangat bermakna. Dengan sedikit usaha, kita bisa membantu memenuhi kebutuhan dasar masyarakat yang kurang mampu dan membuat mereka merasa lebih berharga. Oleh karena itu, marilah kita mulai membuat perbedaan dengan melakukan donasi pakaian layak pakai.',
                'image' => 'images\article\Baju Bekas 4.jpeg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 1,
                'title' => 'Ajak Donasi Dengan Barang Bekas',
                'description' => 'Masyarakat selalu membutuhkan dukungan dari masyarakat lain. Salah satu bentuk dukungan tersebut adalah melalui donasi. Terlebih lagi saat ini, banyak masyarakat yang membutuhkan bantuan karena dampak dari pandemi. Dalam situasi seperti ini, donasi barang bekas bisa menjadi salah satu solusi untuk membantu masyarakat yang membutuhkan.

                Barang bekas yang tidak lagi digunakan bisa menjadi sumber donasi yang sangat berguna bagi orang lain. Barang-barang seperti pakaian, makanan, buku, dan alat-alat rumah tangga bisa sangat berguna bagi masyarakat yang membutuhkan. Donasi barang bekas bisa membuat barang-barang tersebut tidak terbuang percuma dan masih berguna bagi orang lain.
                
                Untuk melakukan donasi barang bekas, kita bisa mengajak teman, keluarga, dan rekan kerja untuk ikut serta. Kita juga bisa mengajak lembaga sosial, sekolah, rumah sakit, panti asuhan, dan organisasi bencana untuk menerima donasi barang bekas. Kita juga bisa mengajak masyarakat untuk mengumpulkan barang bekas yang tidak terpakai dan memberikannya kepada masyarakat yang membutuhkan.
                
                Namun, saat melakukan donasi barang bekas, pastikan bahwa barang-barang yang diberikan masih dalam kondisi baik dan layak pakai. Ini akan memastikan bahwa barang-barang tersebut berguna bagi orang yang menerimanya.
                
                Ajakan untuk melakukan donasi barang bekas merupakan salah satu cara untuk membantu masyarakat yang membutuhkan. Oleh karena itu, marilah kita membantu dengan melakukan donasi barang bekas yang dapat membantu membuat hidup orang lain lebih baik.',
                'image' => 'images\article\Barang Bekas 3.jpeg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 1,
                'title' => 'Barang Tak Terpakai, Diinfakkan Menjadi Berkah dan Bernilai',
                'description' => 'Berinfaq dengan berdonasi barang bekas adalah salah satu cara untuk membantu sesama dan membantu memenuhi kebutuhan dasar masyarakat yang kurang mampu. Infaq adalah bentuk kebaikan yang dilakukan dengan memberikan harta benda yang dimiliki, dan berdonasi barang bekas merupakan bentuk infaq yang sangat efektif dan sederhana.

                Barang bekas yang bisa didonasikan bisa berupa pakaian, sepatu, peralatan rumah tangga, atau barang lain yang masih layak pakai namun sudah tidak terpakai. Donasi barang bekas bisa diberikan ke berbagai organisasi sosial, seperti panti asuhan, rumah singgah, atau lembaga amal lainnya.
                
                Menjadi donatur barang bekas tidaklah sulit. Kita bisa memulainya dengan mengumpulkan barang bekas yang sudah tidak kita gunakan lagi dan memastikan bahwa barang tersebut masih layak pakai. Setelah itu, kita bisa menghubungi lembaga sosial yang membutuhkan dan mengirimkan barang bekas tersebut.
                
                Namun, ada beberapa hal yang perlu diperhatikan sebelum melakukan donasi barang bekas. Pertama, pastikan barang yang akan',
                'image' => 'images\article\Barang Bekas.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 1,
                'title' => 'Bersedekah Melalui Barang Bekasi',
                'description' => 'Bersedekah melalui barang bekas adalah salah satu cara untuk membantu sesama dan membantu memenuhi kebutuhan dasar masyarakat yang kurang mampu. Sedekah adalah bentuk kebaikan yang dilakukan dengan memberikan harta benda yang dimiliki, dan berdonasi barang bekas merupakan bentuk sedekah yang sangat efektif dan sederhana.

                Barang bekas yang bisa didonasikan bisa berupa pakaian, sepatu, peralatan rumah tangga, atau barang lain yang masih layak pakai namun sudah tidak terpakai. Sedekah melalui barang bekas bisa diberikan ke berbagai organisasi sosial, seperti panti asuhan, rumah singgah, atau lembaga amal lainnya.
                
                Menjadi pemberi sedekah melalui barang bekas tidaklah sulit. Kita bisa memulainya dengan mengumpulkan barang bekas yang sudah tidak kita gunakan lagi dan memastikan bahwa barang tersebut masih layak pakai. Setelah itu, kita bisa menghubungi lembaga sosial yang membutuhkan dan mengirimkan barang bekas tersebut.
                
                Namun, ada beberapa hal yang perlu diperhatikan sebelum melakukan sedekah melalui barang bekas. Pertama, pastikan barang yang akan disedekahkan benar-benar layak pakai dan tidak rusak. Kedua, pastikan barang tersebut bersih dan tidak membawa bau yang tidak sedap. Terakhir, sertakan informasi mengenai ukuran dan jenis barang yang disedekahkan agar lembaga sosial yang menerima dapat memanfaatkannya dengan baik.
                
                Sedekah melalui barang bekas merupakan bentuk kebaikan yang sederhana namun sangat bermakna. Dengan sedikit usaha, kita bisa membantu memenuhi kebutuhan dasar masyarakat yang kurang mampu dan membuat mereka merasa lebih berharga. Oleh karena itu, marilah kita mulai membuat perbedaan dengan melakukan sedekah melalui barang bekas.',
                'image' => 'images\article\1 Barang Bekas.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 1,
                'title' => 'Penyaluran Ratusan Alat Sholat Untuk Dhuafa Pelosok Desa',
                'description' => 'Alat sholat merupakan hal yang sangat penting bagi umat Muslim untuk melaksanakan ibadah sholat dengan baik dan sempurna. Namun, banyak anak dhuafa di pelosok desa yang kurang memiliki akses untuk memiliki alat sholat seperti mushaf, mukena, dan sejenisnya.

                Oleh karena itu, sangat penting bagi kita untuk berbagi dan membantu anak dhuafa di pelosok desa untuk memiliki alat sholat yang mereka butuhkan. Alat sholat yang bisa didonasikan antara lain mushaf, mukena, dan sejenisnya yang masih layak pakai. Donasi alat sholat bisa diberikan ke berbagai lembaga sosial yang bergerak di bidang pendidikan dan pemberdayaan masyarakat, seperti yayasan, panti asuhan, atau rumah singgah.
                
                Menjadi donatur alat sholat tidaklah sulit. Kita bisa memulainya dengan mengumpulkan alat sholat yang sudah tidak kita gunakan lagi dan memastikan bahwa alat tersebut masih layak pakai. Setelah itu, kita bisa menghubungi lembaga sosial yang membutuhkan dan mengirimkan alat sholat tersebut.',
                'image' => 'images\article\Perlengkapan Sholat.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 1,
                'title' => 'Donasi Buku dan Peralatan Sekolah untuk Anak',
                'description' => 'Donasi dan peralatan sekolah merupakan hal yang sangat penting bagi anak-anak untuk menunjang proses belajar mereka di sekolah. Namun, banyak anak-anak di berbagai daerah yang kurang memiliki akses untuk memiliki peralatan sekolah yang memadai.

                Oleh karena itu, sangat penting bagi kita untuk berbagi dan membantu anak-anak di berbagai daerah untuk memiliki peralatan sekolah yang mereka butuhkan. Peralatan sekolah yang bisa didonasikan antara lain buku, pensil, penghapus, dan sejenisnya yang masih layak pakai. Donasi peralatan sekolah bisa diberikan ke berbagai lembaga sosial yang bergerak di bidang pendidikan dan pemberdayaan masyarakat, seperti yayasan, panti asuhan, atau rumah singgah.
                
                Menjadi donatur peralatan sekolah tidaklah sulit. Kita bisa memulainya dengan mengumpulkan peralatan sekolah yang sudah tidak kita gunakan lagi dan memastikan bahwa peralatan tersebut masih layak pakai. Setelah itu, kita bisa menghubungi lembaga sosial yang membutuhkan dan mengirimkan peralatan sekolah tersebut.
                
                Donasi peralatan sekolah untuk anak-anak merupakan bentuk kebaikan yang sederhana namun sangat bermakna. Dengan sedikit usaha, kita bisa membantu memenuhi kebutuhan dasar anak-anak untuk belajar dan berkembang dengan baik. Oleh karena itu, marilah kita mulai membuat perbedaan dengan melakukan donasi peralatan sekolah untuk anak-anak.',
                'image' => 'images\article\Alat Tulis.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 1,
                'title' => 'Realisasi Bantuan Perlengkapan Sholat Yatim & Dhuafa ',
                'description' => 'Realisasi bantuan perlengkapan sholat untuk anak yatim dan dhuafa merupakan hal yang sangat penting bagi memenuhi kebutuhan spiritual dan religius anak-anak tersebut. Namun, banyak anak yatim dan dhuafa yang kurang memiliki akses untuk memiliki perlengkapan sholat yang memadai.

                Oleh karena itu, sangat penting bagi kita untuk berbagi dan membantu anak yatim dan dhuafa untuk memiliki perlengkapan sholat yang mereka butuhkan. Perlengkapan sholat yang bisa didonasikan antara lain kain sholat, misalnya, tasbih, atau sejenisnya yang masih layak pakai. Donasi perlengkapan sholat bisa diberikan ke berbagai lembaga sosial yang bergerak di bidang pendidikan dan pemberdayaan masyarakat, seperti yayasan, panti asuhan, atau rumah singgah.
                
                Menjadi donatur perlengkapan sholat tidaklah sulit. Kita bisa memulainya dengan mengumpulkan perlengkapan sholat yang sudah tidak kita gunakan lagi dan memastikan bahwa perlengkapan tersebut masih layak pakai. Setelah itu, kita bisa menghubungi lembaga sosial yang membutuhkan dan mengirimkan perlengkapan sholat tersebut.
                
                Donasi perlengkapan sholat untuk anak yatim dan dhuafa merupakan bentuk kebaikan yang sederhana namun sangat bermakna. Dengan sedikit usaha, kita bisa membantu memenuhi kebutuhan spiritual dan religius anak-anak tersebut untuk beribadah dengan baik. Oleh karena itu, marilah kita mulai membuat perbedaan dengan melakukan donasi perlengkapan sholat untuk anak yatim dan dhuafa.',
                'image' => 'images\article\Perlengkapan Sholat.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 1,
                'title' => 'Arti Donasi dan 4 Jenis nya yang ada di Indonesia',
                'description' => 'Donasi adalah suatu bentuk sumbangan yang diberikan kepada suatu organisasi, individu, atau lembaga tertentu. Donasi dapat berupa barang atau uang, dan bertujuan untuk membantu memenuhi kebutuhan sosial, pendidikan, kesehatan, atau hal-hal lain yang membutuhkan dukungan finansial.

                Berikut adalah 4 jenis donasi yang ada di Indonesia:
                
                Donasi Uang: adalah suatu bentuk sumbangan yang diberikan kepada suatu organisasi atau lembaga dalam bentuk uang tunai.
                
                Donasi Barang: adalah suatu bentuk sumbangan yang diberikan kepada suatu organisasi atau lembaga dalam bentuk barang yang masih layak pakai seperti pakaian, makanan, peralatan rumah tangga, atau barang-barang lain yang membutuhkan.
                
                Donasi Jasa: adalah suatu bentuk sumbangan yang diberikan dalam bentuk jasa, seperti memberikan bantuan tenaga, waktu, dan keterampilan.
                
                Donasi Ekuitas: adalah suatu bentuk sumbangan dalam bentuk saham, obligasi, atau instrumen keuangan lainnya, dan bertujuan untuk memberikan dukungan finansial kepada organisasi atau lembaga.
                
                Donasi memiliki peran penting dalam mewujudkan keadilan sosial dan membantu memenuhi kebutuhan masyarakat yang kurang mampu. Oleh karena itu, setiap individu harus memiliki kesadaran untuk berbagi dan melakukan donasi untuk membantu sesama.',
                'image' => 'images\article\Barang Bekas 2.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
            [
                'user_id' => 1,
                'title' => 'Baju Layak Pakai itu Seperti Apa?',
                'description' => 'Sebelum kita menggalang donasi pakaian, maka kita perlu sosialisasikan dulu kepada donatur apa yang dimaksud dengan baju layak pakai, agar donatur hanya memberikan baju yang benar-benar masih layak. Bukan menarik semua pakaian bekas yang ada di rumahnya, menghimpunnya dalam satu wadah, seperti hendak membuang sampah.

                Baju layak pakai dapat diartikan sebagai baju luar (bukan pakaian dalam), baju luar di sini mungkin seperti kaos (bukan kaos dalam), kemeja, jas, baju hangat, gamis, outer, daster, rok, celana (panjang atau pendek) kerudung, topi, kaos kaki, dan lain-lain. Kondisi pakaian tersebut harus dalam keadaan utuh, tidak bolong, tidak ada tambalan, robek, kotor, dan compang-camping.
                
                Pakaian harus memenuhi syarat kelaziman dan pantas untuk dipakai dalam pergaulan sehari-hari. Umpamanya pakaian tersebut pantas dipakai ke tempat umum, misal menghadiri pengajian, mengunjungi tempat rekreasi, sekolah, atau ke tempat hajatan.',
                'image' => 'images\article\Baju Bekas 3.jpg',
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
                'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
            ],
        ]);
    }
}
