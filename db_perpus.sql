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
  ) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
  /*!40101 SET character_set_client = @saved_cs_client */;

  --
  -- Dumping data for table `informasi`
  --

  LOCK TABLES `informasi` WRITE;
  /*!40000 ALTER TABLE `informasi` DISABLE KEYS */;
  INSERT INTO `informasi` VALUES (1,200,'Indonesia','978-602-1234-567'),(2,300,'Amerika','978-602-1234-567'),(3,100,'Russia','978-602-1234-567'),(4,150,'China','978-602-1234-567'),(5,400,'India','978-602-1234-567'),(6,51,'Ibrani','32134314343242432432'),(7,51,'Ibrani','32134314343242432432'),(8,51,'Ibrani','32134314343242432432'),(9,51,'Ibrani','32134314343242432432'),(10,51,'Ibrani','32134314343242432432'),(11,54,'Angelic','32134314343242432432');
  /*!40000 ALTER TABLE `informasi` ENABLE KEYS */;
  UNLOCK TABLES;
  --
  -- Table structure for table `buku`
  --

  DROP TABLE IF EXISTS `buku`;
  /*!40101 SET @saved_cs_client     = @@character_set_client */;
  /*!50503 SET character_set_client = utf8mb4 */;
  CREATE TABLE `buku` (
    `id_buku` int NOT NULL AUTO_INCREMENT,
    `judul_buku` varchar(100) NOT NULL,
    `gambar_buku` varchar(100) NOT NULL,
    `id_informasi` int NOT NULL,
    `kategori_buku` varchar(100) NOT NULL,
    `penerbit_buku` varchar(100) NOT NULL,
    `jumlah_buku` int NOT NULL,
    `deskripsi_buku` varchar(250) NOT NULL,
    PRIMARY KEY (`id_buku`),
    KEY `FK_id_informasi_idx` (`id_informasi`),
    CONSTRAINT `FK_id_informasi` FOREIGN KEY (`id_informasi`) REFERENCES `informasi` (`id_informasi`) ON DELETE CASCADE ON UPDATE CASCADE
  ) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
  /*!40101 SET character_set_client = @saved_cs_client */;

  --
  -- Dumping data for table `buku`
  --

  LOCK TABLES `buku` WRITE;
  /*!40000 ALTER TABLE `buku` DISABLE KEYS */;
  INSERT INTO `buku` VALUES (1,'Belajar SQL','buku1.jpg',1,'Teknologi','Informatika Press',100,'Ini adalah buku Belajar SQL'),(2,'Belajar PHP','buku2.jpg',2,'Teknologi','Informatika Press',200,'Ini adalah buku Belajar PHP'),(3,'Belajar Marxisme','buku3.jpg',3,'Politik','Karl Press',300,'Ini adalah buku Belajar MARXISME'),(4,'Belajar Fiqih','buku4.jpg',4,'Agama','Fatih Press',400,'Ini adalah buku Belajar FIQIH'),(5,'Belajar Bisnis','buku5.jpg',5,'Bisnis','Ray Press',500,'Ini adalah buku Belajar BISNIS'),(7,'Cara menjadi Zionis Lokal','6858dab7bbfe15.00441785.jpg',10,'Agama','B-attack Corp',29,'Ini adalah contoh buku untuk menjadi zionis lokal'),(8,'Cara menikah dengan 2B','6858dd7ea8f917.74937378.jpg',11,'Fantasi','Square Enix',13,'Ini adalah buku agar anda bisa menikahi 2B');
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
    `footer_text` varchar(350) NOT NULL,
    `kontak` varchar(15) NOT NULL,
    `email` varchar(50) NOT NULL,
    `hari` varchar(45) NOT NULL,
    `jam` varchar(45) NOT NULL,
    `lokasi` varchar(200) NOT NULL,
    PRIMARY KEY (`id_footer`)
  ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
  /*!40101 SET character_set_client = @saved_cs_client */;

  --
  -- Dumping data for table `footer`
  --

  LOCK TABLES `footer` WRITE;
  /*!40000 ALTER TABLE `footer` DISABLE KEYS */;
  INSERT INTO `footer` VALUES (1,'Bappeda Provinsi Lampung merupakan lembaga perencana pembangunan daerah yang membantu Gubernur dalam perumusan kebijakan pembangunan. Sejak dibentuk tahun 1980, struktur dan tugasnya telah beberapa kali mengalami penyesuaian sesuai peraturan perundang-undangan, terakhir melalui Pergub No. 88 Tahun 2016.','0721485458','bappeda@lampungprov.go.id','Senin - Jum\'at','7.30 am - 4.00 pm','Jl. Wolter Monginsidi No.223 Teluk Betung-Bandar Lampung');
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
    `hero_desc` varchar(300) NOT NULL,
    PRIMARY KEY (`id_hero`)
  ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
  /*!40101 SET character_set_client = @saved_cs_client */;

  --
  -- Dumping data for table `home_hero`
  --

  LOCK TABLES `home_hero` WRITE;
  /*!40000 ALTER TABLE `home_hero` DISABLE KEYS */;
  INSERT INTO `home_hero` VALUES (1,'Temukan berbagai koleksi buku menarik, akses informasi dengan mudah, dan nikmati layanan perpustakaan secara digital. Jelajahi fitur dan rasakan pengalaman membaca yang lebih praktis dan efisien. ');
  /*!40000 ALTER TABLE `home_hero` ENABLE KEYS */;
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
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
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
  ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
  /*!40101 SET character_set_client = @saved_cs_client */;

  --
  -- Dumping data for table `link_clicks`
  --

  LOCK TABLES `link_clicks` WRITE;
  /*!40000 ALTER TABLE `link_clicks` DISABLE KEYS */;
  INSERT INTO `link_clicks` VALUES (1,'https://www.youtube.com/@YukNgajiTV/streams',100);
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
    `id_buku` int NOT NULL,
    `nama_peminjaman` varchar(50) NOT NULL,
    `bidang_peminjaman` varchar(45) NOT NULL,
    `judul_buku` varchar(100) NOT NULL,
    `tanggal_awal` datetime NOT NULL,
    `tanggal_akhir` datetime NOT NULL,
    PRIMARY KEY (`id_peminjaman`),
    KEY `idx_buku` (`id_buku`,`judul_buku`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
  /*!40101 SET character_set_client = @saved_cs_client */;

  --
  -- Dumping data for table `peminjaman`
  --

  LOCK TABLES `peminjaman` WRITE;
  /*!40000 ALTER TABLE `peminjaman` DISABLE KEYS */;
  /*!40000 ALTER TABLE `peminjaman` ENABLE KEYS */;
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
    `password_user` varchar(50) NOT NULL,
    PRIMARY KEY (`id_user`)
  ) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
  /*!40101 SET character_set_client = @saved_cs_client */;

  --
  -- Dumping data for table `user`
  --

  LOCK TABLES `user` WRITE;
  /*!40000 ALTER TABLE `user` DISABLE KEYS */;
  INSERT INTO `user` VALUES (1,'admin','admin12345');
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

  -- Dump completed on 2025-06-30 11:13:57
