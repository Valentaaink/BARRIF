-- MySQL dump 10.13  Distrib 8.0.26, for Win64 (x86_64)
--
-- Host: localhost    Database: barrif
-- ------------------------------------------------------
-- Server version	8.0.26

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
-- Table structure for table `administradores`
--

DROP TABLE IF EXISTS `administradores`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `administradores` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre_de_usuario` varchar(50) NOT NULL,
  `contraseña` varchar(255) NOT NULL,
  `dia_de_creacion` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nombre_de_usuario` (`nombre_de_usuario`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `administradores`
--

LOCK TABLES `administradores` WRITE;
/*!40000 ALTER TABLE `administradores` DISABLE KEYS */;
INSERT INTO `administradores` VALUES (2,'Robert','$2y$10$wbQdq9ZZan31ko4y5EVAIuLf4Lo7yFuv477ZuUm45MKdAujol.5/O','2023-11-02 17:58:45');
/*!40000 ALTER TABLE `administradores` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `galeria`
--

DROP TABLE IF EXISTS `galeria`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `galeria` (
  `id` int NOT NULL AUTO_INCREMENT,
  `imagen` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `galeria`
--

LOCK TABLES `galeria` WRITE;
/*!40000 ALTER TABLE `galeria` DISABLE KEYS */;
INSERT INTO `galeria` VALUES (1,'2.png','Foto 1de la galeria ','Esta es la primer foto que se muestra en la galeria '),(2,'1.png','Foto 2','Segunda Imagen de la galeria'),(3,'Gallery/3.png','Foto 3','Tercera foto en la galeria\r\n'),(4,'Gallery/4.png','Foto 4','Cuarta foto de la galeria '),(5,'Gallery/5.png','Foto 5','Quinta foto en la galeria'),(6,'Gallery/6.png','Foto 6','Sexta foto en la galeria '),(7,'Gallery/7.png','Foto 7','Septima foto en la galeria\r\n'),(8,'Gallery/7.jpg','Foto 8 ','Octava foto en la galeria ');
/*!40000 ALTER TABLE `galeria` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `servicios`
--

DROP TABLE IF EXISTS `servicios`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `servicios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `imagen` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `servicios`
--

LOCK TABLES `servicios` WRITE;
/*!40000 ALTER TABLE `servicios` DISABLE KEYS */;
INSERT INTO `servicios` VALUES (1,'servicios1.jpg','INGENIERÍA','• Ingeniería, diseño e implementación de plantas de tratamiento de agua residual.\r\n\r\n• Instalación y mantenimiento de equipos de aire acondicionado.\r\n\r\n• Ejecución de obras civiles.\r\n\r\n• Consultoría y supervisión de obras civiles.\r\n\r\n• Instalación de luces de emergencia para empresas industriales.'),(2,'about.jpg','MEDIO AMBIENTE.','• Monitoreo de Aire, material particulado y gases.\r\n\r\n• Medición de Emisiones gaseosas.\r\n\r\n• Monitoreo Biológico.\r\n\r\n• Medición de Ruido Ambiental.\r\n\r\n• Monitoreo de Aguas residuales y de efluentes líquidos.\r\n\r\n• Muestreo de Suelos.\r\n\r\n• Medición de Parámetros meteorológicos'),(3,'servicios2.jpg','INSTRUMENTOS GESTIÓN AMBIENTAL','Los estudios de impacto ambiental tienen particularidades según el sector al que pertenece el proyecto de inversión.\r\n\r\n• Estudio de impacto ambiental detallado (EIA-d).\r\n\r\n• Estudio de impacto ambiental semidetallado (EIA-sd).\r\n\r\n• Declaración de impacto ambiental (DIA\r\n\r\n• Declaración de adecuación ambiental (DAA).\r\n\r\n• Programa de adecuación y manejo ambiental (PAMA).'),(4,'004.jpg','CAPACITACIONES','Nuestro servicio de capacitación y certificación está alineado a los requisitos exigidos por el MINTRA, SUNAFIL, normativa legal vigente (Ley Nº 29783, Ley de Seguridad y Salud en el Trabajo) y normas internacionales de acuerdo a las necesidades y riesgos laborales de su sector u organización.\r\n\r\nCapacitaciones:\r\n\r\n• Formación de brigadas de emergencia.\r\n\r\n• Trabajos de alto riesgo'),(5,'servicios3.jpg','SEGURIDAD Y SALUD EN EL TRABAJO','• Implementación del Sistema de Gestión de Seguridad y Salud en el Trabajo, según la ley 29783..\r\n\r\n• Auditoria MINTRA.\r\n\r\n• Homologación de proveedores.\r\n\r\n• Elaboración del diagnóstico situacional y programa de monitoreo.\r\n\r\n• Elaboración del reglamento interno y formación del comité de SST.\r\n\r\n• Elaboración de la Matriz IPERC y mapa de riesgos.\r\n\r\n• Creación del Plan anual de SST y auditoría del sistema de gestión.\r\n\r\n• Diseño y seguimiento de registros del SGSST.\r\n\r\n• 4 capacitaciones obligatorias y capacitaciones específicas.\r\n\r\n• Elaboración de procedimientos, formatos, instructivos y PETS.'),(6,'servicios4.jpg','GESTIÓN DE LICENCIAS MUNICIPALES','El trámite para la licencia de funcionamiento puede ser complicado, pero con nuestra asesoría podrás acceder a ella independientemente del distrito donde te ubiques, nosotros de ayudamos en la gestión documentaria, acondicionamiento del lugar como luces de emergencia, detectores de humo, extintores, conexión eléctrica, mapa de riesgo y plan de contingencia, estos son solo algunos de los requisitos que te solicita la municipalidad.\r\n\r\n• Asesoría y gestión de licencia de funcionamiento municipal.\r\n\r\n• Certificado de Inspección Técnica de Seguridad en Edificaciones (ITSE).\r\n\r\n'),(7,'servicios5.jpg','PANELES SOLARES','Barrif ofrece una alternativa sostenible para acceso a energía eléctrica o energía térmica a través de paneles solares fotovoltaicos. Algunos de los beneficios de los paneles solares son: Autosuficiencia energética, energía limpia, energía renovable, bajo coste de mantenimiento, no emite ruidos y ahorrará mucho dinero.\r\n\r\nNuestros servicios para proyectos de paneles solares:\r\n\r\n• Instalación de paneles solares en viviendas, colegios y empresas.\r\n\r\n• Mantenimiento de paneles solares.\r\n\r\n• Cálculo para la implementación de paneles solares de acuerdo al consumo.'),(8,'4.png','MONITOREO OCUPACIONAL','• Monitoreo de agentes físicos.\r\n\r\n• Monitoreo de agentes químicos.\r\n\r\n• Monitoreo de agentes biológicos.\r\n\r\n• Monitoreos disergonómicos.\r\n\r\n• Monitoreo de riesgo psicosocial.');
/*!40000 ALTER TABLE `servicios` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2023-11-08 18:57:49
