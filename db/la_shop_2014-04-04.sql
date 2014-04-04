/*
SQLyog Community v10.3 
MySQL - 5.5.8 : Database - la_shop
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`la_shop` /*!40100 DEFAULT CHARACTER SET latin1 */;

/*Table structure for table `lacategories` */

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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

/*Data for the table `lacategories` */

insert  into `lacategories`(`id`,`latitle`,`laparent_id`,`laurl`,`lainfo`,`ladeleted`,`laorder`,`laimage`,`updated_at`,`created_at`,`laicon`) values (1,'Mỹ phẩm',0,'mypham','thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm ',0,0,'x6n3TsCh4sGiFCn0UokGA9tw91WLpaAf.jpg','2014-03-31 15:37:47','2014-03-28 07:43:39','glyphicon glyphicon-link'),(2,'Kem trắng da',1,'kem-trang-da','thông tin ',0,2,'AROJhocM9BrNmpzhzbgCxD8KOoSNCsWx.jpg','2014-04-01 17:17:45','2014-03-28 07:56:17',''),(3,'Son',1,'son','12312',0,7,'VRNHmQBcyTEMgNKX187kNKSAxcsHsGvg.jpg','2014-04-01 17:18:13','2014-03-28 08:06:54',''),(4,'Mood matcher',5,'1','',0,7,NULL,'2014-03-31 04:14:07','2014-03-28 11:48:29',''),(5,'Han quoc',0,'2','thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm ',0,0,'kjYY58I9RjXv8n5m3h2Ad86eB33NlIL6.jpg','2014-03-31 15:38:20','2014-03-28 11:48:45','glyphicon glyphicon-link'),(6,'USA',0,'3','thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm thông tin mỹ phẩm ',0,0,'8jzQAoOddeRJyM6LopPRpbCn4vNFJ4MM.jpg','2014-03-31 15:38:40','2014-03-28 11:48:57','glyphicon glyphicon-link'),(7,'Kem den da',1,'4','',0,1,'OXT51YOYlnHBtUMNS83epd7HT9zWp4OY.jpg','2014-04-01 17:18:47','2014-03-28 11:49:13',''),(8,'kathydoll',5,'5','',0,5,NULL,'2014-03-28 11:49:27','2014-03-28 11:49:27',''),(9,'Tin tức',0,'tin-tuc','',0,999,NULL,'2014-04-02 19:40:33','2014-04-02 19:40:16','glyphicon glyphicon-link');

/*Table structure for table `laconfig` */

DROP TABLE IF EXISTS `laconfig`;

CREATE TABLE `laconfig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lavar` varchar(20) DEFAULT NULL,
  `lavalue` text,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

/*Data for the table `laconfig` */

insert  into `laconfig`(`id`,`lavar`,`lavalue`,`updated_at`,`created_at`) values (1,'slide','Wl6XIMr7TpvNrcMm9QQ3yiLWhkLvxNfy.jpg|aaa|bb','2014-03-31 11:59:53','2014-03-30 19:13:26'),(2,'sidebarads','tXbetixVTYxvcEBrzeYtIsw5TEnBJsQW.jpg|aaa|123\r\nziLW3sUPJypqisnSjLAdZOs3dJHwvDKg.jpg|bbb|456','2014-03-31 11:57:51','2014-03-31 07:52:01');

/*Table structure for table `laimages` */

DROP TABLE IF EXISTS `laimages`;

CREATE TABLE `laimages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lapic` varchar(50) DEFAULT NULL,
  `latitle` varchar(100) DEFAULT NULL,
  `laproduct_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

/*Data for the table `laimages` */

insert  into `laimages`(`id`,`lapic`,`latitle`,`laproduct_id`,`updated_at`,`created_at`) values (7,'udptnlkOWiW72NEWuRE0KALLUaDagZgq.jpg','',2,'2014-03-30 16:05:57','2014-03-30 16:05:57'),(8,'VNbHtjyocEyqUWYoK6mzioL9aiq5gZfX.jpg','',2,'2014-03-30 16:05:57','2014-03-30 16:05:57'),(16,'tXbetixVTYxvcEBrzeYtIsw5TEnBJsQW.jpg','',7,'2014-03-31 11:58:02','2014-03-31 11:58:02'),(17,'ziLW3sUPJypqisnSjLAdZOs3dJHwvDKg.jpg','',7,'2014-03-31 11:58:02','2014-03-31 11:58:02'),(18,'Wl6XIMr7TpvNrcMm9QQ3yiLWhkLvxNfy.jpg','',6,'2014-03-31 11:59:14','2014-03-31 11:59:14'),(20,'WHE7pBGqrlqRqrDa4Z6y12zPdUr7AOnk.jpg','',1,'2014-03-31 15:46:25','2014-03-31 15:46:25'),(21,'akpahWbp5QpmB5AFfCWZ5Edkme38pgxE.jpg','',5,'2014-03-31 16:24:51','2014-03-31 16:24:51'),(22,'gv8907MSchLpHUJedcRNKKj3ZjzsBKQg.jpg','',5,'2014-03-31 16:25:24','2014-03-31 16:25:24'),(23,'1Q9RdaVQ5q9mHY0uBmQhoFGni4oRPMeZ.png','',8,'2014-04-01 13:40:07','2014-04-01 13:40:07'),(24,'dV3oUi3kMUIBjjHHGEehL8iixxw4QDsr.jpg','',8,'2014-04-01 13:40:07','2014-04-01 13:40:07'),(25,'ySxgyVoj0VQwCP7T1xgg5LAccJky6AWt.jpg','',5,'2014-04-01 14:46:58','2014-04-01 14:46:58'),(26,'gRYoQtGVXwjP7a4ym5L0sgEPTbQM7qCg.jpg','',5,'2014-04-01 14:46:58','2014-04-01 14:46:58'),(27,'Jj15GRwxQEg5MoqtJB6RjpqWyde6GP0N.jpg','',5,'2014-04-01 14:46:58','2014-04-01 14:46:58'),(28,'ELDUCsCCjBmnhrL0xOubv8KwZVigN7V3.jpg','',9,'2014-04-01 15:54:15','2014-04-01 15:54:15'),(29,'u2tCzeH38R4ZwALNckasC9kdvvxbPAZr.jpg','',9,'2014-04-01 15:54:15','2014-04-01 15:54:15');

/*Table structure for table `lamanufactors` */

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

/*Data for the table `lamanufactors` */

insert  into `lamanufactors`(`id`,`latitle`,`laurl`,`ladeleted`,`updated_at`,`created_at`,`lainfo`,`laimage`,`laorder`) values (1,'The Face Shop 2','thefaceshop2',NULL,'2014-03-28 17:29:50','2014-03-28 17:21:39','the face shop','QGlk10nFqmHK6hfHPCjRzzS1rDofYkrJ.jpg',2),(2,'USA','usa',NULL,'2014-03-28 17:32:15','2014-03-28 17:32:15','usa','eqTBbN8WvXU7sZeAS26ZMvFriLHjhBks.jpg',2);

/*Table structure for table `laproducts` */

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

/*Data for the table `laproducts` */

insert  into `laproducts`(`id`,`latitle`,`lakeyword`,`ladescription`,`lashortinfo`,`lainfo`,`lauseguide`,`laimage`,`lacategory_id`,`lamanufactor_id`,`laoldprice`,`laprice`,`laamount`,`ladatenew`,`ladeleted`,`laurl`,`updated_at`,`created_at`,`lakhoiluong`,`ladungtich`,`laview`,`lachucnang`,`lavariant_id`,`laproduct_id`) values (1,'Kem ủ trắng 2','tu khoa,hehe,haha',NULL,'thong tin ngan','<p>th&ocirc;ng tin2</p>\r\n','hdsd222','WHE7pBGqrlqRqrDa4Z6y12zPdUr7AOnk.jpg',3,2,230000,300000,10,1399136400,0,'kemutrang2','2014-04-04 00:17:08','2014-03-28 18:55:50','200','',0,'',0,''),(2,'Son dưỡng môi','son, môi',NULL,'son dưỡng môi','<p>th&ocirc;ng tin son</p>\r\n','thoa lên môi','udptnlkOWiW72NEWuRE0KALLUaDagZgq.jpg',3,1,150000,130000,20,1396630800,0,'son','2014-04-04 00:17:33','2014-03-29 12:48:59','180','',0,'',0,''),(5,'Son B','',NULL,'','<p><img alt=\"\" src=\"http://localhost/la-shop/www/uploads/product/TXryyzvFLq5cWK2XMEfqGZ8oG28wiEJb.jpg\" style=\"height:643px; width:960px\" /></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#FF0000\"><strong><span style=\"background-color:#FFD700\">hehehe</span></strong></span></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><span style=\"color:#FF0000\"><strong><span style=\"background-color:#FFD700\"><img alt=\"\" src=\"http://localhost/la-shop/www/uploads/thumbnails/product/BWzllCvMWpJfS0Wsu6WmxAgQdBtVegmV.jpg\" style=\"height:167px; width:200px\" /></span></strong></span></p>\r\n','','gv8907MSchLpHUJedcRNKKj3ZjzsBKQg.jpg',3,1,250000,200000,10,1396630800,0,'sonb','2014-04-04 00:17:44','2014-03-30 14:51:25','200','250',0,'bôi son',0,''),(6,'Promotion','',NULL,'','','','Wl6XIMr7TpvNrcMm9QQ3yiLWhkLvxNfy.jpg',0,0,0,0,0,0,1,'promote','2014-03-31 11:59:14','2014-03-31 03:26:17',NULL,NULL,0,NULL,0,NULL),(7,'Sidebarads','',NULL,'','','','tXbetixVTYxvcEBrzeYtIsw5TEnBJsQW.jpg',0,0,0,0,0,0,1,'1','2014-03-31 11:58:02','2014-03-31 07:52:24',NULL,NULL,0,NULL,0,NULL),(8,'Son B','',NULL,'Đỏ','','','1Q9RdaVQ5q9mHY0uBmQhoFGni4oRPMeZ.png',3,1,250000,200000,10,1399161600,0,'sonb1','2014-04-01 13:48:44','2014-04-01 13:40:07','200','250',0,'bôi son',5,NULL),(9,'Son B','',NULL,'Xanh','','','ELDUCsCCjBmnhrL0xOubv8KwZVigN7V3.jpg',3,1,250000,200000,10,1396656000,0,'sonb2','2014-04-01 15:54:15','2014-04-01 15:54:15','200','250',0,'bôi son',5,NULL),(10,'Giới thiệu','',NULL,'','<p>Giới thiệu</p>\r\n','',NULL,9,0,0,0,0,0,0,'gioi-thieu','2014-04-02 19:41:12','2014-04-02 19:41:12','','',0,'',0,'');

/*Table structure for table `latags` */

DROP TABLE IF EXISTS `latags`;

CREATE TABLE `latags` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `latitle` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `laproduct_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `latags` */

/*Table structure for table `lauser` */

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `lauser` */

insert  into `lauser`(`id`,`lausername`,`lapassword`,`larole`,`lastatus`,`lafullname`,`updated_at`,`created_at`) values (1,'admin',NULL,'admin',1,'Administrator',NULL,NULL);

/*Table structure for table `v_categories` */

DROP TABLE IF EXISTS `v_categories`;

/*!50001 DROP VIEW IF EXISTS `v_categories` */;
/*!50001 DROP TABLE IF EXISTS `v_categories` */;

/*!50001 CREATE TABLE  `v_categories`(
 `id` int(11) unsigned ,
 `latitle` varchar(50) ,
 `laparent_id` int(11) ,
 `laurl` varchar(50) ,
 `lainfo` text ,
 `ladeleted` int(11) ,
 `laorder` int(11) ,
 `laimage` varchar(50) ,
 `updated_at` timestamp ,
 `created_at` timestamp ,
 `laicon` varchar(100) ,
 `numproduct` bigint(21) 
)*/;

/*Table structure for table `v_products` */

DROP TABLE IF EXISTS `v_products`;

/*!50001 DROP VIEW IF EXISTS `v_products` */;
/*!50001 DROP TABLE IF EXISTS `v_products` */;

/*!50001 CREATE TABLE  `v_products`(
 `id` int(11) unsigned ,
 `latitle` varchar(100) ,
 `lakeyword` text ,
 `ladescription` text ,
 `lashortinfo` text ,
 `lainfo` text ,
 `lauseguide` text ,
 `laimage` varchar(50) ,
 `lacategory_id` int(11) ,
 `lamanufactor_id` int(11) ,
 `laoldprice` int(11) ,
 `laprice` int(11) ,
 `laamount` int(11) ,
 `ladatenew` int(11) ,
 `ladeleted` int(11) ,
 `laurl` varchar(100) ,
 `updated_at` timestamp ,
 `created_at` timestamp ,
 `lakhoiluong` varchar(20) ,
 `ladungtich` varchar(20) ,
 `laview` int(11) ,
 `lachucnang` varchar(100) ,
 `lavariant_id` int(11) ,
 `laproduct_id` varchar(50) ,
 `sumvariant` bigint(21) ,
 `cat1id` int(11) unsigned ,
 `cat1name` varchar(50) ,
 `cat1url` varchar(50) ,
 `cat2id` decimal(11,0) ,
 `cat2name` varchar(50) ,
 `cat2url` varchar(50) ,
 `cat3id` decimal(11,0) ,
 `cat3name` varchar(50) ,
 `cat3url` varchar(50) ,
 `factorid` int(11) unsigned ,
 `factorname` varchar(50) 
)*/;

/*View structure for view v_categories */

/*!50001 DROP TABLE IF EXISTS `v_categories` */;
/*!50001 DROP VIEW IF EXISTS `v_categories` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_categories` AS select `c`.`id` AS `id`,`c`.`latitle` AS `latitle`,`c`.`laparent_id` AS `laparent_id`,`c`.`laurl` AS `laurl`,`c`.`lainfo` AS `lainfo`,`c`.`ladeleted` AS `ladeleted`,`c`.`laorder` AS `laorder`,`c`.`laimage` AS `laimage`,`c`.`updated_at` AS `updated_at`,`c`.`created_at` AS `created_at`,`c`.`laicon` AS `laicon`,count(`p`.`id`) AS `numproduct` from (`lacategories` `c` left join `v_products` `p` on(((`p`.`cat1id` = `c`.`id`) or (`p`.`cat2id` = `c`.`id`) or (`p`.`cat3id` = `c`.`id`)))) where ((`c`.`ladeleted` <> 1) or isnull(`c`.`ladeleted`)) group by `c`.`id` */;

/*View structure for view v_products */

/*!50001 DROP TABLE IF EXISTS `v_products` */;
/*!50001 DROP VIEW IF EXISTS `v_products` */;

/*!50001 CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `v_products` AS select `p`.`id` AS `id`,`p`.`latitle` AS `latitle`,`p`.`lakeyword` AS `lakeyword`,`p`.`ladescription` AS `ladescription`,`p`.`lashortinfo` AS `lashortinfo`,`p`.`lainfo` AS `lainfo`,`p`.`lauseguide` AS `lauseguide`,`p`.`laimage` AS `laimage`,`p`.`lacategory_id` AS `lacategory_id`,`p`.`lamanufactor_id` AS `lamanufactor_id`,`p`.`laoldprice` AS `laoldprice`,`p`.`laprice` AS `laprice`,`p`.`laamount` AS `laamount`,`p`.`ladatenew` AS `ladatenew`,`p`.`ladeleted` AS `ladeleted`,`p`.`laurl` AS `laurl`,`p`.`updated_at` AS `updated_at`,`p`.`created_at` AS `created_at`,`p`.`lakhoiluong` AS `lakhoiluong`,`p`.`ladungtich` AS `ladungtich`,`p`.`laview` AS `laview`,`p`.`lachucnang` AS `lachucnang`,`p`.`lavariant_id` AS `lavariant_id`,`p`.`laproduct_id` AS `laproduct_id`,(select count(`p2`.`id`) from `laproducts` `p2` where (`p2`.`lavariant_id` = `p`.`id`)) AS `sumvariant`,`c1`.`id` AS `cat1id`,`c1`.`latitle` AS `cat1name`,`c1`.`laurl` AS `cat1url`,coalesce(`c2`.`id`,0) AS `cat2id`,coalesce(`c2`.`latitle`,'') AS `cat2name`,coalesce(`c2`.`laurl`,'') AS `cat2url`,coalesce(`c3`.`id`,0) AS `cat3id`,coalesce(`c3`.`latitle`,'') AS `cat3name`,coalesce(`c3`.`laurl`,'') AS `cat3url`,`f`.`id` AS `factorid`,`f`.`latitle` AS `factorname` from ((((`laproducts` `p` left join `lamanufactors` `f` on((`f`.`id` = `p`.`lamanufactor_id`))) left join `lacategories` `c1` on((`c1`.`id` = `p`.`lacategory_id`))) left join `lacategories` `c2` on((`c1`.`laparent_id` = `c2`.`id`))) left join `lacategories` `c3` on((`c2`.`laparent_id` = `c3`.`id`))) where (((`p`.`ladeleted` <> 1) or isnull(`p`.`ladeleted`)) and (`p`.`lavariant_id` = 0)) */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
