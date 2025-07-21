-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: localhost    Database: db_perpus
-- ------------------------------------------------------
-- Server version	8.0.40

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `buku`
--

DROP TABLE IF EXISTS `buku`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `buku` (
  `id_buku` int NOT NULL AUTO_INCREMENT,
  `judul_buku` varchar(100) NOT NULL,
  `lampiran_buku` varchar(100) NOT NULL DEFAULT '"#"',
  `thumbnail_buku` varchar(100) NOT NULL DEFAULT '"#"',
  `id_informasi` int NOT NULL,
  `kategori_buku` varchar(100) NOT NULL,
  `jenis_buku` enum('Fisik','E-Book') NOT NULL DEFAULT 'E-Book',
  `pengarang_buku` varchar(100) NOT NULL,
  `penerbit_buku` varchar(100) NOT NULL,
  `jumlah_buku` int NOT NULL,
  `download` int NOT NULL DEFAULT '1',
  `pinjam` int NOT NULL DEFAULT '1',
  `deskripsi_buku` varchar(500) NOT NULL,
  PRIMARY KEY (`id_buku`),
  KEY `FK_id_informasi_idx` (`id_informasi`),
  KEY `FK_id_buku` (`judul_buku`),
  CONSTRAINT `FK_id_informasi` FOREIGN KEY (`id_informasi`) REFERENCES `informasi` (`id_informasi`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `buku`
--

LOCK TABLES `buku` WRITE;
/*!40000 ALTER TABLE `buku` DISABLE KEYS */;
INSERT INTO `buku` VALUES (65,'Aplikasi Geografis','6877a1cc6f6d25.10316717.pdf','6877a1cc6f6d25.10316717.jpg',102,'Pendidikan','E-Book','Aplikasi Geografis','Aplikasi Geografis',123,1,1,'<p>Aplikasi GeografisAplikasi GeografisAplikasi GeografisAplikasi GeografisAplikasi GeografisAplikasi GeografisAplikasi GeografisAplikasi Geografis</p>'),(66,'Madilog','6877a20b0df457.42925111.pdf','6877a20b0df457.42925111.jpg',103,'Politik & Pemerintahan','E-Book','MadilogMadilog','MadilogMadilog',123,1,1,'<p>MadilogMadilogMadilogMadilogMadilogMadilogMadilogMadilogMadilogMadilogMadilog</p>'),(67,'Sapiens - Riwayat Singkat Hidup Manusia','\"#\"','6877a483edeb82.17610881.jpg',104,'Sejarah','Fisik','SapiensSapiens','SapiensSapiens',123,1,10,'<p>SapiensSapiensSapiensSapiensSapiensSapiensSapiensSapiensSapiens</p>'),(68,'Atomic Habits','\"#\"','6877a51b019b60.17783245.jpg',105,'Pengembangan Diri','Fisik','Atomic HabitsAtomic Habits','Atomic HabitsAtomic Habits',123,1,7,'<p>Atomic Habits Atomic Habits Atomic Habits Atomic Habits v Atomic Habits</p>'),(69,'Jago Python dalam 1 Jam','\"#\"','6877a5597340b8.00313864.jpg',106,'Pendidikan','Fisik','Jago Python dalam 1 Jam','Jago Python dalam 1 Jam',123,1,14,'<p>Jago Python dalam 1 Jam Jago Python dalam 1 Jam Jago Python dalam 1 Jam</p>'),(70,'Filosofi Teras','6877a5b7863f60.43402650.pdf','6877a5b7863f60.43402650.jpg',107,'Fantasi','E-Book','Filosofi Teras','Filosofi Teras',123,1,1,'<p>Filosofi TerasFilosofi TerasFilosofi TerasFilosofi TerasFilosofi Teras</p>'),(71,'Pulang Pulang','6877a5f5124fc1.49078027.pdf','6877a5f5124fc1.49078027.jpg',108,'Romansa','E-Book','Pulang Pulang','Pulang PulangPulang Pulang',123,1,1,'<p>Pulang Pulang Pulang Pulang Pulang Pulang Pulang Pulang Pulang Pulang</p>'),(72,'Sisi tergelap surga','6877a6475a5e65.00573548.pdf','6877a6475a5e65.00573548.jpg',109,'Fantasi','E-Book','Sisi tergelap surga','Sisi tergelap surga',123,1,1,'<p>Sisi tergelap surga Sisi tergelap surga Sisi tergelap surga Sisi tergelap surga Sisi tergelap surga Sisi tergelap surga&nbsp;</p>'),(73,'1 Jam Ahli Pemrograman','\"#\"','6877a6ef82f044.22180362.jpg',110,'Pengembangan Diri','Fisik','1 Jam Ahli Pemrograman','1 Jam Ahli Pemrograman',123,1,22,'<p>1 Jam Ahli Pemrograman 1 Jam Ahli Pemrograman 1 Jam Ahli Pemrograman 1 Jam Ahli Pemrograman</p>'),(74,'Adolf Hitler','\"#\"','6877a72696d590.58900819.jpg',111,'Biografi','Fisik','Adolf Hitler ','Adolf Hitler',123,1,1,'<p>Adolf Hitler Adolf Hitler Adolf Hitler Adolf Hitler Adolf Hitler</p>'),(75,'Al Quran Al Ikhlas','\"#\"','6877a77a7e13e4.37611788.jpg',112,'Agama','Fisik','Al Quran Al Ikhlas','Al Quran Al Ikhlas',123,1,100,'<p>Al Quran Al Ikhlas Al Quran Al Ikhlas Al Quran Al Ikhlas Al Quran Al Ikhlas</p>'),(76,'Secret of Divine Love','6877a7b5dd9888.95049761.pdf','6877a7b5dd9888.95049761.jpg',113,'Romansa','E-Book','Secret of Divine Love','Secret of Divine Love',123,1,1,'<p>Secret of Divine Love Secret of Divine Love Secret of Divine Love Secret of Divine Love</p>'),(77,'Chery E5 Brochure','6877a7f1835656.17605139.pdf','6877a7f1835656.17605139.jpg',114,'Teknologi','E-Book','Chery E5 Brochure','Chery E5 Brochure',123,3,1,'<p>Chery E5 Brochure Chery E5 Brochure Chery E5 Brochure Chery E5 Brochure Chery E5 Brochure</p>'),(78,'Retorika (Seni Berbicara)','6877a847706d84.18773936.pdf','6877a847706d84.18773936.jpg',115,'Pengembangan Diri','E-Book','Retorika (Seni Berbicara)','Retorika (Seni Berbicara)',123,2,1,'<p>Retorika (Seni Berbicara) Retorika (Seni Berbicara) Retorika (Seni Berbicara) Retorika (Seni Berbicara)</p>'),(79,'Bible Exposed','\"#\"','6877a87beb0ad8.72638484.jpg',116,'Agama','Fisik','Bible Exposed','Bible Exposed',123,1,13,'<p>Bible Exposed Bible Exposed Bible Exposed Bible Exposed Bible Exposed Bible Exposed</p>'),(80,'101 Kisah Orang Terkabul Doanya','\"#\"','6877a8a8beba64.25589133.jpg',117,'Agama','Fisik','101 Kisah Orang Terkabul Doanya','101 Kisah Orang Terkabul Doanya',123,1,1,'<p>101 Kisah Orang Terkabul Doanya 101 Kisah Orang Terkabul Doanya 101 Kisah Orang Terkabul Doanya</p>'),(81,'Ensiklopedia AKhir Zaman','\"#\"','6877a8c778c047.18379876.jpg',118,'Agama','Fisik','Ensiklopedia AKhir Zaman','Ensiklopedia AKhir Zaman',123,1,1,'<p>Ensiklopedia AKhir Zaman Ensiklopedia AKhir Zaman Ensiklopedia AKhir Zaman</p>'),(82,'Cantik Itu Luka','6877a908a95d75.76264085.pdf','6877a908a95d75.76264085.jpg',119,'Romansa','E-Book','Cantik Itu Luka','Cantik Itu Luka',123,2,1,'<p>Cantik Itu Luka Cantik Itu Luka Cantik Itu Luka Cantik Itu Luka</p>'),(83,'Sebuah seni untuk bersikap bodo amat','6877aa9a0b55f4.34215678.pdf','6877aa9a0b55f4.34215678.jpg',120,'Pengembangan Diri','E-Book','Sebuah seni untuk bersikap bodo amat','Sebuah seni untuk bersikap bodo amat',123,1,1,'<p>Sebuah seni untuk bersikap bodo amat Sebuah seni untuk bersikap bodo amat Sebuah seni untuk bersikap bodo amat</p>'),(84,'Lampung Kini','6877aaff8d5295.71134093.pdf','6877aaff8d5295.71134093.jpg',121,'Teknologi','E-Book','Lampung Kini','Lampung Kini',123,1,1,'<p>Lampung Kini Lampung Kini Lampung Kini Lampung Kini Lampung Kini</p>'),(85,'Kisah Para Nabi','\"#\"','6877ab6406a667.01400564.jpg',122,'Agama','Fisik','Kisah Para Nabi','Kisah Para Nabi',123,1,1,'<p>Kisah Para Nabi Kisah Para Nabi Kisah Para Nabi Kisah Para Nabi</p>'),(86,'Muhammad Al-Fatih 1453','\"#\"','6877ab905ddf45.34349717.jpg',123,'Sejarah','Fisik','Muhammad Al-Fatih 1453','Muhammad Al-Fatih 1453',123,1,2,'<p>Muhammad Al-Fatih 1453 Muhammad Al-Fatih 1453 Muhammad Al-Fatih 1453 Muhammad Al-Fatih 1453</p>'),(87,'Juz Amma','\"#\"','6877ac0264f895.99336487.jpg',124,'Agama','Fisik','Juz Amma','Juz Amma',123,1,4,'<p>Juz Amma Juz Amma Juz Amma Juz Amma Juz Amma</p>'),(88,'Panduan Tugas Besar','6877acc2ef0310.48017166.pdf','6877acc2ef0310.48017166.jpg',125,'Pendidikan','E-Book','Panduan Tugas Besar','Panduan Tugas Besar',123,1,1,'<p>Panduan Tugas Besar Panduan Tugas Besar Panduan Tugas Besar Panduan Tugas Besar</p>'),(89,'Pengaruh Motivasi Kerja','6877ad06e173e8.07508909.pdf','6877ad06e173e8.07508909.jpg',126,'Ekonomi & Bisnis','E-Book','Pengaruh Motivasi Kerja','Pengaruh Motivasi Kerja',123,1,1,'<p>Pengaruh Motivasi Kerja Pengaruh Motivasi Kerja Pengaruh Motivasi Kerja</p>'),(98,'hdoahdoshdohs','687dadb2538033.68286991.pdf','687dadb2538033.68286991.jpg',135,'Pendidikan','E-Book','wffwfeef','wffwefwf',22,1,1,'<p>fguifdhgudhighdfuhgidhfgihdfighdfughdifdghduifghidfghdiug</p>');
/*!40000 ALTER TABLE `buku` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `footer`
--

DROP TABLE IF EXISTS `footer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `footer` (
  `id_footer` int NOT NULL AUTO_INCREMENT,
  `footer_text` varchar(500) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hari` varchar(45) NOT NULL,
  `jam` varchar(45) NOT NULL,
  `lokasi` varchar(500) NOT NULL,
  PRIMARY KEY (`id_footer`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `footer`
--

LOCK TABLES `footer` WRITE;
/*!40000 ALTER TABLE `footer` DISABLE KEYS */;
INSERT INTO `footer` VALUES (1,'<p><strong>Bappeda Provinsi Lampung</strong> merupakan lembaga perencana pembangunan daerah yang membantu Gubernur dalam perumusan kebijakan pembangunan. Sejak dibentuk tahun 1980, struktur dan tugasnya telah beberapa kali mengalami penyesuaian sesuai peraturan perundang-undangan, terakhir melalui Pergub No. 88 Tahun 2016.</p>','0721485458','bappeda@lampungprov.go.id','Senin - Jum\'at','7.30 am - 4.00 pm','<p>Jalan <strong>Robert Wolter Monginsidi</strong> No. <i>223</i>, Tanjungkarang Pusat, Pengajaran, Kec. Tlk. Betung Utara, Kota Bandar Lampung, Lampung 35119</p>');
/*!40000 ALTER TABLE `footer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `home_hero`
--

DROP TABLE IF EXISTS `home_hero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `home_hero` (
  `id_hero` int NOT NULL AUTO_INCREMENT,
  `hero_desc` text NOT NULL,
  PRIMARY KEY (`id_hero`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `home_hero`
--

LOCK TABLES `home_hero` WRITE;
/*!40000 ALTER TABLE `home_hero` DISABLE KEYS */;
INSERT INTO `home_hero` VALUES (1,'<p>Temukan beragam koleksi buku menarik yang tersedia untuk semua kalangan, mulai dari fiksi, non-fiksi, hingga referensi ilmiah. Akses informasi dengan mudah di ujung jari Anda, dan nikmati layanan perpustakaan digital yang praktis dan efisien. Jelajahi fitur-fitur interaktif kami, mulai dari pencarian buku, peminjaman online, hingga fitur download E-Book secara gratis. Rasakan pengalaman membaca yang modern, nyaman, dan menyenangkan hanya di Perpustakaan Bappeda Provinsi Lampung.</p>');
/*!40000 ALTER TABLE `home_hero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `informasi`
--

DROP TABLE IF EXISTS `informasi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `informasi` (
  `id_informasi` int NOT NULL AUTO_INCREMENT,
  `jumlah_halaman` int NOT NULL,
  `bahasa_buku` varchar(45) NOT NULL,
  `isbn_buku` varchar(45) NOT NULL,
  PRIMARY KEY (`id_informasi`)
) ENGINE=InnoDB AUTO_INCREMENT=136 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `informasi`
--

LOCK TABLES `informasi` WRITE;
/*!40000 ALTER TABLE `informasi` DISABLE KEYS */;
INSERT INTO `informasi` VALUES (34,200,'Indonesia','1234-5678-90'),(35,200,'Indonesia','1234-5678-90'),(51,100,'Indonesia','1234-5678-90'),(52,100,'Indonesia','1234-5678-90'),(53,100,'Indonesia','1234-5678-90'),(54,100,'Indonesia','1234-5678-90'),(55,100,'Indonesia','1234567890'),(81,1231,'ApakahApakah','ApakahApakahApakah'),(82,1231,'ApakahApakah','ApakahApakahApakah'),(83,1231,'ApakahApakah','ApakahApakahApakah'),(84,1231,'ApakahApakah','ApakahApakahApakah'),(85,1231,'ApakahApakah','ApakahApakahApakah'),(86,123,'cobacoba','cobacobacobacobacobacoba'),(87,123,'cobacoba','cobacobacobacobacobacoba'),(88,123,'AkutahuAkutahu','AkutahuAkutahuAkutahu'),(89,123,'AkutahuAkutahu','AkutahuAkutahuAkutahu'),(90,123,'AkutahuAkutahu','AkutahuAkutahuAkutahu'),(91,123,'AkutahuAkutahu','AkutahuAkutahuAkutahu'),(92,123,'INIUJIAJA','INIUJIAJAINIUJIAJA'),(93,123,'INIUJIAJA','INIUJIAJAINIUJIAJA'),(94,123,'INIUJIAJA','INIUJIAJAINIUJIAJA'),(102,123,'Aplikasi Geografis','Aplikasi Geografis'),(103,123,'MadilogMadilog','MadilogMadilogMadilog'),(104,123,'SapiensSapiens','SapiensSapiensSapiens'),(105,123,'Atomic HabitsAtomic Habits','Atomic HabitsAtomic HabitsAtomic Habits'),(106,123,'Jago Python dalam 1 Jam','Jago Python dalam 1 Jam'),(107,123,'Filosofi Teras','Filosofi Teras'),(108,123,'Pulang Pulang','Pulang Pulang Pulang Pulang'),(109,123,'Sisi tergelap surga','Sisi tergelap surga'),(110,123,'1 Jam Ahli Pemrograman','1 Jam Ahli Pemrograman'),(111,123,'Adolf Hitler','Adolf Hitler'),(112,123,'Al Quran Al Ikhlas','Al Quran Al Ikhlas'),(113,123,'Secret of Divine Love','Secret of Divine Love'),(114,123,'Chery E5 Brochure','Chery E5 Brochure'),(115,123,'Retorika (Seni Berbicara)','Retorika (Seni Berbicara)'),(116,123,'Bible Exposed','Bible ExposedBible Exposed'),(117,123,'101 Kisah Orang Terkabul Doanya','101 Kisah Orang Terkabul Doanya'),(118,123,'Ensiklopedia AKhir Zaman','Ensiklopedia AKhir Zaman'),(119,123,'Cantik Itu Luka','Cantik Itu Luka'),(120,123,'Sebuah seni untuk bersikap bodo amat','Sebuah seni untuk bersikap bodo amat'),(121,123,'Lampung Kini','Lampung Kini'),(122,123,'Kisah Para Nabi','Kisah Para Nabi'),(123,123,'Muhammad Al-Fatih 1453','Muhammad Al-Fatih 1453'),(124,123,'Juz Amma','Juz Amma'),(125,123,'Panduan Tugas Besar','Panduan Tugas Besar'),(126,123,'Pengaruh Motivasi Kerja','Pengaruh Motivasi Kerja'),(135,22,'egfgegrfrgr','efggegefge');
/*!40000 ALTER TABLE `informasi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kunjungan`
--

DROP TABLE IF EXISTS `kunjungan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `kunjungan` (
  `id_kunjungan` int NOT NULL AUTO_INCREMENT,
  `nama_kunjungan` varchar(45) NOT NULL,
  PRIMARY KEY (`id_kunjungan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kunjungan`
--

LOCK TABLES `kunjungan` WRITE;
/*!40000 ALTER TABLE `kunjungan` DISABLE KEYS */;
/*!40000 ALTER TABLE `kunjungan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `link_clicks`
--

DROP TABLE IF EXISTS `link_clicks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `link_clicks` (
  `id_link` int NOT NULL AUTO_INCREMENT,
  `link_url` varchar(300) NOT NULL,
  `clicks` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_link`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `link_clicks`
--

LOCK TABLES `link_clicks` WRITE;
/*!40000 ALTER TABLE `link_clicks` DISABLE KEYS */;
INSERT INTO `link_clicks` VALUES (1,'https://www.youtube.com/@YukNgajiTV/streams',1);
/*!40000 ALTER TABLE `link_clicks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peminjaman`
--

DROP TABLE IF EXISTS `peminjaman`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `peminjaman` (
  `id_peminjaman` int NOT NULL AUTO_INCREMENT,
  `nama_peminjam` varchar(50) NOT NULL,
  `nip_peminjam` varchar(50) NOT NULL,
  `jabatan_peminjam` varchar(50) NOT NULL,
  `bidang_peminjam` varchar(50) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `tanggal_peminjaman` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tanggal_pengembalian` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `no_telp` varchar(50) NOT NULL,
  `status_peminjaman` enum('DIPINJAM','DIKEMBALIKAN') NOT NULL DEFAULT 'DIPINJAM',
  PRIMARY KEY (`id_peminjaman`),
  KEY `fk_judul_buku_idx` (`judul_buku`),
  CONSTRAINT `fk_judul_buku` FOREIGN KEY (`judul_buku`) REFERENCES `buku` (`judul_buku`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peminjaman`
--

LOCK TABLES `peminjaman` WRITE;
/*!40000 ALTER TABLE `peminjaman` DISABLE KEYS */;
INSERT INTO `peminjaman` VALUES (53,'Sujarwo','Sujarwo','Sujarwo','Sujarwo','Juz Amma','2025-07-17 08:15:22','2025-07-17 00:00:00','123456789','DIKEMBALIKAN'),(54,'Sugimin','Sugimin','Sugimin','Sugimin','Juz Amma','2025-07-17 08:15:51','2025-07-17 00:00:00','1234567890','DIPINJAM'),(55,'Felix','Felix','Felix','Felix','Muhammad Al-Fatih 1453','2025-07-17 08:16:15','2025-07-17 00:00:00','FelixFelix','DIPINJAM'),(56,'Nawalah','Nawalah','Nawalah','Nawalah','Juz Amma','2025-07-17 10:38:31','2025-07-24 00:00:00','NawalahNawalah','DIKEMBALIKAN');
/*!40000 ALTER TABLE `peminjaman` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `profile` (
  `id_profile` int NOT NULL AUTO_INCREMENT,
  `profile_desk` text NOT NULL,
  `profile_picture` varchar(100) NOT NULL,
  PRIMARY KEY (`id_profile`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profile`
--

LOCK TABLES `profile` WRITE;
/*!40000 ALTER TABLE `profile` DISABLE KEYS */;
INSERT INTO `profile` VALUES (1,'<p>Bappeda Provinsi Lampung pada awalnya dibentuk berdasarkan Keputusan Presiden No. 27 tahun 1980, dan Permendagri No. 185 tahun 1980, serta Peraturan Daerah No. 9 tahun 1981, yang mengacu pada Undang-Undang No. 5 tahun 1974. Pada Era Undang-undang No. 22 tahun 1999, Era Desentralisasi atau Otonomi Daerah, Bappeda Provinsi Lampung dibangun kembali mengacu pada Peraturan Pemerintah No. 25 tahun 2000 dan Peraturan Pemerintah No. 84 tahun 2000, dan ditetapkan dalam bentuk struktur organisasi “Badan Provinsi” berdasarkan Peraturan Daerah No. 16 tahun 2000.</p>','struktur.jpg');
/*!40000 ALTER TABLE `profile` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `social`
--

DROP TABLE IF EXISTS `social`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `social` (
  `id_social` int NOT NULL AUTO_INCREMENT,
  `instagram` varchar(200) NOT NULL DEFAULT 'https://www.instagram.com/bappeda_lampung/?hl=en',
  `youtube` varchar(200) NOT NULL DEFAULT 'https://www.youtube.com/channel/UCZMZAzUJh0EDYEU5FfV64eg',
  `tiktok` varchar(200) NOT NULL,
  `x` varchar(200) NOT NULL,
  `facebook` varchar(200) NOT NULL,
  PRIMARY KEY (`id_social`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `social`
--

LOCK TABLES `social` WRITE;
/*!40000 ALTER TABLE `social` DISABLE KEYS */;
INSERT INTO `social` VALUES (1,'https://www.instagram.com/bappeda_lampung/?hl=en','http://www.youtube.com/@bappedaprovinsilampung9397','##############','##############','##############');
/*!40000 ALTER TABLE `social` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id_user` int NOT NULL AUTO_INCREMENT,
  `nama_user` varchar(45) NOT NULL,
  `password_user` varchar(200) NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','$2y$10$liUxZgCq/MO0x0vBEPsGyuS93.HPtIfFHA4bMcUfW.movi6Fvga5W');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-07-21 11:28:54
