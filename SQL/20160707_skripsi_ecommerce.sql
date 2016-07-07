/*
SQLyog Ultimate v11.11 (64 bit)
MySQL - 5.6.25 : Database - skripsi_ecommerce
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
/*Table structure for table `product` */

DROP TABLE IF EXISTS `product`;

CREATE TABLE `product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_category` int(11) NOT NULL,
  `kode_product` varchar(25) DEFAULT NULL,
  `nama_product` varchar(25) DEFAULT NULL,
  `merk` varchar(25) DEFAULT NULL,
  `image` text,
  `selling_price` decimal(12,2) DEFAULT NULL,
  `description_product` text,
  `product_visibility` int(1) DEFAULT '1',
  `created_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_category` (`id_category`),
  CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `product_category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

/*Data for the table `product` */

LOCK TABLES `product` WRITE;

insert  into `product`(`id`,`id_category`,`kode_product`,`nama_product`,`merk`,`image`,`selling_price`,`description_product`,`product_visibility`,`created_timestamp`) values (1,2,'P_001','Pulpen','Pilot','[000053].png',2000.00,NULL,1,'2016-05-30 23:54:07'),(4,2,'P_002','Pulpen Biru','Snowmen','[000053].png',3000.00,NULL,1,'2016-05-30 23:54:07'),(5,2,'N_001','Asus X001','Asus','[000053].png',300000.00,NULL,1,'2016-05-30 23:54:07'),(8,2,'K_001','Supra X','Honda','footer-20-05-16-10-33-47-footer.jpg',12000000.00,NULL,1,'2016-05-31 00:24:42'),(9,2,'asd','asd','asd','error.PNG',222.00,NULL,2,'2016-05-31 10:08:03'),(10,2,'asd','asd','asd','error.PNG',222.00,NULL,2,'2016-05-31 10:08:31'),(11,2,'Sample 1','16 Batang','Djarum Super','[000053].png',30000.00,'<p><!--  -->Rokok Djarum Super 16 Batang</p>\r\n',1,'2016-06-04 03:46:12'),(12,2,'11','16 Batang','Djarum Super','',30000.00,'<p><!--  -->Rokok Djarum Super 16 Batang Tester</p>\r\n',2,'2016-06-04 04:36:51'),(13,2,'8','Supra X','Honda','',12000000.00,'<p>dev</p>\r\n',2,'2016-06-04 04:37:16'),(14,2,'13','Supra X','Honda','',12000000.00,'<p>dev</p>\r\n',2,'2016-06-04 04:59:18'),(15,2,'14','Supra X','Honda','',12000000.00,'<p>dev</p>\r\n',2,'2016-06-04 04:59:35'),(16,2,'15','Supra X','Honda','',12000000.00,'<p>asdasdasd</p>\r\n',2,'2016-06-04 04:59:44'),(17,12,'E_001','Kulkas 2 pintu','Toshiba','drink2.jpg',300000.00,'<p>Description</p>\r\n',1,'2016-06-04 11:57:05'),(18,2,'1','Pulpen','Pilot','',2000.00,'<p>Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit.</p>\r\n',2,'2016-06-15 15:11:04');

UNLOCK TABLES;

/*Table structure for table `product_category` */

DROP TABLE IF EXISTS `product_category`;

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name_category` varchar(25) DEFAULT NULL,
  `category_visibility` int(1) DEFAULT '1',
  `created_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;

/*Data for the table `product_category` */

LOCK TABLES `product_category` WRITE;

insert  into `product_category`(`id`,`name_category`,`category_visibility`,`created_timestamp`) values (1,'Alat Tulis',0,'2016-05-29 23:38:38'),(2,'Kendaraan',1,'2016-05-29 23:38:38'),(3,'Baju',2,'2016-05-29 23:38:38'),(4,'Celana',2,'2016-05-29 23:38:38'),(5,'Notebook',1,'2016-05-29 23:38:38'),(6,'Handphone',2,'2016-05-29 23:38:38'),(10,'Samuel',2,'2016-05-30 14:41:51'),(11,'Samuel',1,'2016-05-30 14:45:15'),(12,'Elektronik',1,'2016-06-04 11:55:52');

UNLOCK TABLES;

/*Table structure for table `product_review` */

DROP TABLE IF EXISTS `product_review`;

CREATE TABLE `product_review` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) DEFAULT NULL,
  `id_user` int(11) DEFAULT NULL,
  `review_detail` text,
  `created_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `id_product` (`id_product`),
  KEY `id_user` (`id_user`),
  CONSTRAINT `product_review_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `product_review_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

/*Data for the table `product_review` */

LOCK TABLES `product_review` WRITE;

insert  into `product_review`(`id`,`id_product`,`id_user`,`review_detail`,`created_timestamp`) values (2,18,4,'Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit.\r\n','2016-06-15 15:05:02'),(3,18,1,'Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit.','2016-06-16 18:06:27'),(4,1,1,'Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit.','2016-06-16 18:07:46'),(5,8,4,'Hallo Product Keren','2016-06-22 14:30:20'),(6,1,4,'Product Keren !','2016-06-24 13:30:33'),(7,11,4,'Test Review','2016-07-07 23:56:29');

UNLOCK TABLES;

/*Table structure for table `stock_product` */

DROP TABLE IF EXISTS `stock_product`;

CREATE TABLE `stock_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_product` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `keterangan` text,
  PRIMARY KEY (`id`),
  KEY `id_product` (`id_product`),
  CONSTRAINT `stock_product_ibfk_1` FOREIGN KEY (`id_product`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

/*Data for the table `stock_product` */

LOCK TABLES `stock_product` WRITE;

insert  into `stock_product`(`id`,`id_product`,`qty`,`keterangan`) values (1,1,1002,NULL),(2,4,202,NULL),(3,5,302,NULL),(4,8,403,NULL),(5,9,504,NULL),(6,10,602,NULL),(7,11,2,NULL),(8,12,2,NULL),(9,13,2,NULL),(10,14,2,NULL),(11,15,2,NULL),(12,16,2,NULL),(13,17,0,NULL),(14,18,0,NULL);

UNLOCK TABLES;

/*Table structure for table `tbl_city` */

DROP TABLE IF EXISTS `tbl_city`;

CREATE TABLE `tbl_city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `destination` text,
  `cost` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=555 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_city` */

LOCK TABLES `tbl_city` WRITE;

insert  into `tbl_city`(`id`,`destination`,`cost`) values (1,'BANDA ACEH',120000.00),(2,'BIREUN',8000.00),(3,'BIANG KEUJERUEN',8000.00),(4,'BLANGPIDIE',8000.00),(5,'CALANG',8000.00),(6,'JANTO',8000.00),(7,'KOTA CANE',8000.00),(8,'KREUNG GEUKEUH',8000.00),(9,'KUALA SIMPANG',8000.00),(10,'LANGSA',8000.00),(11,'LHOKSEUMAWE',8000.00),(12,'LHOKSUKOH',8000.00),(13,'MEULBUOH',8000.00),(14,'SABANG',8000.00),(15,'SIGLI',8000.00),(16,'SINABANG',8000.00),(17,'SINGKIL',8000.00),(18,'SUKAMAKMUR',8000.00),(19,'TAKENGON',8000.00),(20,'TAPAK TUAN',8000.00),(21,'SUBULUSSALAM',8000.00),(22,'MEREUDU',8000.00),(23,'KREUENG SABEE',8000.00),(24,'SIMPANG TIGA REDELON',8000.00),(25,'OTHER PROV ACEH',8000.00),(26,'BAGAN BATU',8000.00),(27,'BAGAN SIAPI API',8000.00),(28,'BANGKINANG',8000.00),(29,'BENGKALIS',8000.00),(30,'DUMAI',8000.00),(31,'DURI',8000.00),(32,'MINAS',8000.00),(33,'PANGKALAN KERINCI',8000.00),(34,'PASIR PANGARAYAN',8000.00),(35,'PEKANBARU',8000.00),(36,'PERAWANG',8000.00),(37,'RENGAT',8000.00),(38,'SIAK INDRAPURA',8000.00),(39,'TELUK KUANTAN',8000.00),(40,'TEMBILAHAN',8000.00),(41,'UJUNG BATU',8000.00),(42,'RUMBAI',8000.00),(43,'MARPOYAN',8000.00),(44,'DABO SINGKEP',8000.00),(45,'BATAM',8000.00),(46,'NATUNA/RANAI',8000.00),(47,'TANJUNG BALAI KARIMUN',8000.00),(48,'LAGOI',8000.00),(49,'NONGSA',8000.00),(50,'KABIL',8000.00),(51,'TANJUNG PINANG',8000.00),(52,'LINGGA/DAIK',8000.00),(53,'TANJUNG UBAN',8000.00),(54,'BANDAR SRI BINTAN',8000.00),(55,'OTHER RIAU',8000.00),(56,'BANGKO',8000.00),(57,'JAMBI',8000.00),(58,'KUALA TUNGKAL',8000.00),(59,'MUARA BULIAN',8000.00),(60,'MUARA BUNGKO',8000.00),(61,'MUARA SABAK',8000.00),(62,'MUARA TEBO',8000.00),(63,'RAMBA',8000.00),(64,'SAROLANGUN',8000.00),(65,'SENGETI',8000.00),(66,'SUNGAI PENUH',8000.00),(67,'OTHER JAMBI',8000.00),(68,'BALIGE',8000.00),(69,'BINJAI',8000.00),(70,'DOLOG SANGGUL',8000.00),(71,'GUNUNG SITOLI/NIAS',8000.00),(72,'KABAN JAHE',8000.00),(73,'KISARAN',8000.00),(74,'LAGUBOTI',8000.00),(75,'LUBUK PAKAM',8000.00),(76,'MEDAN',8000.00),(77,'PADANG SIDEMPUAN',8000.00),(78,'PANGURUPAN',8000.00),(79,'PANYAMBUNGAN',8000.00),(80,'PEMATANG SIANTAR',8000.00),(81,'RANTAU PRAPAT',8000.00),(82,'SALAK',8000.00),(83,'SIBOLGA',8000.00),(84,'SIBORONGGOBONG',8000.00),(85,'SIDIKALANG',8000.00),(86,'STABAT',8000.00),(87,'TANJUNG BALAI ASAHAN',8000.00),(88,'TANJUNG MORAWA',8000.00),(89,'TARUTUNG',8000.00),(90,'TEBING TINGGI',8000.00),(91,'SEI RAMPAH',8000.00),(92,'SIBUHUAN',8000.00),(93,'SIPIROK',8000.00),(94,'PANGKALAN BRANDAN',8000.00),(95,'GUNUNG TUA',8000.00),(96,'LIMAPULUH',8000.00),(97,'BELAWAN',8000.00),(98,'TELUK DALAM',8000.00),(99,'OTHER SUMUT',8000.00),(100,'BATU SANGKAR',8000.00),(101,'BUKIT TINGGI',8000.00),(102,'DHARMAS RAYA',8000.00),(103,'KEP.PAGAI',8000.00),(104,'LUBUK ALUNG',8000.00),(105,'LUBUK BASUNG',8000.00),(106,'LUBUK SIKAPING',8000.00),(107,'SAWAH LUNTO',8000.00),(108,'PADANG',8000.00),(109,'PADANG PANJANG',8000.00),(110,'PAINAN',8000.00),(111,'PARIAMAN',8000.00),(112,'PAYAKUMBUH',8000.00),(113,'SOLOK',8000.00),(114,'AROSUKA',8000.00),(115,'TUA PEJAT',8000.00),(116,'SIJUNJUNG/MUARA',8000.00),(117,'SOLOK SELATAN',8000.00),(118,'LIMA PULUH KOTA',8000.00),(119,'PADANG PARIAMAN',8000.00),(120,'OTHER SUMBAR',8000.00),(121,'BATURAJA',8000.00),(122,'EMPAT LAWANG',8000.00),(123,'INDRALAYA',8000.00),(124,'KAYU AGUNG',8000.00),(125,'LAHAT',8000.00),(126,'LUBUK LINGGAU',8000.00),(127,'MARTA PURA',8000.00),(128,'MUARA DUA',8000.00),(129,'MUARA ENIM',8000.00),(130,'PAGAR ALAM',8000.00),(131,'PALEMBANG',8000.00),(132,'BANYUASIN',8000.00),(133,'PRABUMULIH',8000.00),(134,'SEKAYU',8000.00),(135,'SUNGAI LILIN',8000.00),(136,'TANJUNG ENIM',8000.00),(137,'PLAJU',8000.00),(138,'MUSI RAWAS',8000.00),(139,'OTHER SUMSEL',8000.00),(140,'AMPLAPURA',8000.00),(141,'BADUNG/MENGUWI',8000.00),(142,'BANGLI',8000.00),(143,'BULELENG',8000.00),(144,'SINGARAJA',8000.00),(145,'DENPASAR',8000.00),(146,'GIANYAR UBUD',8000.00),(147,'JEMBRANA/NEGARA',8000.00),(148,'KLUNGKUNG/SAMARAPURA',8000.00),(149,'KUTA',8000.00),(150,'SANUR',8000.00),(151,'NUSA DUA',8000.00),(152,'TABANAN',8000.00),(153,'NGURAH RAI',8000.00),(154,'JIMBARAN',8000.00),(155,'GILIMANUK',8000.00),(156,'OTHER BALI',8000.00),(157,'BELINYU',8000.00),(158,'JEBUS',8000.00),(159,'KELAPA',8000.00),(160,'KOBA',8000.00),(161,'MENTOK',8000.00),(162,'PANGKAL PINANG',8000.00),(163,'SUNGAI LIAT',8000.00),(164,'TOBOALI',8000.00),(165,'MANGGAR',8000.00),(166,'BELITUNG',8000.00),(167,'OTHER BANGKA BELITUNG',8000.00),(168,'AGRAMAKMUR',8000.00),(169,'BENGKULU',8000.00),(170,'KAUR',8000.00),(171,'CURUP',8000.00),(172,'KEPAHYANG',8000.00),(173,'LEBONG/MUARA AMAN',8000.00),(174,'MANNA',8000.00),(175,'MUKO MUKO',8000.00),(176,'TAIS',8000.00),(177,'OTHER BENGKULU',8000.00),(178,'BANDAR LAMPUNG',8000.00),(179,'KALIANDA',8000.00),(180,'KOTA AGUNG',8000.00),(181,'KOTA BUMI',8000.00),(182,'MENGGALA',8000.00),(183,'METRO',8000.00),(184,'PRINGSEWU',8000.00),(185,'LIWA',8000.00),(186,'SUKADANA',8000.00),(187,'GUNUNG SUGIH',8000.00),(188,'BAKAUHEUNI',8000.00),(189,'GEDONG TATAAN',8000.00),(190,'BLAMBANGAN UMPU',8000.00),(191,'BANDAR JAYA',8000.00),(192,'BUKIT KEMUNING',8000.00),(193,'KRUI',8000.00),(194,'SUMBER JAYA',8000.00),(195,'TALANG PADANG',8000.00),(196,'OTHER LAMPUNG',8000.00),(197,'BOGOR',8000.00),(198,'CIBINONG',8000.00),(199,'BEKASI',8000.00),(200,'CIKARANG',8000.00),(201,'DEPOK',8000.00),(202,'KARAWANG',8000.00),(203,'CIKAMPEK',8000.00),(204,'CILEGON',8000.00),(205,'RANGKAS BITUNG',8000.00),(206,'SERANG',8000.00),(207,'PANDEGLANG',8000.00),(208,'MERAK',8000.00),(209,'BALARAJA',8000.00),(210,'BANDARA',8000.00),(211,'SERPONG',8000.00),(212,'TANGERANG',8000.00),(213,'TIGARAKSA',8000.00),(214,'OTHER BANTEN',8000.00),(215,'SUKABUMI',8000.00),(216,'CIANJUR',8000.00),(217,'CIREBON',8000.00),(218,'INDRAMAYU',8000.00),(219,'KUNINGAN',8000.00),(220,'MAJALENGKA',8000.00),(221,'JATIBARANG',8000.00),(222,'KADIPATEN',8000.00),(223,'LOSARI',8000.00),(224,'PALIMANAN',8000.00),(225,'JATIWANGI',8000.00),(226,'SUMBER',8000.00),(227,'BANDUNG',8000.00),(228,'BANJAR',8000.00),(229,'CIAMIS',8000.00),(230,'CIMAHI',8000.00),(231,'GARUT',8000.00),(232,'PURWAKARTA',8000.00),(233,'SUBANG',8000.00),(234,'SUMEDANG',8000.00),(235,'TASIKMALAYA',8000.00),(236,'CIMAREHE',8000.00),(237,'SOREANG',8000.00),(238,'SINGAPARNA',8000.00),(239,'JATINANGOR',8000.00),(240,'PADALARANG',8000.00),(241,'RANCAEKEK',8000.00),(242,'MAJALAYA',8000.00),(243,'LEMBANG',8000.00),(244,'OTHER JAWA BARAT',8000.00),(245,'CILACAP',8000.00),(246,'MAJENANG',8000.00),(247,'BOYOLALI',8000.00),(248,'KARANG ANYAR',8000.00),(249,'KLATEN',8000.00),(250,'SOLO',8000.00),(251,'SRAGEN',8000.00),(252,'SUKOHARJO',8000.00),(253,'WONOGIRI',8000.00),(254,'KARTOSURO',8000.00),(255,'AMBARAWA',8000.00),(256,'AJIBARANG',8000.00),(257,'BANJARNEGARA',8000.00),(258,'BANYUMAS',8000.00),(259,'BATANG BLORA',8000.00),(260,'BOJONEGORO',8000.00),(261,'BREBES',8000.00),(262,'BUMIAYU',8000.00),(263,'CEPU',8000.00),(264,'DEMAK',8000.00),(265,'GROBONGAN',8000.00),(266,'JEPARA',8000.00),(267,'KENDAL',8000.00),(268,'KUDUS',8000.00),(269,'PATI',8000.00),(270,'PEKALONGAN',8000.00),(271,'PEMALANG',8000.00),(272,'PURBALINGGA',8000.00),(273,'PURWODADI',8000.00),(274,'PURWOKERTO',8000.00),(275,'REMBANG',8000.00),(276,'SALATIGA',8000.00),(277,'SEMARANG',8000.00),(278,'SLAWI',8000.00),(279,'TEGAL',8000.00),(280,'UNGARAN',8000.00),(281,'KEBUMEN',8000.00),(282,'MAGELANG',8000.00),(283,'PURWOREJO',8000.00),(284,'TEMANGGUNG',8000.00),(285,'WONOSOBO',8000.00),(286,'MUNGKID',8000.00),(287,'OTHER JATENG',8000.00),(288,'BANTUL',8000.00),(289,'D.I YOGYAKARTA',8000.00),(290,'KULON PROGO',8000.00),(291,'WATES',8000.00),(292,'SLEMAN',8000.00),(293,'WONOSARI',8000.00),(294,'PRAMBANAN',8000.00),(295,'OTHER JOGJAKARTA',8000.00),(296,'BANGKALAN',8000.00),(297,'GRESIK',8000.00),(298,'JOMBANG',8000.00),(299,'LAMONGAN',8000.00),(300,'NGANJUK',8000.00),(301,'PAMEKASAN',8000.00),(302,'SAMPANG',8000.00),(303,'SIDOARJO',8000.00),(304,'SUMENEP',8000.00),(305,'SURABAYA',8000.00),(306,'TRENGGALEK',8000.00),(307,'TUBAN',8000.00),(308,'TULUNG AGUNG',8000.00),(309,'PANDAAN',8000.00),(310,'PASURUAN',8000.00),(311,'JEMBER',8000.00),(312,'BANYUWANGI',8000.00),(313,'BONDOWOSO',8000.00),(314,'PROBOLINGGO',8000.00),(315,'LUMAJANG',8000.00),(316,'SITOBUNDO',8000.00),(317,'KRAKSAAN',8000.00),(318,'PAITON',8000.00),(319,'MALANG',8000.00),(320,'BATU',8000.00),(321,'BLITAR',8000.00),(322,'KEPANJEN',8000.00),(323,'SINGOSARI',8000.00),(324,'MOJOKERTO',8000.00),(325,'KENDIRI',8000.00),(326,'MADIUN',8000.00),(327,'CARUBAN',8000.00),(328,'MAGETAN',8000.00),(329,'NGAWI',8000.00),(330,'PACITAN',8000.00),(331,'PONOROGO',8000.00),(332,'OTHER JATIM',8000.00),(333,'BENGKAYANG',8000.00),(334,'KETAPANG',8000.00),(335,'MEMPAWAH',8000.00),(336,'NANGAH PINOH/MELAWI',8000.00),(337,'NGABANG',8000.00),(338,'PONTIANAK',8000.00),(339,'PUTUS SIBAU',8000.00),(340,'SAMBAS',8000.00),(341,'SANGGAU',8000.00),(342,'SEKADAU',8000.00),(343,'SINGKAWANG',8000.00),(344,'SINTANG',8000.00),(345,'KUBU RAYA/SUNGAI RAYA',8000.00),(346,'KAYONG UTARA',8000.00),(347,'WAJOK',8000.00),(348,'OTHER KALIMANTAN BARAT',8000.00),(349,'AMUNTAI',8000.00),(350,'BALANGAN/PARINGIN',8000.00),(351,'BANJAR/MARTAPURA',8000.00),(352,'BANJARMASIN',8000.00),(353,'BARABAI',8000.00),(354,'BATU LICIN',8000.00),(355,'BUNTOK/BARITO SEL',8000.00),(356,'KANDANGAN',8000.00),(357,'KOTA BARU',8000.00),(358,'MARABAHAN',8000.00),(359,'MUARA TEWEH',8000.00),(360,'PELEIHARI',8000.00),(361,'PURUKCAHU',8000.00),(362,'RANTAU',8000.00),(363,'SUNGAI DANAU',8000.00),(364,'TAMIANGLAYANG',8000.00),(365,'TANJUNG',8000.00),(366,'BANJAR BARU',8000.00),(367,'OTHER KALIMANTAN SELATAN',8000.00),(368,'KASONGAN',8000.00),(369,'KUALA KAPUAS',8000.00),(370,'KUALA KURUN',8000.00),(371,'KUALA PEMBUANG',8000.00),(372,'LAMANDAU/NANGEBULIK',8000.00),(373,'PALANGKARAYA',8000.00),(374,'PANGKALAN BUN',8000.00),(375,'PULAU PISAU',8000.00),(376,'SAMPIT',8000.00),(377,'SUKAMARA',8000.00),(378,'BUNTOK',8000.00),(379,'OTHER KALIMANTAN TENGAH',8000.00),(380,'BALIKPAPAN',8000.00),(381,'PANAJAM',8000.00),(382,'TANAH GROGOT',8000.00),(383,'TANJUNG REDEP/BERAU',8000.00),(384,'KUTAI PANTAI/SENIPAH/HANDIL',8000.00),(385,'SENDAWAR',8000.00),(386,'ANGGANA',8000.00),(387,'KUTAI BARAT',8000.00),(388,'LOA KULU',8000.00),(389,'MUARA BADAK',8000.00),(390,'PALARAN',8000.00),(391,'SAMARINDA',8000.00),(392,'SANGA SANGA',8000.00),(393,'TENGGARONG/ KUTAI KERTANI',8000.00),(394,'BONTANG',8000.00),(395,'TELUK PANDAN',8000.00),(396,'SANGATA',8000.00),(397,'TARAKAN',8000.00),(398,'TANJUNG SELOR',8000.00),(399,'MALINAU',8000.00),(400,'NUNUKAN',8000.00),(401,'SEBATIK',8000.00),(402,'OTHER KALIMANTAN TIMUR',8000.00),(403,'KEPULAUAN BANGGAI',8000.00),(404,'BUAL',8000.00),(405,'DONGGALA/BANAWA',8000.00),(406,'LUWUK',8000.00),(407,'MOROWALI/KOLONEDALE',8000.00),(408,'PALU',8000.00),(409,'PERIGI',8000.00),(410,'POSO',8000.00),(411,'TOJO UNA UNA/AMPANA',8000.00),(412,'TOLI TOLI',8000.00),(413,'OTHER SULAWESI TENGAH',8000.00),(414,'BANTA ENG',8000.00),(415,'BARRU',8000.00),(416,'WATAMPONE',8000.00),(417,'BULUKUMBA',8000.00),(418,'ENREKANG',8000.00),(419,'SUNGGUMINASA',8000.00),(420,'JENE PONTO',8000.00),(421,'MAKALE',8000.00),(422,'MAKASAR',8000.00),(423,'MAROS',8000.00),(424,'MASAMBA',8000.00),(425,'PALOPO',8000.00),(426,'PARE-PARE',8000.00),(427,'PINRANG',8000.00),(428,'BENTENG',8000.00),(429,'SENGKANG',8000.00),(430,'SUNDENRENG RAPPANG',8000.00),(431,'SINJAI',8000.00),(432,'WATANSOMPENG',8000.00),(433,'SOROAKO',8000.00),(434,'MALILI',8000.00),(435,'TAKALAR',8000.00),(436,'BELOPA',8000.00),(437,'OTHER SULAWESI SELATAN',8000.00),(438,'MAJENE',8000.00),(439,'MAMASA',8000.00),(440,'MAMUJU',8000.00),(441,'PASANGKAYU',8000.00),(442,'POLEWALI',8000.00),(443,'OTHER SULAWESI  BARAT',8000.00),(444,'ANDOLO',8000.00),(445,'BAU-BAU',8000.00),(446,'RUMBIA',8000.00),(447,'KENDARI',8000.00),(448,'KOLAKA',8000.00),(449,'LASU SUA',8000.00),(450,'RAHA',8000.00),(451,'UNAAHA',8000.00),(452,'WAKATOBI/WANGI WANGI',8000.00),(453,'PASAR WAJO',8000.00),(454,'MALUKU',8000.00),(455,'AMBON',8000.00),(456,'DOBO',8000.00),(457,'HUNIMOA',8000.00),(458,'PIRU',8000.00),(459,'MASOHI',8000.00),(460,'NAMLEA',8000.00),(461,'SAUMLAKI/TUAL',8000.00),(462,'JAILOLO',8000.00),(463,'LABUHA',8000.00),(464,'MABA',8000.00),(465,'SANANA',8000.00),(466,'WEDA/SOASIU',8000.00),(467,'TERNATE',8000.00),(468,'TOBELO',8000.00),(469,'TIDORE',8000.00),(470,'OTHER SULAWESI TENGGARA',8000.00),(471,'TILAMUTA',8000.00),(472,'SUWAWA',8000.00),(473,'GORONTALO',8000.00),(474,'LIMBOTO',8000.00),(475,'MARISA',8000.00),(476,'KWANDANG',8000.00),(477,'OTHER GORONTALO',8000.00),(478,'AMURANG',8000.00),(479,'BITUNG',8000.00),(480,'KOTAMOBAGU',8000.00),(481,'MANADO',8000.00),(482,'AIRMADIDI',8000.00),(483,'TAHUNA',8000.00),(484,'TOMOHON',8000.00),(485,'TONDANO',8000.00),(486,'RATAHAN',8000.00),(487,'BOROKO',8000.00),(488,'OTHER SULAWESI UTARA',8000.00),(489,'BIMA',8000.00),(490,'BATU HIJAU',8000.00),(491,'RAMBA/WOHA',8000.00),(492,'DOMPU',8000.00),(493,'GERUNG',8000.00),(494,'MATARAM',8000.00),(495,'PRAYA',8000.00),(496,'SELONG',8000.00),(497,'SEMBAWA-BESAR',8000.00),(498,'TALIWANG',8000.00),(499,'OTHER NTB',8000.00),(500,'KALABAHI',8000.00),(501,'ATAMBUA',8000.00),(502,'ROTE NDAO',8000.00),(503,'BAJAWA',8000.00),(504,'ENDE',8000.00),(505,'KAFEMENAHU',8000.00),(506,'KUPANG',8000.00),(507,'LABUAN BAJO',8000.00),(508,'LARANTUKA',8000.00),(509,'LEWOLEBA',8000.00),(510,'MAUMERE',8000.00),(511,'MANGGARAI/SOE',8000.00),(512,'WAIKABUBAK',8000.00),(513,'WAINGAPU',8000.00),(514,'BORONG',8000.00),(515,'MBAY',8000.00),(516,'OELAMASI',8000.00),(517,'TAMBOLAKA',8000.00),(518,'WAIBAKUL',8000.00),(519,'OTHER NTT',8000.00),(520,'AGATS',8000.00),(521,'BIAK',8000.00),(522,'JAYAPURA',8000.00),(523,'WARIS',8000.00),(524,'MAAPI',8000.00),(525,'MERAUKE',8000.00),(526,'MULIA',8000.00),(527,'NABIRE',8000.00),(528,'OKSIBIL',8000.00),(529,'PANIAI',8000.00),(530,'SARMI',8000.00),(531,'SORENDIWARI',8000.00),(532,'KARUBAGA',8000.00),(533,'WAMENA',8000.00),(534,'BOTWA/MAROPEN',8000.00),(535,'SUMOHAI',8000.00),(536,'YAPEN WAROPEN',8000.00),(537,'SENTANI',8000.00),(538,'MAMBERAMO',8000.00),(539,'BOVEN DIGUL',8000.00),(540,'OTHER PAPUA',8000.00),(541,'FAK-FAK',8000.00),(542,'KAIMANA',8000.00),(543,'MANOKWARI',8000.00),(544,'RAJA AMPAT/WAISAI',8000.00),(545,'SORONG',8000.00),(546,'BINTUNI',8000.00),(547,'SORONG SEL',8000.00),(548,'RASEI',8000.00),(549,'OTHER PAPUA BARAT',8000.00),(550,'TIMIKA',8000.00),(551,'TEMBAGA PURA',8000.00),(552,'OTHER TIMIKA',8000.00),(553,'DKI JAKARTA',8000.00),(554,'AMBIL DI TEMPAT',8000.00);

UNLOCK TABLES;

/*Table structure for table `tbl_shipping` */

DROP TABLE IF EXISTS `tbl_shipping`;

CREATE TABLE `tbl_shipping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `city_id` int(11) NOT NULL,
  `first_name` varchar(25) DEFAULT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `phone` varchar(14) DEFAULT NULL,
  `address` varchar(100) DEFAULT NULL,
  `country` varchar(25) DEFAULT 'indonesia',
  `postal_code` varchar(10) DEFAULT NULL,
  `cost_shipping` decimal(12,2) DEFAULT NULL,
  PRIMARY KEY (`order_id`,`city_id`),
  KEY `id` (`id`),
  KEY `city_id` (`city_id`),
  CONSTRAINT `tbl_shipping_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `transaksi` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `tbl_shipping_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `tbl_city` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_shipping` */

LOCK TABLES `tbl_shipping` WRITE;

insert  into `tbl_shipping`(`id`,`order_id`,`city_id`,`first_name`,`last_name`,`phone`,`address`,`country`,`postal_code`,`cost_shipping`) values (4,8,2,'Samuel','erwardi','0897','Jalan Jalan','indonesia','1212',8000.00),(2,8,3,'Samuel','erwardi','0897','Jalan Jalan','indonesia','1212',8000.00),(40,8,553,'sami','sami','000','jalan','indonesia','22222',8000.00),(42,11,3,'sami','sami','sami','sami','indonesia','12',8000.00),(43,12,1,'samuel','Sam','08979597835','Jakarta','indonesia','123123',8000.00),(47,16,1,'asdasdlkj','asdlkj','0219228728','asdadkajsd','indonesia','1233',8000.00),(48,18,1,'Samuel','Erwardi','0899999','Jakarta','indonesia','200000',120000.00),(49,19,8,'Sam','sam','0219228728','asdadkajsd','indonesia','1233',8000.00),(50,23,2,'Samuel Erwardi','Sam','089999','asd','indonesia','asd',8000.00);

UNLOCK TABLES;

/*Table structure for table `tbl_user` */

DROP TABLE IF EXISTS `tbl_user`;

CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` enum('admin','customer') DEFAULT 'customer',
  `email` varchar(25) DEFAULT NULL,
  `first_name` varchar(25) DEFAULT NULL,
  `last_name` varchar(25) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `created_timestamp` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `is_active` tinyint(1) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

/*Data for the table `tbl_user` */

LOCK TABLES `tbl_user` WRITE;

insert  into `tbl_user`(`id`,`type`,`email`,`first_name`,`last_name`,`password`,`created_timestamp`,`is_active`) values (1,'customer','samuelerwardi@gmail.com1','123','123','21232f297a57a5a743894a0e4a801fc3','2016-05-26 13:55:04',1),(2,'customer','sam@antikode.com','123','123','202cb962ac59075b964b07152d234b70','2016-05-26 13:55:04',1),(3,'customer','samuelerwardi@gmail.coms','asd','asd','64cbf0c4c7ac4ba2160bf1204f82d10a','2016-05-26 13:55:04',1),(4,'admin','admin@gmail.com','admin',NULL,'21232f297a57a5a743894a0e4a801fc3','2016-05-29 23:15:48',1),(5,'customer','samsam@gmail.com','sam','sam','a8f5f167f44f4964e6c998dee827110c','2016-06-04 12:11:39',1);

UNLOCK TABLES;

/*Table structure for table `transaksi` */

DROP TABLE IF EXISTS `transaksi`;

CREATE TABLE `transaksi` (
  `order_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `shipping_id` int(11) DEFAULT NULL,
  `total_belanja` decimal(12,2) DEFAULT NULL,
  `total_shipping` decimal(12,2) DEFAULT '0.00',
  `grand_total` decimal(12,2) DEFAULT NULL,
  `status` enum('shopping_cart','checkout','paid','canceled') DEFAULT 'shopping_cart',
  `akun_bank_customer` text,
  `created_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `checkout_timestamp` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`order_id`),
  KEY `user_id` (`user_id`),
  KEY `transaksi_ibfk_2` (`shipping_id`),
  CONSTRAINT `transaksi_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `tbl_user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transaksi_ibfk_2` FOREIGN KEY (`shipping_id`) REFERENCES `tbl_shipping` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=latin1;

/*Data for the table `transaksi` */

LOCK TABLES `transaksi` WRITE;

insert  into `transaksi`(`order_id`,`user_id`,`shipping_id`,`total_belanja`,`total_shipping`,`grand_total`,`status`,`akun_bank_customer`,`created_timestamp`,`checkout_timestamp`) values (8,1,4,8000.00,8000.00,16000.00,'shopping_cart',NULL,'2016-05-27 22:45:53','2016-07-08 00:17:08'),(11,4,42,600000.00,8000.00,608000.00,'canceled','Michelle Renata','2016-06-04 01:33:02','2016-07-08 00:17:08'),(12,4,43,300000.00,8000.00,308000.00,'canceled',NULL,'2016-06-04 12:00:09','2016-07-08 00:17:08'),(16,4,47,30000.00,8000.00,38000.00,'canceled',NULL,'2016-06-10 20:44:15','2016-07-08 00:17:08'),(17,4,NULL,12000444.00,0.00,12000444.00,'canceled',NULL,'2016-06-13 12:09:40','2016-07-08 00:17:08'),(18,4,48,6000.00,120000.00,126000.00,'canceled',NULL,'2016-07-08 00:06:19','2016-07-08 00:17:08'),(19,4,49,2000.00,8000.00,10000.00,'canceled',NULL,'2016-07-08 00:17:39','2016-07-08 01:12:51'),(20,4,NULL,3300000.00,0.00,3300000.00,'shopping_cart',NULL,'2016-07-08 02:20:18',NULL),(21,4,NULL,3300000.00,0.00,3300000.00,'shopping_cart',NULL,'2016-07-08 02:29:12',NULL),(22,4,NULL,600000.00,0.00,600000.00,'shopping_cart',NULL,'2016-07-08 02:32:11',NULL),(23,4,50,600000.00,8000.00,608000.00,'checkout',NULL,'2016-07-08 02:33:11','2016-07-08 02:34:02');

UNLOCK TABLES;

/*Table structure for table `transaksi_detail` */

DROP TABLE IF EXISTS `transaksi_detail`;

CREATE TABLE `transaksi_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `qty` int(11) DEFAULT NULL,
  `buying_price` int(11) DEFAULT NULL,
  PRIMARY KEY (`order_id`,`product_id`),
  KEY `id` (`id`),
  KEY `product_id` (`product_id`),
  CONSTRAINT `transaksi_detail_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `transaksi` (`order_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `transaksi_detail_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=latin1;

/*Data for the table `transaksi_detail` */

LOCK TABLES `transaksi_detail` WRITE;

insert  into `transaksi_detail`(`id`,`order_id`,`product_id`,`qty`,`buying_price`) values (30,8,8,1,2000),(31,8,9,2,3000),(35,11,5,2,300000),(36,12,17,1,300000),(41,16,11,1,30000),(42,17,8,1,12000000),(43,17,9,2,222),(44,18,4,2,3000),(45,19,1,1,2000),(46,20,17,11,300000),(47,21,17,11,300000),(48,22,17,2,300000),(49,23,17,2,300000);

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;