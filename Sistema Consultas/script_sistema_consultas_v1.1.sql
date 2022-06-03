CREATE DATABASE  IF NOT EXISTS `tp_software` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `tp_software`;
-- MySQL dump 10.13  Distrib 8.0.16, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: tp_software
-- ------------------------------------------------------
-- Server version	8.0.11

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
-- Table structure for table `caracteristicas`
--

DROP TABLE IF EXISTS `caracteristicas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `caracteristicas` (
  `idCaracteristica` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(45) NOT NULL,
  PRIMARY KEY (`idCaracteristica`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `caracteristicas`
--

LOCK TABLES `caracteristicas` WRITE;
/*!40000 ALTER TABLE `caracteristicas` DISABLE KEYS */;
INSERT INTO `caracteristicas` VALUES (1,'¿Necesita sistema de login?'),(2,'Titulo pregunta numero 2'),(3,'Titulo pregunta numero 3'),(4,'Titulo pregunta numero 4'),(17,'Titulo pregunta numero 5'),(18,'Super caracteristica'),(23,'ASD ASD               A');
/*!40000 ALTER TABLE `caracteristicas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `chat` (
  `idPedido` int(11) NOT NULL,
  `idCliente` int(11) DEFAULT NULL,
  `idAdmin` int(11) DEFAULT NULL,
  `mensaje` varchar(100) NOT NULL,
  `fechaHoraMensaje` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isFromUser` tinyint(4) NOT NULL,
  `leidoPorAdmin` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idPedido`,`fechaHoraMensaje`),
  KEY `chat_fk1_idx` (`idPedido`),
  KEY `chat_fk2_idx` (`idCliente`),
  KEY `chat_fk3_idx` (`idAdmin`),
  CONSTRAINT `chat_fk1` FOREIGN KEY (`idPedido`) REFERENCES `pedidos` (`idpedido`) ON UPDATE CASCADE,
  CONSTRAINT `chat_fk2` FOREIGN KEY (`idCliente`) REFERENCES `usuarios` (`idusuario`) ON UPDATE CASCADE,
  CONSTRAINT `chat_fk3` FOREIGN KEY (`idAdmin`) REFERENCES `usuarios` (`idusuario`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `chat`
--

LOCK TABLES `chat` WRITE;
/*!40000 ALTER TABLE `chat` DISABLE KEYS */;
INSERT INTO `chat` VALUES (49,30,27,'mmmm','2020-02-03 16:44:46',0,1),(49,30,27,'asdasd','2021-03-22 18:25:05',1,0),(49,30,27,'probando','2021-03-22 18:25:21',1,0),(50,30,27,'muchas gracias !!','2020-02-03 16:45:01',1,1),(50,30,27,'Mensaje aleatorio','2020-02-04 13:09:53',0,1),(50,30,27,'Hola que tal','2020-02-17 19:43:49',0,1),(54,31,27,'No estoy tan de acuerdo con la decision','2020-02-03 16:11:19',1,0),(54,31,27,'Me pueden contestar???????????','2020-02-04 14:02:11',1,0),(55,31,27,'Gracias por aprobarlo.','2020-02-03 13:46:47',1,1),(55,31,27,'Testeando','2020-02-03 16:19:05',0,1),(55,31,27,'Me van a contestar?','2020-02-03 16:19:12',1,1),(55,31,27,'No agradezcas. Pagá','2020-02-03 18:20:00',0,1),(55,31,27,'Claro que si','2020-02-04 14:05:16',0,1),(56,31,27,'xq me lo rechazaron','2020-02-03 16:19:19',1,0),(56,31,27,'mala gente','2020-02-03 16:19:23',1,0),(56,31,27,'por que lo rechazaron?','2020-02-03 16:55:59',1,0),(57,31,28,'muchas gracias por aprobar Pato !!','2020-02-03 16:56:49',1,1),(59,31,28,'Muchas gracias de nuevo','2020-02-03 17:14:18',1,1),(59,31,28,'De nada','2020-02-14 12:07:22',0,1),(59,31,28,'Test flag','2020-02-14 12:09:37',0,1),(59,31,28,'Test user jaaaa','2020-02-14 12:10:47',1,1),(59,31,28,'ok si vs decis','2020-02-14 12:11:18',0,1),(60,31,27,'mala persona','2020-02-03 17:21:42',1,1),(60,31,27,'Probando del lado del user','2020-02-04 13:21:27',0,1),(60,31,27,'','2020-02-04 13:52:46',1,1),(60,31,27,'Mensaje vacio del user','2020-02-04 13:52:57',1,1),(60,31,27,'Mensaje vacio del user','2020-02-04 13:53:22',1,1),(60,31,27,'dos veces se mando','2020-02-04 13:53:40',1,1),(60,31,27,'Estas seguro?','2020-02-04 13:58:21',0,1),(63,31,27,'Â¿Como que adeudo?','2020-02-13 11:41:36',1,1),(63,31,27,'???','2020-02-13 11:42:05',1,1);
/*!40000 ALTER TABLE `chat` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `log_errores`
--

DROP TABLE IF EXISTS `log_errores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `log_errores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `statusCode` varchar(10) DEFAULT NULL,
  `servletName` varchar(30) DEFAULT NULL,
  `error` varchar(90) NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_errores`
--

LOCK TABLES `log_errores` WRITE;
/*!40000 ALTER TABLE `log_errores` DISABLE KEYS */;
INSERT INTO `log_errores` VALUES (1,'500','servlets.AbmUsuariosServlet','java.lang.NullPointerException','2020-02-17 19:36:55'),(2,'500','servlets.EditUserServlet','java.lang.NullPointerException','2020-02-17 19:42:28'),(3,'500','servlets.ContactoServlet','java.lang.NullPointerException','2020-02-17 19:45:35'),(4,'500','servlets.PedidoServlet','java.lang.NumberFormatException: null','2020-02-17 19:47:15');
/*!40000 ALTER TABLE `log_errores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Temporary view structure for view `maximas_fechas`
--

DROP TABLE IF EXISTS `maximas_fechas`;
/*!50001 DROP VIEW IF EXISTS `maximas_fechas`*/;
SET @saved_cs_client     = @@character_set_client;
SET character_set_client = utf8mb4;
/*!50001 CREATE VIEW `maximas_fechas` AS SELECT 
 1 AS `idCaracteristica`,
 1 AS `idOpcion`,
 1 AS `maxFecha`*/;
SET character_set_client = @saved_cs_client;

--
-- Table structure for table `opciones`
--

DROP TABLE IF EXISTS `opciones`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `opciones` (
  `idCaracteristica` int(11) NOT NULL,
  `idOpcion` int(11) NOT NULL,
  `subtitulo` varchar(80) NOT NULL,
  `descripcion` varchar(80) DEFAULT NULL,
  `textIcono` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idCaracteristica`,`idOpcion`),
  CONSTRAINT `opciones_fk1` FOREIGN KEY (`idCaracteristica`) REFERENCES `caracteristicas` (`idcaracteristica`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `opciones`
--

LOCK TABLES `opciones` WRITE;
/*!40000 ALTER TABLE `opciones` DISABLE KEYS */;
INSERT INTO `opciones` VALUES (1,1,'Si, con redes sociales y email','Los usuarios podran iniciar sesión a través de ellos','fa-twitter'),(1,2,'Si, con email','Los usuarios se podrán loguear a través del email','fa-envelope'),(1,3,'No necesita','Los usuarios no iniciarán sesión','fa-times-circle'),(2,1,'Subtitulo opcion 1','Descripcion opcion 1','fa-envelope'),(2,2,'Subtitulo opcion 2','Descripcion opcion 2','fa-envelope'),(2,3,'Subtitulo opcion 3','Descripcion opcion 3','fa-envelope'),(3,1,'Subtitulo opcion 1','Descripcion opcion 1','fa-envelope'),(3,2,'Subtitulo opcion 2','Descripcion opcion 2','fa-envelope'),(3,3,'Subtitulo opcion 3','Descripcion opcion 3','fa-envelope'),(4,1,'Subtitulo 1','Descripcion Random','fa-twitter'),(4,2,'Subtitulo 2','descripcion random','fa-twitter'),(4,3,'Subtitulo 3','descripcion random','fa-twitter'),(17,1,'Subtitulo 1','Random','fa-twitter'),(17,2,'Subtitulo 2 ja','Aleatory','fa-twitter'),(17,3,'Subtitulo 3 jo','That does not exist','fa-twitter'),(18,1,'asd','asd','fa-twitter'),(18,2,'asd','asd','fa-twitter'),(18,3,'asd','asd','fa-twitter'),(23,1,'asd asd q ','wq','fa-folder'),(23,2,'dsa','fs','fa-folder'),(23,3,'dean','dnnndea','fa-globe');
/*!40000 ALTER TABLE `opciones` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedido_caracteristicas`
--

DROP TABLE IF EXISTS `pedido_caracteristicas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `pedido_caracteristicas` (
  `idPedido` int(11) NOT NULL,
  `idCaracteristica` int(11) NOT NULL,
  `idOpcion` int(11) NOT NULL,
  PRIMARY KEY (`idPedido`,`idCaracteristica`,`idOpcion`),
  KEY `ped_car_FK2_idx` (`idCaracteristica`,`idOpcion`),
  CONSTRAINT `ped_car_FK1` FOREIGN KEY (`idPedido`) REFERENCES `pedidos` (`idpedido`) ON UPDATE CASCADE,
  CONSTRAINT `ped_car_FK2` FOREIGN KEY (`idCaracteristica`, `idOpcion`) REFERENCES `opciones` (`idcaracteristica`, `idopcion`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedido_caracteristicas`
--

LOCK TABLES `pedido_caracteristicas` WRITE;
/*!40000 ALTER TABLE `pedido_caracteristicas` DISABLE KEYS */;
INSERT INTO `pedido_caracteristicas` VALUES (60,1,1),(66,1,1),(49,1,2),(50,1,2),(54,1,2),(55,1,2),(56,1,2),(58,1,2),(59,1,2),(62,1,2),(63,1,2),(57,1,3),(49,2,1),(55,2,1),(63,2,1),(54,2,2),(56,2,2),(57,2,2),(58,2,2),(59,2,2),(60,2,2),(62,2,2),(66,2,2),(50,2,3),(50,3,1),(54,3,1),(55,3,1),(57,3,1),(49,3,2),(56,3,2),(58,3,2),(59,3,2),(60,3,2),(62,3,2),(63,3,2),(66,3,2),(55,4,1),(56,4,1),(57,4,1),(62,4,1),(50,4,2),(54,4,2),(58,4,2),(59,4,2),(60,4,2),(49,4,3),(63,4,3),(66,4,3),(49,17,1),(55,17,1),(60,17,1),(66,17,1),(54,17,2),(56,17,2),(57,17,2),(58,17,2),(59,17,2),(62,17,2),(50,17,3),(63,17,3),(55,18,1),(56,18,1),(57,18,1),(58,18,1),(63,18,1),(49,18,2),(50,18,2),(54,18,2),(59,18,2),(60,18,2),(62,18,2),(66,18,2),(66,23,3);
/*!40000 ALTER TABLE `pedido_caracteristicas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `pedidos`
--

DROP TABLE IF EXISTS `pedidos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `pedidos` (
  `idPedido` int(11) NOT NULL AUTO_INCREMENT,
  `fechaPedido` datetime DEFAULT NULL,
  `fechaAprobacion` datetime DEFAULT NULL,
  `fechaRechazo` datetime DEFAULT NULL,
  `idCliente` int(11) NOT NULL,
  `idAdmin` int(11) DEFAULT NULL,
  `estado` varchar(20) NOT NULL,
  `montoTotal` decimal(9,2) DEFAULT NULL,
  `motivoRechazo` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`idPedido`),
  KEY `pedido_FK1_idx` (`idCliente`),
  KEY `pedido_FK2_idx` (`idAdmin`),
  CONSTRAINT `pedido_FK1` FOREIGN KEY (`idCliente`) REFERENCES `usuarios` (`idusuario`) ON UPDATE CASCADE,
  CONSTRAINT `pedido_FK2` FOREIGN KEY (`idAdmin`) REFERENCES `usuarios` (`idusuario`) ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=67 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pedidos`
--

LOCK TABLES `pedidos` WRITE;
/*!40000 ALTER TABLE `pedidos` DISABLE KEYS */;
INSERT INTO `pedidos` VALUES (49,'2020-01-29 19:31:08',NULL,'2020-01-29 19:34:05',30,27,'Rechazado',6796.00,'Usuario adeuda mucho'),(50,'2020-01-29 19:35:01','2020-01-29 19:37:45',NULL,30,27,'Aprobado',7935.00,NULL),(54,'2020-01-31 14:58:17','2020-01-31 14:58:33',NULL,31,27,'Aprobado',6573.00,NULL),(55,'2020-01-31 14:58:44','2020-01-31 14:58:51',NULL,31,27,'Aprobado',6861.00,NULL),(56,'2020-01-31 14:59:03',NULL,'2020-01-31 14:59:11',31,27,'Rechazado',5761.00,'Test'),(57,'2020-01-31 14:59:23','2020-02-03 19:56:29',NULL,31,28,'Aprobado',5711.00,NULL),(58,'2020-02-03 18:29:38',NULL,NULL,30,NULL,'Pendiente',5773.00,NULL),(59,'2020-02-03 20:13:08','2020-02-03 20:13:59',NULL,31,28,'Aprobado',5773.00,NULL),(60,'2020-02-03 20:19:19',NULL,'2020-02-03 20:20:48',31,27,'Rechazado',5773.00,'porque si'),(62,'2020-02-13 14:09:17','2020-02-13 14:09:41',NULL,31,28,'Aprobado',5761.00,NULL),(63,'2020-02-13 14:40:36',NULL,'2020-02-13 14:41:12',31,27,'Rechazado',6065.00,'Usuario adeuda'),(65,'2020-02-13 12:00:00','2020-02-15 16:35:13',NULL,31,27,'Aprobado',5313.00,NULL),(66,'2020-02-17 22:44:55',NULL,NULL,31,NULL,'Pendiente',6011.00,NULL);
/*!40000 ALTER TABLE `pedidos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) NOT NULL,
  `apellido` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `usuario` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `isAdmin` tinyint(1) NOT NULL,
  PRIMARY KEY (`idUsuario`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (27,'Joshua','Acciarri','acciarrijoshua@gmail.com','341111111','joshua','ae67123534a7c7b8e550756667ca511f3accb2a4',1),(28,'Patricio','Carestia','patriciocarestia@gmail.com','342222222','patricio','96fdff65c5b9cc9c4dc303017fb373906a527a06',1),(30,'Jose','Alvarez','jose@gmail.com','4431431','josejose','4bdd62c00b3546abd17f8c4b91db824179626f89',0),(31,'Mario','Bressano','mob@bress.com.ar','343431','mario','0126a2f42853b1ebb7936319360b411fcf911203',0),(32,'Jose','Martinez','josemart@gmail.com','43232','asd','7110eda4d09e062aa5e4a390b0a572ac0d2c0220',0);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `valores`
--

DROP TABLE IF EXISTS `valores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `valores` (
  `idCaracteristica` int(11) NOT NULL,
  `idOpcion` int(11) NOT NULL,
  `fecha_desde` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `valor` decimal(9,2) DEFAULT NULL,
  PRIMARY KEY (`idCaracteristica`,`fecha_desde`,`idOpcion`),
  KEY `valores_FK2_idx` (`idOpcion`),
  KEY `valores_FK1_idx` (`idCaracteristica`,`idOpcion`),
  CONSTRAINT `valores_FK1` FOREIGN KEY (`idCaracteristica`, `idOpcion`) REFERENCES `opciones` (`idcaracteristica`, `idopcion`) ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `valores`
--

LOCK TABLES `valores` WRITE;
/*!40000 ALTER TABLE `valores` DISABLE KEYS */;
INSERT INTO `valores` VALUES (1,1,'2019-02-13 00:00:00',1500.00),(1,2,'2019-02-13 00:00:00',1100.00),(1,3,'2019-02-13 00:00:00',900.00),(1,1,'2019-06-10 00:00:00',1750.00),(1,2,'2019-07-02 00:00:00',1750.00),(2,1,'2019-02-13 00:00:00',1600.00),(2,2,'2019-02-13 00:00:00',1300.00),(2,3,'2019-02-13 00:00:00',1200.00),(3,1,'2019-02-13 00:00:00',2900.00),(3,2,'2019-02-13 00:00:00',2700.00),(3,3,'2019-02-13 00:00:00',2600.00),(3,3,'2019-04-10 00:00:00',2750.00),(3,1,'2019-05-20 00:00:00',3500.00),(4,1,'2020-01-23 15:54:33',11.00),(4,2,'2020-01-23 15:54:33',23.00),(4,3,'2020-01-23 15:54:33',15.00),(17,1,'2020-02-14 15:17:40',0.00),(17,2,'2020-02-14 15:17:40',0.00),(17,3,'2020-02-14 15:17:40',0.00),(17,1,'2020-02-14 15:17:54',0.00),(17,2,'2020-02-14 15:17:54',0.00),(17,3,'2020-02-14 15:17:54',0.00),(17,1,'2020-02-17 15:09:14',0.00),(17,2,'2020-02-17 15:09:14',0.00),(17,3,'2020-02-17 15:09:14',0.00),(17,1,'2020-02-17 15:14:04',123.00),(17,2,'2020-02-17 15:14:04',21.00),(17,3,'2020-02-17 15:14:04',0.00),(23,1,'2020-02-17 14:55:04',5.00),(23,2,'2020-02-17 14:55:04',123.00),(23,3,'2020-02-17 14:55:04',123.00);
/*!40000 ALTER TABLE `valores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Final view structure for view `maximas_fechas`
--

/*!50001 DROP VIEW IF EXISTS `maximas_fechas`*/;
/*!50001 SET @saved_cs_client          = @@character_set_client */;
/*!50001 SET @saved_cs_results         = @@character_set_results */;
/*!50001 SET @saved_col_connection     = @@collation_connection */;
/*!50001 SET character_set_client      = utf8mb4 */;
/*!50001 SET character_set_results     = utf8mb4 */;
/*!50001 SET collation_connection      = utf8_general_ci */;
/*!50001 CREATE ALGORITHM=UNDEFINED */
/*!50013 DEFINER=`sistema`@`localhost` SQL SECURITY DEFINER */
/*!50001 VIEW `maximas_fechas` AS select 1 AS `idCaracteristica`,1 AS `idOpcion`,1 AS `maxFecha` */;
/*!50001 SET character_set_client      = @saved_cs_client */;
/*!50001 SET character_set_results     = @saved_cs_results */;
/*!50001 SET collation_connection      = @saved_col_connection */;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-04-26 22:16:03
