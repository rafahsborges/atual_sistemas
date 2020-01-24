--
-- Table structure for table `remessa`
--

DROP TABLE IF EXISTS `remessa`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `remessa` (
  `id` decimal(9,0) NOT NULL,
  `data` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario` decimal(9,0) NOT NULL,
  `nome` varchar(30) CHARACTER SET utf8 NOT NULL,
  `sequencia` decimal(9,0) DEFAULT NULL,
  `id_conta` decimal(9,0) NOT NULL DEFAULT '2',
  PRIMARY KEY (`id`),
  KEY `fk_conta_remessa` (`id_conta`),
  CONSTRAINT `fk_conta_remessa` FOREIGN KEY (`id_conta`) REFERENCES `conta` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `remessa`
--

/*!40000 ALTER TABLE `remessa` DISABLE KEYS */;
INSERT INTO `remessa` (`id`, `data`, `id_usuario`, `nome`, `sequencia`, `id_conta`) VALUES (2,'2016-01-20 19:38:39',2,'CB200101.REM',2,2),(3,'2016-01-25 14:10:52',2,'CB250103.REM',3,2),(4,'2016-01-27 20:21:25',0,'CB270104.REM',1,2),(5,'2016-01-28 12:13:07',2,'CB280105.REM',5,1),(6,'2016-01-29 14:41:53',2,'CB290106.REM',6,2),(7,'2016-02-02 17:23:35',2,'CB020207.REM',7,2),(8,'2016-02-05 17:53:33',2,'CB050208.REM',1,2),(9,'2016-02-10 20:12:58',0,'CB1002',9,2),(10,'2016-02-11 17:30:39',2,'CB110210.REM',10,2),(11,'2016-02-14 10:56:28',2,'CB140211.REM',11,2),(12,'2016-02-18 05:35:33',2,'CB180212.REM',12,2),(13,'2016-02-18 18:59:58',2,'CB180213.REM',13,2),(14,'2016-02-21 18:37:17',2,'CB210214.REM',14,2),(15,'2016-02-23 20:27:08',2,'CB230215.REM',15,2),(16,'2016-02-26 11:00:33',0,'CB260216.REM',16,2),(17,'2016-02-28 19:25:52',2,'CB280217.REM',17,2),(18,'2016-03-01 15:24:59',2,'CB010318.REM',3,2),(19,'2016-03-03 08:07:53',2,'CB030319.REM',19,2),(20,'2016-03-03 18:36:36',2,'CB030320.REM',20,2),(21,'2016-03-04 11:04:58',0,'CB040321.REM',21,2),(22,'2016-03-07 17:24:01',2,'CB070322.REM',22,2),(23,'2016-03-10 14:28:57',2,'CB100323.REM',23,2),(24,'2016-03-12 09:54:46',2,'CB120324.REM',24,2),(25,'2016-03-12 18:41:23',2,'CB120325.REM',25,2),(26,'2016-03-14 17:59:59',2,'CB140326.REM',26,2),(27,'2016-03-16 21:40:28',2,'CB160327.REM',27,2),(28,'2016-03-18 19:27:22',2,'CB180328.REM',28,2),(29,'2016-03-21 09:51:41',2,'CB210329.REM',29,2),(30,'2016-03-22 20:30:11',0,'CB220330.REM',30,2),(31,'2016-03-23 12:22:26',2,'CB230331.REM',31,2),(32,'2016-03-26 18:35:10',2,'CB260332.REM',32,2),(33,'2016-03-27 12:06:47',2,'CB270333.REM',33,2),(34,'2016-03-30 09:41:34',2,'CB300334.REM',5,2),(35,'2016-04-04 08:46:05',2,'CB040435.REM',35,1),(36,'2016-04-04 08:46:24',2,'CB0404',36,2),(37,'2016-04-05 09:17:49',2,'CB050437.REM',37,1),(38,'2016-04-10 09:21:20',2,'CB100438.REM',38,1),(39,'2016-04-22 12:50:54',2,'CB220439.REM',39,1),(40,'2016-04-28 15:27:20',2,'CB2804',6,1),(41,'2016-05-03 11:21:40',2,'CB030541.REM',41,1),(42,'2016-05-05 17:23:43',2,'CB050542.REM',7,1),(43,'2016-05-10 13:19:06',2,'CB100543.REM',43,1),(44,'2016-05-12 10:38:53',2,'CB120544.REM',44,1),(45,'2016-05-15 18:35:55',2,'CB150545.REM',45,1),(46,'2016-05-19 10:45:09',2,'CB190546.REM',46,1),(47,'2016-05-21 10:26:54',2,'CB210547.REM',47,1),(48,'2016-05-27 11:10:19',2,'CB270548.REM',48,1),(49,'2016-05-30 19:44:34',2,'CB3005',49,1),(50,'2016-06-01 14:25:50',2,'CB010650.REM',50,2),(51,'2016-06-02 18:57:06',0,'CB020651.REM',51,2),(52,'2016-06-07 18:04:48',2,'CB070652.REM',52,1),(53,'2016-06-10 09:40:51',2,'CB1006',53,2),(54,'2016-06-13 16:27:09',2,'CB130654.REM',54,2),(55,'2016-06-14 17:58:38',2,'CB140655.REM',55,2),(56,'2016-06-16 12:35:40',2,'CB1606',56,2),(57,'2016-06-18 10:18:42',2,'CB180657.REM',57,2),(58,'2016-06-20 14:39:20',2,'CB2006',58,2),(59,'2016-06-27 15:38:06',2,'CB270659.REM',59,2),(60,'2016-06-29 08:53:22',2,'CB290660.REM',60,2),(61,'2016-07-01 09:05:40',0,'CB010761.REM',61,2),(62,'2016-07-04 11:58:22',0,'CB040762.REM',62,2),(63,'2016-07-04 12:47:21',2,'CB040763.REM',63,2),(64,'2016-07-06 15:00:24',2,'CB060764.REM',64,2),(65,'2016-07-11 08:53:28',2,'CB110765.REM',65,2),(66,'2016-07-14 15:51:03',0,'CB140766.REM',66,2),(67,'2016-07-15 09:41:53',2,'CB150767.REM',67,2),(68,'2016-07-19 13:11:40',2,'CB190768.REM',68,2),(69,'2016-07-22 11:44:37',2,'CB220769.REM',69,2),(70,'2016-07-26 09:00:07',2,'CB260770.REM',70,2),(71,'2016-07-26 15:36:15',2,'CB260771.REM',71,2),(72,'2016-08-01 14:55:33',2,'CB010872.REM',72,2),(73,'2016-08-03 10:00:43',2,'CB030873.REM',73,2),(74,'2016-08-08 08:56:15',2,'CB0808',74,2),(75,'2016-08-12 09:20:05',2,'CB120875.REM',12,2),(76,'2016-08-12 13:59:57',2,'CB120876.REM',76,2),(77,'2016-08-17 09:38:52',2,'CB170877.REM',77,2),(78,'2016-08-18 16:03:44',2,'CB180878.REM',13,2),(79,'2016-08-22 09:50:52',0,'CB220879.REM',79,2),(80,'2016-08-25 08:34:24',0,'CB250880.REM',80,2),(81,'2016-08-26 15:02:44',2,'CB260881.REM',81,2),(82,'2016-09-01 14:06:36',2,'CB010982.REM',82,2),(83,'2016-09-06 14:06:31',0,'CB060983.REM',83,1),(84,'2016-09-12 13:20:06',2,'CB120984.REM',84,1),(85,'2016-09-14 15:21:02',2,'CB140985.REM',85,1),(86,'2016-09-19 10:12:22',2,'CB190986.REM',86,1),(87,'2016-09-20 13:51:39',2,'CB200987.REM',14,1),(88,'2016-09-23 13:03:18',2,'CB230988.REM',88,1),(89,'2016-09-26 16:16:23',2,'CB260989.REM',89,1),(90,'2016-09-28 10:10:26',0,'CB280990.REM',90,1),(91,'2016-09-30 16:27:32',2,'CB300991.REM',91,1),(92,'2016-10-05 15:17:31',2,'CB051092.REM',92,1),(93,'2016-10-06 15:39:42',2,'CB0610',93,1),(94,'2016-10-17 15:00:33',2,'CB171094.REM',94,1),(95,'2016-10-21 11:44:10',2,'CB211095.REM',95,1),(96,'2016-10-24 15:49:28',2,'CB241096.REM',96,1),(97,'2016-10-26 15:20:50',2,'CB261097.REM',97,1),(98,'2016-10-31 14:28:46',2,'CB311098.REM',98,1),(99,'2016-11-03 15:53:35',2,'CB031199.REM',99,1),(100,'2016-11-07 12:00:45',2,'CB071101.REM',1,1),(101,'2016-11-10 11:03:28',2,'CB101102.REM',2,1),(102,'2016-11-16 11:21:28',2,'CB161103.REM',0,1),(103,'2016-11-18 13:46:31',2,'CB181104.REM',4,1),(104,'2016-11-18 19:09:02',2,'CB181105.REM',5,1),(105,'2016-11-22 17:59:00',0,'CB221106.REM',6,1),(106,'2016-11-28 18:41:43',2,'CB281107.REM',7,1),(107,'2016-12-01 14:37:54',2,'CB011208.REM',8,2),(108,'2016-12-01 15:35:43',0,'CB011209.REM',9,1),(109,'2016-12-09 16:45:14',2,'CB091210.REM',10,1),(110,'2016-12-14 14:30:29',2,'CB141211.REM',11,1),(111,'2016-12-17 19:12:09',0,'CB171212.REM',12,1),(112,'2016-12-27 15:32:56',2,'CB271213.REM',13,1),(113,'2016-12-29 14:37:09',2,'CB291214.REM',2,1),(114,'2017-01-04 13:52:22',2,'CB040115.REM',15,2),(115,'2017-01-06 15:25:51',2,'CB060116.REM',16,1),(116,'2017-01-09 15:52:30',2,'CB090117.REM',17,1),(117,'2017-01-14 08:01:18',2,'CB140118.REM',18,1),(118,'2017-01-17 14:52:57',2,'CB170119.REM',19,1),(119,'2017-01-18 17:06:23',2,'CB180120.REM',20,1),(120,'2017-01-21 08:50:59',2,'CB2101',3,1),(121,'2017-01-24 15:55:57',2,'CB240122.REM',22,1),(122,'2017-01-28 10:23:58',2,'CB2801',23,1),(123,'2017-02-01 10:55:22',2,'CB010224.REM',24,1),(124,'2017-02-06 13:31:14',2,'CB060225.REM',25,2),(125,'2017-02-06 13:37:39',2,'CB060226.REM',26,1),(126,'2017-02-12 16:16:20',2,'CB120227.REM',27,2),(127,'2017-02-13 12:56:59',2,'CB130228.REM',28,2),(128,'2017-02-20 16:10:09',2,'CB200229.REM',29,2),(129,'2017-02-23 08:19:42',2,'CB230230.REM',30,2),(130,'2017-03-01 16:09:18',2,'CB010331.REM',5,2),(131,'2017-03-04 12:25:58',0,'CB040332.REM',32,2),(132,'2017-03-06 13:17:14',2,'CB060333.REM',33,2),(133,'2017-03-10 08:50:46',0,'CB100334.REM',34,2),(134,'2017-03-13 13:37:20',2,'CB130335.REM',35,2),(135,'2017-03-13 15:31:55',2,'CB130336.REM',6,1),(136,'2017-03-20 06:39:06',2,'CB200337.REM',37,2),(137,'2017-03-23 13:37:58',2,'CB2303',38,2),(138,'2017-03-31 09:51:31',2,'CB310339.REM',6,2),(139,'2017-04-04 14:31:07',2,'CB040440.REM',40,2),(140,'2017-04-17 13:41:12',2,'CB170441.REM',41,2),(141,'2017-04-20 10:46:28',2,'CB200442.REM',42,2),(142,'2017-04-26 09:24:40',2,'CB260443.REM',43,2),(143,'2017-04-30 11:13:31',2,'CB300444.REM',44,2),(144,'2017-05-05 09:05:39',2,'CB050545.REM',45,2),(145,'2017-05-09 09:00:50',2,'CB090546.REM',46,2),(146,'2017-05-15 10:14:13',2,'CB150547.REM',47,2),(147,'2017-05-22 13:32:31',0,'CB220548.REM',48,2),(148,'2017-05-24 09:42:00',0,'CB240549.REM',49,2),(149,'2017-05-25 15:01:05',2,'CB250550.REM',50,2),(150,'2017-05-25 19:04:33',2,'CB250551.REM',51,2),(151,'2017-05-29 14:47:09',2,'CB290552.REM',52,2),(152,'2017-06-01 16:44:10',2,'CB010653.REM',53,2),(153,'2017-06-02 16:25:11',2,'CB020654.REM',54,2),(154,'2017-06-06 13:25:49',2,'CB060655.REM',55,2),(155,'2017-06-12 13:29:56',2,'CB120656.REM',56,2),(156,'2017-06-19 14:02:51',2,'CB190657.REM',57,2),(157,'2017-06-21 17:13:50',2,'CB210658.REM',58,2),(158,'2017-06-29 13:52:30',2,'CB290659.REM',9,2),(159,'2017-07-03 10:29:48',2,'CB030760.REM',60,2),(160,'2017-07-04 13:24:15',2,'CB040761.REM',61,2),(161,'2017-07-05 21:41:21',2,'CB050762.REM',62,2),(162,'2017-07-11 14:05:58',2,'CB110763.REM',63,2),(163,'2017-07-17 10:39:44',2,'CB170764.REM',64,2),(164,'2017-07-21 18:47:30',2,'CB210765.REM',65,2),(165,'2017-07-26 08:43:51',2,'CB260766.REM',11,2),(166,'2017-07-28 13:54:44',2,'CB280767.REM',67,2),(167,'2017-08-01 13:53:45',2,'CB010868.REM',68,2),(168,'2017-08-04 13:21:23',2,'CB040869.REM',69,2),(169,'2017-08-04 13:23:05',2,'CB040870.REM',70,1),(170,'2017-08-11 18:41:29',2,'CB110871.REM',11,1),(171,'2017-08-21 10:22:23',2,'CB210872.REM',72,1),(172,'2017-08-23 12:12:02',2,'CB230873.REM',73,1),(173,'2017-08-28 13:44:57',2,'CB280874.REM',74,1),(174,'2017-08-29 09:47:01',2,'CB290875.REM',75,1),(175,'2017-08-29 17:51:13',2,'CB2908',76,1),(176,'2017-09-04 13:52:40',0,'CB040977.REM',77,1),(177,'2017-09-04 14:19:22',2,'CB040978.REM',13,2),(178,'2017-09-11 06:32:40',2,'CB110979.REM',13,1),(179,'2017-09-12 11:51:11',2,'CB120980.REM',80,1),(180,'2017-09-13 13:36:44',2,'CB130981.REM',81,1),(181,'2017-09-18 17:23:16',2,'CB1809',82,1),(182,'2017-09-24 10:42:32',2,'CB240983.REM',83,1),(183,'2017-09-30 10:55:30',2,'CB300984.REM',84,1),(184,'2017-10-03 11:20:46',2,'CB031085.REM',85,2),(185,'2017-10-04 14:18:27',2,'CB041086.REM',86,1),(186,'2017-10-05 18:18:01',2,'CB051087.REM',87,1),(187,'2017-10-16 10:07:42',2,'CB161088.REM',88,1),(188,'2017-10-18 20:11:25',2,'CB181089.REM',89,1),(189,'2017-10-23 10:26:20',2,'CB231090.REM',90,1),(190,'2017-10-23 15:46:35',0,'CB231091.REM',91,1),(191,'2017-10-25 09:57:35',2,'CB251092.REM',92,1),(192,'2017-10-26 10:57:25',2,'CB261093.REM',93,1),(193,'2017-10-30 15:15:48',2,'CB301094.REM',94,1),(194,'2017-11-03 11:28:20',2,'CB031195.REM',95,2),(195,'2017-11-03 14:01:10',2,'CB031196.REM',15,2),(196,'2017-11-09 15:59:20',2,'CB091197.REM',97,2),(197,'2017-11-16 15:05:12',2,'CB161198.REM',98,2),(198,'2017-11-20 15:40:04',2,'CB201199.REM',99,2),(199,'2017-11-22 14:04:42',2,'CB221101.REM',1,2),(200,'2017-11-27 14:03:45',2,'CB271102.REM',2,2),(201,'2017-11-30 17:48:52',2,'CB301103.REM',3,2),(202,'2017-12-05 08:54:47',2,'CB051204.REM',4,2),(203,'2017-12-07 09:13:24',2,'CB071205.REM',5,2),(204,'2017-12-08 13:32:13',2,'CB081206.REM',6,2),(205,'2017-12-12 10:46:08',2,'CB121207.REM',7,2),(206,'2017-12-14 11:58:48',2,'CB141208.REM',8,2),(207,'2017-12-15 10:23:03',2,'CB151209.REM',1,2),(208,'2017-12-18 19:27:35',0,'CB181210.REM',10,2),(209,'2017-12-27 13:24:16',2,'CB271211.REM',11,2),(210,'2018-01-03 09:59:29',2,'CB030112.REM',12,2),(211,'2018-01-05 09:01:05',2,'CB050113.REM',13,2),(212,'2018-01-09 17:16:52',0,'CB090114.REM',2,2),(213,'2018-01-12 10:36:48',2,'CB120115.REM',15,2),(214,'2018-01-15 07:52:55',2,'CB150116.REM',16,2),(215,'2018-01-17 15:10:11',2,'CB1701',17,2),(216,'2018-01-22 08:02:25',2,'CB220118.REM',18,2),(217,'2018-01-23 08:39:18',2,'CB230119.REM',19,2),(218,'2018-01-25 14:15:27',2,'CB250120.REM',20,2),(219,'2018-01-30 11:22:31',2,'CB300121.REM',21,2),(220,'2018-02-01 14:50:23',2,'CB010222.REM',4,2),(221,'2018-02-05 08:58:33',2,'CB050223.REM',23,2),(222,'2018-02-05 17:21:59',2,'CB050224.REM',24,2),(223,'2018-02-09 13:04:06',2,'CB090225.REM',25,2),(224,'2018-02-14 12:57:19',2,'CB140226.REM',26,2),(225,'2018-02-18 12:12:10',2,'CB180227.REM',27,2),(226,'2018-02-19 14:14:34',2,'CB190228.REM',28,2),(227,'2018-02-23 10:02:14',2,'CB230229.REM',29,1),(228,'2018-02-27 12:02:30',2,'CB270230.REM',5,1),(229,'2018-03-03 10:30:40',0,'CB0303',31,2),(230,'2018-03-07 08:47:09',2,'CB070332.REM',32,1),(231,'2018-03-09 13:48:54',2,'CB090333.REM',33,1),(232,'2018-03-12 15:42:44',2,'CB1203',34,1),(233,'2018-03-14 13:12:01',2,'CB140335.REM',35,1),(234,'2018-03-19 15:47:05',2,'CB190336.REM',36,1),(235,'2018-03-21 15:17:56',2,'CB2103',37,1),(236,'2018-03-26 15:16:04',2,'CB2603',38,1),(237,'2018-03-31 18:19:21',2,'CB310339.REM',39,1),(238,'2018-04-04 08:00:57',2,'CB040440.REM',6,2),(239,'2018-04-11 16:42:04',2,'CB110441.REM',41,1),(240,'2018-04-16 09:21:51',2,'CB160442.REM',7,1),(241,'2018-04-19 15:06:22',0,'CB190443.REM',43,1),(242,'2018-04-22 10:37:49',2,'CB2204',44,1),(243,'2018-04-24 16:46:10',2,'CB240445.REM',45,1),(244,'2018-04-25 15:42:32',2,'CB250446.REM',46,1),(245,'2018-04-25 19:15:02',2,'CB250447.REM',47,1),(246,'2018-05-05 09:31:00',2,'CB050548.REM',48,2),(247,'2018-05-07 08:48:46',2,'CB0705',49,2),(248,'2018-05-10 09:23:19',2,'CB100550.REM',50,2),(249,'2018-05-14 08:49:04',2,'CB140551.REM',8,2),(250,'2018-05-15 14:38:52',2,'CB150552.REM',52,2),(251,'2018-05-18 08:50:14',2,'CB180553.REM',53,2),(252,'2018-05-18 17:53:15',2,'CB180554.REM',9,2),(253,'2018-05-22 11:22:25',2,'CB220555.REM',55,2),(254,'2018-05-24 12:15:26',2,'CB240556.REM',56,2),(255,'2018-05-28 18:46:18',2,'CB280557.REM',57,2),(256,'2018-05-31 09:50:41',2,'CB310558.REM',58,2),(257,'2018-06-01 13:38:59',2,'CB010659.REM',59,2),(258,'2018-06-05 16:29:47',2,'CB050660.REM',60,2),(259,'2018-06-11 15:22:35',2,'CB110661.REM',61,2),(260,'2018-06-12 14:40:14',2,'CB120662.REM',10,2),(261,'2018-06-14 14:36:39',2,'CB140663.REM',10,2),(262,'2018-06-18 10:19:45',2,'CB180664.REM',64,2),(263,'2018-06-18 16:17:59',2,'CB180665.REM',65,2),(264,'2018-06-20 12:17:08',2,'CB200666.REM',66,2),(265,'2018-06-23 09:29:09',2,'CB230667.REM',67,2),(266,'2018-06-27 17:00:14',2,'CB270668.REM',11,2),(267,'2018-06-28 10:17:28',2,'CB280669.REM',69,2),(268,'2018-07-02 09:48:17',0,'CB020770.REM',70,2),(269,'2018-07-03 17:18:50',2,'CB030771.REM',71,2),(270,'2018-07-06 10:59:30',2,'CB060772.REM',72,2),(271,'2018-07-10 16:12:27',0,'CB100773.REM',12,2),(272,'2018-07-17 14:19:54',2,'CB170774.REM',74,2),(273,'2018-07-19 17:44:50',2,'CB190775.REM',75,2),(274,'2018-07-23 15:06:42',2,'CB230776.REM',76,2),(275,'2018-07-24 14:50:18',2,'CB240777.REM',77,2),(276,'2018-07-25 13:45:10',2,'CB250778.REM',13,2),(277,'2018-07-27 10:25:49',0,'CB270779.REM',13,2),(278,'2018-07-31 17:50:33',2,'CB310780.REM',80,1),(279,'2018-08-01 19:50:16',2,'CB010881.REM',81,2),(280,'2018-08-03 11:08:54',2,'CB030882.REM',82,1),(281,'2018-08-04 11:10:32',2,'CB040883.REM',83,2),(282,'2018-08-07 15:50:58',0,'CB070884.REM',84,2),(283,'2018-08-09 10:24:51',2,'CB090885.REM',85,2),(284,'2018-08-10 14:09:07',2,'CB100886.REM',86,2),(285,'2018-08-13 08:39:59',2,'CB130887.REM',87,2),(286,'2018-08-14 15:31:51',2,'CB1408',88,2),(287,'2018-08-16 15:58:30',2,'CB160889.REM',89,2),(288,'2018-08-17 16:23:51',2,'CB1708',90,2),(289,'2018-08-20 12:07:42',2,'CB200891.REM',91,2),(290,'2018-08-22 18:27:08',0,'CB220892.REM',92,2),(291,'2018-08-24 09:54:11',2,'CB240893.REM',93,2),(292,'2018-08-27 10:49:51',2,'CB270894.REM',94,2),(293,'2018-08-28 16:29:44',2,'CB280895.REM',95,2),(294,'2018-08-29 16:05:30',2,'CB290896.REM',96,2),(295,'2018-09-01 20:11:04',2,'CB010997.REM',97,2),(296,'2018-09-04 10:09:40',2,'CB040998.REM',98,2),(297,'2018-09-06 08:57:04',2,'CB060999.REM',99,2),(298,'2018-09-11 11:00:03',2,'CB110901.REM',1,2),(299,'2018-09-17 08:50:48',2,'CB1709',2,2),(300,'2018-09-19 15:05:20',2,'CB190903.REM',3,2),(301,'2018-09-20 11:05:04',2,'CB200904.REM',4,2),(302,'2018-09-24 12:12:31',2,'CB240905.REM',5,2),(303,'2018-09-25 19:17:11',2,'CB250906.REM',6,2),(304,'2018-09-28 10:52:56',2,'CB280907.REM',7,2),(305,'2018-10-01 09:54:21',2,'CB011008.REM',8,2),(306,'2018-10-02 08:54:33',2,'CB0210',9,2),(307,'2018-10-05 16:18:50',2,'CB051010.REM',10,2),(308,'2018-10-09 13:56:37',2,'CB091011.REM',11,1),(309,'2018-10-15 10:23:24',2,'CB151012.REM',12,1),(310,'2018-10-16 10:51:11',2,'CB161013.REM',13,1),(311,'2018-10-18 09:06:52',2,'CB181014.REM',14,1),(312,'2018-10-19 12:00:41',2,'CB1910',15,1),(313,'2018-10-31 14:56:19',2,'CB311016.REM',16,1),(314,'2018-11-05 09:01:06',2,'CB051117.REM',17,2),(315,'2018-11-05 16:36:29',2,'CB051118.REM',18,1),(316,'2018-11-08 08:58:01',0,'CB081119.REM',19,1),(317,'2018-11-12 16:24:56',0,'CB121120.REM',20,1),(318,'2018-11-13 14:13:47',2,'CB131121.REM',21,1),(319,'2018-11-16 09:51:50',2,'CB161122.REM',22,1),(320,'2018-11-20 06:29:33',2,'CB201123.REM',23,1),(321,'2018-11-22 12:43:24',2,'CB2211',24,1),(322,'2018-11-26 10:05:40',0,'CB261125.REM',25,1),(323,'2018-11-30 09:15:33',2,'CB301126.REM',26,1),(324,'2018-12-03 16:13:16',2,'CB031227.REM',27,2),(325,'2018-12-05 11:54:52',0,'CB051228.REM',28,1),(326,'2018-12-06 12:03:10',2,'CB061229.REM',29,1),(327,'2018-12-11 09:37:11',2,'CB111230.REM',30,1),(328,'2018-12-12 15:15:17',2,'CB121231.REM',31,1),(329,'2018-12-17 09:54:38',2,'CB1712',32,1),(330,'2018-12-18 16:42:36',0,'CB181233.REM',33,1),(331,'2018-12-28 16:17:41',0,'CB281234.REM',34,1),(332,'2018-12-28 16:58:01',2,'CB281235.REM',35,2),(333,'2019-01-04 14:37:27',2,'CB040136.REM',36,2),(334,'2019-01-11 17:33:11',2,'CB110137.REM',37,2),(335,'2019-01-15 15:39:19',2,'CB150138.REM',38,2),(336,'2019-01-17 15:49:04',2,'CB170139.REM',6,2),(337,'2019-01-21 08:59:08',2,'CB2101',40,2),(338,'2019-01-22 14:48:46',2,'CB220141.REM',41,2),(339,'2019-01-24 09:11:52',2,'CB240142.REM',42,2),(340,'2019-01-28 06:39:16',2,'CB280143.REM',43,2),(341,'2019-01-31 14:14:22',2,'CB310144.REM',44,2),(342,'2019-02-01 10:32:20',2,'CB010245.REM',45,2),(343,'2019-02-05 08:31:55',2,'CB050246.REM',46,2),(344,'2019-02-07 09:41:40',2,'CB070247.REM',47,2),(345,'2019-02-11 11:15:46',2,'CB110248.REM',48,2),(346,'2019-02-19 18:39:40',2,'CB190249.REM',49,2),(347,'2019-02-20 18:34:12',2,'CB200250.REM',50,2),(348,'2019-02-22 09:47:08',2,'CB220251.REM',8,2),(349,'2019-02-25 18:29:21',2,'CB250252.REM',52,1),(350,'2019-02-27 15:51:36',2,'CB270253.REM',53,1),(351,'2019-03-01 18:07:10',2,'CB010354.REM',54,2),(352,'2019-03-07 15:10:27',2,'CB070355.REM',55,2),(353,'2019-03-11 12:33:51',2,'CB110356.REM',56,2),(354,'2019-03-14 16:33:21',0,'CB140357.REM',57,2),(355,'2019-03-15 15:04:51',0,'CB150358.REM',58,1),(356,'2019-03-18 14:07:07',2,'CB180359.REM',9,1),(357,'2019-03-19 15:20:58',2,'CB190360.REM',60,1),(358,'2019-03-22 15:51:31',2,'CB2203',61,1),(359,'2019-03-28 17:49:16',2,'CB280362.REM',62,1),(360,'2019-03-31 12:36:02',2,'CB310363.REM',63,1),(361,'2019-04-03 11:09:02',2,'CB030464.REM',64,2),(362,'2019-04-03 13:43:10',2,'CB0304',10,1),(363,'2019-04-09 15:16:50',2,'CB090466.REM',66,1),(364,'2019-04-11 09:42:20',2,'CB110467.REM',67,1),(365,'2019-04-16 09:03:28',2,'CB160468.REM',11,1),(366,'2019-04-17 09:51:13',2,'CB1704',69,1),(367,'2019-04-22 09:14:12',2,'CB220470.REM',70,1),(368,'2019-04-25 08:49:32',2,'CB250471.REM',71,1),(369,'2019-04-29 14:56:09',2,'CB290472.REM',72,1),(370,'2019-05-02 15:53:57',2,'CB020573.REM',73,1),(371,'2019-05-03 13:38:14',2,'CB030574.REM',74,2),(372,'2019-05-06 17:54:19',2,'CB060575.REM',12,1),(373,'2019-05-08 15:21:47',2,'CB0805',76,1),(374,'2019-05-13 09:32:09',2,'CB130577.REM',77,1),(375,'2019-05-16 14:26:07',2,'CB160578.REM',78,1),(376,'2019-05-17 08:56:15',2,'CB170579.REM',79,1),(377,'2019-05-20 14:36:39',2,'CB200580.REM',80,1),(378,'2019-05-21 19:20:25',2,'CB210581.REM',81,1),(379,'2019-05-23 15:29:44',2,'CB230582.REM',82,1),(380,'2019-05-30 06:12:32',2,'CB300583.REM',83,2),(381,'2019-05-31 13:14:45',2,'CB310584.REM',13,2),(382,'2019-06-04 13:44:34',2,'CB040685.REM',14,2),(383,'2019-06-05 15:18:28',2,'CB050686.REM',86,2),(384,'2019-06-07 17:53:28',2,'CB070687.REM',87,2),(385,'2019-06-10 16:46:05',2,'CB100688.REM',88,2),(386,'2019-06-25 14:31:33',2,'CB250689.REM',89,2),(387,'2019-06-26 17:32:21',2,'CB260690.REM',90,2),(388,'2019-06-27 13:09:25',0,'CB270691.REM',91,2),(389,'2019-06-28 11:44:26',2,'CB280692.REM',15,2),(390,'2019-07-04 18:01:45',2,'CB040793.REM',93,2),(391,'2019-07-11 09:51:20',2,'CB110794.REM',94,2),(392,'2019-07-12 13:15:32',2,'CB1207',95,2),(393,'2019-07-17 14:21:28',2,'CB170796.REM',96,2),(394,'2019-07-22 17:53:50',2,'CB220797.REM',97,2),(395,'2019-07-23 21:36:05',2,'CB240798.REM',16,2),(396,'2019-07-26 11:48:30',2,'CB260799.REM',99,2),(397,'2019-07-30 15:28:48',2,'CB300701.REM',1,2),(398,'2019-08-05 09:36:37',2,'CB050802.REM',2,2),(399,'2019-08-06 08:52:16',0,'CB060803.REM',3,2),(400,'2019-08-13 14:01:38',2,'CB130804.REM',4,2),(401,'2019-08-19 14:31:53',2,'CB190805.REM',5,1),(402,'2019-08-22 14:08:44',2,'CB220806.REM',6,1),(403,'2019-08-27 10:28:42',2,'CB270807.REM',7,1),(404,'2019-08-30 10:22:32',2,'CB300808.REM',8,1),(405,'2019-09-03 08:53:22',2,'CB030909.REM',9,2),(406,'2019-09-04 17:44:44',2,'CB0409',10,1),(407,'2019-09-09 15:10:27',2,'CB0909',11,1),(408,'2019-09-11 17:35:31',2,'CB110912.REM',2,1),(409,'2019-09-20 09:08:33',2,'CB200913.REM',13,1),(410,'2019-09-24 09:19:50',2,'CB2409',14,1),(411,'2019-09-27 15:51:03',2,'CB270915.REM',15,1),(412,'2019-10-01 12:22:01',2,'CB011016.REM',16,2),(413,'2019-10-02 13:26:50',2,'CB021017.REM',3,1),(414,'2019-10-10 08:54:01',2,'CB101018.REM',18,1),(415,'2019-10-14 13:44:05',2,'CB141019.REM',19,1),(416,'2019-10-23 10:46:23',2,'CB231020.REM',20,1),(417,'2019-10-30 15:11:02',2,'CB301021.REM',21,1),(418,'2019-11-05 15:53:24',0,'CB051122.REM',22,2),(419,'2019-11-05 17:31:35',2,'CB0511',23,1),(420,'2019-11-11 09:14:57',2,'CB111124.REM',24,1),(421,'2019-11-13 14:58:48',2,'CB131127.REM',27,1),(422,'2019-11-13 09:14:57',2,'CB131126.REM',26,1),(500,'2019-11-22 12:12:04',2,'CB221127.REM',27,1),(501,'2019-11-26 08:00:29',2,'CB261128.REM',28,1),(502,'2019-11-27 13:50:51',2,'CB271129.REM',29,1),(503,'2019-11-29 13:33:33',2,'CB291130.REM',30,1),(504,'2019-12-02 15:30:35',2,'CB021231.REM',31,2),(505,'2019-12-04 16:21:28',2,'CB041232.REM',32,1),(506,'2019-12-09 06:27:04',2,'CB091233.REM',33,1),(507,'2019-12-11 16:00:13',2,'CB111234.REM',34,1),(508,'2019-12-23 11:39:58',1,'CB231235.REM',35,2),(509,'2019-12-27 09:07:46',6,'CB271236.REM',36,1);
/*!40000 ALTER TABLE `remessa` ENABLE KEYS */;