# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.6.14)
# Database: la_shop
# Generation Time: 2014-04-23 11:11:25 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table facebookuser
# ------------------------------------------------------------

DROP TABLE IF EXISTS `facebookuser`;

CREATE TABLE `facebookuser` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `facebookname` text,
  `facebookid` varchar(50) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `locale` varchar(20) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `fanpage_id` varchar(50) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



# Dump of table fanpage
# ------------------------------------------------------------

DROP TABLE IF EXISTS `fanpage`;

CREATE TABLE `fanpage` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `pageid` varchar(50) DEFAULT NULL,
  `pageusername` varchar(50) DEFAULT NULL,
  `pagename` varchar(50) DEFAULT NULL,
  `likes` int(11) DEFAULT NULL,
  `category` varchar(50) DEFAULT NULL,
  `about` text,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `fanpage` WRITE;
/*!40000 ALTER TABLE `fanpage` DISABLE KEYS */;

INSERT INTO `fanpage` (`id`, `pageid`, `pageusername`, `pagename`, `likes`, `category`, `about`, `updated_at`, `created_at`)
VALUES
	(3,'234651959992097','L2VNFanpage','L2vn.com',4949,'Games/toys','L2VN - Lindvior. Client 3D MMORPG. Open Beta 24/4\nTrang chủ: http://l2vn.com/. \nDownload: http://l2vn.com/tin-tuc/Chinh-thuc-cho-Download-Lindvior--93','2014-04-23 17:55:54','2014-04-23 17:55:54');

/*!40000 ALTER TABLE `fanpage` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
