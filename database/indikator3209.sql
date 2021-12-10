-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 10 Des 2021 pada 03.01
-- Versi server: 5.7.31
-- Versi PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `indikator3209`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

DROP TABLE IF EXISTS `berita`;
CREATE TABLE IF NOT EXISTS `berita` (
  `berita_id` int(11) NOT NULL AUTO_INCREMENT,
  `berita_user` int(11) DEFAULT NULL,
  `berita_daterilis` date NOT NULL,
  `berita_text` text NOT NULL,
  `berita_photo` text NOT NULL,
  `berita_body` text NOT NULL,
  `berita_active` enum('Tampilkan','Arsipkan') NOT NULL,
  PRIMARY KEY (`berita_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`berita_id`, `berita_user`, `berita_daterilis`, `berita_text`, `berita_photo`, `berita_body`, `berita_active`) VALUES
(1, NULL, '2021-12-09', 'Pelatihan Sakernas Februari 2020', 'uploads/berita/Pelatihan-Sakernas-Februari-2020.jpg', '<p><span style=\"color: rgb(51, 51, 51); font-family: &quot;Segoe UI&quot;; font-size: 14px; text-align: justify;\">Survei Angkatan Kerja Nasional (Sakernas) adalah survei yang diselenggarakan oleh Badan Pusat Statistik (BPS) yang di rancang khusus untuk mengumpulkan data yang dapat menggambarkan keadaan umum ketenagakerjaan antar periode pencacahan. Hingga saat ini, Sakernas mengalami berbagai perubahan baik waktu pelaksanaan, level estimasi, cakupan, maupun metodologi.</span><br style=\"color: rgb(51, 51, 51); font-family: &quot;Segoe UI&quot;; font-size: 14px; text-align: justify;\"><span style=\"color: rgb(51, 51, 51); font-family: &quot;Segoe UI&quot;; font-size: 14px; text-align: justify;\">Pendekatan teori ketenagakerjaan yang digunakan dalam Sakernas 1984 menggunakan Konsep Baku Angkatan Kerja (Standar Labour Force Concept) yang tertuang dalam International Conference of Labour Statisticians (ICLS13) tahun 1982.</span><br style=\"color: rgb(51, 51, 51); font-family: &quot;Segoe UI&quot;; font-size: 14px; text-align: justify;\"><span style=\"color: rgb(51, 51, 51); font-family: &quot;Segoe UI&quot;; font-size: 14px; text-align: justify;\">Pada tahun 2013, International Labour Organization (ILO) menyelenggarakan ICLS 19 yang menghasilkan beberapa pengembangan konsep definisi variabel-variabel ketenagakerjaan, serta menyesuaikan konsep aktivitas produktif (yang dalam ICLS 19 disebut dengan Work) dengan batasan produksi yang mengacu pada System National Account (SNA) 2008.</span><br style=\"color: rgb(51, 51, 51); font-family: &quot;Segoe UI&quot;; font-size: 14px; text-align: justify;\"><span style=\"color: rgb(51, 51, 51); font-family: &quot;Segoe UI&quot;; font-size: 14px; text-align: justify;\">Mulai tahun 2016, kuesioner Sakernas sudah mengadopsi 2 konsep baku ketenagakerjaan dari ICLS 13 dan ICLS 19 meskipun konsep ICLS belum diukur secara utuh. Pada Sakernas 2017 dilakukan penyempurnaan terhadap penerapan konsep ICLS 19 mencakup penyempurnaan alur pertanyaan dan penambahan beberapa pertanyaan dalam kuesioner. Pada Sakernas tahun 2018, dilakukan penyempurnaan kuesioner untuk menangkap fenomena pekerja berbasis online dan program padat karya yang berasal dari dana desa. Pada tahun 2019, Sakernas menyempurnakan jonsep status pekerjaan yang diadopsi dari ICLS 20 serta penambahan pertanyaan untuk menangkap fenomena ekonomi digital. Pada Sakernas 2020 dilakukan penambahan pertanyaan mengenai migrasi internasional, penyederhanaan jawaban, dan perubahan urutan pertanyaan.</span><br style=\"color: rgb(51, 51, 51); font-family: &quot;Segoe UI&quot;; font-size: 14px; text-align: justify;\"><span style=\"color: rgb(51, 51, 51); font-family: &quot;Segoe UI&quot;; font-size: 14px; text-align: justify;\">Sebelum petugas turun ke lapangan untuk melakukan pendataan, petugas diberikan pembekalan dalam bentuk pelatihan. BPS Kabupaten Cirebon melakukan pelatihan Sakernas Februari 2020 pada tanggal 19 s.d 21 Januari 2020 bertempat di Verse Hotel Kabupaten Cirebon dengan instruktur daerah Ibu Anggi Alfrianti, SE. Kegiatan Pelatihan dibuka langsung oleh Kepala BPS Kabupaten Cirebon Bapak Ono Margiono, S.Si., MM.</span><br></p>', 'Tampilkan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `indikator`
--

DROP TABLE IF EXISTS `indikator`;
CREATE TABLE IF NOT EXISTS `indikator` (
  `indikator_id` int(11) NOT NULL AUTO_INCREMENT,
  `indikator_metadata_id` int(11) NOT NULL,
  `indikator_kategori` enum('SOSIAL DAN KEPENDUDUKAN','EKONOMI DAN PERDAGANGAN','PERTANIAN DAN PERTAMBANGAN') NOT NULL,
  `indikator_subjek` varchar(255) NOT NULL,
  `indikator_judul` varchar(1020) NOT NULL,
  PRIMARY KEY (`indikator_id`),
  KEY `indikator_metadata_id` (`indikator_metadata_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `indikator`
--

INSERT INTO `indikator` (`indikator_id`, `indikator_metadata_id`, `indikator_kategori`, `indikator_subjek`, `indikator_judul`) VALUES
(10, 3, 'SOSIAL DAN KEPENDUDUKAN', 'Kependudukan', 'Rasio Jenis Kelamin Kab. Cirebon, 2015-2018'),
(11, 4, 'SOSIAL DAN KEPENDUDUKAN', 'Indeks Pembangunan Manusia', 'Indeks Pembangunan Manusia (IPM) Kab. Cirebon, 2015-2020'),
(12, 2, 'SOSIAL DAN KEPENDUDUKAN', 'Kependudukan', 'Laju Pertumbuhan Penduduk Kab. Cirebon, 2015-2018'),
(13, 1, 'SOSIAL DAN KEPENDUDUKAN', 'Kependudukan', 'Jumlah Penduduk Kab. Cirebon, 2019-2020');

-- --------------------------------------------------------

--
-- Struktur dari tabel `indikator_tahun`
--

DROP TABLE IF EXISTS `indikator_tahun`;
CREATE TABLE IF NOT EXISTS `indikator_tahun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `indikator_id` int(11) NOT NULL,
  `indikator_tahun` char(4) NOT NULL,
  `indikator_nilai` float NOT NULL,
  `indikator_satuan` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `indikator_id` (`indikator_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `indikator_tahun`
--

INSERT INTO `indikator_tahun` (`id`, `indikator_id`, `indikator_tahun`, `indikator_nilai`, `indikator_satuan`) VALUES
(18, 10, '2015', 105.13, 'poin'),
(19, 10, '2016', 105.15, 'poin'),
(20, 10, '2017', 105.17, 'poin'),
(21, 10, '2018', 105.13, 'poin'),
(22, 11, '2015', 66.07, 'poin'),
(23, 11, '2016', 66.7, 'poin'),
(24, 11, '2017', 67.39, 'poin'),
(25, 11, '2018', 68.05, 'poin'),
(26, 11, '2019', 68.69, 'poin'),
(27, 11, '2020', 68.75, 'poin'),
(28, 12, '2015', 0.787, 'persen'),
(29, 12, '2016', 0.79, 'persen'),
(30, 12, '2017', 0.775, 'persen'),
(31, 12, '2018', 0.769, 'persen'),
(32, 13, '2019', 2189780, 'jiwa'),
(33, 13, '2020', 2270620, 'jiwa');

-- --------------------------------------------------------

--
-- Struktur dari tabel `metadata`
--

DROP TABLE IF EXISTS `metadata`;
CREATE TABLE IF NOT EXISTS `metadata` (
  `metadata_id` int(11) NOT NULL AUTO_INCREMENT,
  `metadata_text` text,
  `metadata_kondef` text,
  `metadata_kegunaan` text,
  `metadata_interpretasi` text,
  `metadata_sumber` text,
  PRIMARY KEY (`metadata_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `metadata`
--

INSERT INTO `metadata` (`metadata_id`, `metadata_text`, `metadata_kondef`, `metadata_kegunaan`, `metadata_interpretasi`, `metadata_sumber`) VALUES
(1, 'Jumlah Penduduk', 'Ukuran absolut dari penduduk, dinyatakan dalam jiwa, ribuan jiwa atau jutaan jiwa', 'Jumlah penduduk menjadi denominator bagi indikator statistik lainnya. Selain jumlah penduduk hasil sensus, terdapat juga jumlah penduduk hasil proyeksi.', 'Semakin tinggi angka semakin banyak jumlah penduduk', 'Sensus Penduduk, Proyeksi Penduduk'),
(2, 'Laju Pertumbuhan Penduduk', 'Angka yang menunjukkan tingkat pertumbuhan penduduk dalam jangka waktu tertentu. Angka ini dinyatakan sebagai persentase dari penduduk dasar. Laju pertumbuhan penduduk dapat dihitung menggunakan tiga metode, yaitu aritmatik, geometrik, dan eksponensial. Metode yang paling sering digunakan oleh BPS adalah metode geometrik.', 'Untuk mengetahui perubahan jumlah penduduk antar dua periode waktu.', 'a. LPP  >  0  berarti  terjadi  penambahanpenduduk.pada  tahun  t dibandingkan  dengan  tahun sebelumnya. \r\nb. LPP  =  0  berarti  tidak  terjadiperubahan  jumlah  penduduk  padatahun  t  dibandingkan  dengan  tahun sebelumnya.  \r\nc. Pt,0 < 100 berarti terjadi pengurangan jumlah  penduduk  pada  tahun  t dibandingkan  dengan tahun sebelumnya. ', 'Sensus Penduduk'),
(3, 'Rasio Jenis Kelamin', 'Rasio  jenis  kelamin  adalah  perbandingan antara  jumlah  penduduk pria  dan  jumlah penduduk  wanita  pada  suatu  daerah  dan pada waktu  tertentu,  yang  biasanya dinyatakan dalam banyaknya penduduk pria per 100 wanita. ', 'Data  mengenai  rasio  jenis  kelamin berguna  untuk  pengembangan perencanaan  pembangunan  yang berwawasan  gender,  terutama  yang berkaitan  dengan  perimbangan pembangunan  laki-laki  dan  perempuan secara  adil.  Misalnya,  karena  adat  dan kebiasaan  jaman  dulu  yang  lebih mengutamakan  pendidikan  laki-laki dibanding  perempuan,  maka pengembangan  pendidikan  berwawasan gender  harus  memperhitungkan  kedua jenis  kelamin  dengan mengetahui  berapa banyaknya  laki-laki  dan  perempuan dalam  umur  yang  sama.  Informasi tentang  rasio  jenis  kelamin  juga  penting diketahui  oleh  para  politisi,  terutama untuk  meningkatkan  keterwakilan perempuan dalam parlemen.', 'a. SR  >  100  berarti  jumlah  penduduk laki-laki  lebih  banyak  dibandingkan dengan  jumlah  penduduk perempuan.  \r\nb. SR  =  100  berarti  jumlah  penduduk laki-laki  sama  dengan  jumlah penduduk perempuan.  \r\nc. SR  <  100  berarti  jumlah  penduduk perempuan  lebih  banyak dibandingkan  dengan  jumlah penduduk laki-laki. ', 'Sensus Penduduk'),
(4, 'Indeks Pembangunan Manusia (IPM)', 'Menurut UNDP, IPM didefinisikan sebagai proses perluasan pilihan bagi penduduk (a process of enlarging the choice of people). IPM mengukur pencapaian hasil pembangunan dari suatu daerah/wilayah dalam tiga dimensi dasar pembangunan yaitu: lamanya hidup, pengetahuan/tingkat pendidikan dan standard hidup layak.', 'Untuk mengklasifikasikan apakah sebuah negara adalah negara maju, negara berkembang, atau negara terbelakang dan juga untuk mengukur pengaruh dari kebijaksanaan ekonomi terhadap kualitas hidup.', 'Angka IPM memberikan gambaran komprehensip mengenai tingkat pencapaian pembangunan manusia sebagai dampak dari kegiatan pembangunan yang dilakuan oleh suatu negara/daerah. Semakin tinggi nilai IPM suatu negara/daerah, menunjukkan pencapaian pembangunan manusianya semakin baik.', 'Survei Sosial Ekonomi Nasional (SUSENAS)');

-- --------------------------------------------------------

--
-- Struktur dari tabel `publikasi`
--

DROP TABLE IF EXISTS `publikasi`;
CREATE TABLE IF NOT EXISTS `publikasi` (
  `publikasi_id` int(11) NOT NULL AUTO_INCREMENT,
  `publikasi_judul` varchar(1020) NOT NULL,
  `publikasi_nokatalog` varchar(255) DEFAULT NULL,
  `publikasi_nobuku` varchar(255) DEFAULT NULL,
  `publikasi_filename` text NOT NULL,
  `publikasi_daterilis` date NOT NULL,
  `publikasi_pathcover` text NOT NULL,
  `publikasi_path` text NOT NULL,
  `publikasi_ukuran` varchar(100) NOT NULL,
  `publikasi_deskripsi` text NOT NULL,
  PRIMARY KEY (`publikasi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `publikasi`
--

INSERT INTO `publikasi` (`publikasi_id`, `publikasi_judul`, `publikasi_nokatalog`, `publikasi_nobuku`, `publikasi_filename`, `publikasi_daterilis`, `publikasi_pathcover`, `publikasi_path`, `publikasi_ukuran`, `publikasi_deskripsi`) VALUES
(3, 'Kecamatan Arjawinangun Dalam Angka 2021', '1102001.3209200', '2714-9110', 'Kecamatan Arjawinangun Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Arjawinangun Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Arjawinangun Dalam Angka 2021.pdf', '3.484 MB', 'Kecamatan Arjawinangun Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.'),
(4, 'Kecamatan Astanajapura Dalam Angka 2021', '1102001.3209080', '2656-2081', 'Kecamatan Astanajapura Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Astanajapura Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Astanajapura Dalam Angka 2021.pdf', '1.625 MB', 'Kecamatan Astanajapura Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.'),
(5, 'Kecamatan Babakan Dalam Angka 2021', '1102001.3209040', '2656-2146', 'Kecamatan Babakan Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Babakan Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Babakan Dalam Angka 2021.pdf', '3.98 MB', 'Kecamatan Babakan Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.\r\n'),
(6, 'Kecamatan Beber Dalam Angka 2021', '1102001.3209100', '2715-2243', 'Kecamatan Beber Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Beber Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Beber Dalam Angka 2021.pdf', '1.752 MB', 'Kecamatan Beber Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.'),
(7, 'Kecamatan Ciledug Dalam Angka 2021', '1102001.3209020', ' 2655-6138', 'Kecamatan Ciledug Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Ciledug Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Ciledug Dalam Angka 2021.pdf', '3.952 MB', 'Kecamatan Ciledug Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik'),
(8, 'Kecamatan Ciwaringin Dalam Angka 2021', '1102001.3209210', '2714-9099', 'Kecamatan Ciwaringin Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Ciwaringin Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Ciwaringin Dalam Angka 2021.pdf', '3.795 MB', 'Kecamatan Ciwaringin Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.'),
(9, 'Kecamatan Depok Dalam Angka 2021', '1102001.3209141', '2715-2170', 'Kecamatan Depok Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Depok Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Depok Dalam Angka 2021.pdf', '3.802 MB', 'Kecamatan Depok Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.'),
(10, 'Kecamatan Dukupuntang Dalam Angka 2021', '1102001.3209121', '2715-2200', 'Kecamatan Dukupuntang Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Dukupuntang Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Dukupuntang Dalam Angka 2021.pdf', '1.74 MB', 'Kecamatan Dukupuntang Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.'),
(11, 'Kecamatan Gebang Dalam Angka 2021', '1102001.3209041', '2656-2138', 'Kecamatan Gebang Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Gebang Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Gebang Dalam Angka 2021.pdf', '3.799 MB', 'Kecamatan Gebang Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.'),
(12, 'Kecamatan Gegesik Dalam Angka 2021', '1102001.3209230', '2714-9064', 'Kecamatan Gegesik Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Gegesik Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Gegesik Dalam Angka 2021.pdf', '3.872 MB', 'Kecamatan Gegesik Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.'),
(13, 'Kecamatan Gempol Dalam Angka 2021', '1102001.3209211', '2714-9080', 'Kecamatan Gempol Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Gempol Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Gempol Dalam Angka 2021.pdf', '3.812 MB', 'Kecamatan Gempol Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.'),
(14, 'Kecamatan Greged Dalam Angka 2021', '1102001.3209101', '2715-2235', 'Kecamatan Greged Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Greged Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Greged Dalam Angka 2021.pdf', '3.918 MB', 'Kecamatan Greged Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.'),
(15, 'Kecamatan Gunungjati Dalam Angka 2021', '1102001.3209171', '2714-9161', 'Kecamatan Gunungjati Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Gunungjati Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Gunungjati Dalam Angka 2021.pdf', '3.922 MB', 'Kecamatan Gunungjati Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik'),
(16, 'Kecamatan Jamblang Dalam Angka 2021', '1102001.3209191', '2714-9129', 'Kecamatan Jamblang Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Jamblang Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Jamblang Dalam Angka 2021.pdf', '3.619 MB', 'Kecamatan Jamblang Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.'),
(17, 'Kecamatan Kaliwedi Dalam Angka 2021', '1102001.3209231', '2714-9056', 'Kecamatan Kaliwedi Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Kaliwedi Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Kaliwedi Dalam Angka 2021.pdf', '2.318 MB', 'Kecamatan Kaliwedi Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.'),
(18, 'Kecamatan Kapetakan Dalam Angka 2021', '1102001.3209180', '2714-9153', 'Kecamatan Kapetakan Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Kapetakan Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Kapetakan Dalam Angka 2021.pdf', '3.903 MB', 'Kecamatan Kapetakan Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik'),
(19, 'Kecamatan Karangsembung Dalam Angka 2021', '1102001.3209050', '2656-212X', 'Kecamatan Karangsembung Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Karangsembung Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Karangsembung Dalam Angka 2021.pdf', '3.909 MB', 'Kecamatan Karangsembung Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.'),
(20, 'Kecamatan Karangwareng Dalam Angka 2021', '1102001.3209051', '2656-2111', 'Kecamatan Karangwareng Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Karangwareng Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Karangwareng Dalam Angka 2021.pdf', '3.92 MB', 'Kecamatan Karangwareng Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.'),
(21, 'Kecamatan Kedawung Dalam Angka 2021', '1102001.3209162', '2714-917X', 'Kecamatan Kedawung Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Kedawung Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Kedawung Dalam Angka 2021.pdf', '3.746 MB', 'Kecamatan Kedawung Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.'),
(22, 'Kecamatan Klangenan Dalam Angka 2021', '1102001.3209190', '2714-9137', 'Kecamatan Klangenan Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Klangenan Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Klangenan Dalam Angka 2021.pdf', '3.758 MB', 'Kecamatan Klangenan Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.'),
(23, 'Kecamatan Lemahabang Dalam Angka 2021', '1102001.3209060', '2656-2103', 'Kecamatan Lemahabang Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Lemahabang Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Lemahabang Dalam Angka 2021.pdf', '3.976 MB', 'Kecamatan Lemahabang Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.'),
(24, 'Kecamatan Losari Dalam Angka 2021', '1102001.3209030', '2655-6146', 'Kecamatan Losari Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Losari Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Losari Dalam Angka 2021.pdf', '3.964 MB', 'Kecamatan Losari Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.'),
(25, 'Kecamatan Mundu Dalam Angka 2021', '1102001.3209090', '2656-2065', 'Kecamatan Mundu Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Mundu Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Mundu Dalam Angka 2021.pdf', '2.924 MB', 'Kecamatan Mundu Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.'),
(26, 'Kecamatan Pabedilan Dalam Angka 2021', '1102001.3209031', '2655-6154', 'Kecamatan Pabedilan Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Pabedilan Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Pabedilan Dalam Angka 2021.pdf', '3.954 MB', 'Kecamatan Pabedilan Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.'),
(27, 'Kecamatan Pabuaran Dalam Angka 2021', '1102001.3209021', '2655-9188', 'Kecamatan Pabuaran Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Pabuaran Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Pabuaran Dalam Angka 2021.pdf', '3.899 MB', 'Kecamatan Pabuaran Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.'),
(28, 'Kecamatan Palimanan Dalam Angka 2021', '1102001.3209130', '2715-2197', 'Kecamatan Palimanan Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Palimanan Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Palimanan Dalam Angka 2021.pdf', '3.791 MB', 'Kecamatan Palimanan Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.'),
(29, 'Kecamatan Pangenan Dalam Angka 2021', '1102001.3209081', '2656-2073', 'Kecamatan Pangenan Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Pangenan Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Pangenan Dalam Angka 2021.pdf', '4.077 MB', 'Kecamatan Pangenan Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.'),
(30, 'Kecamatan Panguragan Dalam Angka 2021', '1102001.3209201', '2714-9102', 'Kecamatan Panguragan Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Panguragan Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Panguragan Dalam Angka 2021.pdf', '3.848 MB', 'Kecamatan Panguragan Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.'),
(31, 'Kecamatan Pasaleman Dalam Angka 2021', '1102001.3209011', '2655-612X', 'Kecamatan Pasaleman Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Pasaleman Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Pasaleman Dalam Angka 2021.pdf', '3.858 MB', 'Kecamatan Pasaleman Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.'),
(32, 'Kecamatan Plered Dalam Angka 2021', '1102001.3209151', '2715-2154', 'Kecamatan Plered Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Plered Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Plered Dalam Angka 2021.pdf', '3.865 MB', 'Kecamatan Plered Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.'),
(33, 'Kecamatan Plumbon Dalam Angka 2021', '1102001.3209140', '2715-2189', 'Kecamatan Plumbon Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Plumbon Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Plumbon Dalam Angka 2021.pdf', '3.994 MB', 'Kecamatan Plumbon Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.'),
(34, 'Kecamatan Sedong Dalam Angka 2021', '1102001.3209070', '2656-7911', 'Kecamatan Sedong Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Sedong Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Sedong Dalam Angka 2021.pdf', '3.912 MB', 'Kecamatan Sedong Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.'),
(35, 'Kecamatan Sumber Dalam Angka 2021', '1102001.3209120', '2715-2219', 'Kecamatan Sumber Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Sumber Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Sumber Dalam Angka 2021.pdf', '3.94 MB', 'Kecamatan Sumber Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.'),
(36, 'Kecamatan Suranenggala Dalam Angka 2021', '1102001.3209181', '2714-9145', 'Kecamatan Suranenggala Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Suranenggala Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Suranenggala Dalam Angka 2021.pdf', '3.626 MB', 'Kecamatan Suranenggala Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.'),
(37, 'Kecamatan Susukanlebak Dalam Angka 2021', '1102001.3209061', '2656-209X', 'Kecamatan Susukanlebak Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Susukanlebak Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Susukanlebak Dalam Angka 2021.pdf', '3.988 MB', 'Kecamatan Susukanlebak Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.'),
(38, 'Kecamatan Susukan Dalam Angka 2021', '1102001.3209220', '2714-9072', 'Kecamatan Susukan Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Susukan Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Susukan Dalam Angka 2021.pdf', '3.925 MB', 'Kecamatan Susukan Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.'),
(39, 'Kecamatan Talun Dalam Angka 2021', '1102001.3209111', '2715-2227', 'Kecamatan Talun Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Talun Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Talun Dalam Angka 2021.pdf', '3.981 MB', 'Kecamatan Talun Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.'),
(40, 'Kecamatan Tengah Tani Dalam Angka 2021', '1102001.3209161', '2714-9188', 'Kecamatan Tengah Tani Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Tengah Tani Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Tengah Tani Dalam Angka 2021.pdf', '3.856 MB', 'Kecamatan Tengahtani Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.'),
(41, 'Kecamatan Waled Dalam Angka 2021', '1102001.3209010', '2597-842X', 'Kecamatan Waled Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Waled Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Waled Dalam Angka 2021.pdf', '3.784 MB', 'Kecamatan Waled Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.\r\n'),
(42, 'Kecamatan Weru Dalam Angka 2021', '1102001.3209150', '2715-2162', 'Kecamatan Weru Dalam Angka 2021.pdf', '2021-09-24', 'uploads/publikasi/Kecamatan Weru Dalam Angka 2021.jpg', 'uploads/publikasi/Kecamatan Weru Dalam Angka 2021.pdf', '3.69 MB', 'Kecamatan Weru Dalam Angka 2021 merupakan publikasi tahunan yang diterbitkan oleh BPS Kabupaten Cirebon. Publikasi ini berisi data-data geografis, pemerintahan, penduduk dan lain-lain, yang bersumber dari instansi-instansi dan Badan Pusat Statistik.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `video_id` int(11) NOT NULL AUTO_INCREMENT,
  `video_kategori` enum('MATERI STATISTIK','RILIS INDIKATOR') NOT NULL,
  `video_text` text NOT NULL,
  `video_link` text NOT NULL,
  PRIMARY KEY (`video_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `video`
--

INSERT INTO `video` (`video_id`, `video_kategori`, `video_text`, `video_link`) VALUES
(3, 'RILIS INDIKATOR', '[RILIS BPS] 1 Desember 2021', 'https://www.youtube.com/watch?v=yRDAXjjaSjo');

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `indikator`
--
ALTER TABLE `indikator`
  ADD CONSTRAINT `indikator_metadata_id` FOREIGN KEY (`indikator_metadata_id`) REFERENCES `metadata` (`metadata_id`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `indikator_tahun`
--
ALTER TABLE `indikator_tahun`
  ADD CONSTRAINT `indikator_id` FOREIGN KEY (`indikator_id`) REFERENCES `indikator` (`indikator_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
