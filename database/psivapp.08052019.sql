-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: localhost    Database: psivapp
-- ------------------------------------------------------
-- Server version	5.7.24

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
-- Table structure for table `admins`
--

DROP TABLE IF EXISTS `admins`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admins` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `password` varchar(72) NOT NULL,
  `nivel` int(11) NOT NULL,
  `editado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_admin`),
  UNIQUE KEY `usuario` (`usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admins`
--

LOCK TABLES `admins` WRITE;
/*!40000 ALTER TABLE `admins` DISABLE KEYS */;
INSERT INTO `admins` VALUES (3,'admin','Marco','$2y$12$2u3rWnBa4Hx7ZGVipNjO6ux3lEr/5nYkL4quhUNTCHbxkG0U.obja',0,'2019-05-08 15:12:04'),(4,'admin2','Antonio','$2y$12$oAE8Eb5xFlSZnIJ2e7DuGOvekBuUZr9.iHGG.aOvSkDxMwX1ocz56',0,'2019-05-08 15:12:04'),(5,'admin3','Anguiano','$2y$12$47p8S2jf6eBxXyMoyeQXAez1DyxyIYwHtq6wyauRmvm.iPhJ8siBq',0,'2019-05-08 15:12:04'),(6,'admin4','Serrano','$2y$12$LobTumIX2hltn14FcG.Gh.3K225w0qaizpWTBxoHZmN6crI302q4m',0,'2019-05-08 15:12:04'),(7,'sergio','sergio','$2y$12$.MSQ.4jrkCxnDAYclggTVu/vgvY5A8S9sfPJJREUOLdAJ5hQagCO.',1,'2019-05-08 15:26:05'),(8,'sergioadmin2','Sergio Admin 2','$2y$12$JPvn9ImdAyCj4LdhTveCoell38wf9Co2MNnCClNYWDq2NPiNXZyOq',1,'2019-05-08 15:28:18');
/*!40000 ALTER TABLE `admins` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categoria_evento`
--

DROP TABLE IF EXISTS `categoria_evento`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `categoria_evento` (
  `id_categoria` tinyint(10) NOT NULL AUTO_INCREMENT,
  `cat_evento` varchar(50) NOT NULL,
  `icono` varchar(15) NOT NULL,
  `editado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_categoria`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categoria_evento`
--

LOCK TABLES `categoria_evento` WRITE;
/*!40000 ALTER TABLE `categoria_evento` DISABLE KEYS */;
INSERT INTO `categoria_evento` VALUES (1,'Seminario','fa-university','2019-05-08 15:08:40'),(2,'Conferencias','fa-comment','2019-05-08 15:08:40'),(3,'Talleres','fa-code','2019-05-08 15:08:40'),(4,'Categoria prueba ','fa-adjust','2019-05-08 15:08:45');
/*!40000 ALTER TABLE `categoria_evento` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `eventos`
--

DROP TABLE IF EXISTS `eventos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `eventos` (
  `evento_id` tinyint(10) NOT NULL AUTO_INCREMENT,
  `nombre_evento` varchar(60) NOT NULL,
  `fecha_evento` date NOT NULL,
  `hora_evento` time NOT NULL,
  `id_cat_evento` tinyint(10) NOT NULL,
  `id_inv` tinyint(4) NOT NULL,
  `clave` varchar(10) NOT NULL,
  `editado` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`evento_id`),
  KEY `id_cat_evento` (`id_cat_evento`),
  KEY `id_inv` (`id_inv`),
  CONSTRAINT `eventos_ibfk_1` FOREIGN KEY (`id_cat_evento`) REFERENCES `categoria_evento` (`id_categoria`),
  CONSTRAINT `eventos_ibfk_2` FOREIGN KEY (`id_inv`) REFERENCES `invitados` (`invitado_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `eventos`
--

LOCK TABLES `eventos` WRITE;
/*!40000 ALTER TABLE `eventos` DISABLE KEYS */;
INSERT INTO `eventos` VALUES (1,'Escuela Para Padres','2019-06-09','10:00:00',3,1,'taller_01','2019-05-08 15:05:05'),(2,'¿Depresion y Tristeza?','2019-06-09','12:00:00',3,2,'taller_02','2019-05-08 15:05:05'),(3,' Un mejor lugar','2019-06-09','14:00:00',3,3,'taller_03','2019-05-08 15:05:05'),(4,'Comunidad Feliz','2019-06-09','17:00:00',3,4,'taller_04','2019-05-08 15:05:05'),(5,'Ayuda y ayudate','2019-06-09','19:00:00',3,1,'taller_05','2019-05-08 15:05:05'),(6,'Controla Tus Impulsos','2019-06-09','10:00:00',2,2,'conf_01','2019-05-08 15:05:05'),(7,'Disfruta Tu Felicidad','2019-06-09','17:00:00',2,3,'conf_02','2019-05-08 15:05:05'),(8,'Traza tu camino','2019-06-09','19:00:00',2,4,'conf_03','2019-05-08 15:05:05'),(9,'PSIVA en comunidad','2019-06-09','10:00:00',1,1,'sem_01','2019-05-08 15:05:05'),(10,'Niños/Niñas mejores 2019','2019-06-10','10:00:00',3,2,'taller_06','2019-05-08 15:05:05'),(11,'Trabajo en comunidad','2019-06-10','12:00:00',3,3,'taller_07','2019-05-08 15:05:05'),(12,'Libre','2019-06-10','14:00:00',3,4,'taller_08','2019-05-08 15:05:05'),(13,'Ayuda y Ayudate','2019-06-10','17:00:00',3,1,'taller_09','2019-05-08 15:05:05'),(14,'Con Optimismo para ti','2019-06-10','19:00:00',3,2,'taller_10','2019-05-08 15:05:05'),(15,'¿Quien soy?','2019-06-10','21:00:00',3,3,'taller_11','2019-05-08 15:05:05'),(16,'Un cambio por ti','2019-06-10','10:00:00',2,4,'conf_04','2019-05-08 15:05:05'),(17,'Problema Y Solucion','2019-06-10','17:00:00',2,1,'conf_05','2019-05-08 15:05:05'),(18,'El turno del cambio ','2019-06-10','19:00:00',2,2,'conf_06','2019-05-08 15:05:05'),(19,'SAJUBA','2019-06-10','10:00:00',1,3,'sem_02','2019-05-08 15:05:05'),(20,'PSIVA en la comunidad','2019-06-10','17:00:00',1,4,'sem_03','2019-05-08 15:05:05'),(21,'Ayuda y Ayudate','2019-06-11','10:00:00',3,1,'taller_12','2019-05-08 15:05:05'),(22,'Ser mejor Padre','2019-06-11','12:00:00',3,2,'taller_13','2019-05-08 15:05:05'),(23,'Ser mejor Hijo','2019-06-11','14:00:00',3,3,'taller_14','2019-05-08 15:05:05'),(24,'Un futuro mejor','2019-06-11','17:00:00',3,4,'taller_15','2019-05-08 15:05:05'),(25,'¿Quien soy?','2019-06-11','19:00:00',3,1,'taller_16','2019-05-08 15:05:05'),(26,'Problema Y Solucion','2019-06-11','10:00:00',2,2,'conf_07','2019-05-08 15:05:05'),(27,'¿Soy mala persona?','2019-06-11','17:00:00',2,3,'conf_08','2019-05-08 15:05:05'),(28,'Controla Tus Impulsos','2019-06-11','19:00:00',2,4,'conf_09','2019-05-08 15:05:05'),(29,'Psicologos Catolicos','2019-06-11','10:00:00',1,1,'sem_04','2019-05-08 15:05:05'),(30,'SAJUBA','2019-06-11','17:00:00',1,2,'sem_05','2019-05-08 15:05:05'),(31,'PruebaSergio','2019-05-23','10:00:00',2,2,'conf_10','2019-05-08 15:05:05'),(32,'PruebaSergio','2019-05-23','10:00:00',2,2,'conf_11','2019-05-08 15:05:05');
/*!40000 ALTER TABLE `eventos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `invitados`
--

DROP TABLE IF EXISTS `invitados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `invitados` (
  `invitado_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `nombre_invitado` varchar(30) NOT NULL,
  `apellido_invitado` varchar(30) NOT NULL,
  `descripcion` text NOT NULL,
  `url_imagen` varchar(50) NOT NULL,
  PRIMARY KEY (`invitado_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `invitados`
--

LOCK TABLES `invitados` WRITE;
/*!40000 ALTER TABLE `invitados` DISABLE KEYS */;
INSERT INTO `invitados` VALUES (1,'Ruth','Izaguirre','Lic. En Psicologia','invitado1.jpg'),(2,'Ines','Mejia','Lic. En Psicologia\r\nMaestria En Ciencias De La Familia','invitado2.jpg'),(3,'Ivan','Toscano','Lic. En Teologia','invitado3.jpg'),(4,'Beatriz','Serrano','Lic. En Psicologia','invitado4.jpg'),(5,'Sergio ','Hernandez','Ing. ElectrÃ³nico Editado','intellectual-property.png');
/*!40000 ALTER TABLE `invitados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `regalos`
--

DROP TABLE IF EXISTS `regalos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `regalos` (
  `ID_regalo` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_regalo` varchar(50) NOT NULL,
  PRIMARY KEY (`ID_regalo`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `regalos`
--

LOCK TABLES `regalos` WRITE;
/*!40000 ALTER TABLE `regalos` DISABLE KEYS */;
INSERT INTO `regalos` VALUES (1,'Pulsera'),(2,'Etiquetas'),(3,'Plumas');
/*!40000 ALTER TABLE `regalos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registrados`
--

DROP TABLE IF EXISTS `registrados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `registrados` (
  `ID_Registrado` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre_registrado` varchar(50) NOT NULL,
  `apellido_registrado` varchar(50) NOT NULL,
  `email_registrado` varchar(100) NOT NULL,
  `fecha_registro` datetime NOT NULL,
  `pases_articulos` longtext NOT NULL,
  `talleres_registrados` longtext NOT NULL,
  `regalo` int(11) NOT NULL,
  `total_pagado` varchar(50) NOT NULL,
  `pagado` int(11) NOT NULL,
  PRIMARY KEY (`ID_Registrado`),
  KEY `regalo` (`regalo`),
  CONSTRAINT `registrados_ibfk_1` FOREIGN KEY (`regalo`) REFERENCES `regalos` (`ID_regalo`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registrados`
--

LOCK TABLES `registrados` WRITE;
/*!40000 ALTER TABLE `registrados` DISABLE KEYS */;
INSERT INTO `registrados` VALUES (1,'Marco','Anguiano','anguianomarco18@gmail.com','2019-05-06 09:38:57','{\"un_dia\":{\"cantidad\":\"1\"},\"pase_completo\":{\"cantidad\":\"\"},\"pase_2dias\":{\"cantidad\":\"\"}}','{\"eventos\":[\"taller_01\",\"taller_02\",\"taller_03\",\"taller_04\",\"taller_05\",\"conf_01\",\"conf_02\",\"conf_03\"]}',1,'30',0),(2,'Jonathan','Aviles','avilesleo1106@gmail.com','2019-05-06 10:23:05','{\"un_dia\":{\"cantidad\":\"0\"},\"pase_completo\":{\"cantidad\":\"1\"},\"pase_2dias\":{\"cantidad\":\"\"}}','{\"eventos\":[\"taller_04\",\"taller_05\",\"sem_01\",\"taller_10\",\"conf_05\",\"taller_13\",\"conf_07\",\"sem_04\",\"sem_05\"]}',2,'50',0),(3,'Rosario','Torres','rosarioago@gmail.com','2019-05-06 10:30:45','{\"un_dia\":{\"cantidad\":\"1\"},\"pase_completo\":{\"cantidad\":\"0\"},\"pase_2dias\":{\"cantidad\":\"\"}}','{\"eventos\":[\"taller_01\",\"taller_02\",\"taller_03\",\"taller_04\",\"taller_05\"]}',1,'30',0),(4,'Karen','Aguilar','karen.nayebaldenegro@gmail.com','2019-05-06 12:10:56','{\"un_dia\":{\"cantidad\":\"1\"},\"pase_completo\":{\"cantidad\":\"\"},\"pase_2dias\":{\"cantidad\":\"\"}}','[]',3,'30',0),(11,'Daniel','Garcia','shaytan824@gmail.com','2019-05-06 13:23:07','{\"un_dia\":{\"cantidad\":\"1\"},\"pase_completo\":{\"cantidad\":\"\"},\"pase_2dias\":{\"cantidad\":\"\"},\"etiquetas\":1}','{\"eventos\":[\"taller_01\",\"taller_02\",\"taller_03\",\"taller_04\",\"taller_05\",\"conf_01\",\"conf_02\",\"conf_03\"]}',2,'32',0),(12,'Alejandro','Ayala','correo@gmail.com','2019-05-06 14:00:06','{\"un_dia\":{\"cantidad\":\"1\"},\"pase_completo\":{\"cantidad\":\"\"},\"pase_2dias\":{\"cantidad\":\"\"}}','{\"eventos\":[\"taller_01\",\"taller_02\",\"taller_03\",\"conf_02\"]}',1,'30',0);
/*!40000 ALTER TABLE `registrados` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-05-08 12:54:29
