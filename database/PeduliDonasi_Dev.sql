-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 09, 2023 at 03:50 PM
-- Server version: 10.3.38-MariaDB-0ubuntu0.20.04.1
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Database: `PeduliDonasi_Dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_yayasan`
--

CREATE TABLE `activity_yayasan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `yayasan_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activity_yayasan`
--

INSERT INTO `activity_yayasan` (`id`, `yayasan_id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'TGR CAMPAIGN', 'Aksi puncak kampanye berupa gelar kreativitas anak, pameran permainan tradisional dan main permainan tradisional bersama-sama.', 'images/activity/Z8429QJxrvaSCwy66gXtyaTFlvceItaRY3g9BKZO.jpg', NULL, '2023-03-09 19:53:37'),
(2, 1, 'TGR JALAN-JALAN', 'Program rutin TGR untuk menyosialisasikan permainan tradisional di ruang publik.', 'images/activity/knsP8kMJPowErls9R1X1jhOjsDpzZO56nKU8pR58.jpg', NULL, '2023-03-09 19:56:20'),
(3, 1, 'TGR GOES TO SCHOOL', 'Program TGR ke sekolah untuk mengedukasi permainan tradisional mulai dari tingkat pra sekolah, sekolah dasar, sekolah menengah hingga perguruan tinggi.', 'images/activity/FB0yrG9aA0ixISYLhLCa3SJ4CM8t4nUJv9i7g3S3.jpg', NULL, '2023-03-09 19:56:36');

-- --------------------------------------------------------

--
-- Table structure for table `approval_yayasan`
--

CREATE TABLE `approval_yayasan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_number` varchar(255) NOT NULL,
  `bank_owner` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `donation_purposes` text NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `category_food` tinyint(1) NOT NULL DEFAULT 0,
  `category_stationary` tinyint(1) NOT NULL DEFAULT 0,
  `category_clothes` tinyint(1) NOT NULL DEFAULT 0,
  `yayasan_documents` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `comment` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `user_id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Cara Praktis Memilah Pakaian Bekas Layak Pakai untuk Donasi', 'Akhir-akhir ini, kita disuguhi berita yang bisa dikatakan miris terkait bantuan pakaian untuk korban gempa di Cianjur. Bagaimana tumpukan pakaian donasi tersebut menumpuk layaknya tumpukan sampah. Kita tidak bisa menyalahkan siapa-siapa dalam hal ini. Banyak faktor yang menyebabkan kondisi demikian. Pertama, keadaan darurat dan beberapa kali terjadinya gempa susulan membuat warga, relawan, dan tenaga-tenaga medis, serta pemerintah yang ada di sana sibuk untuk menyelamatkan jiwa masyarakat terlebih dahulu. Dengan demikian, banyaknya bantuan dari masyarakat sekitar seperti mie, pakaian, dan kebutuhan lainnya seakan terlantar. Kedua, sebagai donatur kita juga harus introspeksi diri. Jangan-jangan kondisi pakaian yang kita sumbangkan tersebut dalam keadaan tidak layak pakai. Alih-alih ingin memberikan bantuan untuk saudara-saudara kita, yang terjadi malah kita menyumbang tumpukan sampah. Karena, bila kondisi pakaian yang disumbangkan sudah robek, bolong-bolong, dan tidak layak. Siapakah orang yang mau menggunakannya, betul gak? Oleh karena itu, sebelum menggalang donasi pakaian untuk korban bencana alam, baik korban gempa, longsor, banjir, dan bencana-bencana lainnya. Kita harus bijak untuk memilah dan memilih mana pakaian yang masih bagus dan pantas untuk disumbangkan, dan mana pakaian yang harus dibuang atau dijadikan kain lap. ', 'images\\article\\Barang Bekas 3.jpeg', '2023-03-09 15:12:32', '2023-03-09 15:12:32'),
(2, 1, 'Banyak Barang Tak Terpakai di Rumah? Donasikan Saja', 'Donasi pakaian layak pakai adalah bentuk kebaikan yang sangat bermanfaat bagi masyarakat yang kurang mampu. Dengan memberikan pakaian yang masih layak pakai, kita bisa membantu memenuhi kebutuhan dasar mereka dan membuat mereka merasa lebih berharga. Pakaian yang layak pakai bisa berupa baju, celana, rok, atau pakaian lain yang masih dalam kondisi baik dan bisa digunakan kembali. Donasi pakaian layak pakai bisa diberikan ke berbagai organisasi sosial, seperti panti asuhan, rumah singgah, atau lembaga amal lainnya. Menjadi donatur pakaian layak pakai tidaklah sulit. Kita bisa memulainya dengan mengumpulkan pakaian yang sudah tidak kita gunakan lagi dan memastikan bahwa pakaian tersebut masih dalam kondisi baik. Setelah itu, kita bisa menghubungi lembaga sosial yang membutuhkan dan mengirimkan pakaian tersebut.', 'images\\article\\Barang Bekas 2.jpg', '2023-03-09 15:12:32', '2023-03-09 15:12:32'),
(3, 1, 'Donasi Lewat Pakaian Layak Pakai', 'Donasi pakaian layak pakai adalah bentuk kebaikan yang sangat bermanfaat bagi masyarakat yang kurang mampu. Dengan memberikan pakaian yang masih layak pakai, kita bisa membantu memenuhi kebutuhan dasar mereka dan membuat mereka merasa lebih berharga.\r\n\r\n                Pakaian yang layak pakai bisa berupa baju, celana, rok, atau pakaian lain yang masih dalam kondisi baik dan bisa digunakan kembali. Donasi pakaian layak pakai bisa diberikan ke berbagai organisasi sosial, seperti panti asuhan, rumah singgah, atau lembaga amal lainnya.\r\n                \r\n                Menjadi donatur pakaian layak pakai tidaklah sulit. Kita bisa memulainya dengan mengumpulkan pakaian yang sudah tidak kita gunakan lagi dan memastikan bahwa pakaian tersebut masih dalam kondisi baik. Setelah itu, kita bisa menghubungi lembaga sosial yang membutuhkan dan mengirimkan pakaian tersebut.\r\n                \r\n                Namun, ada beberapa hal yang perlu diperhatikan sebelum melakukan donasi pakaian layak pakai. Pertama, pastikan pakaian yang akan didonasikan benar-benar layak pakai dan tidak rusak. Kedua, pastikan pakaian tersebut bersih dan tidak membawa bau yang tidak sedap. Terakhir, sertakan informasi mengenai ukuran dan jenis pakaian yang didonasikan agar lembaga sosial yang menerima dapat memanfaatkannya dengan baik.\r\n                \r\n                Donasi pakaian layak pakai merupakan bentuk kebaikan yang sederhana namun sangat bermakna. Dengan sedikit usaha, kita bisa membantu memenuhi kebutuhan dasar masyarakat yang kurang mampu dan membuat mereka merasa lebih berharga. Oleh karena itu, marilah kita mulai membuat perbedaan dengan melakukan donasi pakaian layak pakai.', 'images\\article\\Baju Bekas 4.jpeg', '2023-03-09 15:12:32', '2023-03-09 15:12:32'),
(4, 1, 'Ajak Donasi Dengan Barang Bekas', 'Masyarakat selalu membutuhkan dukungan dari masyarakat lain. Salah satu bentuk dukungan tersebut adalah melalui donasi. Terlebih lagi saat ini, banyak masyarakat yang membutuhkan bantuan karena dampak dari pandemi. Dalam situasi seperti ini, donasi barang bekas bisa menjadi salah satu solusi untuk membantu masyarakat yang membutuhkan.\r\n\r\n                Barang bekas yang tidak lagi digunakan bisa menjadi sumber donasi yang sangat berguna bagi orang lain. Barang-barang seperti pakaian, makanan, buku, dan alat-alat rumah tangga bisa sangat berguna bagi masyarakat yang membutuhkan. Donasi barang bekas bisa membuat barang-barang tersebut tidak terbuang percuma dan masih berguna bagi orang lain.\r\n                \r\n                Untuk melakukan donasi barang bekas, kita bisa mengajak teman, keluarga, dan rekan kerja untuk ikut serta. Kita juga bisa mengajak lembaga sosial, sekolah, rumah sakit, panti asuhan, dan organisasi bencana untuk menerima donasi barang bekas. Kita juga bisa mengajak masyarakat untuk mengumpulkan barang bekas yang tidak terpakai dan memberikannya kepada masyarakat yang membutuhkan.\r\n                \r\n                Namun, saat melakukan donasi barang bekas, pastikan bahwa barang-barang yang diberikan masih dalam kondisi baik dan layak pakai. Ini akan memastikan bahwa barang-barang tersebut berguna bagi orang yang menerimanya.\r\n                \r\n                Ajakan untuk melakukan donasi barang bekas merupakan salah satu cara untuk membantu masyarakat yang membutuhkan. Oleh karena itu, marilah kita membantu dengan melakukan donasi barang bekas yang dapat membantu membuat hidup orang lain lebih baik.', 'images\\article\\Barang Bekas 3.jpeg', '2023-03-09 15:12:32', '2023-03-09 15:12:32'),
(5, 1, 'Barang Tak Terpakai, Diinfakkan Menjadi Berkah dan Bernilai', 'Berinfaq dengan berdonasi barang bekas adalah salah satu cara untuk membantu sesama dan membantu memenuhi kebutuhan dasar masyarakat yang kurang mampu. Infaq adalah bentuk kebaikan yang dilakukan dengan memberikan harta benda yang dimiliki, dan berdonasi barang bekas merupakan bentuk infaq yang sangat efektif dan sederhana.\r\n\r\n                Barang bekas yang bisa didonasikan bisa berupa pakaian, sepatu, peralatan rumah tangga, atau barang lain yang masih layak pakai namun sudah tidak terpakai. Donasi barang bekas bisa diberikan ke berbagai organisasi sosial, seperti panti asuhan, rumah singgah, atau lembaga amal lainnya.\r\n                \r\n                Menjadi donatur barang bekas tidaklah sulit. Kita bisa memulainya dengan mengumpulkan barang bekas yang sudah tidak kita gunakan lagi dan memastikan bahwa barang tersebut masih layak pakai. Setelah itu, kita bisa menghubungi lembaga sosial yang membutuhkan dan mengirimkan barang bekas tersebut.\r\n                \r\n                Namun, ada beberapa hal yang perlu diperhatikan sebelum melakukan donasi barang bekas. Pertama, pastikan barang yang akan', 'images\\article\\Barang Bekas.jpg', '2023-03-09 15:12:32', '2023-03-09 15:12:32'),
(6, 1, 'Bersedekah Melalui Barang Bekasi', 'Bersedekah melalui barang bekas adalah salah satu cara untuk membantu sesama dan membantu memenuhi kebutuhan dasar masyarakat yang kurang mampu. Sedekah adalah bentuk kebaikan yang dilakukan dengan memberikan harta benda yang dimiliki, dan berdonasi barang bekas merupakan bentuk sedekah yang sangat efektif dan sederhana.\r\n\r\n                Barang bekas yang bisa didonasikan bisa berupa pakaian, sepatu, peralatan rumah tangga, atau barang lain yang masih layak pakai namun sudah tidak terpakai. Sedekah melalui barang bekas bisa diberikan ke berbagai organisasi sosial, seperti panti asuhan, rumah singgah, atau lembaga amal lainnya.\r\n                \r\n                Menjadi pemberi sedekah melalui barang bekas tidaklah sulit. Kita bisa memulainya dengan mengumpulkan barang bekas yang sudah tidak kita gunakan lagi dan memastikan bahwa barang tersebut masih layak pakai. Setelah itu, kita bisa menghubungi lembaga sosial yang membutuhkan dan mengirimkan barang bekas tersebut.\r\n                \r\n                Namun, ada beberapa hal yang perlu diperhatikan sebelum melakukan sedekah melalui barang bekas. Pertama, pastikan barang yang akan disedekahkan benar-benar layak pakai dan tidak rusak. Kedua, pastikan barang tersebut bersih dan tidak membawa bau yang tidak sedap. Terakhir, sertakan informasi mengenai ukuran dan jenis barang yang disedekahkan agar lembaga sosial yang menerima dapat memanfaatkannya dengan baik.\r\n                \r\n                Sedekah melalui barang bekas merupakan bentuk kebaikan yang sederhana namun sangat bermakna. Dengan sedikit usaha, kita bisa membantu memenuhi kebutuhan dasar masyarakat yang kurang mampu dan membuat mereka merasa lebih berharga. Oleh karena itu, marilah kita mulai membuat perbedaan dengan melakukan sedekah melalui barang bekas.', 'images\\article\\1 Barang Bekas.jpg', '2023-03-09 15:12:32', '2023-03-09 15:12:32'),
(7, 1, 'Penyaluran Ratusan Alat Sholat Untuk Dhuafa Pelosok Desa', 'Alat sholat merupakan hal yang sangat penting bagi umat Muslim untuk melaksanakan ibadah sholat dengan baik dan sempurna. Namun, banyak anak dhuafa di pelosok desa yang kurang memiliki akses untuk memiliki alat sholat seperti mushaf, mukena, dan sejenisnya.\r\n\r\n                Oleh karena itu, sangat penting bagi kita untuk berbagi dan membantu anak dhuafa di pelosok desa untuk memiliki alat sholat yang mereka butuhkan. Alat sholat yang bisa didonasikan antara lain mushaf, mukena, dan sejenisnya yang masih layak pakai. Donasi alat sholat bisa diberikan ke berbagai lembaga sosial yang bergerak di bidang pendidikan dan pemberdayaan masyarakat, seperti yayasan, panti asuhan, atau rumah singgah.\r\n                \r\n                Menjadi donatur alat sholat tidaklah sulit. Kita bisa memulainya dengan mengumpulkan alat sholat yang sudah tidak kita gunakan lagi dan memastikan bahwa alat tersebut masih layak pakai. Setelah itu, kita bisa menghubungi lembaga sosial yang membutuhkan dan mengirimkan alat sholat tersebut.', 'images\\article\\Perlengkapan Sholat.jpg', '2023-03-09 15:12:32', '2023-03-09 15:12:32'),
(8, 1, 'Donasi Buku dan Peralatan Sekolah untuk Anak', 'Donasi dan peralatan sekolah merupakan hal yang sangat penting bagi anak-anak untuk menunjang proses belajar mereka di sekolah. Namun, banyak anak-anak di berbagai daerah yang kurang memiliki akses untuk memiliki peralatan sekolah yang memadai.\r\n\r\n                Oleh karena itu, sangat penting bagi kita untuk berbagi dan membantu anak-anak di berbagai daerah untuk memiliki peralatan sekolah yang mereka butuhkan. Peralatan sekolah yang bisa didonasikan antara lain buku, pensil, penghapus, dan sejenisnya yang masih layak pakai. Donasi peralatan sekolah bisa diberikan ke berbagai lembaga sosial yang bergerak di bidang pendidikan dan pemberdayaan masyarakat, seperti yayasan, panti asuhan, atau rumah singgah.\r\n                \r\n                Menjadi donatur peralatan sekolah tidaklah sulit. Kita bisa memulainya dengan mengumpulkan peralatan sekolah yang sudah tidak kita gunakan lagi dan memastikan bahwa peralatan tersebut masih layak pakai. Setelah itu, kita bisa menghubungi lembaga sosial yang membutuhkan dan mengirimkan peralatan sekolah tersebut.\r\n                \r\n                Donasi peralatan sekolah untuk anak-anak merupakan bentuk kebaikan yang sederhana namun sangat bermakna. Dengan sedikit usaha, kita bisa membantu memenuhi kebutuhan dasar anak-anak untuk belajar dan berkembang dengan baik. Oleh karena itu, marilah kita mulai membuat perbedaan dengan melakukan donasi peralatan sekolah untuk anak-anak.', 'images\\article\\Alat Tulis.jpg', '2023-03-09 15:12:32', '2023-03-09 15:12:32'),
(9, 1, 'Realisasi Bantuan Perlengkapan Sholat Yatim & Dhuafa ', 'Realisasi bantuan perlengkapan sholat untuk anak yatim dan dhuafa merupakan hal yang sangat penting bagi memenuhi kebutuhan spiritual dan religius anak-anak tersebut. Namun, banyak anak yatim dan dhuafa yang kurang memiliki akses untuk memiliki perlengkapan sholat yang memadai.\r\n\r\n                Oleh karena itu, sangat penting bagi kita untuk berbagi dan membantu anak yatim dan dhuafa untuk memiliki perlengkapan sholat yang mereka butuhkan. Perlengkapan sholat yang bisa didonasikan antara lain kain sholat, misalnya, tasbih, atau sejenisnya yang masih layak pakai. Donasi perlengkapan sholat bisa diberikan ke berbagai lembaga sosial yang bergerak di bidang pendidikan dan pemberdayaan masyarakat, seperti yayasan, panti asuhan, atau rumah singgah.\r\n                \r\n                Menjadi donatur perlengkapan sholat tidaklah sulit. Kita bisa memulainya dengan mengumpulkan perlengkapan sholat yang sudah tidak kita gunakan lagi dan memastikan bahwa perlengkapan tersebut masih layak pakai. Setelah itu, kita bisa menghubungi lembaga sosial yang membutuhkan dan mengirimkan perlengkapan sholat tersebut.\r\n                \r\n                Donasi perlengkapan sholat untuk anak yatim dan dhuafa merupakan bentuk kebaikan yang sederhana namun sangat bermakna. Dengan sedikit usaha, kita bisa membantu memenuhi kebutuhan spiritual dan religius anak-anak tersebut untuk beribadah dengan baik. Oleh karena itu, marilah kita mulai membuat perbedaan dengan melakukan donasi perlengkapan sholat untuk anak yatim dan dhuafa.', 'images\\article\\Perlengkapan Sholat.jpg', '2023-03-09 15:12:32', '2023-03-09 15:12:32'),
(10, 1, 'Arti Donasi dan 4 Jenis nya yang ada di Indonesia', 'Donasi adalah suatu bentuk sumbangan yang diberikan kepada suatu organisasi, individu, atau lembaga tertentu. Donasi dapat berupa barang atau uang, dan bertujuan untuk membantu memenuhi kebutuhan sosial, pendidikan, kesehatan, atau hal-hal lain yang membutuhkan dukungan finansial.\r\n\r\n                Berikut adalah 4 jenis donasi yang ada di Indonesia:\r\n                \r\n                Donasi Uang: adalah suatu bentuk sumbangan yang diberikan kepada suatu organisasi atau lembaga dalam bentuk uang tunai.\r\n                \r\n                Donasi Barang: adalah suatu bentuk sumbangan yang diberikan kepada suatu organisasi atau lembaga dalam bentuk barang yang masih layak pakai seperti pakaian, makanan, peralatan rumah tangga, atau barang-barang lain yang membutuhkan.\r\n                \r\n                Donasi Jasa: adalah suatu bentuk sumbangan yang diberikan dalam bentuk jasa, seperti memberikan bantuan tenaga, waktu, dan keterampilan.\r\n                \r\n                Donasi Ekuitas: adalah suatu bentuk sumbangan dalam bentuk saham, obligasi, atau instrumen keuangan lainnya, dan bertujuan untuk memberikan dukungan finansial kepada organisasi atau lembaga.\r\n                \r\n                Donasi memiliki peran penting dalam mewujudkan keadilan sosial dan membantu memenuhi kebutuhan masyarakat yang kurang mampu. Oleh karena itu, setiap individu harus memiliki kesadaran untuk berbagi dan melakukan donasi untuk membantu sesama.', 'images\\article\\Barang Bekas 2.jpg', '2023-03-09 15:12:32', '2023-03-09 15:12:32'),
(11, 1, 'Baju Layak Pakai itu Seperti Apa?', 'Sebelum kita menggalang donasi pakaian, maka kita perlu sosialisasikan dulu kepada donatur apa yang dimaksud dengan baju layak pakai, agar donatur hanya memberikan baju yang benar-benar masih layak. Bukan menarik semua pakaian bekas yang ada di rumahnya, menghimpunnya dalam satu wadah, seperti hendak membuang sampah.\r\n\r\n                Baju layak pakai dapat diartikan sebagai baju luar (bukan pakaian dalam), baju luar di sini mungkin seperti kaos (bukan kaos dalam), kemeja, jas, baju hangat, gamis, outer, daster, rok, celana (panjang atau pendek) kerudung, topi, kaos kaki, dan lain-lain. Kondisi pakaian tersebut harus dalam keadaan utuh, tidak bolong, tidak ada tambalan, robek, kotor, dan compang-camping.\r\n                \r\n                Pakaian harus memenuhi syarat kelaziman dan pantas untuk dipakai dalam pergaulan sehari-hari. Umpamanya pakaian tersebut pantas dipakai ke tempat umum, misal menghadiri pengajian, mengunjungi tempat rekreasi, sekolah, atau ke tempat hajatan.', 'images\\article\\Baju Bekas 3.jpg', '2023-03-09 15:12:32', '2023-03-09 15:12:32');

-- --------------------------------------------------------

--
-- Table structure for table `discussions`
--

CREATE TABLE `discussions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `discussion_text` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discussions`
--

INSERT INTO `discussions` (`id`, `user_id`, `title`, `discussion_text`, `created_at`, `updated_at`) VALUES
(1, 14, 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-03-09 15:12:32', '2023-03-09 15:12:32'),
(2, 14, 'Lorem Ipsum 2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-03-09 15:12:32', '2023-03-09 15:12:32'),
(3, 14, 'Bagaimana saya tahu kalau barang saya sampai?', 'Bagaimana saya tahu kalau barang saya sampai?', '2023-03-09 20:28:19', '2023-03-09 20:28:19');

-- --------------------------------------------------------

--
-- Table structure for table `discussion_details`
--

CREATE TABLE `discussion_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `discussion_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `discussion_text` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discussion_details`
--

INSERT INTO `discussion_details` (`id`, `discussion_id`, `user_id`, `discussion_text`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-03-09 15:12:32', '2023-03-09 15:12:32'),
(2, 1, 14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-03-09 15:12:32', '2023-03-09 15:12:32'),
(3, 1, 2, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-03-09 15:12:32', '2023-03-09 15:12:32'),
(4, 2, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-03-09 15:12:32', '2023-03-09 15:12:32'),
(5, 2, 14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-03-09 15:12:32', '2023-03-09 15:12:32'),
(6, 2, 3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-03-09 15:12:32', '2023-03-09 15:12:32'),
(7, 2, 14, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', '2023-03-09 15:12:32', '2023-03-09 15:12:32'),
(8, 3, 2, 'Lewat penerimaan nomor resi', '2023-03-09 20:31:32', '2023-03-09 20:31:32');

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `yayasan_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nama_pengirim` varchar(255) NOT NULL,
  `alamat_pengirim` varchar(255) NOT NULL,
  `no_tlp_pengirim` varchar(255) NOT NULL,
  `tujuan_donasi` varchar(255) NOT NULL,
  `kondisi_barang` varchar(255) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `deskripsi_barang` text NOT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `nama_kurir` varchar(255) DEFAULT NULL,
  `resi_kurir` varchar(255) DEFAULT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `donations`
--

INSERT INTO `donations` (`id`, `yayasan_id`, `user_id`, `nama_pengirim`, `alamat_pengirim`, `no_tlp_pengirim`, `tujuan_donasi`, `kondisi_barang`, `jumlah_barang`, `deskripsi_barang`, `image1`, `image2`, `image3`, `nama_kurir`, `resi_kurir`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 14, 'Dandi Prayogatama', 'Bojong Kulur', '08159933123', 'Amal', 'Bekas', 2, 'Baju dan Peralatan Rumah', 'images/donations/QqYlIIEjU4oheuFZZ77q1Dt8GDEgQx08qfugyOoC.jpg', NULL, NULL, 'SiCepat', '012345678910', 'Menunggu Pickup', '2023-03-09 20:25:11', '2023-03-09 20:25:48');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `faq`
--

CREATE TABLE `faq` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `faq`
--

INSERT INTO `faq` (`id`, `title`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Jenis Barang Donasi', 'Barang bekas, sembako, uang, pakaian, perelngkapan sekolah, dan kebutuhan sehari-hari.', NULL, NULL),
(2, 'Donasi', 'Donasi bentuk bantuan berupa barang kepada Yayasan sosial yang membutuhkan, baik untuk keperluan sosial, kemanusiaan, bencana alam, pendidikan, kesehatan, atau kegiatan lainnya yang bertujuan untuk membantu peningkatan kualitas hidup orang lain. ', NULL, NULL),
(3, 'Artikel', 'Artikel memberikan informasi kabar kebaikan dalam dalam donasi.', NULL, NULL),
(4, 'Forum', ' Forum diskusi untuk interaksi antara Donatur dengan Yayasan dalam mengenai Informasi Donasi dengan pertanyaan dan jawaban.', NULL, NULL),
(5, 'Notifikasi', 'Notifikasi merupakan pemberitahuan berupa pesan singkat yang di sampaikan kepada Donatur dan Yayasan.', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `item_details`
--

CREATE TABLE `item_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_donasi`
--

CREATE TABLE `kategori_donasi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `css_class_name_color` varchar(255) DEFAULT NULL,
  `css_class_name_icon` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_donasi`
--

INSERT INTO `kategori_donasi` (`id`, `name`, `icon`, `css_class_name_color`, `css_class_name_icon`, `created_at`, `updated_at`) VALUES
(1, 'Makanan', NULL, 'bg-success', 'fa-bowl-food', NULL, NULL),
(2, 'Pakaian', NULL, 'bg-primary', 'fa-shirt', NULL, NULL),
(3, 'Alat Tulis', NULL, 'bg-secondary', 'fa-pencil', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kategori_donasi_yayasan`
--

CREATE TABLE `kategori_donasi_yayasan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `yayasan_id` bigint(20) UNSIGNED NOT NULL,
  `kategori_donasi_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_donasi_yayasan`
--

INSERT INTO `kategori_donasi_yayasan` (`id`, `yayasan_id`, `kategori_donasi_id`, `created_at`, `updated_at`) VALUES
(1, 1, 1, NULL, NULL),
(2, 1, 2, NULL, NULL),
(3, 1, 3, NULL, NULL),
(4, 2, 3, NULL, NULL),
(5, 2, 1, NULL, NULL),
(6, 2, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_11_000000_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2023_01_15_202504_create_yayasan_table', 1),
(7, '2023_01_15_203733_create_program_yayasan_table', 1),
(8, '2023_01_15_203745_create_articles_table', 1),
(9, '2023_01_15_203859_create_kategori_donasi_table', 1),
(10, '2023_01_15_203932_create_kategori_donasi_yayasan_table', 1),
(11, '2023_01_26_195314_create_donations_table', 1),
(12, '2023_01_26_195409_create_item_details_table', 1),
(13, '2023_01_26_195419_create_faq_table', 1),
(14, '2023_01_26_195514_create_discussions_table', 1),
(15, '2023_01_26_200101_create_discussion_details_table', 1),
(16, '2023_01_26_200134_create_approval_yayasan_table', 1),
(17, '2023_01_30_021154_create_activity_yayasan_table', 1),
(18, '2023_02_06_211455_create_notifications_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `isNew` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `program_yayasan`
--

CREATE TABLE `program_yayasan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `yayasan_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `program_yayasan`
--

INSERT INTO `program_yayasan` (`id`, `yayasan_id`, `title`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ajak Anak-anak RPTRA Matahari Bermain Permainan Tradisional', 'TGR Community bertandang di RPTRA Matahari dengan membawa beberapa permainan tradisional untuk dimainkan bersama anak-anak di sana.', 'images/program/Y7J0Sq9b8uyxdczzlpdjwGAQ4cdDzZb49syvmCnq.png', NULL, '2023-03-09 19:50:12'),
(2, 1, 'Keseruan Bermain Permainan Tradisional di SMPITAL Festival 5 SMPIT Al-Husnayain', 'Tim TGR mendapat kesempatan untuk ikut berpartisipasi dalam acara SMPITAL Festival 5 Generasi Milenial Berbudaya di SMPIT Al Husnayain', 'images/program/xi9UKoxX9mAVnnzfSE9AcH8xGr1mpi0mWyOYbD9i.jpg', NULL, '2023-03-09 19:49:18'),
(3, 1, 'Potret Keseruan Bermain Bersama di RPTRA Beringin', 'TGR Community kembali mengadakan event bermain bersama di RPTRA Beringin yang berlokasi di Jalan Rawasari Barat, Kecamatan Cempaka Putih, Jakarta Pusat setelah kegiatan pertamanya yang dilaksanakan pada 16 Februari 2019 silam.', 'images/program/1GZXNgH8qGSryX1czAyYTOEfkmoasU2Ih91GKZpl.png', NULL, '2023-03-09 19:49:59');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', NULL, NULL),
(2, 'User', NULL, NULL),
(3, 'Staff Yayasan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `name`, `phone`, `image`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, 'Administrator', NULL, NULL, 'admin@pedulidonasi.com', NULL, '$2y$10$TCOIg.Duc9yZ4OokESnfe.YyzAxN8Lt5oaIlAnkxFEJKasKSBOO3i', NULL, NULL, NULL),
(2, 3, 'Yayasan 1', NULL, NULL, 'yayasan1@pedulidonasi.com', NULL, '$2y$10$hhwHIHITASTAd2fPI3RgV.gAtf09nsXUYn7PjtbclGtINURktyURS', NULL, NULL, NULL),
(3, 3, 'Yayasan 2', NULL, NULL, 'yayasan2@pedulidonasi.com', NULL, '$2y$10$cxXHLzc20/6URO8hOVcSauw2IrOkW21C6aWIDPxmaPsVqd4555kOO', NULL, NULL, NULL),
(4, 3, 'Yayasan 3', NULL, NULL, 'yayasan3@pedulidonasi.com', NULL, '$2y$10$/k8S2zdFTjxj/KerBR3.3Oc9zKPLUrog.2M8.hn/WWFgFajdOHHy2', NULL, NULL, NULL),
(5, 3, 'Yayasan 4', NULL, NULL, 'yayasan4@pedulidonasi.com', NULL, '$2y$10$Fc8GIKFRGL0GsXyf9fWpSu8ntOSDgZ6NCFNMS4..8KU.6Li.oCNee', NULL, NULL, NULL),
(6, 3, 'Yayasan 5', NULL, NULL, 'yayasan5@pedulidonasi.com', NULL, '$2y$10$/OLfDVfOkw0hXTKjIZtv/uJXmRiUBIOQw/sI0lexIpSe54xEgBLU.', NULL, NULL, NULL),
(7, 3, 'Yayasan 6', NULL, NULL, 'yayasan6@pedulidonasi.com', NULL, '$2y$10$mbrl1iPnf2BFpGDgilRXCO3hpEEhz8OMKDZ3Jlz9fx2M92VyyydJe', NULL, NULL, NULL),
(8, 3, 'Yayasan 7', NULL, NULL, 'yayasan7@pedulidonasi.com', NULL, '$2y$10$HlWfmvG0Iqydibi9dSQ0u.VKeljBvb6nVYPUuTl4SM4jukjzzSzz6', NULL, NULL, NULL),
(9, 3, 'Yayasan 8', NULL, NULL, 'yayasan8@pedulidonasi.com', NULL, '$2y$10$K0FcSCPqOOj.rrnAvywHW.Le9foa6nYbWsekRWrFIg6kkda/SzTk2', NULL, NULL, NULL),
(10, 3, 'Yayasan 9', NULL, NULL, 'yayasan9@pedulidonasi.com', NULL, '$2y$10$/mjuK9NlGKeSPWwpwIn0TOY8Q1KRS6CwMycum/sJQcaP6mXpGTsPS', NULL, NULL, NULL),
(11, 3, 'Yayasan 10', NULL, NULL, 'yayasan10@pedulidonasi.com', NULL, '$2y$10$RBK/rmh42pVH8kFNAEmeoOMJcjqLNpm5n2iPierA4srFH/SjMzUwu', NULL, NULL, NULL),
(12, 3, 'Yayasan 11', NULL, NULL, 'yayasan11@pedulidonasi.com', NULL, '$2y$10$5M/wlVTZdiN6vy99a7IOxut.Zk5VssENAZdfYl4Clj1NJrh4eJpCW', NULL, NULL, NULL),
(13, 3, 'Yayasan 12', NULL, NULL, 'yayasan12@pedulidonasi.com', NULL, '$2y$10$98IURI3zZvo.CIDBdrtcj.QDI.icgyoSCA7kttvhGK8Yl0xuEu7E2', NULL, NULL, NULL),
(14, 2, 'Donatur 1', NULL, NULL, 'donatur@pedulidonasi.com', NULL, '$2y$10$kDkpZ9ZeXhOIE/HNLc7Sc.10jykVyHD5Iawl8BCL5IPWAHk2DaHRu', NULL, NULL, NULL),
(15, 3, 'Yayasan Bekasi', '02182408760', NULL, 'yayasanbks@pedulidonasi.com', NULL, '$2y$10$mOqY/4FwdzE/JxVKXzyM.ewaOqGtz7B8x0CRg0dqyXe1dl.Z0N/EC', NULL, '2023-03-09 20:34:25', '2023-03-09 20:34:25');

-- --------------------------------------------------------

--
-- Table structure for table `yayasan`
--

CREATE TABLE `yayasan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact` varchar(255) NOT NULL,
  `bank_name` varchar(255) NOT NULL,
  `bank_number` varchar(255) NOT NULL,
  `bank_owner` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `donation_purposes` text NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `yayasan`
--

INSERT INTO `yayasan` (`id`, `user_id`, `name`, `city`, `address`, `contact`, `bank_name`, `bank_number`, `bank_owner`, `description`, `donation_purposes`, `logo`, `created_at`, `updated_at`) VALUES
(1, 2, 'Yayasan Tradisi Gim Rakyat', 'Bekasi', 'Jl. Kenari IV Blok D3 No.7, RT.007/RW.0013, Jatibening, Kec. Pd. Gede, Kota Bks, Jawa Barat 17412, Indonesia', '+62 812-9964-6016', 'BCA', '512345678', 'Yayasan TGR', 'Berawal dari ide sederhana akan keprihatinan terhadap anak-anak Indonesia yang hampir tidak mengenal lagi permainan tradisional, komunitas sosial budaya menggelar kampanye kembali permainan tradisional dengan slogan, \"Lupakan Gadgetmu Ayo Main Di Luar!\".', 'Membantu Anak-anak Yatim disekitar daerah Jakarta Timur.', 'logo\\1 Yayasan Tradisi Gim Rakyat.PNG', NULL, '2023-03-09 19:46:32'),
(2, 3, 'Yayasan Rahmatan Lil-Alamin', 'Jakarta Timur', 'Jl. H. Naman no.60 RT/RW 12/03 Kel. Pondok KelapaKec. Duren Sawit – Jakarta Timur, 13450', '(021) 86905367', ' Mandiri ', '166-000-089-495-6', 'YRLA foundation Group', 'Yayasan Rahmatan Lil-Alamin dalam kiprahnya sampai hari ini memiliki perjalanan sejarah yang unik dan berliku, pasang-surut dialami oleh para pengurusnya. Fenomena social yang ada disekeliling kita seperti kondisi anak-anak yatim, fakir miskin, kaum dhuafa, anak-anak terlantar, dan yang lainnya seperti bukan bagian dari tanggung jawab kita sebagai bagian dari bangsa yang kita cintai ini.', 'Membantu Anak-anak Yatim disekitar daerah Jakarta Timur, karena itu merupakan tanggung jawab dari Yayasan Ini', 'logo\\2 Yayasan Rahmatan.png', NULL, NULL),
(3, 4, 'Yayasan Karya Anak Bangsa', 'Jakarta Pusat', 'Jl. Cempaka Putih Tengah No. 42, Jakarta Pusat, DKI Jakarta, 10510', '(021) 4288 5380', 'BRI ', '0384-01-003954-53-6', 'Yayasan KAB', 'YKAB adalah yayasan yang berfokus pada pengembangan kapasitas anak-anak dan remaja melalui pendidikan dan pelatihan.', 'Membantu mengembangkan kapasitas anak-anak di sekolah', 'logo\\3 Yayasan Karya Anak Bangsa.png', NULL, NULL),
(4, 5, 'Yayasan Sayangi Tunas Cilik', 'Jakarta Selatan', 'Jl. Dr. Setiabudi No. 190, Jakarta Selatan, DKI Jakarta, 12920', '0812-3456-789', 'Mandiri ', '117-00-0695900-5', 'Yayasan STC', 'YSTC adalah yayasan yang berfokus pada peningkatan kualitas hidup anak-anak yang membutuhkan melalui pendidikan, kesehatan, dan kesempatan ekonomi.', 'Meningkatkan Kualitas Hidup anak-anak yang mebutuhkan', 'logo\\4 Yayasan Sayangi Tunas Cilik.jpg', NULL, NULL),
(5, 6, 'Yayasan Masyarakat Ekonomi Syariah', 'Jakarta Selatan', 'Jl. Jend. Sudirman Kav. 45-46, Jakarta Selatan, DKI Jakarta, 12930', '(021) 579 43306', 'BRI ', '4519-01-000889-50-9', 'Yayasan MES', 'Yayasan Masyarakat Ekonomi Syariah adalah yayasan yang berfokus pada pengembangan masyarakat melalui pendidikan dan pemberdayaan ekonomi yang berbasis syariah.', 'Mengembangkan masyarakat melalui pendidikan dan pemberdayaan ekonomi berbasis Syariah', 'logo\\5 Yayasan Masyarakat Ekonomi Syariah.jpg', NULL, NULL),
(6, 7, 'Yayasan Bina Bakti', 'Jakarta Selatan', 'Jl. Tebet Timur Dalam III No. 10, Jakarta Selatan, DKI Jakarta, 12810', '(021) 8370 4567', 'BRI ', '0384-01-004761-53-0', 'Yayasan BB', 'Yayasan Bina Bakti adalah yayasan yang berfokus pada pendidikan dan peningkatan kualitas hidup anak-anak melalui program bantuan dan pendidikan.', 'Membantu pendidikan dan kualitas hidup anak-anak', 'logo\\6 Yayasan Bina Bakti.png', NULL, NULL),
(7, 8, 'Yayasan Anak Cendekia', 'Jakarta Pusat', 'Jl. Raden Saleh Raya No. 47, Jakarta Pusat, DKI Jakarta, 10430', '(021) 3908 722', 'BNI ', '069-069-56-666', 'Yayasan AC', 'Yayasan Anak Cendekia adalah yayasan yang berfokus pada pendidikan dan peningkatan kualitas hidup anak-anak melalui program bantuan dan pendidikan.', 'Untuk Mengembangkan Implementasi Teknologi Hijau dan Ramah Lingkungan', 'logo\\7 Yayasan Anak Cendekia.jpg', NULL, NULL),
(8, 9, 'Yayasan Keberlanjutan Indonesia', 'Jakarta Pusat', 'Jl. Kramat Raya No. 111, Jakarta Pusat, DKI Jakarta, 10430', '(021) 3585 5647', 'BNI ', '0384-01-005368-53-7', 'Yayasan KI', 'Yayasan Keberlanjutan Indonesia adalah yayasan yang berfokus pada pengembangan dan implementasi teknologi hijau dan ramah lingkungan.', 'Untuk Mengembangkan Implementasi Teknologi Hijau dan Ramah Lingkungan', 'logo\\8 Yayasan Keberlanjutan Indonesia.png', NULL, NULL),
(9, 10, 'Yayasan Putera Sampoerna', 'DKI Jakarta', 'Jl. Jend. Sudirman Kav. 52-53, Jakarta Selatan, DKI Jakarta, 12190', '(021) 579 1338', 'BRI ', '0384-01-004721-53-7', 'Yayasan PS', 'Yayasan Putera Sampoerna adalah yayasan yang berfokus pada pendidikan, pengembangan sumber daya manusia, dan konservasi lingkungan.', 'Membantu mengembangkan SDM  dan Konservasi lingkungan', 'logo\\9 Yayasan Putera Sampoerna.jpeg', NULL, NULL),
(10, 11, 'Yayasan Kebahagiaan Anak Bangsa', 'Tanggerang', 'Jl. Salak Raya No.1, RT.04/RW.03, Pd. Benda, Kec. Pamulang, Kota Tangerang Selatan, Banten 15416', '0823-1138-1112', 'XXX', '512345678', 'Yayasan KAB', 'Banyak bapak, ibu, kakek, nenek, anak-anak di luar sana yang hidup tak berkecukupan dan kurang layak sehingga mereka harus berjuang bertahan dengan rasa lapar dan dahaga. Nasi dan lauk pauk yang kita nikmati sehari-hari belum tentu mereka rasakan.\r\n                Kami mengajak #Sahabat YAKAB untuk membantu mereka yang membutuhkan pada program Sedekah Jumat Berbagi Nasi Box Gratis untuk Masyarakat Prasejahtera.\r\n                Donasi yang terkumpul akan dialokasikan untuk pengadaan nasi box  dibagikan kepada masyarakat Prasejahtera ', 'Membantu Kegiatan Sosial', 'logo\\10 Yayasan Kebahagiaan Anak Bangsa.jpg', NULL, NULL),
(11, 12, 'Yayasan Marhamah Robbani', 'Kota Bekasi', 'Jl. KH. Agus Salim No.V, RT.001/RW.008, Bekasi Jaya, Kec. Bekasi Tim., Kota Bks, Jawa Barat 17112', '0818-0787-1020', 'XXX', '512345678', 'Yayasan MR', 'Membantu Kegiatan Sosial', 'Membantu Kegiatan Sosial', 'logo\\11 Yayasan Marhamah Robbani.png', NULL, NULL),
(12, 13, 'Yayasan Al-Furqon', 'Kota Bekasi', 'Jl. KH. Agus Salim No.V, RT.001/RW.008, Bekasi Jaya, Kec. Bekasi Tim., Kota Bks, Jawa Barat 17112', '0818-0787-1020', 'BCA', '512345678', 'Yayasan YPAF', 'Membantu Kegiatan Sosial', 'Membantu Kegiatan Sosial', 'logo\\12 Yayasan Al-Furqon.PNG', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_yayasan`
--
ALTER TABLE `activity_yayasan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activity_yayasan_yayasan_id_foreign` (`yayasan_id`);

--
-- Indexes for table `approval_yayasan`
--
ALTER TABLE `approval_yayasan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `approval_yayasan_user_id_foreign` (`user_id`);

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articles_user_id_foreign` (`user_id`);

--
-- Indexes for table `discussions`
--
ALTER TABLE `discussions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discussions_user_id_foreign` (`user_id`);

--
-- Indexes for table `discussion_details`
--
ALTER TABLE `discussion_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `discussion_details_discussion_id_foreign` (`discussion_id`),
  ADD KEY `discussion_details_user_id_foreign` (`user_id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `donations_yayasan_id_foreign` (`yayasan_id`),
  ADD KEY `donations_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item_details`
--
ALTER TABLE `item_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_donasi`
--
ALTER TABLE `kategori_donasi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori_donasi_yayasan`
--
ALTER TABLE `kategori_donasi_yayasan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategori_donasi_yayasan_yayasan_id_foreign` (`yayasan_id`),
  ADD KEY `kategori_donasi_yayasan_kategori_donasi_id_foreign` (`kategori_donasi_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_user_id_foreign` (`user_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `program_yayasan`
--
ALTER TABLE `program_yayasan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `program_yayasan_yayasan_id_foreign` (`yayasan_id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_role_id_foreign` (`role_id`);

--
-- Indexes for table `yayasan`
--
ALTER TABLE `yayasan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `yayasan_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_yayasan`
--
ALTER TABLE `activity_yayasan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `approval_yayasan`
--
ALTER TABLE `approval_yayasan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `discussions`
--
ALTER TABLE `discussions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `discussion_details`
--
ALTER TABLE `discussion_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `faq`
--
ALTER TABLE `faq`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `item_details`
--
ALTER TABLE `item_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_donasi`
--
ALTER TABLE `kategori_donasi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kategori_donasi_yayasan`
--
ALTER TABLE `kategori_donasi_yayasan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `program_yayasan`
--
ALTER TABLE `program_yayasan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `yayasan`
--
ALTER TABLE `yayasan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `activity_yayasan`
--
ALTER TABLE `activity_yayasan`
  ADD CONSTRAINT `activity_yayasan_yayasan_id_foreign` FOREIGN KEY (`yayasan_id`) REFERENCES `yayasan` (`id`);

--
-- Constraints for table `approval_yayasan`
--
ALTER TABLE `approval_yayasan`
  ADD CONSTRAINT `approval_yayasan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `discussions`
--
ALTER TABLE `discussions`
  ADD CONSTRAINT `discussions_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `discussion_details`
--
ALTER TABLE `discussion_details`
  ADD CONSTRAINT `discussion_details_discussion_id_foreign` FOREIGN KEY (`discussion_id`) REFERENCES `discussions` (`id`),
  ADD CONSTRAINT `discussion_details_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `donations`
--
ALTER TABLE `donations`
  ADD CONSTRAINT `donations_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `donations_yayasan_id_foreign` FOREIGN KEY (`yayasan_id`) REFERENCES `yayasan` (`id`);

--
-- Constraints for table `kategori_donasi_yayasan`
--
ALTER TABLE `kategori_donasi_yayasan`
  ADD CONSTRAINT `kategori_donasi_yayasan_kategori_donasi_id_foreign` FOREIGN KEY (`kategori_donasi_id`) REFERENCES `kategori_donasi` (`id`),
  ADD CONSTRAINT `kategori_donasi_yayasan_yayasan_id_foreign` FOREIGN KEY (`yayasan_id`) REFERENCES `yayasan` (`id`);

--
-- Constraints for table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `program_yayasan`
--
ALTER TABLE `program_yayasan`
  ADD CONSTRAINT `program_yayasan_yayasan_id_foreign` FOREIGN KEY (`yayasan_id`) REFERENCES `yayasan` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `yayasan`
--
ALTER TABLE `yayasan`
  ADD CONSTRAINT `yayasan_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;
