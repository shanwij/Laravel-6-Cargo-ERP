CREATE DATABASE  IF NOT EXISTS `cargodb` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `cargodb`;
-- MySQL dump 10.13  Distrib 8.0.16, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: cargodb
-- ------------------------------------------------------
-- Server version	8.0.16

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
 SET NAMES utf8 ;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `loadings`
--

DROP TABLE IF EXISTS `loadings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `loadings` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `shipper` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contactNo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loadingDate` date NOT NULL,
  `pickupDate` date NOT NULL,
  `loadingAdd` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `loadingNum` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dCompanyName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dAddress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dPerson` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dNumber` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoiceNo` bigint(20) DEFAULT NULL,
  `bookingNo` bigint(20) DEFAULT NULL,
  `conName` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conAddress` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conPhone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oceanVess` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `oceanDate` date DEFAULT NULL,
  `shipPort` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delPort` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `invoiceDate` date DEFAULT NULL,
  `containerNo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shipper_add` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `qty` bigint(20) DEFAULT NULL,
  `desc` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` decimal(10,0) DEFAULT NULL,
  `cbm` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `loadings`
--

LOCK TABLES `loadings` WRITE;
/*!40000 ALTER TABLE `loadings` DISABLE KEYS */;
INSERT INTO `loadings` VALUES (6,'Sapphire International','1234567890','2019-08-10','2019-08-13','sdsd','1234567890','Ceylon Shipping','sdsd','Ajith Perera','1234567890',NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,NULL,'2019-08-29 23:18:33','2019-08-29 23:18:33',NULL,NULL,NULL,NULL,NULL);
/*!40000 ALTER TABLE `loadings` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-09-27  8:59:47
