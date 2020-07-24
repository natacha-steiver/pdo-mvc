CREATE DATABASE  IF NOT EXISTS `material_blog` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `material_blog`;
-- MySQL dump 10.13  Distrib 5.7.23, for osx10.9 (x86_64)
--
-- Host: 127.0.0.1    Database: material_blog
-- ------------------------------------------------------
-- Server version	5.7.23

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
-- Table structure for table `abonnes`
--

DROP TABLE IF EXISTS `abonnes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `abonnes` (
  `id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `abonnes`
--

LOCK TABLES `abonnes` WRITE;
/*!40000 ALTER TABLE `abonnes` DISABLE KEYS */;
/*!40000 ALTER TABLE `abonnes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `auteurs`
--

DROP TABLE IF EXISTS `auteurs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `auteurs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(45) NOT NULL,
  `mdp` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `auteurs`
--

LOCK TABLES `auteurs` WRITE;
/*!40000 ALTER TABLE `auteurs` DISABLE KEYS */;
INSERT INTO `auteurs` VALUES (1,'pascal','pascal'),(2,'ben','ben');
/*!40000 ALTER TABLE `auteurs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(45) NOT NULL,
  `slug` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug_UNIQUE` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Design web','design-web'),(2,'Développement backend','developpement-backend'),(3,'Développement frontend','developpement-frontend'),(4,'Bidon !','bidon');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `titre` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `datePublication` datetime NOT NULL,
  `texte` text,
  `media` varchar(100) DEFAULT NULL,
  `auteur` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug_UNIQUE` (`slug`),
  KEY `fk_posts_auteurs_idx` (`auteur`),
  CONSTRAINT `fk_posts_auteurs` FOREIGN KEY (`auteur`) REFERENCES `auteurs` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (1,'Video Maker','video-maker','2017-01-01 00:00:00','Some things just look better in motion and in the highly competitive world of fashion, finding an edge over the competition is crucial. When it comes to clothes, hair, make-up and jewellery nothing compares to seeing moving images. So why not give your audience what they prefer?\n\nDid you know that a strong brand is absolutely essential for generating sales and growth on Social Media? You may not have given a lot of importance to your brand identity yet, but you surely have one. Let us take care of your branding and visibility both in online and offline world.','http://lorempixel.com/750/390/technics/1',1),(2,'Material Design for Bootstrap','material-design-for-bootstrap','2017-02-02 00:00:00','Google designed a Material Design to make a web more beautiful. Twitter created a Bootstrap to support you in faster and easier development of responsive websites. Material Design for Bootstrap contains both!','http://lorempixel.com/750/390/technics/2',1),(4,'Tuturial Foundation','tutorial-foundation','2018-01-01 00:00:00','OIuor ieuoiaeurtoi aueoirtu oiaeurtoi ealrtj ','http://lorempixel.com/750/390/technics/3',1),(5,'Tutorial Materialize','tutorial materialize','2018-02-02 00:00:00','Pqdf lgkqjldkgjlkq djfglk jqdlkgj lqdkjgf lk qdj ','http://lorempixel.com/750/390/technics/4',1);
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts_has_categories`
--

DROP TABLE IF EXISTS `posts_has_categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `posts_has_categories` (
  `post` int(10) unsigned NOT NULL,
  `categorie` int(10) unsigned NOT NULL,
  PRIMARY KEY (`post`,`categorie`),
  KEY `fk_posts_has_categories_categories1_idx` (`categorie`),
  KEY `fk_posts_has_categories_posts1_idx` (`post`),
  CONSTRAINT `fk_posts_has_categories_categories1` FOREIGN KEY (`categorie`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `fk_posts_has_categories_posts1` FOREIGN KEY (`post`) REFERENCES `posts` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts_has_categories`
--

LOCK TABLES `posts_has_categories` WRITE;
/*!40000 ALTER TABLE `posts_has_categories` DISABLE KEYS */;
INSERT INTO `posts_has_categories` VALUES (2,1),(4,1),(1,2),(4,2),(5,2),(2,3),(5,3);
/*!40000 ALTER TABLE `posts_has_categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `login` varchar(45) NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `statut` tinyint(4) NOT NULL DEFAULT '1',
  `nom` varchar(45) DEFAULT NULL,
  `prenom` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `login_UNIQUE` (`login`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'pascal','pascal',1,'Lacroix','Pascal');
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

-- Dump completed on 2018-11-15  9:22:50
