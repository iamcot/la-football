/*
SQLyog Community v10.3 
MySQL - 5.5.27 : Database - la_shop
*********************************************************************
*/


/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `lacategories` */

/*Table structure for table `laconfig` */

DROP TABLE IF EXISTS `laconfig`;

CREATE TABLE `laconfig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lavar` varchar(20) DEFAULT NULL,
  `lavalue` text,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*Data for the table `laconfig` */

/*Table structure for table `lafacebookprofiles` */

DROP TABLE IF EXISTS `lafacebookprofiles`;

CREATE TABLE `lafacebookprofiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `username` text CHARACTER SET latin1,
  `uid` bigint(20) unsigned DEFAULT NULL,
  `laaccess_token` text CHARACTER SET latin1,
  `laaccess_token_secret` text CHARACTER SET latin1,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `lafacebookprofiles` */

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `laimages` */

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `lamanufactors` */

/*Table structure for table `laorderitems` */

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

/*Data for the table `laorderitems` */

/*Table structure for table `laorders` */

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

/*Data for the table `laorders` */

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*Data for the table `laproducts` */

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
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `larole` varchar(20) DEFAULT NULL,
  `lastatus` int(11) DEFAULT NULL,
  `lafullname` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `laemail` varchar(50) DEFAULT NULL,
  `laphoto` text,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

/*Data for the table `lauser` */

insert  into `lauser`(`id`,`username`,`password`,`larole`,`lastatus`,`lafullname`,`updated_at`,`created_at`,`laemail`,`laphoto`) values (1,'admin','$2y$10$cn2evPkX0GMyAWcUZ37ab.1ilTXucy9oitCo7qOnUzBso0KAgQmsi','admin',1,'Administrator','2014-04-07 23:53:53',NULL,NULL,NULL),(2,'cot','$2y$10$ZLrOXEKCZGOV9zJb.FRd3.6bDe7m8Ecjr.ce57t5fx3mUzLFnH9cW',NULL,NULL,NULL,'2014-04-07 22:12:23','2014-04-07 22:12:23',NULL,NULL),(3,'pepsi','$2y$10$jbeu8qXffWTsQ8qAzdQGceF4QcxmQnfgs62R962IO3IDCWSXzSFSW','admin',NULL,'Pepsi','2014-04-07 23:52:49','2014-04-07 23:52:49','',NULL);

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
