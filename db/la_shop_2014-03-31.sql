# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.6.14)
# Database: la_shop
# Generation Time: 2014-03-31 11:06:41 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table lacategories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `lacategories`;

CREATE TABLE `lacategories` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `latitle` varchar(50) DEFAULT NULL,
  `laparent_id` int(11) DEFAULT NULL,
  `laurl` varchar(50) DEFAULT NULL,
  `lainfo` text,
  `ladeleted` int(11) NOT NULL DEFAULT '0',
  `laorder` int(11) DEFAULT NULL,
  `laimage` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `laicon` varchar(100) NOT NULL DEFAULT 'glyphicon glyphicon-link',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `lacategories` WRITE;
/*!40000 ALTER TABLE `lacategories` DISABLE KEYS */;

INSERT INTO `lacategories` (`id`, `latitle`, `laparent_id`, `laurl`, `lainfo`, `ladeleted`, `laorder`, `laimage`, `updated_at`, `created_at`, `laicon`)
VALUES
	(1,'Mỹ phẩm',0,'mypham','thông tin mỹ phẩm ',0,0,'x6n3TsCh4sGiFCn0UokGA9tw91WLpaAf.jpg','2014-03-28 17:31:32','2014-03-28 07:43:39','glyphicon glyphicon-link'),
	(2,'Kem trắng da',1,'mypham','thông tin ',0,2,'chIDQP0yCtKGh1hVH9XHZAiGmjFReT4t.jpg','2014-03-28 16:46:14','2014-03-28 07:56:17',''),
	(3,'Son',1,'son','12312',0,7,'m4LeOEfzWR1ZWJeRFPMtmXzW7hOdoKzp.gif','2014-03-31 04:14:00','2014-03-28 08:06:54',''),
	(4,'Mood matcher',5,'','',0,7,NULL,'2014-03-31 04:14:07','2014-03-28 11:48:29',''),
	(5,'Han quoc',0,'','',0,0,NULL,'2014-03-28 11:48:45','2014-03-28 11:48:45','glyphicon glyphicon-link'),
	(6,'USA',0,'','',0,0,NULL,'2014-03-28 11:48:57','2014-03-28 11:48:57','glyphicon glyphicon-link'),
	(7,'Kem den da',1,'','',0,1,NULL,'2014-03-28 11:49:13','2014-03-28 11:49:13',''),
	(8,'kathydoll',5,'','',0,5,NULL,'2014-03-28 11:49:27','2014-03-28 11:49:27','');

/*!40000 ALTER TABLE `lacategories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table laconfig
# ------------------------------------------------------------

DROP TABLE IF EXISTS `laconfig`;

CREATE TABLE `laconfig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lavar` varchar(20) DEFAULT NULL,
  `lavalue` text,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `laconfig` WRITE;
/*!40000 ALTER TABLE `laconfig` DISABLE KEYS */;

INSERT INTO `laconfig` (`id`, `lavar`, `lavalue`, `updated_at`, `created_at`)
VALUES
	(1,'slide','sgj3xx9rOYBtaspAPaUpxjPpYYVAHxp6.jpg|aaa|bb\r\neInENkKcIjR7LZ4X9KK5wFa2rcpTTrQr.jpg|asdasd|2323','2014-03-31 03:26:48','2014-03-30 19:13:26'),
	(2,'sidebarads','dGZ9xC23Zyx5Nt5Jay7EhuUobUJ90goa.jpg|aaa|123\r\ntcNLV4bdnwIg3ZstxvXY30FuD3CpuPHG.jpg|bbb|456','2014-03-31 07:52:01','2014-03-31 07:52:01');

/*!40000 ALTER TABLE `laconfig` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table laimages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `laimages`;

CREATE TABLE `laimages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lapic` varchar(50) DEFAULT NULL,
  `latitle` varchar(100) DEFAULT NULL,
  `laproduct_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `laimages` WRITE;
/*!40000 ALTER TABLE `laimages` DISABLE KEYS */;

INSERT INTO `laimages` (`id`, `lapic`, `latitle`, `laproduct_id`, `updated_at`, `created_at`)
VALUES
	(7,'udptnlkOWiW72NEWuRE0KALLUaDagZgq.jpg','',2,'2014-03-30 16:05:57','2014-03-30 16:05:57'),
	(8,'VNbHtjyocEyqUWYoK6mzioL9aiq5gZfX.jpg','',2,'2014-03-30 16:05:57','2014-03-30 16:05:57'),
	(9,'Logs1syOzFKT3Fk6q9TGat0dK4IlwaBZ.jpg','',5,'2014-03-31 02:52:42','2014-03-31 02:52:42'),
	(10,'URYYjoymHqCw1K6DLNSMBSb7fWUu6YpU.png','',5,'2014-03-31 02:52:42','2014-03-31 02:52:42'),
	(11,'54jSBUv6Q6Y3EiE62obAKN1akBsSAc0r.jpg','',5,'2014-03-31 02:52:42','2014-03-31 02:52:42'),
	(12,'sgj3xx9rOYBtaspAPaUpxjPpYYVAHxp6.jpg','',6,'2014-03-31 03:26:17','2014-03-31 03:26:17'),
	(13,'eInENkKcIjR7LZ4X9KK5wFa2rcpTTrQr.jpg','',6,'2014-03-31 03:26:17','2014-03-31 03:26:17'),
	(14,'dGZ9xC23Zyx5Nt5Jay7EhuUobUJ90goa.jpg','',7,'2014-03-31 07:52:24','2014-03-31 07:52:24'),
	(15,'tcNLV4bdnwIg3ZstxvXY30FuD3CpuPHG.jpg','',7,'2014-03-31 07:52:24','2014-03-31 07:52:24');

/*!40000 ALTER TABLE `laimages` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table lamanufactors
# ------------------------------------------------------------

DROP TABLE IF EXISTS `lamanufactors`;

CREATE TABLE `lamanufactors` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `latitle` varchar(50) DEFAULT NULL,
  `laurl` varchar(50) DEFAULT NULL,
  `ladeleted` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `lainfo` text,
  `laimage` varchar(50) DEFAULT NULL,
  `laorder` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `lamanufactors` WRITE;
/*!40000 ALTER TABLE `lamanufactors` DISABLE KEYS */;

INSERT INTO `lamanufactors` (`id`, `latitle`, `laurl`, `ladeleted`, `updated_at`, `created_at`, `lainfo`, `laimage`, `laorder`)
VALUES
	(1,'The Face Shop 2','thefaceshop2',NULL,'2014-03-28 17:29:50','2014-03-28 17:21:39','the face shop','QGlk10nFqmHK6hfHPCjRzzS1rDofYkrJ.jpg',2),
	(2,'USA','usa',NULL,'2014-03-28 17:32:15','2014-03-28 17:32:15','usa','eqTBbN8WvXU7sZeAS26ZMvFriLHjhBks.jpg',2);

/*!40000 ALTER TABLE `lamanufactors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table laproducts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `laproducts`;

CREATE TABLE `laproducts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `latitle` varchar(100) DEFAULT '',
  `lakeyword` text,
  `ladescription` text,
  `lashortinfo` text,
  `lainfo` text,
  `lauseguide` text,
  `laimage` varchar(50) DEFAULT NULL,
  `lacategory_id` int(11) DEFAULT NULL,
  `lamanufactor_id` int(11) DEFAULT NULL,
  `laoldprice` int(11) DEFAULT NULL,
  `laprice` int(11) DEFAULT NULL,
  `laamount` int(11) DEFAULT NULL,
  `ladatenew` int(11) DEFAULT NULL,
  `ladeleted` int(11) DEFAULT NULL,
  `laurl` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `laproducts` WRITE;
/*!40000 ALTER TABLE `laproducts` DISABLE KEYS */;

INSERT INTO `laproducts` (`id`, `latitle`, `lakeyword`, `ladescription`, `lashortinfo`, `lainfo`, `lauseguide`, `laimage`, `lacategory_id`, `lamanufactor_id`, `laoldprice`, `laprice`, `laamount`, `ladatenew`, `ladeleted`, `laurl`, `updated_at`, `created_at`)
VALUES
	(1,'Kem ủ trắng 2','tu khoa,hehe,haha',NULL,'thong tin ngan','thông tin2','hdsd222','TdYs3TtwU2ApJhIW6ga9QW7KxjXyLG8E.jpg',2,2,230000,200000,10,1399161600,NULL,'kemutrang2','2014-03-28 19:03:37','2014-03-28 18:55:50'),
	(2,'Son dưỡng môi','son, môi',NULL,'son dưỡng môi','thông tin son','thoa lên môi','udptnlkOWiW72NEWuRE0KALLUaDagZgq.jpg',3,1,150000,130000,20,1399161600,NULL,'son','2014-03-30 16:05:57','2014-03-29 12:48:59'),
	(5,'Son B','',NULL,'','<p><img alt=\"\" src=\"http://localhost/la-shop/www/uploads/product/TXryyzvFLq5cWK2XMEfqGZ8oG28wiEJb.jpg\" style=\"height:643px; width:960px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#FF0000\"><strong><span style=\"background-color:#FFD700\">hehehe</span></strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#FF0000\"><strong><span style=\"background-color:#FFD700\"><img alt=\"\" src=\"http://localhost/la-shop/www/uploads/thumbnails/product/BWzllCvMWpJfS0Wsu6WmxAgQdBtVegmV.jpg\" style=\"height:167px; width:200px\" /></span></strong></span></p>\r\n','','54jSBUv6Q6Y3EiE62obAKN1akBsSAc0r.jpg',3,1,250000,200000,10,1396656000,0,'sonb','2014-03-31 03:25:37','2014-03-30 14:51:25'),
	(6,'Promotion','',NULL,'','','','sgj3xx9rOYBtaspAPaUpxjPpYYVAHxp6.jpg',0,0,0,0,0,0,1,'promote','2014-03-31 07:52:43','2014-03-31 03:26:17'),
	(7,'Sidebarads','',NULL,'','','','dGZ9xC23Zyx5Nt5Jay7EhuUobUJ90goa.jpg',0,0,0,0,0,0,1,'','2014-03-31 07:52:24','2014-03-31 07:52:24');

/*!40000 ALTER TABLE `laproducts` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table latags
# ------------------------------------------------------------

DROP TABLE IF EXISTS `latags`;

CREATE TABLE `latags` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `latitle` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `laproduct_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table lauser
# ------------------------------------------------------------

DROP TABLE IF EXISTS `lauser`;

CREATE TABLE `lauser` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lausername` varchar(50) DEFAULT NULL,
  `lapassword` varchar(50) DEFAULT NULL,
  `larole` varchar(20) DEFAULT NULL,
  `lastatus` int(11) DEFAULT NULL,
  `lafullname` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `lauser` WRITE;
/*!40000 ALTER TABLE `lauser` DISABLE KEYS */;

INSERT INTO `lauser` (`id`, `lausername`, `lapassword`, `larole`, `lastatus`, `lafullname`, `updated_at`, `created_at`)
VALUES
	(1,'admin',NULL,'admin',1,'Administrator',NULL,NULL);

/*!40000 ALTER TABLE `lauser` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
