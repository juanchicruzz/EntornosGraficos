CREATE DATABASE  IF NOT EXISTS `utn_consulta` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */;
USE `utn_consulta`;
-- MySQL dump 10.13  Distrib 8.0.16, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: utn_consulta
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
-- Table structure for table `consultas`
--

DROP TABLE IF EXISTS `consultas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `consultas` (
  `idProfesor` int(11) NOT NULL,
  `idMateria` int(11) NOT NULL,
  `carrera` varchar(5) NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `modalidad` varchar(45) DEFAULT 'Presencial',
  `URL` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idProfesor`,`idMateria`,`carrera`),
  CONSTRAINT `profesorMateriaFK` FOREIGN KEY (`idProfesor`, `idMateria`, `carrera`) REFERENCES `profesor_materia` (`idprofesor`, `idmateria`, `carrera`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `consultas`
--

LOCK TABLES `consultas` WRITE;
/*!40000 ALTER TABLE `consultas` DISABLE KEYS */;
INSERT INTO `consultas` VALUES (22,4,'IC','2022-08-05','Activa','Presencial',NULL),(22,4,'ISI','2022-07-05','Activa','Presencial',NULL);
/*!40000 ALTER TABLE `consultas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `materias`
--

DROP TABLE IF EXISTS `materias`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `materias` (
  `idMateria` int(11) NOT NULL AUTO_INCREMENT,
  `descripcionMateria` varchar(90) NOT NULL,
  PRIMARY KEY (`idMateria`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `materias`
--

LOCK TABLES `materias` WRITE;
/*!40000 ALTER TABLE `materias` DISABLE KEYS */;
INSERT INTO `materias` VALUES (1,'Analisis Matematico I'),(2,'Analisis Matematico II'),(3,'Fisica I'),(4,'Fisica II'),(5,'Algoritmos y Estructura de Datos'),(6,'Probabilidad y Estadistica'),(7,'Arquitectura de las Computadoras'),(8,'Sintaxis y Semantica de los Lenguajes'),(9,'Sistemas Operativos'),(10,'Investigacion Operativa'),(11,'Administracion Gerencial');
/*!40000 ALTER TABLE `materias` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `profesor_materia`
--

DROP TABLE IF EXISTS `profesor_materia`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `profesor_materia` (
  `idProfesor` int(11) NOT NULL,
  `idMateria` int(11) NOT NULL,
  `carrera` varchar(5) NOT NULL,
  `horarioFijo` varchar(20) DEFAULT NULL,
  `cupo` int(11) DEFAULT NULL,
  PRIMARY KEY (`idProfesor`,`idMateria`,`carrera`),
  KEY `idMateriaFK_idx` (`idMateria`),
  CONSTRAINT `idMateriaFK` FOREIGN KEY (`idMateria`) REFERENCES `materias` (`idmateria`),
  CONSTRAINT `idProfesorFK` FOREIGN KEY (`idProfesor`) REFERENCES `usuarios` (`idusuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `profesor_materia`
--

LOCK TABLES `profesor_materia` WRITE;
/*!40000 ALTER TABLE `profesor_materia` DISABLE KEYS */;
INSERT INTO `profesor_materia` VALUES (22,3,'IC','17:00',10),(22,3,'ISI','13:00',10),(22,4,'IC','19:00',10),(22,4,'ISI','15:00',10),(23,2,'IC','13:30',15),(23,2,'IE','12:00',15),(23,2,'ISI','20:30',15);
/*!40000 ALTER TABLE `profesor_materia` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `roles` (
  `idRol` int(11) NOT NULL,
  `descripcionRol` varchar(45) NOT NULL,
  PRIMARY KEY (`idRol`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'alumno'),(2,'profesor'),(3,'admin'),(5,'NUEVO_ROL'),(111,'The big ffone role');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
 SET character_set_client = utf8mb4 ;
CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `apellido` varchar(45) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `legajo` varchar(10) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `createdAt` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `idRolUsuario` int(1) DEFAULT NULL,
  PRIMARY KEY (`idUsuario`),
  KEY `rol_FK_idx` (`idRolUsuario`),
  CONSTRAINT `rol_FK` FOREIGN KEY (`idRolUsuario`) REFERENCES `roles` (`idrol`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,NULL,NULL,'joshua@gmail.com','448234',NULL,'2022-05-25 16:52:13',3),(2,NULL,NULL,'josh@gmail.com','41333',NULL,'2022-05-25 16:52:13',2),(3,NULL,NULL,'roberto@gmail.com','45313',NULL,'2022-05-25 16:52:13',2),(4,NULL,NULL,'carlos@outlook.com','34154ww',NULL,'2022-05-25 16:52:13',1),(5,NULL,NULL,'martina@icloud.com','32353',NULL,'2022-05-25 16:52:13',1),(15,NULL,NULL,'meca gabriel','3222',NULL,'2022-05-26 00:50:39',1),(16,NULL,NULL,'bressano','bress12',NULL,'2022-05-26 00:51:21',1),(21,NULL,NULL,'aaaaaa','1324134',NULL,'2022-06-01 00:35:19',1),(22,'Daniel','Del Greco','ddelgrecco@frro.utn.edu.ar','123456',NULL,'2022-06-02 17:54:27',2),(23,'Monica','Caserio','mcaserio@hotmail.com','987654',NULL,'2022-06-02 17:54:27',2),(24,NULL,NULL,'monicadelsastre@frro.utn.edu.ar','442356','$2y$10$IDoIwjS7nTaL1Y7cqbuguOURImPc3vPnMnH4wY7VJqz4zHK/w8.oK','2022-06-03 22:20:40',NULL),(25,NULL,NULL,'joshua231@gmail.com','21444','$2y$10$lBd0HaKGUfP1oG.dbiS.auHDxUuUpI.SaDzpMUZwbs42zDGuT02kC','2022-06-03 22:28:06',2),(26,NULL,NULL,'hola@gmail.comedt','44234','$2y$10$Qj6VsyGz1GsapBSbVOeBmO5tv/.gDOKz/.EDrltybe29FYZxkgQIm','2022-06-03 22:28:32',2),(27,NULL,NULL,'alumno@alumno.com','54545','$2y$10$OFyfxm./csEXpYz1A4WPluXU5VwMp8NFA.BcTr8IkuLPGfcC3ir3G','2022-06-03 22:29:03',2),(28,NULL,NULL,'jacciarri@frro.utn.edu.ar','123123','$2y$10$fo6msOn1grFllcQ1LZ/C8.duQCIAUw.fUlx889oPtgpixOoQdaGgm','2022-06-03 22:29:55',1);
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

-- Dump completed on 2022-06-03 19:32:45
