CREATE DATABASE  IF NOT EXISTS `ayakkabi_dukkani` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_turkish_ci */;
USE `ayakkabi_dukkani`;
-- MySQL dump 10.13  Distrib 5.6.17, for Win64 (x86_64)
--
-- Host: localhost    Database: ayakkabi_dukkani
-- ------------------------------------------------------
-- Server version	5.6.22-log

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
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
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `soyad` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `sifre` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'Kemal','Duran','admin@admin.com','aaaa');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `alt_kategori`
--

DROP TABLE IF EXISTS `alt_kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `alt_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isim` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `ust_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `alt_kategori`
--

LOCK TABLES `alt_kategori` WRITE;
/*!40000 ALTER TABLE `alt_kategori` DISABLE KEYS */;
INSERT INTO `alt_kategori` VALUES (1,'Babet',1),(2,'Günlük Ayakkabı',1),(3,'Topuklu Ayakkabı',1),(4,'Bot',1),(5,'Spor Ayakkabı',1),(6,'Klasik Ayakkabı',2),(7,'Bot',2),(9,'Spor Ayakkabı',2),(10,'Babet',3),(11,'Spor Ayakkabı',3),(12,'Terlik',3),(13,'Patik',3);
/*!40000 ALTER TABLE `alt_kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kampanya`
--

DROP TABLE IF EXISTS `kampanya`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kampanya` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `resim` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `aciklama` mediumtext COLLATE utf8_turkish_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kampanya`
--

LOCK TABLES `kampanya` WRITE;
/*!40000 ALTER TABLE `kampanya` DISABLE KEYS */;
INSERT INTO `kampanya` VALUES (1,'01.jpg','%25 indirim fırsatı'),(2,'02.jpg','en ucuz fiyat burada'),(3,'03.jpg','%50 indirim'),(4,'uefa.png','UEFA Resmi Sponsoru');
/*!40000 ALTER TABLE `kampanya` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kategori`
--

DROP TABLE IF EXISTS `kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isim` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kategori`
--

LOCK TABLES `kategori` WRITE;
/*!40000 ALTER TABLE `kategori` DISABLE KEYS */;
INSERT INTO `kategori` VALUES (1,'Kadın'),(2,'Erkek'),(3,'Çocuk');
/*!40000 ALTER TABLE `kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `marka`
--

DROP TABLE IF EXISTS `marka`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `marka` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `marka_adi` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `marka`
--

LOCK TABLES `marka` WRITE;
/*!40000 ALTER TABLE `marka` DISABLE KEYS */;
INSERT INTO `marka` VALUES (5,'New Balance'),(6,'Adidas'),(7,'Bambi'),(8,'Adidas'),(9,'NIKE');
/*!40000 ALTER TABLE `marka` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sepet`
--

DROP TABLE IF EXISTS `sepet`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sepet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `musteri_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sepet`
--

LOCK TABLES `sepet` WRITE;
/*!40000 ALTER TABLE `sepet` DISABLE KEYS */;
INSERT INTO `sepet` VALUES (2,2),(5,1),(7,5),(8,3);
/*!40000 ALTER TABLE `sepet` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sepet_urunu`
--

DROP TABLE IF EXISTS `sepet_urunu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `sepet_urunu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `urun_id` int(11) DEFAULT NULL,
  `adet` int(11) DEFAULT NULL,
  `sepet_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sepet_urunu`
--

LOCK TABLES `sepet_urunu` WRITE;
/*!40000 ALTER TABLE `sepet_urunu` DISABLE KEYS */;
/*!40000 ALTER TABLE `sepet_urunu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siparis`
--

DROP TABLE IF EXISTS `siparis`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `siparis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `musteri_id` int(11) DEFAULT NULL,
  `siparis_tarihi` date DEFAULT NULL,
  `onaylandi` bit(1) DEFAULT b'0',
  `toplam_fiyat` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siparis`
--

LOCK TABLES `siparis` WRITE;
/*!40000 ALTER TABLE `siparis` DISABLE KEYS */;
INSERT INTO `siparis` VALUES (6,1,'2015-01-19','\0',134),(7,1,'2015-01-19','',80),(8,3,'2015-01-19','',178);
/*!40000 ALTER TABLE `siparis` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `siparis_urunu`
--

DROP TABLE IF EXISTS `siparis_urunu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `siparis_urunu` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `urun_id` int(11) DEFAULT NULL,
  `siparis_id` int(11) DEFAULT NULL,
  `adet` int(11) DEFAULT NULL,
  `birim_fiyat` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `siparis_urunu`
--

LOCK TABLES `siparis_urunu` WRITE;
/*!40000 ALTER TABLE `siparis_urunu` DISABLE KEYS */;
INSERT INTO `siparis_urunu` VALUES (5,1,6,2,67),(6,2,7,1,80),(7,4,8,1,59),(8,5,8,1,119);
/*!40000 ALTER TABLE `siparis_urunu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `urun`
--

DROP TABLE IF EXISTS `urun`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `urun` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isim` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `aciklama` mediumtext COLLATE utf8_turkish_ci,
  `resim` varchar(100) COLLATE utf8_turkish_ci DEFAULT NULL,
  `stokSayisi` int(11) DEFAULT NULL,
  `fiyat` decimal(10,0) DEFAULT NULL,
  `satisSayisi` int(11) DEFAULT NULL,
  `altKat_id` int(11) DEFAULT NULL,
  `marka_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `urun`
--

LOCK TABLES `urun` WRITE;
/*!40000 ALTER TABLE `urun` DISABLE KEYS */;
INSERT INTO `urun` VALUES (1,'Lescon L-2339 Spor Ayakkabı','<p>aciklamahh</p>\r\n','01.jpg',4,67,0,11,8),(2,'İnce Topuk Kadın Topuklu Ayakkabı Dore','<h3>Topuklu beyaz ayakkabı</h3>\r\n','Divaresse_4047619.jpg',4,80,0,3,7),(3,'Bambi Kadın Bot Siyah','<p>asdsadasd</p>\r\n','Divaresse_4015382.jpg',3,279,1,4,7),(4,'Bambi Kadın Babet Siyah','<p>adsadsad</p>\r\n','Divaresse_4018956.jpg',3,59,3,1,7),(5,'Adidas Duramo 6 Kadın Spor Ayakkabı D66480','<p>spor <strong> ayakkabı </strong></p>\r\n','Spor_3969600.jpg',5,119,4,5,8),(6,'New Balance Spor Ayakkabı U410sbg','<p>&Uuml;r&uuml;n kalıpları dardır</p>\r\n','Spor_4127313.jpg',4,161,1,9,5),(7,'New Balance Kadın Spor Ayakkabı Ul410skp','<p><em>yazlık ayakkabı </em></p>\r\n','Spor_4040508.jpg',0,134,5,5,5),(8,' Bambi Erkek Ayakkabı Siyah','<p>Materyal: Deri</p>\r\n','Divaresse_4017608.jpg',3,109,0,6,7);
/*!40000 ALTER TABLE `urun` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `uye`
--

DROP TABLE IF EXISTS `uye`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `uye` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ad` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `soyad` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `email` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `sifre` varchar(45) COLLATE utf8_turkish_ci DEFAULT NULL,
  `kayitTarihi` date DEFAULT NULL,
  `adres` varchar(200) COLLATE utf8_turkish_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `uye`
--

LOCK TABLES `uye` WRITE;
/*!40000 ALTER TABLE `uye` DISABLE KEYS */;
INSERT INTO `uye` VALUES (1,'Arafa','Arslan','arafa@gmail.com','aaaa','2014-04-21','pınarbaşı mah keçiören no 4/4'),(2,'Onur','Kılıç','onur@gmail.com','aaaa','2014-07-09','bağveren cadd. no 23/4 Mamak Ankara'),(3,'Kemal','Duran','kemalduran06@gmail.com','aaaa','2015-01-19','kazım karabekir mah 2049/1'),(5,'Cem','Dinç','cem@gmail.com','aaaa','2015-01-19','çankaya');
/*!40000 ALTER TABLE `uye` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2015-01-19 20:06:29
