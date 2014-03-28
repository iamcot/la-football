# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.6.14)
# Database: la_shop
# Generation Time: 2014-03-28 11:02:47 +0000
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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `lacategories` WRITE;
/*!40000 ALTER TABLE `lacategories` DISABLE KEYS */;

INSERT INTO `lacategories` (`id`, `latitle`, `laparent_id`, `laurl`, `lainfo`, `ladeleted`, `laorder`, `laimage`, `updated_at`, `created_at`)
VALUES
	(1,'Mỹ phẩm',0,'mypham','thông tin mỹ phẩm ',0,0,'v5Irxuqd9kffl8C6ubpbrQHhmDkTGVgd.jpg','2014-03-28 10:09:22','2014-03-28 07:43:39'),
	(2,'Kem trắng da',1,'mypham','thông tin ',0,1,'qlVZl59h0vSbF0Jq6WDQxjvnMWqGV3JL.jpg','2014-03-28 10:31:56','2014-03-28 07:56:17'),
	(3,'Son',2,'son','12312',0,0,'m4LeOEfzWR1ZWJeRFPMtmXzW7hOdoKzp.gif','2014-03-28 10:10:14','2014-03-28 08:06:54');

/*!40000 ALTER TABLE `lacategories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table laimages
# ------------------------------------------------------------

DROP TABLE IF EXISTS `laimages`;

CREATE TABLE `laimages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `latitle` varchar(50) DEFAULT NULL,
  `laproduct_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table laproducts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `laproducts`;

CREATE TABLE `laproducts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `latitle` varchar(100) DEFAULT '',
  `lakeyword` text,
  `ladescription` text,
  `lashortinfo` text,
  `lalonginfo` text,
  `lauseguide` text,
  `lathumb` varchar(50) DEFAULT NULL,
  `lacategory_id` int(11) DEFAULT NULL,
  `lamanufactor_id` int(11) DEFAULT NULL,
  `laoldprice` int(11) DEFAULT NULL,
  `laprice` int(11) DEFAULT NULL,
  `laamount` int(11) DEFAULT NULL,
  `ladatenew` int(11) DEFAULT NULL,
  `lacreatedate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `ladeleted` int(11) DEFAULT NULL,
  `laurl` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



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
