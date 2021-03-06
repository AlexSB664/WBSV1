-- MySQL dump 10.13  Distrib 5.7.27, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: WBS
-- ------------------------------------------------------
-- Server version	5.7.27-0ubuntu0.18.04.1

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
-- Table structure for table `competitions`
--

DROP TABLE IF EXISTS `competitions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `competitions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `season_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  `location_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL,
  `scheme_id` int(11) DEFAULT NULL,
  `name` varchar(50) NOT NULL DEFAULT 'NA',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `competitions`
--

LOCK TABLES `competitions` WRITE;
/*!40000 ALTER TABLE `competitions` DISABLE KEYS */;
INSERT INTO `competitions` VALUES (1,'2019-08-01 18:23:00',1,1,1,'2019-09-05 18:24:24','2019-09-05 20:52:56',1,'1ra Jornada Agosto'),(2,'2019-08-08 18:23:00',1,1,1,'2019-09-05 18:25:02','2019-09-05 18:25:02',NULL,'NA'),(3,'2019-08-15 18:25:00',1,1,1,'2019-09-05 18:25:14','2019-09-05 19:51:15',1,'NA'),(4,'2019-08-22 18:25:00',1,1,1,'2019-09-05 18:25:29','2019-09-05 18:25:29',NULL,'NA'),(5,'2019-08-29 18:25:00',1,1,1,'2019-09-05 18:25:41','2019-09-05 18:25:41',NULL,'NA'),(6,'2019-09-05 18:29:00',2,1,1,'2019-09-05 18:29:12','2019-09-05 18:29:12',NULL,'NA'),(7,'2019-09-05 19:48:00',1,1,1,'2019-09-05 19:48:14','2019-09-05 19:48:14',1,'NA'),(8,'2019-09-12 19:48:00',2,1,1,'2019-09-05 19:48:43','2019-09-05 19:48:43',1,'NA'),(9,'2019-09-19 20:33:00',2,1,1,'2019-09-05 20:34:21','2019-09-05 20:34:21',1,'NA'),(10,'2019-10-03 20:52:00',2,1,1,'2019-09-05 20:52:33','2019-09-05 20:52:33',1,'1ra Jornada Octubre');
/*!40000 ALTER TABLE `competitions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `competitions_users`
--

DROP TABLE IF EXISTS `competitions_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `competitions_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `competitions_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `assistance` tinyint(1) DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `competitions_users`
--

LOCK TABLES `competitions_users` WRITE;
/*!40000 ALTER TABLE `competitions_users` DISABLE KEYS */;
/*!40000 ALTER TABLE `competitions_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `crews`
--

DROP TABLE IF EXISTS `crews`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `crews` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT 'Sin nombre',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `crews`
--

LOCK TABLES `crews` WRITE;
/*!40000 ALTER TABLE `crews` DISABLE KEYS */;
/*!40000 ALTER TABLE `crews` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `leagues`
--

DROP TABLE IF EXISTS `leagues`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `leagues` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(200) NOT NULL,
  `social_facebook` varchar(225) NOT NULL,
  `social_twitter` varchar(225) NOT NULL,
  `social_instagram` varchar(225) NOT NULL,
  `social_youtube` varchar(225) NOT NULL,
  `social_website` varchar(225) NOT NULL,
  `contact_phone` varchar(20) NOT NULL,
  `contact_email` varchar(50) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `leagues`
--

LOCK TABLES `leagues` WRITE;
/*!40000 ALTER TABLE `leagues` DISABLE KEYS */;
INSERT INTO `leagues` VALUES (1,'Jueves Practica Tu FreeStyle','SeasonsReports','SeasonsReports','SeasonsReports','SeasonsReports','SeasonsReports','SeasonsReports','6646127701','SeasonsReports@gmail.com','2019-08-28 22:55:01',NULL);
/*!40000 ALTER TABLE `leagues` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `locations`
--

DROP TABLE IF EXISTS `locations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `locations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(60) NOT NULL,
  `address` varchar(80) NOT NULL,
  `lat` float(10,6) NOT NULL,
  `lng` float(10,6) NOT NULL,
  `type` varchar(30) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `locations`
--

LOCK TABLES `locations` WRITE;
/*!40000 ALTER TABLE `locations` DISABLE KEYS */;
INSERT INTO `locations` VALUES (1,'NastyBar','6ta y madero',104.500000,154.800003,'Bar','2019-08-08 07:00:00','2008-01-01 08:00:01');
/*!40000 ALTER TABLE `locations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matches`
--

DROP TABLE IF EXISTS `matches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `competition_id` int(11) NOT NULL,
  `stage` varchar(50) DEFAULT '0',
  `points` int(11) DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matches`
--

LOCK TABLES `matches` WRITE;
/*!40000 ALTER TABLE `matches` DISABLE KEYS */;
INSERT INTO `matches` VALUES (1,1,'8vos de final',6,'2019-09-05 21:14:22','2019-09-05 21:14:22'),(2,1,'4tos de final',8,'2019-09-05 21:19:10','2019-09-05 21:19:10'),(3,1,'semi final',10,'2019-09-05 21:22:34','2019-09-05 21:22:34'),(4,1,'2do',12,'2019-09-05 21:23:21','2019-09-05 21:23:21'),(5,1,'1ro',15,'2019-09-05 21:24:01','2019-09-05 21:24:01');
/*!40000 ALTER TABLE `matches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `matches_users`
--

DROP TABLE IF EXISTS `matches_users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `matches_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `match_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `matches_users`
--

LOCK TABLES `matches_users` WRITE;
/*!40000 ALTER TABLE `matches_users` DISABLE KEYS */;
INSERT INTO `matches_users` VALUES (1,1,3,'2019-09-05 21:14:23','2019-09-05 21:14:23'),(2,1,4,'2019-09-05 21:14:23','2019-09-05 21:14:23'),(3,1,6,'2019-09-05 21:14:23','2019-09-05 21:14:23'),(4,1,7,'2019-09-05 21:14:23','2019-09-05 21:14:23'),(5,1,8,'2019-09-05 21:14:23','2019-09-05 21:14:23'),(6,1,11,'2019-09-05 21:14:23','2019-09-05 21:14:23'),(7,1,12,'2019-09-05 21:14:23','2019-09-05 21:14:23'),(8,1,15,'2019-09-05 21:14:23','2019-09-05 21:14:23'),(9,1,17,'2019-09-05 21:14:23','2019-09-05 21:14:23'),(10,2,5,'2019-09-05 21:19:11','2019-09-05 21:19:11'),(11,2,9,'2019-09-05 21:19:11','2019-09-05 21:19:11'),(12,2,13,'2019-09-05 21:19:11','2019-09-05 21:19:11'),(13,2,16,'2019-09-05 21:19:11','2019-09-05 21:19:11'),(14,3,7,'2019-09-05 21:22:34','2019-09-05 21:22:34'),(15,3,14,'2019-09-05 21:22:34','2019-09-05 21:22:34'),(16,4,10,'2019-09-05 21:23:21','2019-09-05 21:23:21'),(17,5,2,'2019-09-05 21:24:01','2019-09-05 21:24:01');
/*!40000 ALTER TABLE `matches_users` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `phinxlog`
--

DROP TABLE IF EXISTS `phinxlog`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `phinxlog` (
  `version` bigint(20) NOT NULL,
  `migration_name` varchar(100) DEFAULT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `breakpoint` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `phinxlog`
--

LOCK TABLES `phinxlog` WRITE;
/*!40000 ALTER TABLE `phinxlog` DISABLE KEYS */;
INSERT INTO `phinxlog` VALUES (20190812223059,'Users','2019-09-05 23:21:14','2019-09-05 23:21:15',0),(20190812225816,'Seasons','2019-09-05 23:21:15','2019-09-05 23:21:15',0),(20190812225833,'Points','2019-09-05 23:21:15','2019-09-05 23:21:16',0),(20190812225838,'Competitions','2019-09-05 23:21:16','2019-09-05 23:21:16',0),(20190813221026,'Leagues','2019-09-05 23:21:16','2019-09-05 23:21:16',0),(20190821200646,'Locations','2019-09-05 23:21:16','2019-09-05 23:21:17',0),(20190822222032,'Schemes','2019-09-05 23:21:17','2019-09-05 23:21:17',0),(20190822222150,'SchemesDetails','2019-09-05 23:21:17','2019-09-05 23:21:17',0),(20190822222249,'MatchesUser','2019-09-05 23:21:17','2019-09-05 23:21:17',0),(20190822224108,'Matches','2019-09-05 23:21:18','2019-09-05 23:21:18',0),(20190822225846,'Crews','2019-09-05 23:21:18','2019-09-05 23:21:18',0),(20190829220803,'CompetitionsUsers','2019-09-05 23:21:18','2019-09-05 23:21:18',0);
/*!40000 ALTER TABLE `phinxlog` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `points`
--

DROP TABLE IF EXISTS `points`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `points` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `points` int(11) NOT NULL DEFAULT '0',
  `matches_user_id` int(11) DEFAULT NULL,
  `stage` varchar(30) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `points`
--

LOCK TABLES `points` WRITE;
/*!40000 ALTER TABLE `points` DISABLE KEYS */;
/*!40000 ALTER TABLE `points` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schemes`
--

DROP TABLE IF EXISTS `schemes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schemes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `league_id` int(11) NOT NULL,
  `is_default` tinyint(1) DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schemes`
--

LOCK TABLES `schemes` WRITE;
/*!40000 ALTER TABLE `schemes` DISABLE KEYS */;
INSERT INTO `schemes` VALUES (1,'Regular',1,1,'2019-09-05 17:28:43','2019-09-05 17:28:43');
/*!40000 ALTER TABLE `schemes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `schemes_details`
--

DROP TABLE IF EXISTS `schemes_details`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `schemes_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `scheme_id` int(50) NOT NULL,
  `position` varchar(50) NOT NULL,
  `points` int(11) DEFAULT '0',
  `aditional_points` int(11) DEFAULT '0',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `schemes_details`
--

LOCK TABLES `schemes_details` WRITE;
/*!40000 ALTER TABLE `schemes_details` DISABLE KEYS */;
INSERT INTO `schemes_details` VALUES (1,1,'1er Lugar',15,0,'2019-09-05 17:29:07','2019-09-05 17:29:07'),(2,1,'2do Lugar',13,0,'2019-09-05 17:31:28','2019-09-05 17:31:28'),(3,1,'semifinal',10,0,'2019-09-05 17:32:50','2019-09-05 17:32:50'),(4,1,'4tos de final',8,0,'2019-09-05 17:33:10','2019-09-05 17:33:10'),(5,1,'8tos de final',6,0,'2019-09-05 17:33:25','2019-09-05 17:33:25');
/*!40000 ALTER TABLE `schemes_details` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `seasons`
--

DROP TABLE IF EXISTS `seasons`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `seasons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL DEFAULT 'null',
  `description` varchar(200) NOT NULL DEFAULT 'null',
  `league_id` int(11) NOT NULL,
  `status` tinyint(1) DEFAULT '1',
  `date_start` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date_end` timestamp NULL DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `seasons`
--

LOCK TABLES `seasons` WRITE;
/*!40000 ALTER TABLE `seasons` DISABLE KEYS */;
INSERT INTO `seasons` VALUES (1,'Agosto','ijosuchingadamadre',1,1,'2019-08-28 22:59:14',NULL,'2019-08-28 22:59:14',NULL),(2,'Septiembre','jornadas de septiembre',1,1,'2019-09-05 18:28:00','2019-09-05 18:28:00','2019-09-05 18:28:42','2019-09-05 18:28:42');
/*!40000 ALTER TABLE `seasons` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `aka` varchar(50) DEFAULT NULL,
  `crew_id` int(11) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role` varchar(15) NOT NULL DEFAULT 'participant',
  `status` tinyint(1) DEFAULT '0',
  `telephone` varchar(20) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'swan','swan','swan',NULL,'swan@gmail.com','$2y$10$tEAj5QLp4nDu3FbRB0CDS.RmNAAlZGiR7Z4r1P6OdL603O3MAXUkS','participant',1,'6194785926','af0e1631-9b7d-4468-9ca2-7a1d9819a891-jackye.png','2019-08-28 22:33:11','2019-08-28 22:33:11'),(2,'participante1','participante1','participante1',NULL,'participante1@gmail.com','$2y$10$GA4TsTFkSemBGRWVReN2veLUgMs7S5qOtqIpqn5V07PrS/Qnugh.e','participant',1,'6194785926','72f17ed9-1d74-40bc-a100-89350a444e7d-jackye.png','2019-08-28 23:18:15','2019-08-28 23:18:15'),(3,'participante2','participante2','participante2',NULL,'participante2@gmail.com','$2y$10$MlygdjzbMyyiT/h2pPrSDuu8nSGpJosC7/2fWSVanEoSdFRoBKDR6','participant',1,'6194785926','c12a8510-c0f4-47b7-9df8-8de13fc8a3ac-jackye.png','2019-08-28 23:19:37','2019-08-28 23:19:37'),(4,'participante3','participante3','participante3',NULL,'participante3@gmail.com','$2y$10$MlygdjzbMyyiT/h2pPrSDuu8nSGpJosC7/2fWSVanEoSdFRoBKDR6','participant',1,'6194785926','c12a8510-c0f4-47b7-9df8-8de13fc8a3ac-jackye.png','2019-08-28 23:19:37','2019-08-28 23:19:37'),(5,'participante4','participante4','participante4',NULL,'participante4@gmail.com','$2y$10$MlygdjzbMyyiT/h2pPrSDuu8nSGpJosC7/2fWSVanEoSdFRoBKDR6','participant',1,'6194785926','c12a8510-c0f4-47b7-9df8-8de13fc8a3ac-jackye.png','2019-08-28 23:19:37','2019-08-28 23:19:37'),(6,'participante5','participante5','participante5',NULL,'participante5@gmail.com','$2y$10$MlygdjzbMyyiT/h2pPrSDuu8nSGpJosC7/2fWSVanEoSdFRoBKDR6','participant',1,'6194785926','c12a8510-c0f4-47b7-9df8-8de13fc8a3ac-jackye.png','2019-08-28 23:19:37','2019-08-28 23:19:37'),(7,'participante6','participante6','participante6',NULL,'participante6@gmail.com','$2y$10$MlygdjzbMyyiT/h2pPrSDuu8nSGpJosC7/2fWSVanEoSdFRoBKDR6','participant',1,'6194785926','c12a8510-c0f4-47b7-9df8-8de13fc8a3ac-jackye.png','2019-08-28 23:19:37','2019-08-28 23:19:37'),(8,'participante7','participante7','participante7',NULL,'participante7@gmail.com','$2y$10$MlygdjzbMyyiT/h2pPrSDuu8nSGpJosC7/2fWSVanEoSdFRoBKDR6','participant',1,'6194785926','c12a8510-c0f4-47b7-9df8-8de13fc8a3ac-jackye.png','2019-08-28 23:19:37','2019-08-28 23:19:37'),(9,'participante8','participante8','participante8',NULL,'participante8@gmail.com','$2y$10$MlygdjzbMyyiT/h2pPrSDuu8nSGpJosC7/2fWSVanEoSdFRoBKDR6','participant',1,'6194785926','c12a8510-c0f4-47b7-9df8-8de13fc8a3ac-jackye.png','2019-08-28 23:19:37','2019-08-28 23:19:37'),(10,'participante9','participante9','participante9',NULL,'participante9@gmail.com','$2y$10$MlygdjzbMyyiT/h2pPrSDuu8nSGpJosC7/2fWSVanEoSdFRoBKDR6','participant',1,'6194785926','c12a8510-c0f4-47b7-9df8-8de13fc8a3ac-jackye.png','2019-08-28 23:19:37','2019-08-28 23:19:37'),(11,'participante10','participante10','participante10',NULL,'participante10@gmail.com','$2y$10$MlygdjzbMyyiT/h2pPrSDuu8nSGpJosC7/2fWSVanEoSdFRoBKDR6','participant',1,'6194785926','c12a8510-c0f4-47b7-9df8-8de13fc8a3ac-jackye.png','2019-08-28 23:19:37','2019-08-28 23:19:37'),(12,'participante11','participante11','participante11',NULL,'participante11@gmail.com','$2y$10$MlygdjzbMyyiT/h2pPrSDuu8nSGpJosC7/2fWSVanEoSdFRoBKDR6','participant',1,'6194785926','c12a8510-c0f4-47b7-9df8-8de13fc8a3ac-jackye.png','2019-08-28 23:19:37','2019-08-28 23:19:37'),(13,'participante12','participante12','participante12',NULL,'participante12@gmail.com','$2y$10$MlygdjzbMyyiT/h2pPrSDuu8nSGpJosC7/2fWSVanEoSdFRoBKDR6','participant',1,'6194785926','c12a8510-c0f4-47b7-9df8-8de13fc8a3ac-jackye.png','2019-08-28 23:19:37','2019-08-28 23:19:37'),(14,'participante13','participante13','participante13',NULL,'participante13@gmail.com','$2y$10$MlygdjzbMyyiT/h2pPrSDuu8nSGpJosC7/2fWSVanEoSdFRoBKDR6','participant',1,'6194785926','c12a8510-c0f4-47b7-9df8-8de13fc8a3ac-jackye.png','2019-08-28 23:19:37','2019-08-28 23:19:37'),(15,'participante14','participante14','participante14',NULL,'participante14@gmail.com','$2y$10$MlygdjzbMyyiT/h2pPrSDuu8nSGpJosC7/2fWSVanEoSdFRoBKDR6','participant',1,'6194785926','c12a8510-c0f4-47b7-9df8-8de13fc8a3ac-jackye.png','2019-08-28 23:19:37','2019-08-28 23:19:37'),(16,'participante15','participante15','participante15',NULL,'participante15@gmail.com','$2y$10$MlygdjzbMyyiT/h2pPrSDuu8nSGpJosC7/2fWSVanEoSdFRoBKDR6','participant',1,'6194785926','c12a8510-c0f4-47b7-9df8-8de13fc8a3ac-jackye.png','2019-08-28 23:19:37','2019-08-28 23:19:37'),(17,'participante16','participante16','participante16',NULL,'participante16@gmail.com','$2y$10$MlygdjzbMyyiT/h2pPrSDuu8nSGpJosC7/2fWSVanEoSdFRoBKDR6','participant',1,'6194785926','c12a8510-c0f4-47b7-9df8-8de13fc8a3ac-jackye.png','2019-08-28 23:19:37','2019-08-28 23:19:37'),(18,'participante17','participante17','participante17',NULL,'participante17@gmail.com','$2y$10$MlygdjzbMyyiT/h2pPrSDuu8nSGpJosC7/2fWSVanEoSdFRoBKDR6','participant',1,'6194785926','c12a8510-c0f4-47b7-9df8-8de13fc8a3ac-jackye.png','2019-08-28 23:19:37','2019-08-28 23:19:37'),(19,'participante18','participante18','participante18',NULL,'participante18@gmail.com','$2y$10$MlygdjzbMyyiT/h2pPrSDuu8nSGpJosC7/2fWSVanEoSdFRoBKDR6','participant',1,'6194785926','c12a8510-c0f4-47b7-9df8-8de13fc8a3ac-jackye.png','2019-08-28 23:19:37','2019-08-28 23:19:37'),(20,'participante19','participante19','participante19',NULL,'participante19@gmail.com','$2y$10$MlygdjzbMyyiT/h2pPrSDuu8nSGpJosC7/2fWSVanEoSdFRoBKDR6','participant',1,'6194785926','c12a8510-c0f4-47b7-9df8-8de13fc8a3ac-jackye.png','2019-08-28 23:19:37','2019-08-28 23:19:37'),(21,'wbs','web system battles','WBS',NULL,'wbs@gmail.com','$2y$10$NyE7Ar2iiUjzb73852OtI.orR4X6HrKwPko3yU24ivpztjAmcRTZG','participant',1,'6646127701','c4b8b26b-8bcd-4f14-9298-36249ab7bc47-jackye.png','2019-09-02 16:23:01','2019-09-02 16:23:01');
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

-- Dump completed on 2019-09-06 11:40:19
