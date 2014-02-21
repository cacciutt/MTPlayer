CREATE DATABASE  IF NOT EXISTS `test` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `test`;
-- MySQL dump 10.13  Distrib 5.6.11, for Win32 (x86)
--
-- Host: localhost    Database: test
-- ------------------------------------------------------
-- Server version	5.5.35-0ubuntu0.12.04.2

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
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `employee` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `title` varchar(511) NOT NULL,
  `email` varchar(511) NOT NULL,
  `city` varchar(511) NOT NULL,
  `officePhone` varchar(31) NOT NULL,
  `cellPhone` varchar(31) NOT NULL,
  `picture` varchar(1023) NOT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `employee`
--

LOCK TABLES `employee` WRITE;
/*!40000 ALTER TABLE `employee` DISABLE KEYS */;
INSERT INTO `employee` VALUES (1,'Stevan','Bajic','Portfolio Manager','stevan.bajic@altanawealth.com','London, UK','+442070791098','+447415533344','stevan_bajic.jpg',NULL,NULL),(2,'Gopal','Bharj','Operations','gopal.bharj@altanawealth.com','London, UK','+442070791086','+447894401090','unknown-male.jpg',NULL,NULL),(3,'Olivier','Bufalini','Web Architect','obufalini@altanawealth.com','Monaco, MC','+37797705637','+33615915221','olivier_bufalini.jpg',NULL,NULL),(4,'Caroline','Castel','Office Manager','caroline.castel@altanawealth.com','Monaco, MC','+37797975969','+33621420722','unknown-female.jpg',NULL,NULL),(5,'Stella','Dang','Chief Operating Officer','stella.dang@altanawealth.com','London, UK','+442070791091','+447794296782','stella_dang.jpg',NULL,NULL),(6,'Mark','Engelbrecht','Chief Financial Officer','mark.engelbrecht@altanawealth.com','London, UK','+442070791095','+447910028380','mark_engelbrecht.jpg',NULL,NULL),(7,'Ian','Gunner','Director and Portfolio Manager','ian.gunner@altanawealth.com','London, UK','+442070791087','+447584260306','ian_gunner.png',NULL,NULL),(8,'Alex','Krainer','Portfolio Manager','alex.krainer@altanawealth.com','Monaco, MC','+37797975973','+33678639057','alex_krainer.jpg',NULL,NULL),(9,'Anthony','Lingard','Chief Executive Officer','anthony.lingard@altanawealth.com','London, UK','+442070791088','+447775785255','anthony_lingard.jpg',NULL,NULL),(10,'Neil','Panchen','Chief Technology Officer','neil.panchen@altanawealth.com','London, UK','+442070791085','+447768003772','neil_panchen.jpg',NULL,NULL),(11,'Pierre','Ramstad','Accounting','pierre.ramstad@altanawealth.com','Monaco, MC','+37797975974','+33643912852','unknown-male.jpg',NULL,NULL),(12,'Joanne','Richings','Office Manager','joanne.richings@altanawealth.com','London, UK','+442070791090','+447787170647','unknown-female.jpg',NULL,NULL),(13,'Lee','Robinson','Founder, Director and Portfolio Manager','lee.robinson@altanawealth.com','Monaco, MC','+37797975971','+33625915890','lee_robinson.jpg',NULL,NULL),(14,'Nerissa','Ventanilla','Investor Relations','nerissa.ventanilla@altanawealth.com','Monaco, MC','+37797705636','+33668945699','nerissa_ventanilla.jpg',NULL,NULL),(15,'Yusuf','Zaidan','Operations','yusuf.zaidan@altanawealth.com','London, UK','+442070791092','+447737671037','unknown-male.jpg',NULL,NULL);
/*!40000 ALTER TABLE `employee` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES ('2014_01_30_144635_employees',1),('2014_01_31_100136_users',1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `employee_id` int(11) NOT NULL DEFAULT '0',
  `username` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,1,'admin','$2y$10$hip8wfmDmZs0hD0ceZMgLujUF0bn0y1F5CspYRtf251GcVWWB470G','2014-01-31 15:10:51','2014-01-31 15:10:51');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2014-02-07 17:34:52
