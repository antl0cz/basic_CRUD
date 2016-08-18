-- MySQL dump 10.13  Distrib 5.6.28, for debian-linux-gnu (x86_64)
--
-- Host: localhost    Database: red_belt
-- ------------------------------------------------------
-- Server version	5.6.28-0ubuntu0.14.04.1

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
-- Table structure for table `trips`
--

DROP TABLE IF EXISTS `trips`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `trips` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `destination` varchar(100) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `start` date DEFAULT NULL,
  `end` date DEFAULT NULL,
  `planned_by` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `trips`
--

LOCK TABLES `trips` WRITE;
/*!40000 ALTER TABLE `trips` DISABLE KEYS */;
INSERT INTO `trips` VALUES (1,'test0',NULL,'2003-11-16','0000-00-00',1,'2016-03-07 01:08:52'),(2,'test1','description test','2003-11-16','0000-00-00',1,'2016-03-07 01:19:06'),(3,'springfield','simplson','2003-11-16','0000-00-00',2,'2016-03-07 01:30:16'),(4,'hawaii','coconuts','2016-07-24','2016-08-27',3,'2016-03-07 02:26:18');
/*!40000 ALTER TABLE `trips` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_trips`
--

DROP TABLE IF EXISTS `user_trips`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_trips` (
  `user_id` int(11) NOT NULL,
  `trip_id` int(11) NOT NULL,
  PRIMARY KEY (`user_id`,`trip_id`),
  KEY `fk_user_trips_trips1_idx` (`trip_id`),
  CONSTRAINT `fk_user_trips_trips1` FOREIGN KEY (`trip_id`) REFERENCES `trips` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_user_trips_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_trips`
--

LOCK TABLES `user_trips` WRITE;
/*!40000 ALTER TABLE `user_trips` DISABLE KEYS */;
INSERT INTO `user_trips` VALUES (1,1),(2,1),(3,1),(4,1),(10,1),(1,2),(2,2),(3,2),(4,2),(2,3),(3,3),(4,3),(10,3),(2,4),(3,4),(4,4);
/*!40000 ALTER TABLE `user_trips` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'test0','test0@gmail.com','5f4dcc3b5aa765d61d8327deb882cf99','2016-03-07 00:13:22'),(2,'bart','bart@email.com','5f4dcc3b5aa765d61d8327deb882cf99','2016-03-07 01:28:09'),(3,'Helen','helen@email.com','5f4dcc3b5aa765d61d8327deb882cf99','2016-03-07 02:22:59'),(4,'tom','tom@gmail.com','5f4dcc3b5aa765d61d8327deb882cf99','2016-03-07 02:31:07'),(5,'Andrew','andrew@test.com','5f4dcc3b5aa765d61d8327deb882cf99','2016-03-07 02:54:30'),(6,'Cat','cat@test.com','5f4dcc3b5aa765d61d8327deb882cf99','2016-03-07 02:54:44'),(7,'David','david@test.com','5f4dcc3b5aa765d61d8327deb882cf99','2016-03-07 02:55:00'),(8,'Eric','eric@test.com','5f4dcc3b5aa765d61d8327deb882cf99','2016-03-07 02:55:10'),(9,'Fin','fin@test.com','5f4dcc3b5aa765d61d8327deb882cf99','2016-03-07 02:55:20'),(10,'Gary','gary@test.com','5f4dcc3b5aa765d61d8327deb882cf99','2016-03-07 02:55:31');
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

-- Dump completed on 2016-03-07  3:09:53
