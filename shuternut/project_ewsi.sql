/*
SQLyog Ultimate v9.63 
MySQL - 5.7.26 : Database - project_ewsi
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`project_ewsi` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `project_ewsi`;

/*Table structure for table `crop` */

DROP TABLE IF EXISTS `crop`;

CREATE TABLE `crop` (
  `id` varchar(6) NOT NULL,
  `nama_crop` varchar(20) NOT NULL,
  `kc_awal` float DEFAULT NULL,
  `kc_tengah` float DEFAULT NULL,
  `kc_akhir` float DEFAULT NULL,
  `hr_awal` varchar(20) DEFAULT NULL,
  `hr_tengah` varchar(20) DEFAULT NULL,
  `hr_akhir` varchar(20) DEFAULT NULL,
  `p` float DEFAULT NULL,
  `j_awal` int(11) DEFAULT NULL,
  `j_tengah` int(11) DEFAULT NULL,
  `j_akhir` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `crop` */

insert  into `crop`(`id`,`nama_crop`,`kc_awal`,`kc_tengah`,`kc_akhir`,`hr_awal`,`hr_tengah`,`hr_akhir`,`p`,`j_awal`,`j_tengah`,`j_akhir`) values ('CB','Peppers',0.6,1.05,0.9,'2 - 30 HST','31 - 105 HST','106 - 145 HST',0.3,30,75,40),('KE','Cucumber',0.6,1,0.75,'2 - 20 HST','21 - 45 HST','46 - 60 HST',0.5,20,25,15),('LL','Lettuce',0.7,1,0.95,'2 - 20 HST','21 - 65 HST','66 - 75 HST',0.3,20,45,10),('ME','Melon',0.5,1.05,0.75,'2 - 15 HST','16 - 55 HST','56 - 65 HST',0.4,15,40,10),('TO','Tomato',0.6,1.15,0.8,'2 - 30 HST','31 - 110 HST','111 - 135 HST',0.4,30,80,25),('TP','Egg Plant',0.6,1.15,0.8,'2 - 30 HST','31 - 110 HST','111 - 130 HST',0.45,30,80,20);

/*Table structure for table `karakter_tanah` */

DROP TABLE IF EXISTS `karakter_tanah`;

CREATE TABLE `karakter_tanah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `crop_id` varchar(5) NOT NULL,
  `media_id` varchar(2) NOT NULL,
  `wadah_id` int(11) NOT NULL,
  `lokasi_id` varchar(6) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `crop_id` (`crop_id`),
  KEY `lokasi_id` (`lokasi_id`),
  KEY `media_id` (`media_id`),
  KEY `wadah_id` (`wadah_id`),
  CONSTRAINT `karakter_tanah_ibfk_1` FOREIGN KEY (`crop_id`) REFERENCES `crop` (`id`),
  CONSTRAINT `karakter_tanah_ibfk_2` FOREIGN KEY (`lokasi_id`) REFERENCES `lokasi` (`id`),
  CONSTRAINT `karakter_tanah_ibfk_3` FOREIGN KEY (`media_id`) REFERENCES `media` (`id`),
  CONSTRAINT `karakter_tanah_ibfk_4` FOREIGN KEY (`wadah_id`) REFERENCES `wadah` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=523 DEFAULT CHARSET=latin1;

/*Data for the table `karakter_tanah` */

insert  into `karakter_tanah`(`id`,`crop_id`,`media_id`,`wadah_id`,`lokasi_id`) values (1,'ME','M3',1,'KBU'),(2,'ME','M3',2,'KBU'),(3,'ME','M3',3,'KBU'),(4,'ME','M3',4,'KBU'),(5,'ME','M3',5,'KBU'),(6,'ME','M3',6,'KBU'),(7,'ME','M3',7,'KBU'),(8,'ME','M3',8,'KBU'),(9,'ME','M3',9,'KBU'),(10,'TO','M3',1,'KBU'),(11,'TO','M3',2,'KBU'),(12,'TO','M3',3,'KBU'),(13,'TO','M3',4,'KBU'),(14,'TO','M3',5,'KBU'),(15,'TO','M3',6,'KBU'),(16,'TO','M3',7,'KBU'),(17,'TO','M3',8,'KBU'),(18,'TO','M3',9,'KBU'),(19,'TP','M3',1,'KBU'),(20,'TP','M3',2,'KBU'),(21,'TP','M3',3,'KBU'),(22,'TP','M3',4,'KBU'),(23,'TP','M3',5,'KBU'),(24,'TP','M3',6,'KBU'),(25,'TP','M3',7,'KBU'),(26,'TP','M3',8,'KBU'),(27,'TP','M3',9,'KBU'),(28,'LL','M3',1,'KBU'),(29,'LL','M3',2,'KBU'),(30,'LL','M3',3,'KBU'),(31,'LL','M3',4,'KBU'),(32,'LL','M3',5,'KBU'),(33,'LL','M3',6,'KBU'),(34,'LL','M3',7,'KBU'),(35,'LL','M3',8,'KBU'),(36,'LL','M3',9,'KBU'),(37,'CB','M3',1,'KBU'),(38,'CB','M3',2,'KBU'),(39,'CB','M3',3,'KBU'),(40,'CB','M3',4,'KBU'),(41,'CB','M3',5,'KBU'),(42,'CB','M3',6,'KBU'),(43,'CB','M3',7,'KBU'),(44,'CB','M3',8,'KBU'),(45,'CB','M3',9,'KBU'),(55,'KE','M3',1,'KBU'),(56,'KE','M3',2,'KBU'),(57,'KE','M3',3,'KBU'),(58,'KE','M3',4,'KBU'),(59,'KE','M3',5,'KBU'),(60,'KE','M3',6,'KBU'),(61,'KE','M3',7,'KBU'),(62,'KE','M3',8,'KBU'),(63,'KE','M3',9,'KBU'),(73,'TO','M3',1,'KBW'),(74,'TO','M3',2,'KBW'),(75,'TO','M3',3,'KBW'),(76,'TO','M3',4,'KBW'),(77,'TO','M3',5,'KBW'),(78,'TO','M3',6,'KBW'),(79,'TO','M3',7,'KBW'),(80,'TO','M3',8,'KBW'),(81,'TO','M3',9,'KBW'),(82,'TP','M3',1,'KBW'),(83,'TP','M3',2,'KBW'),(84,'TP','M3',3,'KBW'),(85,'TP','M3',4,'KBW'),(86,'TP','M3',5,'KBW'),(87,'TP','M3',6,'KBW'),(88,'TP','M3',7,'KBW'),(89,'TP','M3',8,'KBW'),(90,'TP','M3',9,'KBW'),(91,'LL','M3',1,'KBW'),(92,'LL','M3',2,'KBW'),(93,'LL','M3',3,'KBW'),(94,'LL','M3',4,'KBW'),(95,'LL','M3',5,'KBW'),(96,'LL','M3',6,'KBW'),(97,'LL','M3',7,'KBW'),(98,'LL','M3',8,'KBW'),(99,'LL','M3',9,'KBW'),(100,'CB','M3',1,'KBW'),(101,'CB','M3',2,'KBW'),(102,'CB','M3',3,'KBW'),(103,'CB','M3',4,'KBW'),(104,'CB','M3',5,'KBW'),(105,'CB','M3',6,'KBW'),(106,'CB','M3',7,'KBW'),(107,'CB','M3',8,'KBW'),(108,'CB','M3',9,'KBW'),(109,'ME','M3',1,'KBW'),(110,'ME','M3',2,'KBW'),(111,'ME','M3',3,'KBW'),(112,'ME','M3',4,'KBW'),(113,'ME','M3',5,'KBW'),(114,'ME','M3',6,'KBW'),(115,'ME','M3',7,'KBW'),(116,'ME','M3',8,'KBW'),(117,'ME','M3',9,'KBW'),(118,'KE','M3',1,'KBW'),(119,'KE','M3',2,'KBW'),(120,'KE','M3',3,'KBW'),(121,'KE','M3',4,'KBW'),(122,'KE','M3',5,'KBW'),(123,'KE','M3',6,'KBW'),(124,'KE','M3',7,'KBW'),(125,'KE','M3',8,'KBW'),(126,'KE','M3',9,'KBW'),(136,'TO','M3',1,'KBL'),(137,'TO','M3',2,'KBL'),(138,'TO','M3',3,'KBL'),(139,'TO','M3',4,'KBL'),(140,'TO','M3',5,'KBL'),(141,'TO','M3',6,'KBL'),(142,'TO','M3',7,'KBL'),(143,'TO','M3',8,'KBL'),(144,'TO','M3',9,'KBL'),(145,'TP','M3',1,'KBL'),(146,'TP','M3',2,'KBL'),(147,'TP','M3',3,'KBL'),(148,'TP','M3',4,'KBL'),(149,'TP','M3',5,'KBL'),(150,'TP','M3',6,'KBL'),(151,'TP','M3',7,'KBL'),(152,'TP','M3',8,'KBL'),(153,'TP','M3',9,'KBL'),(154,'LL','M3',1,'KBL'),(155,'LL','M3',2,'KBL'),(156,'LL','M3',3,'KBL'),(157,'LL','M3',4,'KBL'),(158,'LL','M3',5,'KBL'),(159,'LL','M3',6,'KBL'),(160,'LL','M3',7,'KBL'),(161,'LL','M3',8,'KBL'),(162,'LL','M3',9,'KBL'),(163,'CB','M3',1,'KBL'),(164,'CB','M3',2,'KBL'),(165,'CB','M3',3,'KBL'),(166,'CB','M3',4,'KBL'),(167,'CB','M3',5,'KBL'),(168,'CB','M3',6,'KBL'),(169,'CB','M3',7,'KBL'),(170,'CB','M3',8,'KBL'),(171,'CB','M3',9,'KBL'),(172,'ME','M3',1,'KBL'),(173,'ME','M3',2,'KBL'),(174,'ME','M3',3,'KBL'),(175,'ME','M3',4,'KBL'),(176,'ME','M3',5,'KBL'),(177,'ME','M3',6,'KBL'),(178,'ME','M3',7,'KBL'),(179,'ME','M3',8,'KBL'),(180,'ME','M3',9,'KBL'),(181,'KE','M3',1,'KBL'),(182,'KE','M3',2,'KBL'),(183,'KE','M3',3,'KBL'),(184,'KE','M3',4,'KBL'),(185,'KE','M3',5,'KBL'),(186,'KE','M3',6,'KBL'),(187,'KE','M3',7,'KBL'),(188,'KE','M3',8,'KBL'),(189,'KE','M3',9,'KBL'),(199,'ME','M2',1,'KBU'),(200,'ME','M2',2,'KBU'),(201,'ME','M2',3,'KBU'),(202,'ME','M2',4,'KBU'),(203,'ME','M2',5,'KBU'),(204,'ME','M2',6,'KBU'),(205,'ME','M2',7,'KBU'),(206,'ME','M2',8,'KBU'),(207,'ME','M2',9,'KBU'),(208,'ME','M2',1,'KBW'),(209,'ME','M2',2,'KBW'),(210,'ME','M2',3,'KBW'),(211,'ME','M2',4,'KBW'),(212,'ME','M2',5,'KBW'),(213,'ME','M2',6,'KBW'),(214,'ME','M2',7,'KBW'),(215,'ME','M2',8,'KBW'),(216,'ME','M2',9,'KBW'),(217,'ME','M2',1,'KBL'),(218,'ME','M2',2,'KBL'),(219,'ME','M2',3,'KBL'),(220,'ME','M2',4,'KBL'),(221,'ME','M2',5,'KBL'),(222,'ME','M2',6,'KBL'),(223,'ME','M2',7,'KBL'),(224,'ME','M2',8,'KBL'),(225,'ME','M2',9,'KBL'),(226,'TO','M2',1,'KBU'),(227,'TO','M2',2,'KBU'),(228,'TO','M2',3,'KBU'),(229,'TO','M2',4,'KBU'),(230,'TO','M2',5,'KBU'),(231,'TO','M2',6,'KBU'),(232,'TO','M2',7,'KBU'),(233,'TO','M2',8,'KBU'),(234,'TO','M2',9,'KBU'),(235,'TO','M2',1,'KBW'),(236,'TO','M2',2,'KBW'),(237,'TO','M2',3,'KBW'),(238,'TO','M2',4,'KBW'),(239,'TO','M2',5,'KBW'),(240,'TO','M2',6,'KBW'),(241,'TO','M2',7,'KBW'),(242,'TO','M2',8,'KBW'),(243,'TO','M2',9,'KBW'),(244,'TO','M2',1,'KBL'),(245,'TO','M2',2,'KBL'),(246,'TO','M2',3,'KBL'),(247,'TO','M2',4,'KBL'),(248,'TO','M2',5,'KBL'),(249,'TO','M2',6,'KBL'),(250,'TO','M2',7,'KBL'),(251,'TO','M2',8,'KBL'),(252,'TO','M2',9,'KBL'),(253,'TP','M2',1,'KBU'),(254,'TP','M2',2,'KBU'),(255,'TP','M2',3,'KBU'),(256,'TP','M2',4,'KBU'),(257,'TP','M2',5,'KBU'),(258,'TP','M2',6,'KBU'),(259,'TP','M2',7,'KBU'),(260,'TP','M2',8,'KBU'),(261,'TP','M2',9,'KBU'),(262,'TP','M2',1,'KBW'),(263,'TP','M2',2,'KBW'),(264,'TP','M2',3,'KBW'),(265,'TP','M2',4,'KBW'),(266,'TP','M2',5,'KBW'),(267,'TP','M2',6,'KBW'),(268,'TP','M2',7,'KBW'),(269,'TP','M2',8,'KBW'),(270,'TP','M2',9,'KBW'),(271,'TP','M2',1,'KBL'),(272,'TP','M2',2,'KBL'),(273,'TP','M2',3,'KBL'),(274,'TP','M2',4,'KBL'),(275,'TP','M2',5,'KBL'),(276,'TP','M2',6,'KBL'),(277,'TP','M2',7,'KBL'),(278,'TP','M2',8,'KBL'),(279,'TP','M2',9,'KBL'),(280,'LL','M2',1,'KBU'),(281,'LL','M2',2,'KBU'),(282,'LL','M2',3,'KBU'),(283,'LL','M2',4,'KBU'),(284,'LL','M2',5,'KBU'),(285,'LL','M2',6,'KBU'),(286,'LL','M2',7,'KBU'),(287,'LL','M2',8,'KBU'),(288,'LL','M2',9,'KBU'),(289,'LL','M2',1,'KBW'),(290,'LL','M2',2,'KBW'),(291,'LL','M2',3,'KBW'),(292,'LL','M2',4,'KBW'),(293,'LL','M2',5,'KBW'),(294,'LL','M2',6,'KBW'),(295,'LL','M2',7,'KBW'),(296,'LL','M2',8,'KBW'),(297,'LL','M2',9,'KBW'),(298,'LL','M2',1,'KBL'),(299,'LL','M2',2,'KBL'),(300,'LL','M2',3,'KBL'),(301,'LL','M2',4,'KBL'),(302,'LL','M2',5,'KBL'),(303,'LL','M2',6,'KBL'),(304,'LL','M2',7,'KBL'),(305,'LL','M2',8,'KBL'),(306,'LL','M2',9,'KBL'),(307,'CB','M2',1,'KBU'),(308,'CB','M2',2,'KBU'),(309,'CB','M2',3,'KBU'),(310,'CB','M2',4,'KBU'),(311,'CB','M2',5,'KBU'),(312,'CB','M2',6,'KBU'),(313,'CB','M2',7,'KBU'),(314,'CB','M2',8,'KBU'),(315,'CB','M2',9,'KBU'),(316,'CB','M2',1,'KBW'),(317,'CB','M2',2,'KBW'),(318,'CB','M2',3,'KBW'),(319,'CB','M2',4,'KBW'),(320,'CB','M2',5,'KBW'),(321,'CB','M2',6,'KBW'),(322,'CB','M2',7,'KBW'),(323,'CB','M2',8,'KBW'),(324,'CB','M2',9,'KBW'),(325,'CB','M2',1,'KBL'),(326,'CB','M2',2,'KBL'),(327,'CB','M2',3,'KBL'),(328,'CB','M2',4,'KBL'),(329,'CB','M2',5,'KBL'),(330,'CB','M2',6,'KBL'),(331,'CB','M2',7,'KBL'),(332,'CB','M2',8,'KBL'),(333,'CB','M2',9,'KBL'),(334,'KE','M2',1,'KBU'),(335,'KE','M2',2,'KBU'),(336,'KE','M2',3,'KBU'),(337,'KE','M2',4,'KBU'),(338,'KE','M2',5,'KBU'),(339,'KE','M2',6,'KBU'),(340,'KE','M2',7,'KBU'),(341,'KE','M2',8,'KBU'),(342,'KE','M2',9,'KBU'),(343,'KE','M2',1,'KBW'),(344,'KE','M2',2,'KBW'),(345,'KE','M2',3,'KBW'),(346,'KE','M2',4,'KBW'),(347,'KE','M2',5,'KBW'),(348,'KE','M2',6,'KBW'),(349,'KE','M2',7,'KBW'),(350,'KE','M2',8,'KBW'),(351,'KE','M2',9,'KBW'),(352,'KE','M2',1,'KBL'),(353,'KE','M2',2,'KBL'),(354,'KE','M2',3,'KBL'),(355,'KE','M2',4,'KBL'),(356,'KE','M2',5,'KBL'),(357,'KE','M2',6,'KBL'),(358,'KE','M2',7,'KBL'),(359,'KE','M2',8,'KBL'),(360,'KE','M2',9,'KBL'),(361,'KE','M1',1,'KBU'),(362,'KE','M1',2,'KBU'),(363,'KE','M1',3,'KBU'),(364,'KE','M1',4,'KBU'),(365,'KE','M1',5,'KBU'),(366,'KE','M1',6,'KBU'),(367,'KE','M1',7,'KBU'),(368,'KE','M1',8,'KBU'),(369,'KE','M1',9,'KBU'),(370,'KE','M1',1,'KBW'),(371,'KE','M1',2,'KBW'),(372,'KE','M1',3,'KBW'),(373,'KE','M1',4,'KBW'),(374,'KE','M1',5,'KBW'),(375,'KE','M1',6,'KBW'),(376,'KE','M1',7,'KBW'),(377,'KE','M1',8,'KBW'),(378,'KE','M1',9,'KBW'),(379,'KE','M1',1,'KBL'),(380,'KE','M1',2,'KBL'),(381,'KE','M1',3,'KBL'),(382,'KE','M1',4,'KBL'),(383,'KE','M1',5,'KBL'),(384,'KE','M1',6,'KBL'),(385,'KE','M1',7,'KBL'),(386,'KE','M1',8,'KBL'),(387,'KE','M1',9,'KBL'),(388,'CB','M1',1,'KBU'),(389,'CB','M1',2,'KBU'),(390,'CB','M1',3,'KBU'),(391,'CB','M1',4,'KBU'),(392,'CB','M1',5,'KBU'),(393,'CB','M1',6,'KBU'),(394,'CB','M1',7,'KBU'),(395,'CB','M1',8,'KBU'),(396,'CB','M1',9,'KBU'),(397,'CB','M1',1,'KBW'),(398,'CB','M1',2,'KBW'),(399,'CB','M1',3,'KBW'),(400,'CB','M1',4,'KBW'),(401,'CB','M1',5,'KBW'),(402,'CB','M1',6,'KBW'),(403,'CB','M1',7,'KBW'),(404,'CB','M1',8,'KBW'),(405,'CB','M1',9,'KBW'),(406,'CB','M1',1,'KBL'),(407,'CB','M1',2,'KBL'),(408,'CB','M1',3,'KBL'),(409,'CB','M1',4,'KBL'),(410,'CB','M1',5,'KBL'),(411,'CB','M1',6,'KBL'),(412,'CB','M1',7,'KBL'),(413,'CB','M1',8,'KBL'),(414,'CB','M1',9,'KBL'),(415,'LL','M1',1,'KBU'),(416,'LL','M1',2,'KBU'),(417,'LL','M1',3,'KBU'),(418,'LL','M1',4,'KBU'),(419,'LL','M1',5,'KBU'),(420,'LL','M1',6,'KBU'),(421,'LL','M1',7,'KBU'),(422,'LL','M1',8,'KBU'),(423,'LL','M1',9,'KBU'),(424,'LL','M1',1,'KBW'),(425,'LL','M1',2,'KBW'),(426,'LL','M1',3,'KBW'),(427,'LL','M1',4,'KBW'),(428,'LL','M1',5,'KBW'),(429,'LL','M1',6,'KBW'),(430,'LL','M1',7,'KBW'),(431,'LL','M1',8,'KBW'),(432,'LL','M1',9,'KBW'),(433,'LL','M1',1,'KBL'),(434,'LL','M1',2,'KBL'),(435,'LL','M1',3,'KBL'),(436,'LL','M1',4,'KBL'),(437,'LL','M1',5,'KBL'),(438,'LL','M1',6,'KBL'),(439,'LL','M1',7,'KBL'),(440,'LL','M1',8,'KBL'),(441,'LL','M1',9,'KBL'),(442,'TP','M1',1,'KBU'),(443,'TP','M1',2,'KBU'),(444,'TP','M1',3,'KBU'),(445,'TP','M1',4,'KBU'),(446,'TP','M1',5,'KBU'),(447,'TP','M1',6,'KBU'),(448,'TP','M1',7,'KBU'),(449,'TP','M1',8,'KBU'),(450,'TP','M1',9,'KBU'),(451,'TP','M1',1,'KBW'),(452,'TP','M1',2,'KBW'),(453,'TP','M1',3,'KBW'),(454,'TP','M1',4,'KBW'),(455,'TP','M1',5,'KBW'),(456,'TP','M1',6,'KBW'),(457,'TP','M1',7,'KBW'),(458,'TP','M1',8,'KBW'),(459,'TP','M1',9,'KBW'),(460,'TP','M1',1,'KBL'),(461,'TP','M1',2,'KBL'),(462,'TP','M1',3,'KBL'),(463,'TP','M1',4,'KBL'),(464,'TP','M1',5,'KBL'),(465,'TP','M1',6,'KBL'),(466,'TP','M1',7,'KBL'),(467,'TP','M1',8,'KBL'),(468,'TP','M1',9,'KBL'),(469,'TO','M1',1,'KBU'),(470,'TO','M1',2,'KBU'),(471,'TO','M1',3,'KBU'),(472,'TO','M1',4,'KBU'),(473,'TO','M1',5,'KBU'),(474,'TO','M1',6,'KBU'),(475,'TO','M1',7,'KBU'),(476,'TO','M1',8,'KBU'),(477,'TO','M1',9,'KBU'),(478,'TO','M1',1,'KBW'),(479,'TO','M1',2,'KBW'),(480,'TO','M1',3,'KBW'),(481,'TO','M1',4,'KBW'),(482,'TO','M1',5,'KBW'),(483,'TO','M1',6,'KBW'),(484,'TO','M1',7,'KBW'),(485,'TO','M1',8,'KBW'),(486,'TO','M1',9,'KBW'),(487,'TO','M1',1,'KBL'),(488,'TO','M1',2,'KBL'),(489,'TO','M1',3,'KBL'),(490,'TO','M1',4,'KBL'),(491,'TO','M1',5,'KBL'),(492,'TO','M1',6,'KBL'),(493,'TO','M1',7,'KBL'),(494,'TO','M1',8,'KBL'),(495,'TO','M1',9,'KBL'),(496,'ME','M1',1,'KBU'),(497,'ME','M1',2,'KBU'),(498,'ME','M1',3,'KBU'),(499,'ME','M1',4,'KBU'),(500,'ME','M1',5,'KBU'),(501,'ME','M1',6,'KBU'),(502,'ME','M1',7,'KBU'),(503,'ME','M1',8,'KBU'),(504,'ME','M1',9,'KBU'),(505,'ME','M1',1,'KBW'),(506,'ME','M1',2,'KBW'),(507,'ME','M1',3,'KBW'),(508,'ME','M1',4,'KBW'),(509,'ME','M1',5,'KBW'),(510,'ME','M1',6,'KBW'),(511,'ME','M1',7,'KBW'),(512,'ME','M1',8,'KBW'),(513,'ME','M1',9,'KBW'),(514,'ME','M1',1,'KBL'),(515,'ME','M1',2,'KBL'),(516,'ME','M1',3,'KBL'),(517,'ME','M1',4,'KBL'),(518,'ME','M1',5,'KBL'),(519,'ME','M1',6,'KBL'),(520,'ME','M1',7,'KBL'),(521,'ME','M1',8,'KBL'),(522,'ME','M1',9,'KBL');

/*Table structure for table `lokasi` */

DROP TABLE IF EXISTS `lokasi`;

CREATE TABLE `lokasi` (
  `id` varchar(3) NOT NULL,
  `nama_lokasi` varchar(30) NOT NULL,
  `ket_lokasi` varchar(50) DEFAULT NULL,
  `et_suhu` float DEFAULT NULL,
  `et_lembab` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `lokasi` */

insert  into `lokasi`(`id`,`nama_lokasi`,`ket_lokasi`,`et_suhu`,`et_lembab`) values ('KBL','Kebun Benih Lembang','Dataran Tinggi',0.05,0.03),('KBU','Kebun Benih Utama','Dataran rendah',0.03,0.058),('KBW','Kebun Benih Wanayasa','Dataran Menengah',0.04,0.045);

/*Table structure for table `media` */

DROP TABLE IF EXISTS `media`;

CREATE TABLE `media` (
  `id` varchar(2) NOT NULL,
  `jenis_media` varchar(30) NOT NULL,
  `kering_angin` float DEFAULT NULL,
  `kapasitas_lapang` float DEFAULT NULL,
  `titik_layu_permanen` float DEFAULT NULL,
  `air_tanah_tersedia` float DEFAULT NULL,
  `berat_jenis` float DEFAULT NULL,
  `porositas` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `media` */

insert  into `media`(`id`,`jenis_media`,`kering_angin`,`kapasitas_lapang`,`titik_layu_permanen`,`air_tanah_tersedia`,`berat_jenis`,`porositas`) values ('M1','Tanah + Sekam',19.19,65.56,19.41,46.15,0.86,34.7),('M2','Tanah + Cocopeat',18.91,74.58,18.83,55.75,1.11,29.03),('M3','Tanah + Sekam + Bokasi',19.7,71.74,20.97,50.77,0.9,35.25);

/*Table structure for table `nutrisi` */

DROP TABLE IF EXISTS `nutrisi`;

CREATE TABLE `nutrisi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `crop_id` varchar(6) DEFAULT NULL,
  `pupuk_id` int(11) DEFAULT NULL,
  `larutan_stock` int(11) DEFAULT NULL,
  `komponen` enum('A','B') DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `crop_id` (`crop_id`),
  KEY `pupuk_id` (`pupuk_id`),
  CONSTRAINT `nutrisi_ibfk_1` FOREIGN KEY (`crop_id`) REFERENCES `crop` (`id`),
  CONSTRAINT `nutrisi_ibfk_3` FOREIGN KEY (`pupuk_id`) REFERENCES `pupuk` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=222 DEFAULT CHARSET=latin1;

/*Data for the table `nutrisi` */

insert  into `nutrisi`(`id`,`crop_id`,`pupuk_id`,`larutan_stock`,`komponen`) values (1,'ME',1,32000000,'A'),(2,'ME',2,19000000,'A'),(3,'ME',3,465000,'A'),(4,'ME',4,86000,'A'),(5,'ME',5,44000,'A'),(6,'ME',6,13000,'A'),(7,'ME',10,21000000,'B'),(8,'ME',7,25000000,'B'),(9,'ME',8,6000000,'B'),(11,'ME',9,96000,'B'),(12,'CB',1,113000000,'A'),(13,'CB',11,4000000,'B'),(14,'CB',3,2793000,'A'),(15,'CB',4,429000,'A'),(16,'CB',5,221000,'A'),(17,'CB',6,43000,'A'),(18,'CB',10,45000000,'B'),(19,'CB',12,17000000,'B'),(20,'CB',7,37000000,'B'),(21,'CB',9,287000,'B'),(22,'KE',1,97000000,'A'),(23,'KE',2,13000000,'A'),(24,'KE',3,2793000,'A'),(25,'KE',4,429000,'A'),(26,'KE',5,221000,'A'),(27,'KE',6,32000,'A'),(28,'KE',10,56000000,'B'),(29,'KE',12,16000000,'B'),(30,'KE',7,37000000,'B'),(31,'KE',8,1000000,'A'),(32,'LL',1,97000000,'A'),(33,'LL',2,13000000,'A'),(34,'LL',3,3723000,'A'),(35,'LL',4,300000,'A'),(36,'LL',5,309000,'A'),(37,'LL',6,43000,'A'),(38,'LL',10,48000000,'B'),(39,'LL',11,17000000,'B'),(40,'LL',12,19000000,'B'),(41,'LL',7,25000000,'B'),(42,'TO',1,108000000,'A'),(43,'TO',2,20000000,'A'),(44,'TO',14,6000000,'A'),(45,'TO',3,2793000,'A'),(46,'TO',4,429000,'A'),(47,'TO',5,221000,'A'),(48,'TO',6,32000,'A'),(49,'TO',10,19000000,'B'),(50,'TO',11,35000000,'B'),(51,'TO',12,20000000,'B'),(52,'TP',1,81000000,'A'),(53,'TP',2,26000000,'A'),(54,'TP',3,1396000,'A'),(55,'TP',4,429000,'A'),(56,'TP',5,221000,'A'),(57,'TP',6,32000,'A'),(58,'TP',10,22000000,'B'),(59,'TP',12,17000000,'B'),(60,'TP',7,37000000,'B'),(61,'TP',15,32000000,'B'),(63,'TP',9,335000,'B'),(64,'TP',13,12000,'B'),(213,'CB',13,12000,'B'),(214,'KE',9,239000,'B'),(215,'KE',13,12000,'B'),(216,'LL',8,1000000,'B'),(217,'LL',9,383000,'B'),(218,'LL',13,24000,'B'),(219,'TO',7,59000000,'B'),(220,'TO',9,287000,'B'),(221,'TO',13,12000,'B');

/*Table structure for table `pupuk` */

DROP TABLE IF EXISTS `pupuk`;

CREATE TABLE `pupuk` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode` varchar(15) DEFAULT NULL,
  `nama_pupuk` varchar(100) NOT NULL,
  `kemasan` int(11) DEFAULT NULL,
  `harga_pupuk` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

/*Data for the table `pupuk` */

insert  into `pupuk`(`id`,`kode`,`nama_pupuk`,`kemasan`,`harga_pupuk`) values (1,'Ca(NO3)2','Calsium Nitrate',1000,13000),(2,'KNO3','Pottassium Nitrate',2000,44000),(3,'Fe','Iron',500,100000),(4,'Mn','Manganese',500,68000),(5,'Zn','Zinc',500,79000),(6,'Cu','Copper',500,107000),(7,'MgSO4','Magnesium Sulphate',1000,12000),(8,'MAP','Monoammonium Phosphate',1000,34000),(9,'B','Borax',100,37000),(10,'KNO3','Kalium Nitrate',2000,44000),(11,'K2SO4','Potassium Sulphate',1000,NULL),(12,'MKP','Monopotassium Posphate',1000,NULL),(13,'NaMo4','Sodium Molybdate',1000,NULL),(14,'CaCl2','Calcium Chloride',1000,NULL),(15,'Mg(NO3)2','Magnessium Nitrate',1000,NULL);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

/*Data for the table `user` */

insert  into `user`(`id_user`,`nama`,`username`,`password`,`akses_level`) values (1,'Supriadi','supriadi','922a91f0f07fde7d0ddeb7c731f5beb3b8098675','Admin'),(2,'Catur','catur','db2b6c645d4a2730658fb60330f670647635d112','Admin'),(4,'bambang','bambang','922a91f0f07fde7d0ddeb7c731f5beb3b8098675','Admin');

/*Table structure for table `wadah` */

DROP TABLE IF EXISTS `wadah`;

CREATE TABLE `wadah` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `wadah` varchar(20) NOT NULL,
  `jml_lubang` int(5) DEFAULT NULL,
  `luas_permukaan` float DEFAULT NULL,
  `bbt_tnh_krg_angin_l` float DEFAULT NULL,
  `bbt_tnh_krg_mutlak_l` float DEFAULT NULL,
  `bbt_tnh_krg_angin_t` float DEFAULT NULL,
  `bbt_tnh_krg_mutlak_t` float DEFAULT NULL,
  `ka_kps_lpg_t` float DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

/*Data for the table `wadah` */

insert  into `wadah`(`id`,`wadah`,`jml_lubang`,`luas_permukaan`,`bbt_tnh_krg_angin_l`,`bbt_tnh_krg_mutlak_l`,`bbt_tnh_krg_angin_t`,`bbt_tnh_krg_mutlak_t`,`ka_kps_lpg_t`) values (1,'Tray 50',50,20.25,18.48,15.53,924.16,729.4,523.27),(2,'Tray 105',105,9,26.75,22.48,1337.63,1097,786.99),(3,'Pot 7',1,38.47,93.11,78.24,NULL,NULL,NULL),(4,'Pot 12',1,113.04,306.42,257.5,NULL,NULL,NULL),(5,'Pot 15',1,176.63,500.22,420.35,NULL,NULL,NULL),(6,'Pot 20',1,314,860.28,722.92,NULL,NULL,NULL),(7,'Polybag 10',1,100,1050,882.35,NULL,NULL,NULL),(8,'Polybag 15',1,225,3543.75,2977.94,NULL,NULL,NULL),(9,'Polybag 20',1,400,8400,7058.82,NULL,NULL,NULL);

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
