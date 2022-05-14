-- MariaDB dump 10.19  Distrib 10.7.3-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: vocab
-- ------------------------------------------------------
-- Server version	10.7.3-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `examples`
--

DROP TABLE IF EXISTS `examples`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `examples` (
  `language` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `example` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `translation` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `reference` varchar(500) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `examples`
--

LOCK TABLES `examples` WRITE;
/*!40000 ALTER TABLE `examples` DISABLE KEYS */;
INSERT INTO `examples` VALUES
('esperanto','Saluton! Kiel vi fartas?','Hello! How are you?',NULL),
('german','BWV: Bach-Werke-Verzeichnis','Bach works catalogue',NULL),
('esperanto','Ĉie regis ĝojo','Joy reigned everywhere',NULL),
('esperanto','Ŝi prenis la plej belan arĝentan vazon, kiu estis en la loĝejo','She took the most beautiful silver vase that was in the residence.',NULL),
('esperanto','Ŝi estis ankoraŭ pli bela ol antaŭe.','She is even more beautiful than before.','https://lernu.net/gramatiko/komparado');
/*!40000 ALTER TABLE `examples` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `lemmas`
--

DROP TABLE IF EXISTS `lemmas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `lemmas` (
  `lemma` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partofspeech` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `lemmas`
--

LOCK TABLES `lemmas` WRITE;
/*!40000 ALTER TABLE `lemmas` DISABLE KEYS */;
INSERT INTO `lemmas` VALUES
('نَجَاح','arabic','noun','arabic_noun_نَجَاح'),
('bela','esperanto','adjective','esperanto_adjective_bela'),
('ĝojo','esperanto','noun','esperanto_noun_ĝojo'),
('libro','esperanto','noun','esperanto_noun_libro'),
('Saluton','esperanto','noun','esperanto_noun_saluton'),
('iri','esperanto','verb','esperanto_verb_iri'),
('Verzeichnis','german','noun','german_noun_Verzeichnis');
/*!40000 ALTER TABLE `lemmas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `meanings`
--

DROP TABLE IF EXISTS `meanings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `meanings` (
  `lemma` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `language` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `partofspeech` varchar(25) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meaning` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  KEY `id` (`id`),
  CONSTRAINT `meanings_ibfk_1` FOREIGN KEY (`id`) REFERENCES `lemmas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `meanings`
--

LOCK TABLES `meanings` WRITE;
/*!40000 ALTER TABLE `meanings` DISABLE KEYS */;
INSERT INTO `meanings` VALUES
('Saluton','esperanto','noun','esperanto_noun_saluton','a greeting'),
('Verzeichnis','german','noun','german_noun_Verzeichnis','Index'),
('iri','esperanto','verb','esperanto_verb_iri','to go'),
('libro','esperanto','noun','esperanto_noun_libro','Book'),
('نَجَاح','arabic','noun','arabic_noun_نَجَاح','Success'),
('bela','esperanto','adjective','esperanto_adjective_bela','beautiful'),
('ĝojo','esperanto','noun','esperanto_noun_ĝojo','Joy');
/*!40000 ALTER TABLE `meanings` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2022-03-26  8:36:47
