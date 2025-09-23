-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: 103.84.207.118    Database: project_cuti
-- ------------------------------------------------------
-- Server version	8.0.36-0ubuntu0.22.04.1

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
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `kontak` varchar(100) DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'Admin','081398447822','admin','25d55ad283aa400af464c76d713c07ad','admin_foto.png','admin.cuti@mailsac.com');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cuti`
--

DROP TABLE IF EXISTS `cuti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cuti` (
  `cuti_id` int NOT NULL AUTO_INCREMENT,
  `divisi_id` int DEFAULT NULL,
  `jenis_cuti_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `tanggal_cuti` varchar(100) DEFAULT NULL,
  `tanggal_mulai` varchar(100) DEFAULT NULL,
  `tanggal_selesai` varchar(100) DEFAULT NULL,
  `jumlah_cuti` int DEFAULT NULL,
  `alasan_cuti` text,
  `alamat_cuti` text,
  `supervisor_id` int DEFAULT NULL,
  `supervisor_status` varchar(100) DEFAULT NULL,
  `supervisor_keterangan` varchar(100) DEFAULT NULL,
  `manajer_id` int DEFAULT NULL,
  `manajer_status` varchar(100) DEFAULT NULL,
  `manajer_keterangan` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cuti_id`),
  KEY `fk_divisi2` (`divisi_id`),
  KEY `fk_jenis_cuti` (`jenis_cuti_id`),
  KEY `fk_user` (`user_id`),
  KEY `fk_supervisor` (`supervisor_id`),
  KEY `fk_manajer` (`manajer_id`),
  CONSTRAINT `fk_divisi2` FOREIGN KEY (`divisi_id`) REFERENCES `divisi` (`divisi_id`),
  CONSTRAINT `fk_jenis_cuti` FOREIGN KEY (`jenis_cuti_id`) REFERENCES `jenis_cuti` (`jenis_cuti_id`),
  CONSTRAINT `fk_manajer` FOREIGN KEY (`manajer_id`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_supervisor` FOREIGN KEY (`supervisor_id`) REFERENCES `user` (`id`),
  CONSTRAINT `fk_user` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cuti`
--

LOCK TABLES `cuti` WRITE;
/*!40000 ALTER TABLE `cuti` DISABLE KEYS */;
INSERT INTO `cuti` VALUES (1,1,1,1,'2025-09-13','2025-09-15','2025-09-16',1,'males','jakarta',7,'Tolak','nanti dulu',7,'Tolak','nanti dulu'),(2,1,1,1,'2025-09-16','2025-09-17','2025-09-18',1,'pulang kampung','solo',7,'Terima','ok',10,'Terima','okee boleh'),(3,1,1,2,'2025-09-16','2025-09-20','2025-09-22',2,'tidur','jogja',7,'Terima','izin ke manajer dulu',10,'Tolak','ga'),(4,3,1,5,'2025-09-18','2025-09-19','2025-09-20',1,'apa aja','papua',9,'Tolak','ga boleh',9,'Tolak','ga boleh'),(5,3,1,5,'2025-09-18','2025-09-29','2025-09-30',1,'mau nyari sampingan','bandung',9,'Terima','oke lanjut ke manajer',12,'Tolak','nanti dulu, bulan depan aja'),(6,3,1,5,'2025-09-18','2025-10-01','2025-10-03',2,'mau liburan pak, pusing','bali',9,'Terima','okk',12,'Terima','ok, jangan kelamaan'),(7,2,1,4,'2025-09-18','2025-09-20','2025-09-22',2,'mau cuti aja','bogor',8,'Tolak','kkk',8,'Tolak','kkk'),(12,1,1,1,'2025-09-22','2025-09-25','2025-09-27',2,'liburan','Tasikmalaya ',10,'Terima','ok',1,'Terima','oke'),(13,4,1,29,'2025-09-23','2025-09-26','2025-09-30',4,'istirahat pak','bali',18,'Terima','oke, tunggu approval manajer dulu',19,'Terima','siap, silahkan');
/*!40000 ALTER TABLE `cuti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `divisi`
--

DROP TABLE IF EXISTS `divisi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `divisi` (
  `divisi_id` int NOT NULL AUTO_INCREMENT,
  `divisi_name` varchar(100) NOT NULL,
  PRIMARY KEY (`divisi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `divisi`
--

LOCK TABLES `divisi` WRITE;
/*!40000 ALTER TABLE `divisi` DISABLE KEYS */;
INSERT INTO `divisi` VALUES (1,'Security'),(2,'Cleaning Service'),(3,'Receptionist'),(4,'IT ');
/*!40000 ALTER TABLE `divisi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jenis_cuti`
--

DROP TABLE IF EXISTS `jenis_cuti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jenis_cuti` (
  `jenis_cuti_id` int NOT NULL AUTO_INCREMENT,
  `jenis_cuti_name` varchar(100) NOT NULL,
  `jenis_cuti_jumlah` int NOT NULL,
  PRIMARY KEY (`jenis_cuti_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis_cuti`
--

LOCK TABLES `jenis_cuti` WRITE;
/*!40000 ALTER TABLE `jenis_cuti` DISABLE KEYS */;
INSERT INTO `jenis_cuti` VALUES (1,'Cuti Tahunan',12),(2,'Cuti Melahirkan',96);
/*!40000 ALTER TABLE `jenis_cuti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role` (
  `role_id` int NOT NULL AUTO_INCREMENT,
  `role_name` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'Karyawan'),(2,'Supervisor'),(3,'Manajer');
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `nip` varchar(100) DEFAULT NULL,
  `kontak` varchar(100) DEFAULT NULL,
  `kelamin` varchar(100) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `divisi_id` int DEFAULT NULL,
  `role_id` int DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `tanda_tangan` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fk_divisi` (`divisi_id`),
  KEY `fk_role` (`role_id`),
  CONSTRAINT `fk_divisi` FOREIGN KEY (`divisi_id`) REFERENCES `divisi` (`divisi_id`),
  CONSTRAINT `fk_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Karyawan Security 1','NIP001','081234567890','Laki-Laki','Jl. Merdeka No.1',1,1,'karyawans1','25d55ad283aa400af464c76d713c07ad','karyawan_foto.png','1380751068_signature3.png','karyawans1@mailsac.com','2025-02-16 14:30:31'),(2,'Karyawan Security 2','NIP002','081234567891','Laki-Laki','Jl. Mawar No.2',1,1,'karyawans2','25d55ad283aa400af464c76d713c07ad','karyawan_foto.png','1380751068_signature3.png','karyawans2@mailsac.com','2025-01-16 14:30:31'),(3,'Karyawan Cleaning Service 1','NIP003','081234567892','Perempuan','Jl. Melati No.3',2,1,'karyawanc1','25d55ad283aa400af464c76d713c07ad','karyawan_foto.png','1380751068_signature3.png','karyawanc1@mailsac.com','2025-07-16 14:30:31'),(4,'Karyawan Cleaning Service 2','NIP004','081234567893','Laki-Laki','Jl. Kenanga No.4',2,1,'karyawanc2','25d55ad283aa400af464c76d713c07ad','karyawan_foto.png','1380751068_signature3.png','karyawanc2@mailsac.com','2024-09-16 14:30:31'),(5,'Karyawan Receptionist 1','NIP005','081234567894','Perempuan','Jl. Anggrek No.5',3,1,'karyawanr1','25d55ad283aa400af464c76d713c07ad','karyawan_foto.png','1380751068_signature3.png','karyawanr1@mailsac.com','2025-08-16 14:30:31'),(6,'Karyawan Receptionist 2','NIP006','081234567895','Laki-Laki','Jl. Teratai No.6',3,1,'karyawanr2','25d55ad283aa400af464c76d713c07ad','karyawan_foto.png','1380751068_signature3.png','karyawanr2@mailsac.com','2025-04-16 14:30:31'),(7,'Supervisor Security','NIP007','081234567896','Perempuan','Jl. Dahlia No.7',1,2,'supervisors','25d55ad283aa400af464c76d713c07ad','supervisor_foto.png','1399678955_signature2.png','supervisors@mailsac.com','2025-03-16 14:30:31'),(8,'Supervisor Cleaning Service','NIP008','081234567897','Laki-Laki','Jl. Flamboyan No.8',2,2,'supervisorc','25d55ad283aa400af464c76d713c07ad','supervisor_foto.png','1399678955_signature2.png','supervisorc@mailsac.com','2025-06-16 14:30:31'),(9,'Supervisor Receptionist','NIP009','081234567898','Perempuan','Jl. Cempaka No.9',3,2,'supervisorr','25d55ad283aa400af464c76d713c07ad','supervisor_foto.png','1399678955_signature2.png','supervisorr@mailsac.com','2023-09-16 14:30:31'),(10,'Manajer Security','NIP010','081234567899','Laki-Laki','Jl. Soka No.10',1,3,'manajers','25d55ad283aa400af464c76d713c07ad','manajer_foto.png','131639120_signature1.png','manajers@mailsac.com','2025-05-16 14:30:31'),(11,'Manajer Cleaning Service','NIP011','081234567800','Perempuan','Jl. Nusa Indah No.11',2,3,'manajerc','25d55ad283aa400af464c76d713c07ad','manajer_foto.png','131639120_signature1.png','manajerc@mailsac.com','2024-02-16 14:30:31'),(12,'Manajer Receptionist','NIP012','081234567801','Laki-Laki','Jl. Seruni No.12',3,3,'manajerr','25d55ad283aa400af464c76d713c07ad','manajer_foto.png','131639120_signature1.png','manajerr@mailsac.com','2025-08-16 14:30:31'),(17,'yusnar','111','08','Laki-Laki','jkt',4,1,'yusnar','25d55ad283aa400af464c76d713c07ad','karyawan_foto.png','signature_default.png','yusnar@mailsac.com','2025-09-22 04:08:24'),(18,'azis','22222','0899','Laki-Laki','bgr',4,2,'azis','25d55ad283aa400af464c76d713c07ad','supervisor_foto.png','signature_default.png','azis@mailsac.com','2025-09-22 05:44:42'),(19,'obet','33333','0899','Laki-Laki','kmp',4,3,'obet','25d55ad283aa400af464c76d713c07ad','793944071_poster.jpeg','signature_default.png','obet@mailsac.com','2025-09-22 05:46:37'),(28,'Kaka','2536374','0349795','Laki-Laki','jakarta',1,1,'kaka','25d55ad283aa400af464c76d713c07ad','64841479_3e75009b-15be-4ba9-a316-7bd27945be7b.jpg','signature_default.png','kaka@mailsac.com','2025-09-22 08:08:11'),(29,'diva','1991','0991','Laki-Laki','btr',4,1,'diva','25d55ad283aa400af464c76d713c07ad','1800269745_Acer_Wallpaper_02_5000x2813.jpg','915833608_contoh_ttd.png','diva@mailsac.com','2025-09-23 01:07:38');
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

-- Dump completed on 2025-09-23  8:20:57
