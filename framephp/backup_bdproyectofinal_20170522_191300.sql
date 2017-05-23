-- MySQL dump 10.13  Distrib 5.1.61, for redhat-linux-gnu (i386)
--
-- Host: localhost    Database: bdproyectofinal
-- ------------------------------------------------------
-- Server version	5.1.61

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
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `productos` (
  `codigoproducto` char(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `nombre` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `precio` double DEFAULT NULL,
  `stock` enum('si','no') COLLATE latin1_spanish_ci DEFAULT NULL,
  `fechareg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES ('R1001','Ron Havana 1 l.',25,'si','2017-05-22 15:27:49'),('R1002','Ron Cartavio 1 l.',24.5,'si','2017-05-22 12:33:23'),('R1010','Pilse 12 u. ',51,'no','2017-05-22 13:19:42'),('R1012','Cristal 12 u.',45,'no','2017-05-22 13:38:51'),('R1013','Cuzqueña Trigo 12 u.',58,'si','2017-05-22 13:19:33'),('R1015','Vodka Ruskaya 750 ml.',15.7,'si','2017-05-22 21:48:42'),('R1016','Johnnie Walker Red Label 750 ml',45.5,'si','2017-05-22 13:25:09'),('R1017','Johnnie Walker Black Label x 750 ml',80.5,'si','2017-05-22 21:54:34'),('R1018','Johnnie Walker Green Label x 750 ml',150,'si','2017-05-22 13:26:02'),('R1019','Johnnie Walker Gold Label x 750 ml',350,'si','2017-05-22 21:56:35'),('R1020','Pisco Tabernero Acholado 750 ml',32,'si','2017-05-22 13:28:17');
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usuarios` (
  `idusuario` char(20) COLLATE latin1_spanish_ci DEFAULT NULL,
  `nombre` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `clave` char(40) COLLATE latin1_spanish_ci DEFAULT NULL,
  `email` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `telefono` char(12) COLLATE latin1_spanish_ci DEFAULT NULL,
  `rol` enum('sa','us') COLLATE latin1_spanish_ci DEFAULT NULL,
  `fechareg` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES ('gdiaz','mathieu gonzales','8cb2237d0679ca88db6464eac60da96345513964','gdiaz@gmail.com','993559068','us','2017-05-22 06:31:32'),('gmanriqe','jesus gonzales','8cb2237d0679ca88db6464eac60da96345513964','gmanriqe@gmail.com','993559068','sa','2017-05-22 06:30:44'),('dmeza','deisy diaz','8cb2237d0679ca88db6464eac60da96345513964','gmanriqe@gmail.com','993559068','us','2017-05-22 11:35:08'),('fsanchez','Frank Sanchez Moreyra','82e30ca888fad258d6ac2722e3fdf37b68379875','pxfsanch@cibertec.edu.pe','999999999','sa','2017-05-22 15:41:15');
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2017-05-22 10:43:31
