-- MySQL dump 10.13  Distrib 8.0.29, for Win64 (x86_64)
--
-- Host: 127.0.0.1    Database: admin_negocios
-- ------------------------------------------------------
-- Server version	5.7.33

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
-- Table structure for table `citas`
--

DROP TABLE IF EXISTS `citas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `citas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(65) COLLATE utf8_bin DEFAULT NULL,
  `apellido` varchar(55) COLLATE utf8_bin DEFAULT NULL,
  `asunto` text COLLATE utf8_bin,
  `fecha` date DEFAULT NULL,
  `hora` time DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id_idx` (`usuario_id`),
  CONSTRAINT `` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `citas`
--

LOCK TABLES `citas` WRITE;
/*!40000 ALTER TABLE `citas` DISABLE KEYS */;
INSERT INTO `citas` VALUES (2,'pipe','nieto','le duele el nepe','2022-12-20','16:00:00',0,1),(3,'fifo','perrito','le duele toda la colita pos data: pobecito','2022-12-21','15:00:00',0,1),(5,'pedrito','que gusto deverte','me dijeron que eres licenciado','2022-12-21','11:16:00',0,1),(6,'Paco','rthg','htrhtr','2022-12-22','13:37:00',1,1),(7,'paco','Mendes','fsdfsdfds','2022-12-31','17:00:00',1,1),(8,'LIZBETH','Murillo','sdfdsfsd','2022-12-30','01:55:00',1,1);
/*!40000 ALTER TABLE `citas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `empleados`
--

DROP TABLE IF EXISTS `empleados`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `empleados` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) COLLATE utf8_bin DEFAULT NULL,
  `apellido` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `telefono` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `admin` tinyint(4) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_usuario_idx` (`id_usuario`),
  CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `empleados`
--

LOCK TABLES `empleados` WRITE;
/*!40000 ALTER TABLE `empleados` DISABLE KEYS */;
INSERT INTO `empleados` VALUES (8,'VERONICA','Lopez','6558897845',1,1),(9,'Paco','Lopez','5589632143',1,1),(11,'Fernando','hjgjhg','7778889944',0,1),(13,'Ana','Lopez','5556669988',0,1);
/*!40000 ALTER TABLE `empleados` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `paquetes`
--

DROP TABLE IF EXISTS `paquetes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `paquetes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `paquetes`
--

LOCK TABLES `paquetes` WRITE;
/*!40000 ALTER TABLE `paquetes` DISABLE KEYS */;
INSERT INTO `paquetes` VALUES (1,'basico'),(2,'normal'),(3,'completo');
/*!40000 ALTER TABLE `paquetes` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `productos`
--

DROP TABLE IF EXISTS `productos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `productos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `disponible` int(11) DEFAULT NULL,
  `imagen` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_id_idx` (`usuario_id`),
  CONSTRAINT `usuario_id` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `productos`
--

LOCK TABLES `productos` WRITE;
/*!40000 ALTER TABLE `productos` DISABLE KEYS */;
INSERT INTO `productos` VALUES (1,'producto 1',1000,1,'422048ca39db8ac533f0bde2a31a7470',1),(2,'producto 3',80,0,'f28b03a3ca72cfadfea8417826a2ee0c',1),(3,'producto 4',300,15,'2acd0b0e7fdddcaf0733dec8001813b9',1),(4,'nuevo',400,0,'b011d177c197d40c1b34885d32c93ad3',1),(5,'Sudadera para mujer XL',222,0,'6e5e66aa334c83d13427ec44ef15b00d',1),(6,'Cita',250,198,'87f5be1915b2bb1c8830e49d5cf4a81d',1),(7,'Bolsa',250,47,'bd25ebe8d16b685333a447e93a37c17c',1);
/*!40000 ALTER TABLE `productos` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `registros`
--

DROP TABLE IF EXISTS `registros`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `registros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paquete_id` int(11) DEFAULT NULL,
  `pago_id` varchar(30) COLLATE utf8_bin DEFAULT NULL,
  `token` varchar(8) COLLATE utf8_bin DEFAULT NULL,
  `activo` tinyint(1) DEFAULT NULL,
  `usuarioid` int(11) DEFAULT NULL,
  `tiempo_id` int(11) DEFAULT NULL,
  `fecha_inicio` date DEFAULT NULL,
  `fecha_final` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `paquete_id_idx` (`paquete_id`),
  KEY `usuario_id_idx` (`usuarioid`),
  KEY `tiempo_id_idx` (`tiempo_id`),
  CONSTRAINT `paquete_id` FOREIGN KEY (`paquete_id`) REFERENCES `paquetes` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `tiempo_id` FOREIGN KEY (`tiempo_id`) REFERENCES `tiempo` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `usuario-id` FOREIGN KEY (`usuarioid`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `registros`
--

LOCK TABLES `registros` WRITE;
/*!40000 ALTER TABLE `registros` DISABLE KEYS */;
INSERT INTO `registros` VALUES (2,2,'245353703E320860C','935b364f',1,2,2,'2022-12-19','2023-12-19'),(3,1,'6Y252708H67283052','cf7ce45e',1,3,2,'2022-12-19','2023-12-19'),(5,2,'6PT719799X9045716','4eabed00',1,1,2,'2022-12-20','2023-12-20');
/*!40000 ALTER TABLE `registros` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tiempo`
--

DROP TABLE IF EXISTS `tiempo`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tiempo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tiempo`
--

LOCK TABLES `tiempo` WRITE;
/*!40000 ALTER TABLE `tiempo` DISABLE KEYS */;
INSERT INTO `tiempo` VALUES (1,'mensual'),(2,'anual');
/*!40000 ALTER TABLE `tiempo` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `apellido` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `email` varchar(40) COLLATE utf8_bin DEFAULT NULL,
  `password` varchar(60) COLLATE utf8_bin DEFAULT NULL,
  `confirmado` tinyint(4) DEFAULT NULL,
  `token` varchar(20) COLLATE utf8_bin DEFAULT NULL,
  `admin` tinyint(4) DEFAULT NULL,
  `superadmin` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usuarios`
--

LOCK TABLES `usuarios` WRITE;
/*!40000 ALTER TABLE `usuarios` DISABLE KEYS */;
INSERT INTO `usuarios` VALUES (1,'Francisco','Avalos','fran7paco10@gmail.com','$2y$10$ZUFA4Ed3U9oIWQkSy03Uk.1BjLG5HC2Xgq65YzwCZ5Cw65v4PiNLu',1,'',1,0),(2,' VERONICA','Lopez','correo1@correo.com','$2y$10$elBdbHmHH7nHc/H9HBEmGu5UgFuKKiu0nUOpzvs7DJSb7uWboRHp.',1,'',0,1),(3,' Lizbeth','Avalos','correo2@correo.com','$2y$10$u6gsPFd3A5KhqzWF3uXE8ualAJo.GxpWB6WrEljM4rR..1VvTVLVa',1,'',1,0),(4,'Alondra','Lopez','correo3@correo.com','$2y$10$SOJxZLAcZu4w44GPFih.A.Iafr7QdanaTSrjFzEYhrn6Sio6QyVJy',1,'',1,0),(5,'Paco','Murillo','correo4@correo.com','$2y$10$eDwHkrYGK0yr/gGibOq9fOrqt4FdA5dBXkk7nqPervE1QgxsWo2p.',1,'',1,0),(16,'Paco','Lopez','correo18@correo.com','$2y$10$w9S1EwwgVMzmvWf3YwquzejsYPVYTVnIW9W2WNAJXj5lZIRTCXaKu',1,'',1,0),(18,'Dios','Dado','dios@dado.com','$2y$10$t..VbFFgNxzDt06NqU13O.s8jt3neePIAiMppuhwE0bGmtUj1cV8i',1,'',1,0),(19,'Dios','Ddo','correo6@correo.com','$2y$10$WJ1wFk3D2ARULH.RJxQ1DOfp9p37YfAVeAJB5VyAwbxyqvY9wNpme',1,'',1,0);
/*!40000 ALTER TABLE `usuarios` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventas`
--

DROP TABLE IF EXISTS `ventas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `totalcompra` varchar(45) COLLATE utf8_bin DEFAULT NULL,
  `ventasusuario_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ventasusuario_id_idx` (`ventasusuario_id`),
  CONSTRAINT `ventasusuario_id` FOREIGN KEY (`ventasusuario_id`) REFERENCES `usuarios` (`id`) ON DELETE SET NULL ON UPDATE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventas`
--

LOCK TABLES `ventas` WRITE;
/*!40000 ALTER TABLE `ventas` DISABLE KEYS */;
INSERT INTO `ventas` VALUES (1,'Francisco','2022-12-27','11:13','922',1),(2,'VERONICA','2022-12-27','11:16','1822',1),(3,'Francisco','2022-12-29','12:47','222',1),(5,'Francisco','2023-01-02','12:42','444',1),(6,'Francisco','2023-01-09','15:05','400',1),(7,'Francisco','2023-01-03','11:00','666',1),(8,'Francisco','2023-01-10','11:41','666',1),(9,'Francisco','2023-01-02','12:05','400',1),(15,'Francisco','2023-01-03','14:51','1380',1),(16,'Francisco','2023-01-02','15:21','8642',1),(17,'Ana','2023-01-04','11:14','1050',1),(18,'Francisco','2023-01-27','12:28','650',1),(19,'Francisco','2023-01-27','12:30','750',1),(20,'Fernando','2023-03-02','05:15','2400',1);
/*!40000 ALTER TABLE `ventas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `ventasproductos`
--

DROP TABLE IF EXISTS `ventasproductos`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `ventasproductos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subtotal` varchar(15) COLLATE utf8_bin DEFAULT NULL,
  `cantidad` varchar(10) COLLATE utf8_bin DEFAULT NULL,
  `ventas_id` int(11) DEFAULT NULL,
  `productos_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ventas_id_idx` (`ventas_id`),
  KEY `productos_id_idx` (`productos_id`),
  CONSTRAINT `productos_id` FOREIGN KEY (`productos_id`) REFERENCES `productos` (`id`) ON DELETE SET NULL ON UPDATE SET NULL,
  CONSTRAINT `ventas_id` FOREIGN KEY (`ventas_id`) REFERENCES `ventas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 COLLATE=utf8_bin;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `ventasproductos`
--

LOCK TABLES `ventasproductos` WRITE;
/*!40000 ALTER TABLE `ventasproductos` DISABLE KEYS */;
INSERT INTO `ventasproductos` VALUES (1,'222','1',1,5),(2,'400','1',1,4),(3,'300','1',1,3),(4,'222','1',2,5),(5,'1600','4',2,4),(6,'222','1',3,5),(8,'444','2',5,5),(9,'400','1',6,4),(10,'666','3',7,5),(11,'666','3',8,5),(12,'400','1',9,4),(16,'300','1',15,3),(17,'80','1',15,2),(18,'1000','1',15,1),(19,'222','1',16,5),(20,'400','1',16,4),(21,'300','1',16,3),(22,'720','9',16,2),(23,'7000','7',16,1),(24,'250','1',17,6),(25,'800','2',17,4),(26,'250','1',18,6),(27,'400','1',18,4),(28,'750','3',19,7),(29,'2400','6',20,4);
/*!40000 ALTER TABLE `ventasproductos` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-03-06 20:37:06


