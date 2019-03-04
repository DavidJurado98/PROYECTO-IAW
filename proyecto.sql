-- MySQL dump 10.13  Distrib 5.7.24, for Linux (x86_64)
--
-- Host: 127.0.0.1    Database: proyecto
-- ------------------------------------------------------
-- Server version	5.5.41-0ubuntu0.14.04.1

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


DROP DATABASE IF EXISTS proyecto;
CREATE DATABASE proyecto;
USE proyecto;


--
-- Table structure for table `citas`
--

DROP TABLE IF EXISTS `citas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `citas` (
  `cod_cita` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `cod_clientes` int(11) NOT NULL,
  `hora` time NOT NULL,
  PRIMARY KEY (`cod_cita`),
  KEY `fk_citas_1_idx` (`cod_clientes`),
  CONSTRAINT `fk_citas_1` FOREIGN KEY (`cod_clientes`) REFERENCES `clientes` (`cod_clientes`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citas`
--

LOCK TABLES `citas` WRITE;
/*!40000 ALTER TABLE `citas` DISABLE KEYS */;
INSERT INTO `citas` VALUES (1,'2012-12-12',1,'00:00:00'),(2,'2010-10-10',1,'09:30:00'),(3,'2012-12-12',1,'00:00:00');
/*!40000 ALTER TABLE `citas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `clientes`
--

DROP TABLE IF EXISTS `clientes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `clientes` (
  `cod_clientes` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `domicilio` varchar(45) NOT NULL,
  `sexo` varchar(45) NOT NULL,
  PRIMARY KEY (`cod_clientes`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `clientes`
--

LOCK TABLES `clientes` WRITE;
/*!40000 ALTER TABLE `clientes` DISABLE KEYS */;
INSERT INTO `clientes` VALUES (1,'admin@gmail.com','21232f297a57a5a743894a0e4a801fc3','admin','admin','admin','admin','Masculino'),(2,'a@a','0cc175b9c0f1b6a831c399e269772661','a','a','691579104','Pepa','Femenino'),(3,'lkadm@af','7815696ecbf1c96e6894b779456d330e','asd','das','999999999','asdasd','Masculino'),(4,'alejandro_roman_caballero@outlook.es','7ed1ca45414f40612d0c469e24453e40','Alejandro','Roman','677365255','Sevilla, España','Masculino');
/*!40000 ALTER TABLE `clientes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `peluquero`
--

DROP TABLE IF EXISTS `peluquero`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `peluquero` (
  `cod_peluquero` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellidos` varchar(45) NOT NULL,
  `fecha_contrato` date NOT NULL,
  `sexo` varchar(45) NOT NULL,
  PRIMARY KEY (`cod_peluquero`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `peluquero`
--

LOCK TABLES `peluquero` WRITE;
/*!40000 ALTER TABLE `peluquero` DISABLE KEYS */;
INSERT INTO `peluquero` VALUES (1,'David','Izquierdo','2018-06-22','Masculino'),(7,'fdsa','sddas','2019-02-01','Femenino');
/*!40000 ALTER TABLE `peluquero` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicio`
--

DROP TABLE IF EXISTS `servicio`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicio` (
  `cod_servicio` int(11) NOT NULL AUTO_INCREMENT,
  `servicios` varchar(45) NOT NULL,
  `precio` int(11) NOT NULL,
  PRIMARY KEY (`cod_servicio`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicio`
--

LOCK TABLES `servicio` WRITE;
/*!40000 ALTER TABLE `servicio` DISABLE KEYS */;
INSERT INTO `servicio` VALUES (1,' Corte de cabello',7),(2,'Arreglo de barba',3),(3,' Corte de cabello niño (hasta 10 años)',6),(4,'Arreglo cuello y patillas',2),(5,'Perfilar barba',2),(6,'Lavado extra',1),(7,'  Servicio a domicilio',10);
/*!40000 ALTER TABLE `servicio` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicio_prestado`
--

DROP TABLE IF EXISTS `servicio_prestado`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `servicio_prestado` (
  `cod_servicio_prestado` int(11) NOT NULL AUTO_INCREMENT,
  `cod_servicio` int(11) NOT NULL,
  `cod_cita` int(11) NOT NULL,
  `cod_peluquero` int(11) NOT NULL,
  PRIMARY KEY (`cod_servicio_prestado`),
  KEY `fk_servicio_prestado_1_idx` (`cod_servicio`),
  KEY `fk_servicio_prestado_2_idx` (`cod_cita`),
  KEY `fk_servicio_prestado_3_idx` (`cod_peluquero`),
  CONSTRAINT `fk_servicio_prestado_1` FOREIGN KEY (`cod_peluquero`) REFERENCES `peluquero` (`cod_peluquero`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_servicio_prestado_2` FOREIGN KEY (`cod_servicio`) REFERENCES `servicio` (`cod_servicio`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `fk_servicio_prestado_3` FOREIGN KEY (`cod_cita`) REFERENCES `citas` (`cod_cita`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicio_prestado`
--

LOCK TABLES `servicio_prestado` WRITE;
/*!40000 ALTER TABLE `servicio_prestado` DISABLE KEYS */;
INSERT INTO `servicio_prestado` VALUES (1,1,1,1),(7,3,2,1);
/*!40000 ALTER TABLE `servicio_prestado` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2019-03-04 14:12:55
