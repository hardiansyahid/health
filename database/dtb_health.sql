-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 16 Agu 2022 pada 13.33
-- Versi Server: 10.1.9-MariaDB
-- PHP Version: 5.6.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dtb_health`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(5) NOT NULL,
  `judul` varchar(60) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `isi` text NOT NULL,
  `slider` varchar(5) NOT NULL,
  `gambar` text NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `judul`, `id_kategori`, `tanggal`, `isi`, `slider`, `gambar`, `status`) VALUES
(5, 'Jangan Bohong Tentang 11 Kondisi Kesehatan Ini Saat Check Up', 4, '03-08-2019 10:04:58', '<p>Berikut 11 kondisi kesehatan yang harus dinyatakan secara jujur saat melakukan check up ke dokter.<br />\r\n1. Riwayat operasi<br />\r\nKetika Anda pertama kali berkunjung ke dokter baru, Anda akan mengisi banyak formulir medis dan asuransi. Masalah besar dalam kotak centang panjang &#39;ya&#39; dan &#39;tidak&#39; mengacu pada riwayat bedah Anda.<br />\r\nDari prosedur minor hingga operasi besar, ahli bedah plastik Manhattan David Shafer, MD, menyatakan bahwa jujur tentang masa lalu Anda akan membantu meringankan komplikasi di masa depan Anda. Meskipun banyak dari operasinya elektif, setiap ahli bedah membutuhkan info latar belakang untuk meminimalkan risiko jaringan parut, reaksi, dan banyak lagi.</p>\r\n\r\n<p>2. Usia<br />\r\nKetika Anda mulai mendekati usia paruh baya, mulai menopause, atau merasakan rasa sakit dan nyeri karena semakin tua, Anda mungkin tergoda untuk mengatakan sedikit kebohongan tentang umur Anda. Meskipun kemungkinan bukan masalah besar untuk memalsukan kebenaran kepada seorang bartender, penjual bahan makanan, atau orang asing acak di acara networking.&nbsp;<br />\r\nBukan hanya usia Anda yang merupakan elemen penting untuk bagaimana dokter meresepkan suatu perawatan. Dan berbohong tentang umur bisa menghancurkan kepercayaan penting antara dokter dan pasien.<br />\r\n&quot;Jika seorang pasien memberi tahu saya bahwa mereka berusia 49 tahun tetapi kartu asuransi mereka menunjukkan mereka berusia 57 tahun, saya harus bertanya-tanya apakah pasien berbohong tentang hal lain,&quot; ulas David Shafer.</p>\r\n\r\n<p>3. Apa yang Anda Makan dan Minum<br />\r\nJika Anda mencoba untuk diet dan gagal, tetapi tidak jujur ??tentang hal tersebut, dokter tidak akan dapat banyak membantu. Penelitian telah menunjukkan bahwa pasien meremehkan pertanyaan mengenai seberapa banyak jumlah makanan yang mereka makan dan seberapa sering mereka menikmati makanan yang tidak sehat.<br />\r\nBanyak pasien tidak mau mengakui kesulitan yang mereka miliki dalam mematuhi makanan yang ditentukan, sehingga lebih mudah bagi mereka untuk menyangkal bahwa mereka makan sesuatu yang buruk. Alih-alih merasa malu karena ketagihan makanan manis atau tidak berolahraga selama seminggu, jelaskan apa yang membuat Anda merasa terganggu sehingga dokter dapat memberikan saran terbaiknya.<br />\r\nKebiasaan minum juga sering diperhatikan dokter. Konsumsi alkohol dapat menjadi pertimbangan diagnosis dokter terhadap suatu penyakit. &quot;Berapa banyak minuman yang Anda minum dalam seminggu?&quot; Jawabannya akan bervariasi tiap orang.<br />\r\nApa yang dokter aAnda coba pahami adalah kebiasaan Anda. Ini sangat penting jika Anda memerlukan pembedahan, karena penyalahgunaan alkohol dapat memiliki efek merusak permanen pada hati Anda yang dapat meningkatkan perdarahan, menurut ahli bedah saraf David Poulad, MD, anggota kelompok neurologis IGEA Brain and Spine dan staf di Overlook Hospital di Summit, New Jersey.</p>\r\n\r\n<p>4. Kebiasaan merokok<br />\r\nSetiap dokter mulai dari ahli jantung hingga dokter kulit akan merekomendasikan Anda menghentikan kebiasaan merokok. Jadi ketika dokyer bertanya apakah Anda merokok Anda mungkin ingin berbohong, tetapi Andrew J. Miller, MD, seorang ahli bedah plastik di Manhattan, menyarankan untuk berterus terang tentang kebiasaan ini.<br />\r\n&quot;Salah satu kebiasaan terbesar pasien yang sering tidak jujur adalah merokok,&quot; katanya.<br />\r\n&ldquo;Nikotin sangat merugikan penyembuhan, dan banyak ahli bedah tidak akan melakukan operasi tertentu karena sayatan dapat rusak, menyebabkan jaringan parut yang signifikan dan proses penyembuhan yang lama. Kadang-kadang pasien berbohong tentang merokok hanya untuk menyelesaikan prosedur, tetapi pada akhirnya mereka hanya melukai diri sendiri.&rdquo;</p>\r\n\r\n<p>5. Penggunaan Obat-obatan<br />\r\nKetika Anda tidak dapat menahan batuk atau Anda mengalami kondisi yang tidak normal, tugas seorang dokter adalah tidak hanya mendiagnosis apa yang dialami, tetapi juga untuk meresepkan ramuan obat yang tepat untuk mengatasi penyakit secepat mungkin.<br />\r\nNamun, jika Anda kembali mengeluh bahwa Anda masih belum dapat sembuh dari resep obat dokter, jujurlah ketika dokter bertanya seberapa sering Anda minum pil atau bagaimana Anda mengoleskan krim. Obat-obatan yang Anda konsumsi selain obat dari resep dokter dapat memengaruhi satu sama lain.<br />\r\nKonsumsi suplemen atau herbal<br />\r\nKadang pasien malu mengakui bahwa mereka mengonsumsi vitamin, suplemen, atau herbal karena dokter mereka mungkin memarahi mereka karena mereka percaya pada pengobatan herbal. Namun, dengan jujur mengenai suplemen yang Anda konsumsi, dokter dapat memastikan mereka meresepkan apa yang paling cocok untuk tubuh Anda.<br />\r\nSuplemen memang penting untuk kesehatan, namun, mungkin ada interaksi antara vitamin atau herbal tertentu dan obat resep. Interaksi ini dapat mengarah pada tingkat yang lebih tinggi atau lebih rendah dari obat yang pasien minum, yang dapat sangat mempengaruhi kesehatan mereka. Sangat penting bagi pasien untuk berterus terang tentang semua yang mereka konsumsi.</p>\r\n\r\n<p>Menggunakan obat terlarang<br />\r\nBeberapa pasien tidak ingin mengakui penggunaan narkoba mereka karena mereka tidak ingin informasi itu menjadi bagian dari catatan medis mereka. Mereka takut hal itu dapat memengaruhi kebijakan asuransi atau pekerjaan mereka.<br />\r\nDokter dapat mendiagnosis dan merawat Anda dengan benar bergantung pada gambaran lengkap tentang kesehatan dan sifat buruk Anda. Maka dari itu jangan ragu untuk mengungkapkan masalah ini pada dokter.</p>\r\n\r\n<p>6. Aborsi<br />\r\nSebagai pilihan dan pengalaman yang sensitif, menyinggung, dan pribadi, aborsi bukanlah topik yang paling mudah untuk dibahas, bahkan dengan dokter sekalipun. Namun, jika suatu hari Anda berjuang untuk hamil lagi, spesialis reproduksi Jane Frederick, MD, mengatakan dokter Anda perlu mengetahui riwayat medis lengkap Anda, termasuk aborsi.<br />\r\n&ldquo;Mungkin ada jaringan parut dan kerusakan rahim. Kami ingin memastikan bahwa pasien memiliki rongga rahim yang baik sebelum kami menanamkan embrio selama proses IVF, &rdquo;jelasnya. &ldquo;Pengetahuan tentang aborsi akan membantu kita mengevaluasi rahim dengan baik, menawarkan protokol pengobatan yang tepat dan mengambil langkah-langkah tambahan untuk memastikan rahim siap untuk implantasi.&quot;</p>\r\n\r\n<p>7. Keadaan Mental<br />\r\nJujurlah dengan apa yang sebenarnya Anda rasakan dengan dokter Anda. Jika Anda merasa mental dan pikiran kurang baik beritahu dokter dan coba untuk terbuka.<br />\r\n&ldquo;Kami memahami emosi yang mungkin Anda rasakan. Dengan mengutarakan pikiran dan bersikap jujur, tidak peduli seberapa tidak sempurnanya Anda merasakannya, itu membantu Anda untuk merasa lebih baik. Dan itu membantu kita. Dialog yang jujur membebaskan pikiran Anda ketika berbicara dengan dokter. Ini akan sangat membantu untuk memproses informasi dengan cara yang jelas, mengingat pertanyaan yang mungkin pernah Anda dapatkan sebelumnya, dan memberi Anda rasa percaya diri dan kontrol yang diperbarui. &quot; ujar Michael Alper, MD, seorang spesialis kesuburan di Boston.</p>\r\n\r\n<p>8. Riwayat Seksual<br />\r\nBerapa banyak pasangan yang pernah Anda miliki, kapan terakhir kali berhubungan seks, seks tanpa pengaman, dan jika Anda pernah mengalami STD. Semua ini adalah pertanyaan pribadi yang cukup sensitif, tetapi itu juga pertanyaan yang harus dijawab dengan jujur pada dokter.<br />\r\nDokter hanya ingin tahu sehingga dapat membuat Anda tetap aman dan mendidik Anda tentang praktik seks yang aman. Jika Dokter tidak tahu apa yang Anda lakukan dan dengan siapa Anda melakukannya, Dokter tidak dapat mmendiagnosis Anda untuk kondisi yang sesuai atau menemukan cara terbaik untuk menjaga organ reproduksi Anda tetap sehat.</p>\r\n\r\n<p>9. Kapan Terakhir Kali Check Up<br />\r\nAnda belum pernah membersihkan gigi sejak dua tahun lalu, belum pernah ke dokter mataAtau Anda belum pernah tes fisik sama sekali. Anda mungkin memiliki rekam jejak yang tidak terlalu tinggi dalam memenuhi janji medis, tetapi sebenarnya dokter tak pernah mempermasalahkannya.<br />\r\nBahkan, mereka senang Anda duduk di meja periksa sekarang, siap untuk check-up. Alih-alih mengabaikan kebenaran tentang terakhir kali Anda melakukan perawatan, jujurlah sehingga dokter baru Anda dapat memperlakukan Anda dengan akurat. Jangan berbohong tentang kapan Anda pergi ke dokter terakhir dan tindakan apa yang mereka.</p>\r\n\r\n<p>10. Gugup<br />\r\nBahkan jika Anda tidak menderita Iatrophobia atau rasa takut akan pergi ke dokter, cukup umum untuk merasa gugup ketika Anda sakit dan harus check-up ke dokter. Jujurlah dengan fakta bahwa Anda takut dan gugup.<br />\r\n&ldquo;Sering kali, kecemasan menunjukkan dirinya dengan bersikap kasar atau kasar kepada staf atau dokter. Kami di sini untuk membantu Anda dan sangat terbiasa membantu orang menjalani perawatan gigi,&rdquo; jelas Nancy E. Gill, DDS, seorang dokter gigi di Golden, Colorado.</p>\r\n\r\n<p>11. Berapa Banyak Waktu di Bawah Sinar Matahari<br />\r\nBahkan pada hari paling dingin di musim hujan atau ketika mendung, ahli dermatologi merekomendasikan untuk memakai tabir surya atau bentuk perlindungan matahari lainnya untuk melindungi pori-pori Anda dari sinar berbahaya dan berbahaya.<br />\r\nJadi, ketika dokter Anda bertanya tentang berapa banyak waktu yang Anda habiskan di luar ruangan, mereka bertanya untuk dapat memahami hobi, kebiasaan, dan seberapa besar risiko kerusakan akibat sinar matahari.<br />\r\nKebanyakan orang tidak menyadari bahwa mereka mendapat paparan sinar matahari setiap hari seperti masuk dan keluar dari mobil mereka, atau akan mendapatkan surat, serta ketika mereka aktif di luar apakah untuk bekerja atau bermain. Kanker kulit disebabkan oleh matahari, jadi membuat pasien untuk mematuhi perlindungan matahari adalah penting dan memahami aktivitas mereka dapat membantu menyesuaikan teknik pencegahan dini.<br />\r\n&nbsp;</p>\r\n', 'Y', 'k.jpg', 'Share'),
(6, 'Gejala Kanker Kulit, Penyebab dan Cara Mengatasinya', 4, '03-08-2019 10:07:25', '<p>Apa itu Kanker Kulit?</p>\r\n\r\n<p>Kanker kulit adalah pertumbuhan kulit tidak normal yang diakibatkan oleh kerusakan pada kulit. Sebagian besar kanker kulit adalah kanker lokal yang bersifat merusak (ganas) pada pertumbuhan kulit. Mereka berasal dari sel-sel epidermis, lapisan superfisial kulit. Tidak seperti melanoma, sebagian besar jenis kanker kulit jarang menyebar ke bagian lain dari tubuh (bermetastasis) dan menjadi mengancam jiwa.</p>\r\n\r\n<p>Sinar matahari penting bagi kesehatan kita karena sinar matahari membantu tubuh memproduksi vitamin D. Namun, terlalu banyak paparan sinar matahari tanpa perlindungan yang tepat dapat membahayakan kulit. Hal ini dapat meningkatkan tanda-tanda penuaan, atau dalam kasus-kasus serius menyebabkan kanker kulit.<br />\r\nPenyebab Kanker Kulit, Gejala Kanker Kulit, dan Pengobatan</p>\r\n\r\n<p>Seiring waktu, sinar ultraviolet (UV) menimbulkan kerusakan ringan serat kulit yaitu elastin. Ketika serat ini memecah, kulit mulai keriput, meregang dan kehilangan kemampuannya untuk kembali ke tempat setelah peregangan. Inilah yang menjadi salah satu gejala kanker kulit.</p>\r\n\r\n<p>Penyebab Kanker Kulit</p>\r\n\r\n<p>Penyebab utama kanker kulit adalah adanya pertumbuhan yang tidak terkontrol dari sel-sel kulit. Penyakit Kanker kulit dapat berupa jinak (sel tidak menyebar di luar kanker) atau ganas (sel memiliki kemampuan untuk menyebar). Istilah &acirc;&euro;&oelig;kanker kulit ganas&acirc;&euro;Â ini identik dengan istilah &acirc;&euro;&oelig;kanker kulit&acirc;&euro;Â. Kanker kulit meningkat di dunia.</p>\r\n\r\n<p>Ada tiga jenis utama penyakit kanker kulit:</p>\r\n\r\n<p>&nbsp; &nbsp; Karsinoma sel basal (kadang-kadang dikenal sebagai &acirc;&euro;&oelig;ulcus rhodent&acirc;&euro;Â karena bentuknya yang seperti &acirc;&euro;&oelig;digerogoti tikus&acirc;&euro;Â),<br />\r\n&nbsp; &nbsp; Karsinoma sel skuamosa<br />\r\n&nbsp; &nbsp; Melanoma maligna</p>\r\n\r\n<p>Karsinoma sel basal dan kanker sel skuamosa adalah bentuk penyakit kanker kulit yang jarang bermetastasis. Penyakit kanker kulit ini juga disebut sebagai kanker kulit non-melanoma, mereka sangat dapat disembuhkan apabila diobati ketika stadium dini. Melanoma maligna (maligna artinya ganas) &acirc;&euro;&ldquo; terdiri dari sel-sel pigmen kulit yang abnormal, yang disebut melanosit &acirc;&euro;&ldquo; menyumbang hanya 10 persen dari semua kasus kanker kulit di Inggris. Namun, jika tidak diobati dapat menyebar ke organ lain (metastasis) dan sulit untuk dikontrol. Melanoma maligna menyebabkan sebagian besar kematian akibat kanker kulit.</p>\r\n\r\n<p>Radiasi Ultraviolet (UV) dari matahari adalah penyebab nomor satu dari penyakit kanker kulit. Paparan sinar matahari kumulatif menyebabkan kanker sel terutama kanker sel basal dan kanker sel skuamosa, sementara paparan terbakar sinar matahari yang parah, biasanya sebelum usia 18 tahun, dapat menyebabkan melanoma maligna di kemudian hari. Penyebab kurang umum lainnya adalah paparan berulang sinar-X dan pajanan terhadap bahan kimia tertentu.</p>\r\n\r\n<p>Gejala Kanker Kulit</p>\r\n\r\n<p>Tanda peringatan yang paling umum dari kanker kulit adalah perubahan pada kulit, biasanya tahi lalat baru atau adanya lesi kulit yang tiba-tiba muncul. Berikut ini adalah gejala kanker kulit yang paling umum.</p>\r\n\r\n<p>&nbsp; &nbsp; Karsinoma sel basal mungkin muncul sebagai benjolan lilin kecil gejala kanker kulit, halus, seperti mutiara pada wajah, telinga atau leher, atau sebagai lesi datar, berwarna pink, merah atau cokelat berwarna pada punggung, juga pada lengan dan kaki. Lesi tersebut bisa gatal dan kadang-kadang berdarah namun sangat jarang menyebar.<br />\r\n&nbsp; &nbsp; Karsinoma sel skuamosa dapat muncul sebagai gejala kanker kulit berupa benjolan merah tegas atau kasar, atau berupa lesi kulit bersisik datar yang mungkin gatal, berdarah dan menjadi berkerak. Karsinoma sel basal dan karsinoma sel skuamosa terjadi terutama pada daerah kulit yang sering terkena sinar matahari, tetapi bisa terjadi di mana saja.<br />\r\n&nbsp; &nbsp; Melanoma maligna biasanya muncul sebagai pola titik berpigmen atau benjolan. Mungkin mirip tahi lalat normal, tetapi biasanya memiliki penampilan yang lebih tidak teratur dengan tepi yang berwarna gradasi. Daerah yang paling umum untuk melanoma adalah punggung, kaki, lengan dan wajah, tetapi mereka dapat terjadi di mana saja.</p>\r\n\r\n<p>Ketika mencari melanoma yang menjadi gejala kanker kulit, pikirkan aturan ABCDE yang memberikan informasi tanda-tanda gejala kanker kulit yang harus diperhatikan:</p>\r\n\r\n<p>&nbsp; &nbsp; Asimetri &acirc;&euro;&ldquo; bentuk tahi lalat tidak simetris<br />\r\n&nbsp; &nbsp; Border &acirc;&euro;&ldquo; tepi compang-camping atau kabur<br />\r\n&nbsp; &nbsp; Color &acirc;&euro;&ldquo; warna tahi lalat yang tidak merata seperti terdapat warna cokelat, hitam, merah, putih atau biru<br />\r\n&nbsp; &nbsp; Diameter &acirc;&euro;&ldquo; melanoma sering lebih besar dari tahi lalat normal (diamater &gt;6mm)<br />\r\n&nbsp; &nbsp; Evolusi &acirc;&euro;&ldquo; ukuran perubahan atau karakteristik dari waktu ke waktu</p>\r\n\r\n<p>Diagnosa Kanker Kulit</p>\r\n\r\n<p>Gejala kanker kulit didiagnosa setelah dirujuk oleh dokter umum ke dokter kulit, dan mungkin dokter menyarankan dilakukan biopsi. Biopsi adalah mengambil sampel jaringan, yang kemudian ditempatkan di bawah mikroskop dan diperiksa oleh seorang dokter yang mengkhususkan diri dalam meneliti sel-sel kulit. Kadang-kadang biopsi dapat menghapus semua jaringan kanker dan tidak ada perawatan lebih lanjut diperlukan.<br />\r\nMengobati Kanker Kulit&nbsp;</p>\r\n\r\n<p>Pengobatan kanker kulit adalah tergantung jenis kanker kulit, ukuran dan area, perkembangan dan preferensi pasien. Pengobatan standar untuk kanker non-melanoma kulit &acirc;&euro;&ldquo; karsinoma sel basal dan karsinoma sel skuamosa &acirc;&euro;&ldquo; meliputi:</p>\r\n\r\n<p>&nbsp; &nbsp; Eksisi bedah &acirc;&euro;&ldquo; memotong kanker kulit<br />\r\n&nbsp; &nbsp; Kuret dan elektrokauter &acirc;&euro;&ldquo; menggoreskan secara fisik ke sel-sel kanker kulit diikuti oleh elektrokauter, menggunakan probe listrik kecil untuk membakar atau menghancurkan jaringan<br />\r\n&nbsp; &nbsp; Cryosurgery atau pembekuan<br />\r\n&nbsp; &nbsp; Radioterapi<br />\r\n&nbsp; &nbsp; Obat &acirc;&euro;&ldquo; dalam bentuk krim, cairan, atau salep<br />\r\n&nbsp; &nbsp; Terapi Photodynamic (PDT) &acirc;&euro;&ldquo; pengobatan yang relatif baru untuk pengobatan karsinoma sel basal. Setelah pemberian obat peka cahaya khusus (dalam bentuk krim) telah diterapkan ke daerah yang terkena kulit, cahaya bersinar pada kulit dengan kuat, sehingga mengaktifkan obat dan membunuh sel-sel kanker</p>\r\n\r\n<p>Mengobati Melanoma Maligna</p>\r\n\r\n<p>Jenis pengobatan yang Anda terima tergantung pada tahap melanoma apa yang ditemukan. Perawatan standar termasuk:</p>\r\n\r\n<p>&nbsp; &nbsp; Eksisi lebar<br />\r\n&nbsp; &nbsp; Pemetaan kelenjar getah bening (untuk lesi yang lebih dalam) &acirc;&euro;&ldquo; untuk menentukan apakah melanoma telah menyebar ke kelenjar getah bening lokal<br />\r\n&nbsp; &nbsp; Obat-obatan (kemoterapi, biologi pengubah respons)<br />\r\n&nbsp; &nbsp; Radioterapi<br />\r\n&nbsp; &nbsp; Metode baru dalam uji klinis kadang-kadang digunakan untuk mengobati kanker kulit</p>\r\n\r\n<p>Pencegahan Kanker Kulit</p>\r\n\r\n<p>Tidak ada yang benar-benar dapat mencegah kerusakan akibat sinar matahari, meskipun kulit kadang-kadang dapat memperbaiki dirinya sendiri, tidak pernah ada kata terlambat untuk mulai melindungi diri dari matahari. tips ini untuk membantu mencegah kanker kulit:</p>\r\n\r\n<p>&nbsp; &nbsp; Oleskan krim matahari dengan perlindungan matahari (SPF) 15 atau lebih besar sebelum terpapar sinar matahari. Dalam iklim yang lebih hangat mungkin diperlukan SPF yang lebih tinggi dan ingat untuk menggunakan krim matahari tahan air jika Anda akan berada kolam atau pantai<br />\r\n&nbsp; &nbsp; Kenakan pakaian pelindung sinar matahari, termasuk topi<br />\r\n&nbsp; &nbsp; Pilih produk kosmetik dan lensa kontak yang menawarkan perlindungan UV<br />\r\n&nbsp; &nbsp; Hindari paparan sinar matahari langsung sebanyak mungkin selama jam puncak radiasi UV &acirc;&euro;&ldquo; 11:00-15:00<br />\r\n&nbsp; &nbsp; The British Association of Dermatologists menyarankan untuk tidak menggunakan lampu matahari<br />\r\n&nbsp; &nbsp; Periksa kulit Anda secara teratur dan mandiri, serta pahami setiap jengkal tahi lalat di tubuh sehingga dapat melihat adanya perubahan atau tahi lalat baru<br />\r\n&nbsp; &nbsp; Sekitar 80 persen dari paparan matahari seseorang diperoleh sebelum usia 18 tahun. Jadi, protektiflah kepada anak-anak Anda karena kulit mereka lebih sensitif terhadap matahari dan, sebagai orangtua, jadilah panutan yang baik dalam mencegah paparan sinar matahari.</p>\r\n\r\n<p><br />\r\n&nbsp;</p>\r\n', 'Y', 'oke.jpg', 'Share'),
(7, '5 Sayuran dengan Kandungan Gula Tertinggi, Batasi Asupannya', 4, '03-09-2019 11:53:06', '<p>Dari semua kelompok makanan, sayuran biasanya rendah gula dan menjadi sumber vitamin dan mineral yang asehat. Sayuran baik untuk kesehatan, tetapi beberapa di antaranya mengandung kadar gula yang tinggi. Kandungan gula tinggi dapat memengaruhi gula darah lebih cepat.<br />\r\nMengetahui sayuran mana yang memiliki angka indeks glikemik tinggi adalah informasi yang berharga bagi kesehatan jangka panjang. Meski kandungan gulanya tak sebanyak beberapa buah lain, membatasi asupannya dapat menurunkan resiko kesehatan tertentu.<br />\r\nSayuran yang paling banyak mengandung gula didominasi oleh sayuran umbi-umbian. Menurut ilmu botani, yang termasuk dalam sayur-sayuran adalah bagian tanaman yang dapat dimakan.<br />\r\nSementara buah secara botani mengandung biji dan berasal dari bunga tanaman, sayuran adalah bagian tanaman lainnya, seperti umbi, daun, dan batang.<br />\r\nBerikut sayuran yang memiliki kandungan gula tertinggi.</p>\r\n\r\n<p>1. Ubi Jalar<br />\r\nSalah satu sayuran yang mengandung gula alami tertinggi adalah ubi jalar. Umbi satu ini mengandung 5.5% gula dalam satu umbinya. Sajian ini juga menyediakan 8,2 gram serat, yang merupakan 33 persen dari nilai harian untuk membantu menjaga sistem pencernaan.<br />\r\nUbi jalar juga merupakan sumber zat besi, magnesium, fosfor, kalium, tiamin, riboflavin, dan vitamin A, B-6, C dan E. Ganti kentang dalam resep favorit Anda dengan ubi jalar untuk meningkatkan nutrisi. Meski kaya nutrisi, batasi asupan ubi jalar agar tak mendapatkan efek buruk dari kandungan gulanya.<br />\r\nUbi jalar mengandung karbohidrat yang dapat meningkatkan kadar gula darah. Namun, jika Anda makan ukuran porsi yang tepat dari ubi jalar, Anda dapat mengontrol jumlah gula yang dikonsumsi. Hindari pula gula atau pemanis tambahan pada olahan ubi jalar.</p>\r\n\r\n<p>2. Bit<br />\r\nSecangkir bit iris yang direbus mengandung 13,5 gram gula, serta 3,4 gram serat dan sejumlah besar kalium, folat dan vitamin C. Kalium membantu menurunkan tekanan darah, folat penting untuk membentuk sel darah merah yang sehat dan vitamin C sangat penting untuk penyembuhan luka.<br />\r\nBit adalah sayuran akar yang kaya nutrisi dan fitokimia. Umbi ini mengandung kadar folat, mangan, dan kalium yang tinggi dan merupakan sumber serat yang baik.<br />\r\nSayangnya, bit cukup tinggi pada Indeks Glikemik, dengan peringkat 64. Ini menunjukkan bahwa respons glukosa darah dalam 50 g karbohidrat bit adalah sekitar 64 persen dari respons glukosa murni.<br />\r\nSementara bit memiliki Indeks Glikemik tinggi, mereka sebenarnya memiliki rendah beban glikemik karena tidak banyak karbohidrat dalam satu porsi bit. Karen itu, bit mungkin merupakan makanan yang dapat diterima untuk dimakan dalam diet yang dirancang untuk menjaga kadar glukosa darah tetap stabil.<br />\r\nJadi masih aman mengonsumsi bit dalam jumlah normal dan tanpa pemanis tambahan.</p>\r\n\r\n<p>3. Kentang<br />\r\nPati dalam kentang dikonversi menjadi gula dalam tubuh. Untuk alasan itu, kentang dapat memiliki respons yang lebih signifikan pada glukosa darah. Kentang memiliki indeks glikemik berkisar antara 58 hingga 111, tergantung pada varietas dan bagaimana mereka dimasak.<br />\r\nLonjakan tajam dalam kadar gula darah ini diyakini oleh beberapa orang, termasuk situs web Indeks Glikemik dari Universitas Sydney, untuk berkontribusi pada kenaikan berat badan dan diabetes. Penderita diabetes harus memperhatikan porsi kentang yang mereka konsumsi.<br />\r\nYang terbaik adalah mengonsumsi kentang sebagai bagian dari makanan yang seimbang dan menyehatkan. Makan kentang bersama makanan rendah glikemik yang menyediakan serat, protein tanpa lemak, dan lemak sehat dapat membantu menyeimbangkan manfaat nutrisi dari makanan.<br />\r\nMengkonsumsi makanan berserat tinggi dapat membantu seseorang memoderasi kadar gula darah dan meningkatkan rasa kenyang setelah makan.</p>\r\n\r\n<p>4. Wortel<br />\r\nDalam 100 gram wortel terkandung 4.7 gram gula. Ini yang memberi rasa manis alami pada jus wortel. Meski begitu, wortel cukup rendah kalori dan masih ditolerir dalam hal kenaikan berat badan.<br />\r\nSebagian besar gula dalam wortel adalah sukrosa, yang sama dengan gula meja. Anda akan mendapatkan 3 gram gula dari satu wortel besar.<br />\r\nMengonsumsi wortel dalam jumlah wajar dan tanpa pemanis tambahan masih aman bagi gula darah. Meski cukup tinggi gula, wortel memiliki sejumlah nutrisi bermanfaat bagi tubuh. Wortel mengandung sekitar 10% karbohidrat, terdiri dari pati, serat, dan gula sederhana. Mereka sangat rendah lemak dan protein.</p>\r\n\r\n<p>5. Bawang Bombay<br />\r\nAnda mungkin salah satu penggemar onion ring yang manis dan gurih. Rasa manis pada camilan satu ini merupakan pemanis alami yang dimiliki bawang bombay.<br />\r\nDalam 100 gram bawang bombay, terkandung 4.7 gram gula. Mengonsumsi bawang bombay dalam jumlah banyak dapat memengaruhi gula darah dengan cepat.<br />\r\nPenggunaan bawang bombay dalam masakan harus dibatasi karena kandungan gulanya yang tinggi. Kadar gula mereka berkisar dari hampir 4 gram hingga lebih dari 5 gram gula.<br />\r\nMeski begitu, konsumsi bawang bombay dengan jumlah dan pengolahan yang benar akan memberi sejumlah manfaat. Bawang bombay telah dikaitkan dengan peningkatan kesehatan tulang dan penurunan risiko kanker.</p>\r\n', 'Y', 'Harga-Ayam-Tingkat-Peternak-di-Jawa-Mulai-Membaik.jpg', 'Share'),
(11, 'Langkah melindungi anak dari covid-19', 4, '14-09-2021 14:20:50', '<p>Penyakit Coronavirus 2019 (COVID-19) terus meluas dan menginfeksi banyak orang di seluruh dunia sehingga membuat banyak pihak merasa khawatir dengan kesehatan diri dan juga keluarganya.</p>\r\n\r\n<p>&nbsp;Walaupun COVID-19 kebanyakan menyerang orang dewasa, orang tua tetap perlu waspada dan menerapkan sejumlah langkah pencegahan khususnya bagi anak. Hal ini perlu dilakukan sebagai salah satu cara untuk melindungi anak dan keluarga dari COVID-19 dalam usaha memperlambat penyebaran virus.</p>\r\n\r\n<p>Berikut adalah beberapa upaya perlindungan yang dapat orang tua lakukan untuk anak:<br />\r\nBiasakan cuci tangan<br />\r\nVirus corona disebarkan melalui kontak manusia. Karena itu, mencuci tangan adalah cara terbaik untuk melindungi diri dari paparan virus. Ajaklah anak untuk sering mencuci tangan dengan air mengalir minimal 20 detik, antara lain setelah menggunakan mainan, sebelum dan sesudah makan, setelah dari kamar mandi, sehabis menyentuh hewan, serta setelah batuk atau bersin. Pastikan anak membersihkan hingga ke sela-sela jari, punggung tangan, ujung kuku, dan menggosok tangan dengan saksama sebelum membilasnya.Jika tidak mendapatkan akses terhadap air dan sabun, anak tetap dapat menggunakan hand sanitizer.</p>\r\n\r\n<p>Etika batuk dan bersin<br />\r\nBatuk dan bersin memiliki etika atau cara yang harus dilakukan. Edukasi yang benar tentang etika batuk dan bersin penting diajarkan kepada anak sejak dini. Hal ini berguna untuk melindungi anak dari potensi penyebaran penyakit melalui percikan ludah saat batuk dan bersin. Berikut cara mengajarkan etika batuk dan bersin secara baik dan benar kepada anak:</p>\r\n\r\n<p>- Ajar anak untuk menutup hidung menggunakan tisu atau siku saat sedang batuk atau bersin.<br />\r\n- Ajar anak untuk tidak menutup mulut dan hidung menggunakan telapak tangan saat sedang batuk. Palingkan wajah dan jangan batuk di hadapan orang lain.<br />\r\n- Langsung buang tisu bekas pakai ke tempat sampah.<br />\r\n- Cuci tangan setelah batuk atau bersin dengan sabun dan air mengalir selama minimal 20 detik atau menggunakan hand sanitizer.</p>\r\n\r\n<p>Hindari menyentuh wajah<br />\r\nTubuh manusia dapat terpapar virus lewat mata, hidung, dan mulut. Padahal, anak-anak mudah memegang benda asing dan kemudian menyentuh wajahnya secara tak sengaja. Untuk itulah, penting bagi orang tua menuntun dan mengajari anak belajar tidak menyentuh wajah terlalu sering, terutama mata, hidung, dan mulut jika tangan tidak dalam keadaan bersih.</p>\r\n\r\n<p><br />\r\nTerapkan gaya hidup sehat<br />\r\nPada kondisi pandemi seperti sekarang, sangatlah disarankan bagi setiap orang untuk membangun daya tahan tubuh yang kuat. Pastikan anak selalu mengonsumsi makanan bernutrisi tinggi dan vitamin secara teratur, serta istirahat cukup.</p>\r\n\r\n<p><br />\r\nBatasi bermain dengan teman<br />\r\nSelain menjaga kebersihan diri anak untuk mencegah infeksi virus corona, orang tua juga dapat merapkan hal tambahan seperti tidak membuat janji pertemuan bermain dengan teman anak ataupun tetangga, terutama jika ada dari mereka yang sedang sakit, batuk dan bersin, serta memiliki riwayat bepergian ke negara terjangkit.</p>\r\n\r\n<p><br />\r\nMeskipun ada beberapa laporan yang mengatakan bahwa virus corona jarang menginfeksi anak-anak, namun orang tua tetap perlu waspada dan siaga. Jika Anda mendapati gejala batuk atau flu, demam &gt; 380C, sakit tenggorokan, dan sulit bernapas pada anak Anda, segera bawa ke rumah sakit terdekat untuk mendapatkan</p>\r\n', 'Y', 'masker.jpg', 'Share');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_jadwal`
--

CREATE TABLE `detail_jadwal` (
  `id_detail` int(5) NOT NULL,
  `id_jadwal` int(5) NOT NULL,
  `hari` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_jadwal`
--

INSERT INTO `detail_jadwal` (`id_detail`, `id_jadwal`, `hari`) VALUES
(1, 1, 'Senin'),
(2, 1, 'Selasa'),
(3, 1, 'Rabu'),
(4, 1, 'Kamis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_dokter`
--

CREATE TABLE `jadwal_dokter` (
  `id_jadwal` int(5) NOT NULL,
  `keadaan` varchar(20) NOT NULL,
  `jam` varchar(20) NOT NULL,
  `id_unitmedis` varchar(10) NOT NULL,
  `id_poli` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_dokter`
--

INSERT INTO `jadwal_dokter` (`id_jadwal`, `keadaan`, `jam`, `id_unitmedis`, `id_poli`) VALUES
(1, 'Pagi', '08.00-11.00 wib', 'DOK0001', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(5) NOT NULL,
  `nama_kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(2, 'Pendidikan'),
(3, 'Olahraga'),
(4, 'Kesehatan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(5) NOT NULL,
  `nama_menu` varchar(40) NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `isi`) VALUES
(1, 'Profil Klinik', '<h2>VISI</h2>\r\n\r\n<h3>Terwujudnya Masyarakat Sehat, Produktif, Mandiri dan Berkeadilan untuk menuju Indonesia Maju yang Berdaulat, Mandiri dan Berkepribadian Berlandaskan Gotong-Royong</h3>\r\n\r\n<h2>MISI</h2>\r\n\r\n<ul>\r\n	<li>Memperkuat upaya kesehatan yang bermutu dan menjangkau seluruh masyarakat.</li>\r\n	<li>Memberdayakan masyarakat dan mengutamakan pembangunan kesehatan</li>\r\n	<li>Meningkatkan ketersediaan, pemerataan dan mutu sumber daya kesehatan.</li>\r\n	<li>Menerapkan tata kelola yang baik, bersih dan inovatif.</li>\r\n</ul>\r\n\r\n<p><strong>Motto Klinik</strong></p>\r\n\r\n<p>&quot;MELATI&quot;</p>\r\n\r\n<p>(Melayani Dengan Hati)</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Tata Nilais</strong></p>\r\n\r\n<p><strong>&quot;CANTIK&quot;</strong></p>\r\n\r\n<p><strong>Cepat&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; = </strong>Tangkas, Aktif, Bersungguh-sungguh</p>\r\n\r\n<p><strong>AManah&nbsp;&nbsp; = </strong>Jujur dan Dapat Dipercaya</p>\r\n\r\n<p><strong>Nyaman&nbsp;&nbsp; = </strong>Sejuk, Bersih, dan Bersahaja</p>\r\n\r\n<p><strong>Trampil&nbsp;&nbsp; = </strong>Selalu Menggunakan Pikiran Dalam Mengerjakan Sesuatu Secara Efektif Efesien</p>\r\n\r\n<p><strong>INovatis&nbsp; = </strong>Mencurahkan Segala Kemampuan Untuk Menciptakan Sesuatu Yang Baru</p>\r\n\r\n<p><strong>Kualitas = </strong>Memberikan Yang Terbaik Dalam Setiap Tindakan Serta Pelayanan Sesuai SOP</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Maklumat pelayanan</strong></p>\r\n\r\n<p>&quot;DENGAN INI KAMI MENYATAKAN SANGGUP MENYELENGGARAKAN PELAYANAN SESUAI STANDAR, JIKA TIDAK SAMPAIKAN KELUHAN ANDA DI KOTAK SARAN&quot;</p>\r\n'),
(2, 'Hubungi Kami', '<p>Puskesmas Sekincau mampu memberikan pelayanan kesehatan secara profesional dan prima kepada seluruh masyarakat.</p>\r\n\r\n<p>email : <a href="https://www.rsuripsumoharjo.com/contact#">infop</a>uskesmassekincau@gmail.com</p>\r\n\r\n<p>No. Telp / Fax : <a href="tel:+62721771322">(0721) 771322 / 700323</a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Bila membutuhkan informasi, Anda dapat menghubungi nomor telepon dibawah ini :</p>\r\n\r\n<p><strong>0821 7796 3700</strong></p>\r\n\r\n<p>Untuk pemesanan kamar, hubungi bagian Admission :</p>\r\n\r\n<p><strong>0811 7270 537</strong></p>\r\n\r\n<p>Apabila ada pelayanan yang kurang memuaskan, kami mohon maaf dan sampaikanlah saran dan kritik Anda ke :</p>\r\n\r\n<p><strong>0821 7796 3700</strong>, semoga saran dan kritik Anda dapat kami jadikan acuan untuk pengembangan dan peningkatan pelayanan kami.</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(5) NOT NULL,
  `kode_obat` varchar(10) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `nama_obat` varchar(60) NOT NULL,
  `harga` int(20) NOT NULL,
  `kadaluarsa` date NOT NULL,
  `keterangan` varchar(40) NOT NULL,
  `kategori` varchar(20) NOT NULL,
  `stok` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `kode_obat`, `jenis`, `nama_obat`, `harga`, `kadaluarsa`, `keterangan`, `kategori`, `stok`) VALUES
(4, 'Dksa-3', 'Tablet', 'Deksameason (Prodexon)', 0, '2025-02-21', 'Generik', '--Non BPJS--', 996);

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep`
--

CREATE TABLE `resep` (
  `id_resep` int(5) NOT NULL,
  `no_rekmed` varchar(10) NOT NULL,
  `id_obat` int(5) NOT NULL,
  `dosis` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep_diambil`
--

CREATE TABLE `resep_diambil` (
  `id_pengambilan` int(5) NOT NULL,
  `kode_rekmed` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kunjungan`
--

CREATE TABLE `tb_kunjungan` (
  `no_reg` varchar(20) NOT NULL,
  `tgl_reg` date NOT NULL,
  `tgl_berobat` date NOT NULL,
  `jenis_pendaftaran` varchar(20) NOT NULL,
  `jenis_berobat` varchar(20) NOT NULL,
  `detail` varchar(20) NOT NULL,
  `file_bpjs` text NOT NULL,
  `no_kartu` varchar(15) NOT NULL,
  `id_poli` int(5) NOT NULL,
  `kode_pasien` varchar(15) NOT NULL,
  `id_detail` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kunjungan`
--

INSERT INTO `tb_kunjungan` (`no_reg`, `tgl_reg`, `tgl_berobat`, `jenis_pendaftaran`, `jenis_berobat`, `detail`, `file_bpjs`, `no_kartu`, `id_poli`, `kode_pasien`, `id_detail`) VALUES
('BP202208090001', '2022-08-09', '2022-08-15', 'UMUM', 'Online', 'Berbayar', '', '', 5, 'PSN0001', 1),
('BP202208150002', '2022-08-15', '2022-08-22', 'UMUM', 'Online', 'Berbayar', '', '', 5, 'PSN0002', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pasien`
--

CREATE TABLE `tb_pasien` (
  `kode_pasien` varchar(15) NOT NULL,
  `nama_pasien` varchar(30) NOT NULL,
  `username` varchar(15) NOT NULL,
  `nik` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(15) NOT NULL,
  `pekerjaan` varchar(20) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telpon` varchar(15) NOT NULL,
  `email` varchar(40) NOT NULL,
  `bb` varchar(5) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pasien`
--

INSERT INTO `tb_pasien` (`kode_pasien`, `nama_pasien`, `username`, `nik`, `tanggal_lahir`, `jenis_kelamin`, `pekerjaan`, `alamat`, `telpon`, `email`, `bb`, `tanggal`) VALUES
('PSN0001', 'Evit Rahayu', 'evit', '1111111111111111', '1990-08-09', 'Perempuan', 'Ibu Rumah Tangga', 'Jl. Nusantara, Labuhan Ratu, Kec. Kedaton, Kota Ba', '082279565027', 'evit@gmail.com', '50', '2022-08-09'),
('PSN0002', 'agus', 'agus', '8137476646747646', '2022-08-20', 'Laki-laki', 'akh', 'ahgdg', '1936646646', 'admin@gmail.com', '16', '2022-08-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pegawai`
--

CREATE TABLE `tb_pegawai` (
  `kode_pegawai` varchar(15) NOT NULL,
  `nama_pegawai` varchar(35) NOT NULL,
  `username` varchar(20) NOT NULL,
  `id_poli` int(5) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telpon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_poli`
--

CREATE TABLE `tb_poli` (
  `id_poli` int(5) NOT NULL,
  `kode` varchar(2) NOT NULL,
  `nama_poli` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_poli`
--

INSERT INTO `tb_poli` (`id_poli`, `kode`, `nama_poli`) VALUES
(5, 'BP', 'POLI BALAI PENGOBATAN'),
(6, 'IA', 'POLI KESEHATAN IBU & ANAK');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rekmed`
--

CREATE TABLE `tb_rekmed` (
  `no_rekmed` varchar(15) NOT NULL,
  `no_reg` varchar(20) NOT NULL,
  `kode_pasien` varchar(15) NOT NULL,
  `id_unitmedis` varchar(15) NOT NULL,
  `diagnosa1` text NOT NULL,
  `diagnosa2` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `tindakan` text NOT NULL,
  `tanggal` date NOT NULL,
  `biaya` int(20) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rujukan`
--

CREATE TABLE `tb_rujukan` (
  `id_rujukan` int(5) NOT NULL,
  `no_reg` varchar(20) NOT NULL,
  `no_rujuk` varchar(30) NOT NULL,
  `rs` varchar(100) NOT NULL,
  `alasan` text NOT NULL,
  `alasan_lain` text NOT NULL,
  `anamnesi` text NOT NULL,
  `pemeriksaan` varchar(20) NOT NULL,
  `tanda_vital` text NOT NULL,
  `diagnosa_sementara` text NOT NULL,
  `tindakan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_rujukan`
--

INSERT INTO `tb_rujukan` (`id_rujukan`, `no_reg`, `no_rujuk`, `rs`, `alasan`, `alasan_lain`, `anamnesi`, `pemeriksaan`, `tanda_vital`, `diagnosa_sementara`, `tindakan`) VALUES
(3, 'BP202208090001', '007', 'Bumiwaras', 'harus di scaning', '-', 'ginjal', '07:55', '', '', ''),
(4, 'BP202208150002', '007', 'Bumiwaras', 'scaning', 'sakit diperut', 'Lambung', '18:57', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_unitmedis`
--

CREATE TABLE `tb_unitmedis` (
  `id_unitmedis` varchar(15) NOT NULL,
  `nama_unitmedis` varchar(35) NOT NULL,
  `username` varchar(50) NOT NULL,
  `id_poli` int(5) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telpon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_unitmedis`
--

INSERT INTO `tb_unitmedis` (`id_unitmedis`, `nama_unitmedis`, `username`, `id_poli`, `alamat`, `telpon`) VALUES
('DOK0001', 'dr. Nur Fadilah', 'nur', 5, 'bandar lampung', '082279565027');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `level` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(2, 'evit', '25d55ad283aa400af464c76d713c07ad', 'pasien'),
(3, 'nur', '202cb962ac59075b964b07152d234b70', 'dokter'),
(4, 'agus', '202cb962ac59075b964b07152d234b70', 'pasien');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`);

--
-- Indexes for table `detail_jadwal`
--
ALTER TABLE `detail_jadwal`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_jadwal` (`id_jadwal`);

--
-- Indexes for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD PRIMARY KEY (`id_jadwal`),
  ADD KEY `id_unitmedis` (`id_unitmedis`,`id_poli`),
  ADD KEY `id_poli` (`id_poli`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indexes for table `resep`
--
ALTER TABLE `resep`
  ADD PRIMARY KEY (`id_resep`);

--
-- Indexes for table `resep_diambil`
--
ALTER TABLE `resep_diambil`
  ADD PRIMARY KEY (`id_pengambilan`);

--
-- Indexes for table `tb_kunjungan`
--
ALTER TABLE `tb_kunjungan`
  ADD PRIMARY KEY (`no_reg`),
  ADD KEY `id_poli` (`id_poli`,`kode_pasien`,`id_detail`),
  ADD KEY `kode_pasien` (`kode_pasien`);

--
-- Indexes for table `tb_pasien`
--
ALTER TABLE `tb_pasien`
  ADD PRIMARY KEY (`kode_pasien`);

--
-- Indexes for table `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD PRIMARY KEY (`kode_pegawai`),
  ADD KEY `id_poli` (`id_poli`);

--
-- Indexes for table `tb_poli`
--
ALTER TABLE `tb_poli`
  ADD PRIMARY KEY (`id_poli`);

--
-- Indexes for table `tb_rekmed`
--
ALTER TABLE `tb_rekmed`
  ADD PRIMARY KEY (`no_rekmed`);

--
-- Indexes for table `tb_rujukan`
--
ALTER TABLE `tb_rujukan`
  ADD PRIMARY KEY (`id_rujukan`);

--
-- Indexes for table `tb_unitmedis`
--
ALTER TABLE `tb_unitmedis`
  ADD PRIMARY KEY (`id_unitmedis`),
  ADD KEY `id_poli` (`id_poli`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `detail_jadwal`
--
ALTER TABLE `detail_jadwal`
  MODIFY `id_detail` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  MODIFY `id_jadwal` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id_obat` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `resep`
--
ALTER TABLE `resep`
  MODIFY `id_resep` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `resep_diambil`
--
ALTER TABLE `resep_diambil`
  MODIFY `id_pengambilan` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tb_poli`
--
ALTER TABLE `tb_poli`
  MODIFY `id_poli` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `tb_rujukan`
--
ALTER TABLE `tb_rujukan`
  MODIFY `id_rujukan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_jadwal`
--
ALTER TABLE `detail_jadwal`
  ADD CONSTRAINT `detail_jadwal_ibfk_1` FOREIGN KEY (`id_jadwal`) REFERENCES `jadwal_dokter` (`id_jadwal`);

--
-- Ketidakleluasaan untuk tabel `jadwal_dokter`
--
ALTER TABLE `jadwal_dokter`
  ADD CONSTRAINT `jadwal_dokter_ibfk_1` FOREIGN KEY (`id_unitmedis`) REFERENCES `tb_unitmedis` (`id_unitmedis`),
  ADD CONSTRAINT `jadwal_dokter_ibfk_2` FOREIGN KEY (`id_poli`) REFERENCES `tb_poli` (`id_poli`);

--
-- Ketidakleluasaan untuk tabel `tb_kunjungan`
--
ALTER TABLE `tb_kunjungan`
  ADD CONSTRAINT `tb_kunjungan_ibfk_1` FOREIGN KEY (`kode_pasien`) REFERENCES `tb_pasien` (`kode_pasien`);

--
-- Ketidakleluasaan untuk tabel `tb_pegawai`
--
ALTER TABLE `tb_pegawai`
  ADD CONSTRAINT `tb_pegawai_ibfk_1` FOREIGN KEY (`id_poli`) REFERENCES `tb_poli` (`id_poli`);

--
-- Ketidakleluasaan untuk tabel `tb_unitmedis`
--
ALTER TABLE `tb_unitmedis`
  ADD CONSTRAINT `tb_unitmedis_ibfk_1` FOREIGN KEY (`id_poli`) REFERENCES `tb_poli` (`id_poli`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
