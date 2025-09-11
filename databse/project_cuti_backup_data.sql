-- MySQL dump 10.13  Distrib 8.0.40, for Win64 (x86_64)
--
-- Host: localhost    Database: project_cuti
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `divisi`
--

LOCK TABLES `divisi` WRITE;
/*!40000 ALTER TABLE `divisi` DISABLE KEYS */;
/*!40000 ALTER TABLE `divisi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jabatan`
--

DROP TABLE IF EXISTS `jabatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jabatan` (
  `jabatan_id` int NOT NULL AUTO_INCREMENT,
  `jabatan_name` varchar(100) NOT NULL,
  PRIMARY KEY (`jabatan_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jabatan`
--

LOCK TABLES `jabatan` WRITE;
/*!40000 ALTER TABLE `jabatan` DISABLE KEYS */;
/*!40000 ALTER TABLE `jabatan` ENABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jenis_cuti`
--

LOCK TABLES `jenis_cuti` WRITE;
/*!40000 ALTER TABLE `jenis_cuti` DISABLE KEYS */;
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_admin`
--

DROP TABLE IF EXISTS `tbl_admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `kontak` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_admin`
--

LOCK TABLES `tbl_admin` WRITE;
/*!40000 ALTER TABLE `tbl_admin` DISABLE KEYS */;
INSERT INTO `tbl_admin` VALUES (1,'Admin Ku','081398447822','admin','21232f297a57a5a743894a0e4a801fc3','foto.png');
/*!40000 ALTER TABLE `tbl_admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_cuti`
--

DROP TABLE IF EXISTS `tbl_cuti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_cuti` (
  `cuti_id` int NOT NULL AUTO_INCREMENT,
  `cuti_divisi` int NOT NULL,
  `cuti_jenis` int NOT NULL,
  `cuti_pegawai` int NOT NULL,
  `cuti_tanggal` date NOT NULL,
  `cuti_dari` date NOT NULL,
  `cuti_sampai` date NOT NULL,
  `cuti_jumlah` int NOT NULL,
  `cuti_alasan` varchar(100) NOT NULL,
  `cuti_alamat` varchar(100) DEFAULT NULL,
  `cuti_supervisor` int DEFAULT NULL,
  `cuti_status_supervisor` varchar(100) DEFAULT NULL,
  `cuti_keterangan_supervisor` varchar(100) DEFAULT NULL,
  `cuti_manajer` int DEFAULT NULL,
  `cuti_status_manajer` varchar(100) DEFAULT NULL,
  `cuti_keterangan_manajer` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`cuti_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_cuti`
--

LOCK TABLES `tbl_cuti` WRITE;
/*!40000 ALTER TABLE `tbl_cuti` DISABLE KEYS */;
INSERT INTO `tbl_cuti` VALUES (1,5,2,1,'2022-06-02','2022-06-05','2022-06-07',2,'acara dirumah','jalan kenari nomor 5 annur ',1,'Terima','oke',1,'Terima','oke'),(2,5,2,1,'2025-09-07','2025-09-08','2025-09-10',2,'males gawe','planet mars',1,'Tolak','kerja goblok',1,'Terima','okee deh'),(3,5,2,1,'2025-09-10','2025-09-11','2025-09-12',1,'gtw','jkt',NULL,NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `tbl_cuti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_divisi`
--

DROP TABLE IF EXISTS `tbl_divisi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_divisi` (
  `divisi_id` int NOT NULL AUTO_INCREMENT,
  `divisi_nama` varchar(100) NOT NULL,
  PRIMARY KEY (`divisi_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_divisi`
--

LOCK TABLES `tbl_divisi` WRITE;
/*!40000 ALTER TABLE `tbl_divisi` DISABLE KEYS */;
INSERT INTO `tbl_divisi` VALUES (1,'Security'),(2,'Cleaning Service'),(3,'Receptionist');
/*!40000 ALTER TABLE `tbl_divisi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_jenis_cuti`
--

DROP TABLE IF EXISTS `tbl_jenis_cuti`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_jenis_cuti` (
  `jenis_id` int NOT NULL AUTO_INCREMENT,
  `jenis_nama` varchar(100) NOT NULL,
  `jenis_jumlah` int NOT NULL,
  PRIMARY KEY (`jenis_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_jenis_cuti`
--

LOCK TABLES `tbl_jenis_cuti` WRITE;
/*!40000 ALTER TABLE `tbl_jenis_cuti` DISABLE KEYS */;
INSERT INTO `tbl_jenis_cuti` VALUES (1,'Cuti Tahunan',12),(2,'Cuti Melahirkan ',96);
/*!40000 ALTER TABLE `tbl_jenis_cuti` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_karyawan`
--

DROP TABLE IF EXISTS `tbl_karyawan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_karyawan` (
  `karyawan_id` int NOT NULL AUTO_INCREMENT,
  `karyawan_divisi` int NOT NULL,
  `karyawan_nip` int NOT NULL,
  `karyawan_nama` varchar(50) NOT NULL,
  `karyawan_jabatan` varchar(100) NOT NULL,
  `karyawan_alamat` varchar(100) NOT NULL,
  `karyawan_kelamin` varchar(20) NOT NULL,
  `karyawan_kontak` varchar(15) NOT NULL,
  `karyawan_username` varchar(50) NOT NULL,
  `karyawan_password` varchar(100) NOT NULL,
  `karyawan_foto` varchar(100) NOT NULL,
  `karyawan_tanda_tangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`karyawan_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_karyawan`
--

LOCK TABLES `tbl_karyawan` WRITE;
/*!40000 ALTER TABLE `tbl_karyawan` DISABLE KEYS */;
INSERT INTO `tbl_karyawan` VALUES (1,1,1,'Karyawan Security 1','karyawan','Jakarta','Perempuan','081234567891','karyawan1','9e014682c94e0f2cc834bf7348bda428','karyawan_foto.png','1380751068_signature3.png'),(2,2,2,'Karyawan Cleaning Service 1','karyawan','Tangerang','Laki-Laki','081234567892','karyawan2','9e014682c94e0f2cc834bf7348bda428','karyawan_foto.png','1380751068_signature3.png'),(3,3,3,'Karyawan Receptionist 1','karyawan','Bogor','Laki-Laki','081234567893','karyawan3','9e014682c94e0f2cc834bf7348bda428','karyawan_foto.png','1380751068_signature3.png'),(4,1,4,'Karyawan Security 2','karyawan','Depok','Perempuan','081234567894','karyawan4','9e014682c94e0f2cc834bf7348bda428','karyawan_foto.png','1380751068_signature3.png'),(5,2,5,'Karyawan Cleaning Service 2','karyawan','Bekasi','Perempuan','081234567895','karyawan5','9e014682c94e0f2cc834bf7348bda428','karyawan_foto.png','1380751068_signature3.png'),(6,3,6,'Karyawan Receptionist 2','karyawan','Bandung','Laki-Laki','081234567896','karyawan6','9e014682c94e0f2cc834bf7348bda428','karyawan_foto.png','1380751068_signature3.png');
/*!40000 ALTER TABLE `tbl_karyawan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_manajer`
--

DROP TABLE IF EXISTS `tbl_manajer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_manajer` (
  `manajer_id` int NOT NULL AUTO_INCREMENT,
  `manajer_divisi` int NOT NULL,
  `manajer_nip` int NOT NULL,
  `manajer_nama` varchar(50) NOT NULL,
  `manajer_kelamin` varchar(20) NOT NULL,
  `manajer_alamat` varchar(100) NOT NULL,
  `manajer_kontak` varchar(15) NOT NULL,
  `manajer_username` varchar(50) NOT NULL,
  `manajer_password` varchar(100) NOT NULL,
  `manajer_foto` varchar(100) NOT NULL,
  `manajer_tanda_tangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`manajer_id`),
  UNIQUE KEY `manajer_nip` (`manajer_nip`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_manajer`
--

LOCK TABLES `tbl_manajer` WRITE;
/*!40000 ALTER TABLE `tbl_manajer` DISABLE KEYS */;
INSERT INTO `tbl_manajer` VALUES (1,1,1,'Manajer Security','Perempuan','Tangerang','082272216124','manajer1','69b731ea8f289cf16a192ce78a37b4f0','manajer_foto.png','131639120_signature1.png'),(2,2,2,'Manajer Cleaning Service','Perempuan','Bekasi','082272216125','manajer2','69b731ea8f289cf16a192ce78a37b4f0','manajer_foto.png','131639120_signature1.png'),(3,3,3,'Manajer Receptionist','Perempuan','Bandung','082272216126','manajer3','69b731ea8f289cf16a192ce78a37b4f0','manajer_foto.png','131639120_signature1.png');
/*!40000 ALTER TABLE `tbl_manajer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_supervisor`
--

DROP TABLE IF EXISTS `tbl_supervisor`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tbl_supervisor` (
  `supervisor_id` int NOT NULL AUTO_INCREMENT,
  `supervisor_divisi` int NOT NULL,
  `supervisor_nip` int NOT NULL,
  `supervisor_nama` varchar(50) NOT NULL,
  `supervisor_kelamin` varchar(20) NOT NULL,
  `supervisor_kontak` varchar(15) NOT NULL,
  `supervisor_alamat` varchar(100) NOT NULL,
  `supervisor_username` varchar(50) NOT NULL,
  `supervisor_password` varchar(100) NOT NULL,
  `supervisor_foto` varchar(100) NOT NULL,
  `supervisor_tanda_tangan` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`supervisor_id`),
  UNIQUE KEY `supervisor_nip` (`supervisor_nip`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_supervisor`
--

LOCK TABLES `tbl_supervisor` WRITE;
/*!40000 ALTER TABLE `tbl_supervisor` DISABLE KEYS */;
INSERT INTO `tbl_supervisor` VALUES (1,1,1,'Supervisor Security','Laki-Laki','08128192191','Jakarta','supervisor1','09348c20a019be0318387c08df7a783d','supervisor_foto.png','1399678955_signature2.png'),(2,2,2,'Supervisor Cleaning Service','Laki-Laki','08128192192','Bogor','supervisor2','09348c20a019be0318387c08df7a783d','supervisor_foto.png','1399678955_signature2.png'),(3,3,3,'Supervisor Receptionist','Laki-Laki','08128192193','Depok','supervisor3','09348c20a019be0318387c08df7a783d','supervisor_foto.png','1399678955_signature2.png');
/*!40000 ALTER TABLE `tbl_supervisor` ENABLE KEYS */;
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
  `jabatan_id` int DEFAULT NULL,
  `divisi_id` int DEFAULT NULL,
  `role_id` int DEFAULT NULL,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `tanda_tangan` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_jabatan` (`jabatan_id`),
  KEY `fk_divisi` (`divisi_id`),
  KEY `fk_role` (`role_id`),
  CONSTRAINT `fk_divisi` FOREIGN KEY (`divisi_id`) REFERENCES `divisi` (`divisi_id`),
  CONSTRAINT `fk_jabatan` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`jabatan_id`),
  CONSTRAINT `fk_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Dumping events for database 'project_cuti'
--

--
-- Dumping routines for database 'project_cuti'
--
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2025-09-10 21:29:53