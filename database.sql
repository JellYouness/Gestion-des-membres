-- MySQL dump 10.13  Distrib 8.0.28, for Win64 (x86_64)
--
-- Host: localhost    Database: pcc
-- ------------------------------------------------------
-- Server version	5.6.17

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
-- Table structure for table `abonnement`
--

DROP TABLE IF EXISTS `abonnement`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `abonnement` (
  `id_abonnement` int(10) NOT NULL AUTO_INCREMENT,
  `id_membre` int(10) NOT NULL,
  `id_activite` varchar(10) NOT NULL,
  `date_debut` date NOT NULL,
  `date_fin` date NOT NULL,
  `prix` varchar(10) NOT NULL,
  PRIMARY KEY (`id_abonnement`),
  KEY `Abonnement_fk0` (`id_activite`),
  KEY `Abonnement_fk1` (`id_membre`),
  CONSTRAINT `Abonnement_fk0` FOREIGN KEY (`id_activite`) REFERENCES `activite` (`id_activite`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `Abonnement_fk1` FOREIGN KEY (`id_membre`) REFERENCES `membres` (`id_membre`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `abonnement`
--

LOCK TABLES `abonnement` WRITE;
/*!40000 ALTER TABLE `abonnement` DISABLE KEYS */;
INSERT INTO `abonnement` VALUES (1,9,'G1','2022-12-01','2022-12-01','300'),(4,9,'G1','2022-12-01','2022-12-01','300'),(8,1,'SC1','0011-11-11','0001-11-11','200'),(10,11,'G1','2022-10-10','2022-10-14','400'),(11,14,'OZ1','2022-06-30','2023-01-13','700'),(12,67,'SPA1','2022-10-12','2022-10-06','300'),(13,68,'SC1','2022-10-14','2022-10-30','200');
/*!40000 ALTER TABLE `abonnement` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `activite`
--

DROP TABLE IF EXISTS `activite`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `activite` (
  `id_activite` varchar(10) NOT NULL,
  `nom_activite` varchar(20) NOT NULL,
  PRIMARY KEY (`id_activite`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `activite`
--

LOCK TABLES `activite` WRITE;
/*!40000 ALTER TABLE `activite` DISABLE KEYS */;
INSERT INTO `activite` VALUES ('G1','Le Golf'),('OZ1','Ozarts'),('SC1','Sports Center'),('SPA1','Le SPA');
/*!40000 ALTER TABLE `activite` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `membres`
--

DROP TABLE IF EXISTS `membres`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `membres` (
  `id_membre` int(10) NOT NULL AUTO_INCREMENT,
  `cin_membre` varchar(10) NOT NULL,
  `nom_membre` varchar(50) NOT NULL,
  `prenom_membre` varchar(50) NOT NULL,
  `sexe_membre` varchar(6) NOT NULL,
  `date_naissance` date NOT NULL,
  `email_membre` varchar(100) NOT NULL,
  `tele_membre` int(10) NOT NULL,
  `adresse` varchar(100) NOT NULL,
  `code_postal` int(10) DEFAULT NULL,
  `pays` varchar(30) DEFAULT NULL,
  `ville` varchar(30) DEFAULT NULL,
  `date_creation` datetime NOT NULL,
  PRIMARY KEY (`id_membre`),
  UNIQUE KEY `CIN` (`cin_membre`),
  UNIQUE KEY `id_membre_UNIQUE` (`id_membre`)
) ENGINE=InnoDB AUTO_INCREMENT=71 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `membres`
--

LOCK TABLES `membres` WRITE;
/*!40000 ALTER TABLE `membres` DISABLE KEYS */;
INSERT INTO `membres` VALUES (1,'BH44789','YOUNESS','JELLOULI','M','2002-04-21','youness@gmail.com',627585858,'salmia2 rue18 num 52',20700,'MAROC','CASA','2020-12-02 21:04:02'),(9,'BH74553','Mostafa','JELLOULI','M','1954-02-01','mostafajl@gmail.com',655633244,'salmia2 rue18 num 52',2070,'Maroc','CASA','2022-07-26 04:25:46'),(11,'bh64040F','Nadia','SOUHAIL','F','1966-01-16','nadiashl@live.com',633228879,'salmia2 rue18 num 52',20700,'MAROC','CASA','2022-09-02 05:31:39'),(14,'bh640405','Yassine','IDRISSI','M','2002-08-19','yassineidrissi2005@gmail.com',615400673,'salmia2 rue 21 apt6 imm 13',20700,'MAROC','TANGER','2022-09-02 05:31:39'),(67,'B20372','Mohammed','ELBADRY','M','2003-03-27','mohael@outlook.fr',698239834,'Hay lamyae,bloc  6, 44',20000,'MAROC','SAFI','2022-09-14 04:43:23'),(68,'DE28753','Abdessamad','HNIOUA','M','3333-03-21','hnioua@yahoo.fr',699898932,'Byr, Tiznit',19229,'MAROC','TIZNIT','2022-09-18 02:09:51'),(70,'JH440055','ELOUMARI','Abdelmoughit','M','2001-04-02','moughit@gmail.com',627585858,'hay eljadid, 162',50050,'MAROC','BEN GUERRIR','2022-10-01 02:44:14');
/*!40000 ALTER TABLE `membres` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id_user` int(10) NOT NULL AUTO_INCREMENT,
  `Username` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nom_user` varchar(50) DEFAULT NULL,
  `prenom_user` varchar(50) DEFAULT NULL,
  `email_user` varchar(50) DEFAULT NULL,
  `isAdmin` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (0,'root','63a9f0ea7bb98050796b649e85481845','Super','Admin',NULL,1),(1,'admin','21232f297a57a5a743894a0e4a801fc3','Jellouli','Youness',NULL,0);
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

-- Dump completed on 2022-12-08 22:57:14
