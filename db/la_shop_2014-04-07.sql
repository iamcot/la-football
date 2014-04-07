# ************************************************************
# Sequel Pro SQL dump
# Version 4096
#
# http://www.sequelpro.com/
# http://code.google.com/p/sequel-pro/
#
# Host: localhost (MySQL 5.6.14)
# Database: la_shop
# Generation Time: 2014-04-07 11:22:02 +0000
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
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`laurl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `lacategories` WRITE;
/*!40000 ALTER TABLE `lacategories` DISABLE KEYS */;

INSERT INTO `lacategories` (`id`, `latitle`, `laparent_id`, `laurl`, `lainfo`, `ladeleted`, `laorder`, `laimage`, `updated_at`, `created_at`, `laicon`)
VALUES
	(1,'Mỹ phẩm',0,'mypham','thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm ',0,0,'I8WJzyUvTLZaomrYkoYVnLmdk0G1Teve.jpg','2014-04-07 09:50:41','2014-03-28 07:43:39','glyphicon glyphicon-link'),
	(2,'Kem trắng da',1,'kem-trang-da','thông tin ',0,2,'AROJhocM9BrNmpzhzbgCxD8KOoSNCsWx.jpg','2014-04-01 17:17:45','2014-03-28 07:56:17',''),
	(3,'Son',1,'son','12312',0,7,'VRNHmQBcyTEMgNKX187kNKSAxcsHsGvg.jpg','2014-04-01 17:18:13','2014-03-28 08:06:54',''),
	(4,'Mood matcher',5,'1','',0,7,NULL,'2014-03-31 04:14:07','2014-03-28 11:48:29',''),
	(5,'Han quoc',0,'2','thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm ',0,0,'ph1cYCOA2ExVu0kwpbKIUYDOf9wnp0Wt.jpg','2014-04-07 09:50:57','2014-03-28 11:48:45','glyphicon glyphicon-link'),
	(6,'USA',0,'3','thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm ',0,0,'3mHjyjaJeMH7a7Tgj3XnutsAdpiZuOnE.png','2014-04-07 09:51:07','2014-03-28 11:48:57','glyphicon glyphicon-link'),
	(7,'Kem den da',1,'4','',0,1,'OXT51YOYlnHBtUMNS83epd7HT9zWp4OY.jpg','2014-04-01 17:18:47','2014-03-28 11:49:13',''),
	(8,'kathydoll',5,'5','',0,5,NULL,'2014-03-28 11:49:27','2014-03-28 11:49:27',''),
	(9,'Tin tức',0,'tin-tuc','',0,999,NULL,'2014-04-02 19:40:33','2014-04-02 19:40:16','glyphicon glyphicon-link');

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
	(1,'slide','kJPParAqc763imprgOwQ22Nc9IPFrpCH.png|aaa|bb\r\nbpOt8lOqPwcmCKoFVMiS8IFcBOQSHouO.png|ccc|123','2014-04-07 09:52:38','2014-03-30 19:13:26'),
	(2,'sidebarads','tXbetixVTYxvcEBrzeYtIsw5TEnBJsQW.jpg|aaa|123\r\nziLW3sUPJypqisnSjLAdZOs3dJHwvDKg.jpg|bbb|456','2014-03-31 11:57:51','2014-03-31 07:52:01');

/*!40000 ALTER TABLE `laconfig` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table lafacebookprofiles
# ------------------------------------------------------------

DROP TABLE IF EXISTS `lafacebookprofiles`;

CREATE TABLE `lafacebookprofiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `lausername` text CHARACTER SET latin1,
  `uid` bigint(20) unsigned DEFAULT NULL,
  `laaccess_token` text CHARACTER SET latin1,
  `laaccess_token_secret` text CHARACTER SET latin1,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;



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
	(16,'tXbetixVTYxvcEBrzeYtIsw5TEnBJsQW.jpg','',7,'2014-03-31 11:58:02','2014-03-31 11:58:02'),
	(17,'ziLW3sUPJypqisnSjLAdZOs3dJHwvDKg.jpg','',7,'2014-03-31 11:58:02','2014-03-31 11:58:02'),
	(18,'Wl6XIMr7TpvNrcMm9QQ3yiLWhkLvxNfy.jpg','',6,'2014-03-31 11:59:14','2014-03-31 11:59:14'),
	(20,'WHE7pBGqrlqRqrDa4Z6y12zPdUr7AOnk.jpg','',1,'2014-03-31 15:46:25','2014-03-31 15:46:25'),
	(21,'akpahWbp5QpmB5AFfCWZ5Edkme38pgxE.jpg','',5,'2014-03-31 16:24:51','2014-03-31 16:24:51'),
	(22,'gv8907MSchLpHUJedcRNKKj3ZjzsBKQg.jpg','',5,'2014-03-31 16:25:24','2014-03-31 16:25:24'),
	(23,'1Q9RdaVQ5q9mHY0uBmQhoFGni4oRPMeZ.png','',8,'2014-04-01 13:40:07','2014-04-01 13:40:07'),
	(24,'dV3oUi3kMUIBjjHHGEehL8iixxw4QDsr.jpg','',8,'2014-04-01 13:40:07','2014-04-01 13:40:07'),
	(25,'ySxgyVoj0VQwCP7T1xgg5LAccJky6AWt.jpg','',5,'2014-04-01 14:46:58','2014-04-01 14:46:58'),
	(26,'gRYoQtGVXwjP7a4ym5L0sgEPTbQM7qCg.jpg','',5,'2014-04-01 14:46:58','2014-04-01 14:46:58'),
	(27,'Jj15GRwxQEg5MoqtJB6RjpqWyde6GP0N.jpg','',5,'2014-04-01 14:46:58','2014-04-01 14:46:58'),
	(28,'ELDUCsCCjBmnhrL0xOubv8KwZVigN7V3.jpg','',9,'2014-04-01 15:54:15','2014-04-01 15:54:15'),
	(29,'u2tCzeH38R4ZwALNckasC9kdvvxbPAZr.jpg','',9,'2014-04-01 15:54:15','2014-04-01 15:54:15'),
	(30,'al7sblymnSuQCt6s8e8sMMLc08KwR5i4.jpg','',5,'2014-04-07 14:18:19','2014-04-07 14:18:19'),
	(31,'XMYF6qvnE32hs3Hsx8BRMFq6Dzu77cPZ.jpg','',8,'2014-04-07 14:19:12','2014-04-07 14:19:12');

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
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`laurl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `lamanufactors` WRITE;
/*!40000 ALTER TABLE `lamanufactors` DISABLE KEYS */;

INSERT INTO `lamanufactors` (`id`, `latitle`, `laurl`, `ladeleted`, `updated_at`, `created_at`, `lainfo`, `laimage`, `laorder`)
VALUES
	(1,'The Face Shop 2','thefaceshop2',NULL,'2014-03-28 17:29:50','2014-03-28 17:21:39','the face shop','QGlk10nFqmHK6hfHPCjRzzS1rDofYkrJ.jpg',2),
	(2,'USA','usa',NULL,'2014-03-28 17:32:15','2014-03-28 17:32:15','usa','eqTBbN8WvXU7sZeAS26ZMvFriLHjhBks.jpg',2);

/*!40000 ALTER TABLE `lamanufactors` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table laorderitems
# ------------------------------------------------------------

DROP TABLE IF EXISTS `laorderitems`;

CREATE TABLE `laorderitems` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `latitle` text COLLATE utf8_unicode_ci,
  `amount` int(11) DEFAULT NULL,
  `laprice` int(11) DEFAULT NULL,
  `variantname` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `producturl` text COLLATE utf8_unicode_ci,
  `caturl` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `variantid` int(11) DEFAULT NULL,
  `laimage` text COLLATE utf8_unicode_ci,
  `lakhoiluong` int(11) DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `product_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `laorderitems` WRITE;
/*!40000 ALTER TABLE `laorderitems` DISABLE KEYS */;

INSERT INTO `laorderitems` (`id`, `order_id`, `latitle`, `amount`, `laprice`, `variantname`, `producturl`, `caturl`, `variantid`, `laimage`, `lakhoiluong`, `updated_at`, `created_at`, `product_id`)
VALUES
	(1,1,'Son B',2,200000,'Đỏ','sonb','son',5,'XMYF6qvnE32hs3Hsx8BRMFq6Dzu77cPZ.jpg',200,'2014-04-07 16:33:08','2014-04-07 16:33:08',8),
	(2,2,'Kem ủ trắng 2',1,300000,'','kemutrang2','son',0,'WHE7pBGqrlqRqrDa4Z6y12zPdUr7AOnk.jpg',200,'2014-04-07 16:34:09','2014-04-07 16:34:09',1),
	(3,2,'Son dưỡng môi',1,130000,'','son','son',0,'udptnlkOWiW72NEWuRE0KALLUaDagZgq.jpg',180,'2014-04-07 16:34:09','2014-04-07 16:34:09',2),
	(4,3,'Kem ủ trắng 2',1,300000,'','kemutrang2','son',0,'WHE7pBGqrlqRqrDa4Z6y12zPdUr7AOnk.jpg',200,'2014-04-07 16:49:50','2014-04-07 16:49:50',1);

/*!40000 ALTER TABLE `laorderitems` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table laorders
# ------------------------------------------------------------

DROP TABLE IF EXISTS `laorders`;

CREATE TABLE `laorders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lashipping` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lapayment` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lasumkhoiluong` int(11) DEFAULT NULL,
  `lafeeshipping` int(11) DEFAULT NULL,
  `laordername` text COLLATE utf8_unicode_ci,
  `laordertel` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `laorderemail` text COLLATE utf8_unicode_ci,
  `laorderaddr` text COLLATE utf8_unicode_ci,
  `laorderprovince` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `laorderdistrict` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `uid` bigint(20) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `order_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '0',
  `voucher` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `giamvoucher` int(11) DEFAULT NULL,
  `sumsanpham` int(11) DEFAULT NULL,
  `laordernote` text COLLATE utf8_unicode_ci,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

LOCK TABLES `laorders` WRITE;
/*!40000 ALTER TABLE `laorders` DISABLE KEYS */;

INSERT INTO `laorders` (`id`, `lashipping`, `lapayment`, `lasumkhoiluong`, `lafeeshipping`, `laordername`, `laordertel`, `laorderemail`, `laorderaddr`, `laorderprovince`, `laorderdistrict`, `updated_at`, `created_at`, `uid`, `user_id`, `order_status`, `voucher`, `giamvoucher`, `sumsanpham`, `laordernote`)
VALUES
	(1,'ship_xe','pay_chuyenkhoan',400,55000,'thang','1234567889','','buon ma thuot','daklak','0','2014-04-07 17:33:24','2014-04-07 16:33:08',NULL,NULL,'9','',0,400000,NULL),
	(2,'ship_ems','pay_cod',380,58560,'thang 2','0123456788922','thang102@gmail.com','buon ma thuot','daklak','0','2014-04-07 17:32:38','2014-04-07 16:34:09',NULL,NULL,'0','',0,430000,NULL),
	(3,'ship_hcm','pay_tienmat',200,40000,'thang 3','1234567889','thang102@gmail.com','buon ma thuot','hcm','q2','2014-04-07 17:32:45','2014-04-07 16:49:50',NULL,NULL,'2','',0,300000,'giao vao buoi sang');

/*!40000 ALTER TABLE `laorders` ENABLE KEYS */;
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
  `lacategory_id` int(11) DEFAULT '0',
  `lamanufactor_id` int(11) DEFAULT '0',
  `laoldprice` int(11) DEFAULT '0',
  `laprice` int(11) DEFAULT '0',
  `laamount` int(11) DEFAULT '0',
  `ladatenew` int(11) DEFAULT '0',
  `ladeleted` int(11) DEFAULT '0',
  `laurl` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `lakhoiluong` varchar(20) DEFAULT NULL,
  `ladungtich` varchar(20) DEFAULT NULL,
  `laview` int(11) NOT NULL DEFAULT '0',
  `lachucnang` varchar(100) DEFAULT NULL,
  `lavariant_id` int(11) NOT NULL DEFAULT '0',
  `laproduct_id` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `url` (`laurl`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `laproducts` WRITE;
/*!40000 ALTER TABLE `laproducts` DISABLE KEYS */;

INSERT INTO `laproducts` (`id`, `latitle`, `lakeyword`, `ladescription`, `lashortinfo`, `lainfo`, `lauseguide`, `laimage`, `lacategory_id`, `lamanufactor_id`, `laoldprice`, `laprice`, `laamount`, `ladatenew`, `ladeleted`, `laurl`, `updated_at`, `created_at`, `lakhoiluong`, `ladungtich`, `laview`, `lachucnang`, `lavariant_id`, `laproduct_id`)
VALUES
	(1,'Kem ủ trắng 2','tu khoa,hehe,haha',NULL,'thong tin ngan','<p>th&ocirc;ng tin2</p>\r\n','hdsd222','WHE7pBGqrlqRqrDa4Z6y12zPdUr7AOnk.jpg',3,2,230000,300000,10,1399136400,0,'kemutrang2','2014-04-04 00:17:08','2014-03-28 18:55:50','200','',0,'',0,''),
	(2,'Son dưỡng môi','son, môi',NULL,'son dưỡng môi','<p>th&ocirc;ng tin son</p>\r\n','thoa lên môi','udptnlkOWiW72NEWuRE0KALLUaDagZgq.jpg',3,1,150000,130000,20,1396630800,0,'son','2014-04-04 00:17:33','2014-03-29 12:48:59','180','',0,'',0,''),
	(5,'Son B','',NULL,'','<p><img alt=\"\" src=\"http://localhost/la-shop/www/uploads/product/TXryyzvFLq5cWK2XMEfqGZ8oG28wiEJb.jpg\" style=\"height:643px; width:960px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#FF0000\"><strong><span style=\"background-color:#FFD700\">hehehe</span></strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#FF0000\"><strong><span style=\"background-color:#FFD700\"><img alt=\"\" src=\"http://localhost/la-shop/www/uploads/thumbnails/product/BWzllCvMWpJfS0Wsu6WmxAgQdBtVegmV.jpg\" style=\"height:167px; width:200px\" /></span></strong></span></p>\r\n','','al7sblymnSuQCt6s8e8sMMLc08KwR5i4.jpg',3,1,250000,200000,10,1399136400,0,'sonb','2014-04-07 14:18:19','2014-03-30 14:51:25','200','250',0,'bôi son',0,''),
	(6,'Promotion','',NULL,'','','','Wl6XIMr7TpvNrcMm9QQ3yiLWhkLvxNfy.jpg',0,0,0,0,0,0,1,'promote','2014-03-31 11:59:14','2014-03-31 03:26:17',NULL,NULL,0,NULL,0,NULL),
	(7,'Sidebarads','',NULL,'','','','tXbetixVTYxvcEBrzeYtIsw5TEnBJsQW.jpg',0,0,0,0,0,0,1,'1','2014-03-31 11:58:02','2014-03-31 07:52:24',NULL,NULL,0,NULL,0,NULL),
	(8,'Son B','',NULL,'Đỏ','','','XMYF6qvnE32hs3Hsx8BRMFq6Dzu77cPZ.jpg',3,1,250000,200000,10,1396630800,0,'sonb1','2014-04-07 14:19:12','2014-04-01 13:40:07','200','250',0,'bôi son',5,''),
	(9,'Son B','',NULL,'Xanh','','','ELDUCsCCjBmnhrL0xOubv8KwZVigN7V3.jpg',3,1,250000,200000,10,1396656000,0,'sonb2','2014-04-01 15:54:15','2014-04-01 15:54:15','200','250',0,'bôi son',5,NULL),
	(10,'Giới thiệu','',NULL,'','<p>Giới thiệu</p>\r\n','',NULL,9,0,0,0,0,0,0,'gioi-thieu','2014-04-02 19:41:12','2014-04-02 19:41:12','','',0,'',0,'');

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
  `laemail` varchar(50) DEFAULT NULL,
  `laphoto` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `lauser` WRITE;
/*!40000 ALTER TABLE `lauser` DISABLE KEYS */;

INSERT INTO `lauser` (`id`, `lausername`, `lapassword`, `larole`, `lastatus`, `lafullname`, `updated_at`, `created_at`, `laemail`, `laphoto`)
VALUES
	(1,'admin',NULL,'admin',1,'Administrator',NULL,NULL,NULL,NULL);

/*!40000 ALTER TABLE `lauser` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table lausers
# ------------------------------------------------------------

DROP TABLE IF EXISTS `lausers`;

CREATE TABLE `lausers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `laemail` text COLLATE utf8_unicode_ci,
  `laphoto` text COLLATE utf8_unicode_ci,
  `laname` text COLLATE utf8_unicode_ci,
  `lapassword` text COLLATE utf8_unicode_ci,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



# Dump of table v_categories
# ------------------------------------------------------------

DROP VIEW IF EXISTS `v_categories`;

CREATE TABLE `v_categories` (
   `id` INT(11) UNSIGNED NOT NULL DEFAULT '0',
   `latitle` VARCHAR(50) NULL DEFAULT NULL,
   `laparent_id` INT(11) NULL DEFAULT NULL,
   `laurl` VARCHAR(50) NULL DEFAULT NULL,
   `lainfo` TEXT NULL DEFAULT NULL,
   `ladeleted` INT(11) NOT NULL DEFAULT '0',
   `laorder` INT(11) NULL DEFAULT NULL,
   `laimage` VARCHAR(50) NULL DEFAULT NULL,
   `updated_at` TIMESTAMP NULL DEFAULT NULL,
   `created_at` TIMESTAMP NULL DEFAULT NULL,
   `laicon` VARCHAR(100) NOT NULL DEFAULT 'glyphicon glyphicon-link',
   `numproduct` BIGINT(21) NOT NULL DEFAULT '0'
) ENGINE=MyISAM;



# Dump of table v_products
# ------------------------------------------------------------

DROP VIEW IF EXISTS `v_products`;

CREATE TABLE `v_products` (
   `id` INT(11) UNSIGNED NOT NULL DEFAULT '0',
   `latitle` VARCHAR(100) NULL DEFAULT '',
   `lakeyword` TEXT NULL DEFAULT NULL,
   `ladescription` TEXT NULL DEFAULT NULL,
   `lashortinfo` TEXT NULL DEFAULT NULL,
   `lainfo` TEXT NULL DEFAULT NULL,
   `lauseguide` TEXT NULL DEFAULT NULL,
   `laimage` VARCHAR(50) NULL DEFAULT NULL,
   `lacategory_id` INT(11) NULL DEFAULT '0',
   `lamanufactor_id` INT(11) NULL DEFAULT '0',
   `laoldprice` INT(11) NULL DEFAULT '0',
   `laprice` INT(11) NULL DEFAULT '0',
   `laamount` INT(11) NULL DEFAULT '0',
   `ladatenew` INT(11) NULL DEFAULT '0',
   `ladeleted` INT(11) NULL DEFAULT '0',
   `laurl` VARCHAR(100) NULL DEFAULT NULL,
   `updated_at` TIMESTAMP NULL DEFAULT NULL,
   `created_at` TIMESTAMP NULL DEFAULT NULL,
   `lakhoiluong` VARCHAR(20) NULL DEFAULT NULL,
   `ladungtich` VARCHAR(20) NULL DEFAULT NULL,
   `laview` INT(11) NOT NULL DEFAULT '0',
   `lachucnang` VARCHAR(100) NULL DEFAULT NULL,
   `lavariant_id` INT(11) NOT NULL DEFAULT '0',
   `laproduct_id` VARCHAR(50) NULL DEFAULT NULL,
   `sumvariant` BIGINT(21) NULL DEFAULT NULL,
   `cat1id` INT(11) UNSIGNED NULL DEFAULT '0',
   `cat1name` VARCHAR(50) NULL DEFAULT NULL,
   `cat1url` VARCHAR(50) NULL DEFAULT NULL,
   `cat2id` DECIMAL(11) NULL DEFAULT NULL,
   `cat2name` VARCHAR(50) NULL DEFAULT NULL,
   `cat2url` VARCHAR(50) NULL DEFAULT NULL,
   `cat3id` DECIMAL(11) NULL DEFAULT NULL,
   `cat3name` VARCHAR(50) NULL DEFAULT NULL,
   `cat3url` VARCHAR(50) NULL DEFAULT NULL,
   `factorid` INT(11) UNSIGNED NULL DEFAULT '0',
   `factorname` VARCHAR(50) NULL DEFAULT NULL
) ENGINE=MyISAM;





# Replace placeholder table for v_categories with correct view syntax
# ------------------------------------------------------------

DROP TABLE `v_categories`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_categories`
AS SELECT
   `c`.`id` AS `id`,
   `c`.`latitle` AS `latitle`,
   `c`.`laparent_id` AS `laparent_id`,
   `c`.`laurl` AS `laurl`,
   `c`.`lainfo` AS `lainfo`,
   `c`.`ladeleted` AS `ladeleted`,
   `c`.`laorder` AS `laorder`,
   `c`.`laimage` AS `laimage`,
   `c`.`updated_at` AS `updated_at`,
   `c`.`created_at` AS `created_at`,
   `c`.`laicon` AS `laicon`,count(`p`.`id`) AS `numproduct`
FROM (`lacategories` `c` left join `v_products` `p` on(((`p`.`cat1id` = `c`.`id`) or (`p`.`cat2id` = `c`.`id`) or (`p`.`cat3id` = `c`.`id`)))) where ((`c`.`ladeleted` <> 1) or isnull(`c`.`ladeleted`)) group by `c`.`id`;


# Replace placeholder table for v_products with correct view syntax
# ------------------------------------------------------------

DROP TABLE `v_products`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_products`
AS SELECT
   `p`.`id` AS `id`,
   `p`.`latitle` AS `latitle`,
   `p`.`lakeyword` AS `lakeyword`,
   `p`.`ladescription` AS `ladescription`,
   `p`.`lashortinfo` AS `lashortinfo`,
   `p`.`lainfo` AS `lainfo`,
   `p`.`lauseguide` AS `lauseguide`,
   `p`.`laimage` AS `laimage`,
   `p`.`lacategory_id` AS `lacategory_id`,
   `p`.`lamanufactor_id` AS `lamanufactor_id`,
   `p`.`laoldprice` AS `laoldprice`,
   `p`.`laprice` AS `laprice`,
   `p`.`laamount` AS `laamount`,
   `p`.`ladatenew` AS `ladatenew`,
   `p`.`ladeleted` AS `ladeleted`,
   `p`.`laurl` AS `laurl`,
   `p`.`updated_at` AS `updated_at`,
   `p`.`created_at` AS `created_at`,
   `p`.`lakhoiluong` AS `lakhoiluong`,
   `p`.`ladungtich` AS `ladungtich`,
   `p`.`laview` AS `laview`,
   `p`.`lachucnang` AS `lachucnang`,
   `p`.`lavariant_id` AS `lavariant_id`,
   `p`.`laproduct_id` AS `laproduct_id`,(select count(`p2`.`id`)
FROM `laproducts` `p2` where (`p2`.`lavariant_id` = `p`.`id`)) AS `sumvariant`,`c1`.`id` AS `cat1id`,`c1`.`latitle` AS `cat1name`,`c1`.`laurl` AS `cat1url`,coalesce(`c2`.`id`,0) AS `cat2id`,coalesce(`c2`.`latitle`,'') AS `cat2name`,coalesce(`c2`.`laurl`,'') AS `cat2url`,coalesce(`c3`.`id`,0) AS `cat3id`,coalesce(`c3`.`latitle`,'') AS `cat3name`,coalesce(`c3`.`laurl`,'') AS `cat3url`,`f`.`id` AS `factorid`,`f`.`latitle` AS `factorname` from ((((`laproducts` `p` left join `lamanufactors` `f` on((`f`.`id` = `p`.`lamanufactor_id`))) left join `lacategories` `c1` on((`c1`.`id` = `p`.`lacategory_id`))) left join `lacategories` `c2` on((`c1`.`laparent_id` = `c2`.`id`))) left join `lacategories` `c3` on((`c2`.`laparent_id` = `c3`.`id`))) where (((`p`.`ladeleted` <> 1) or isnull(`p`.`ladeleted`)) and (`p`.`lavariant_id` = 0));

/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
