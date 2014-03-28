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
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

/*Data for the table `lacategories` */

insert  into `lacategories`(`id`,`latitle`,`laparent_id`,`laurl`,`lainfo`,`ladeleted`,`laorder`,`laimage`,`updated_at`,`created_at`) values (1,'Mỹ phẩm',0,'mypham','thông tin mỹ phẩm ',0,0,'x6n3TsCh4sGiFCn0UokGA9tw91WLpaAf.jpg','2014-03-28 17:31:32','2014-03-28 07:43:39'),(2,'Kem trắng da',1,'mypham','thông tin ',0,2,'chIDQP0yCtKGh1hVH9XHZAiGmjFReT4t.jpg','2014-03-28 16:46:14','2014-03-28 07:56:17'),(3,'Son',7,'son','12312',0,7,'m4LeOEfzWR1ZWJeRFPMtmXzW7hOdoKzp.gif','2014-03-28 16:53:29','2014-03-28 08:06:54'),(4,'Mood matcher',7,'','',0,7,NULL,'2014-03-28 16:56:34','2014-03-28 11:48:29'),(5,'Han quoc',0,'','',0,0,NULL,'2014-03-28 11:48:45','2014-03-28 11:48:45'),(6,'USA',0,'','',0,0,NULL,'2014-03-28 11:48:57','2014-03-28 11:48:57'),(7,'Kem den da',1,'','',0,1,NULL,'2014-03-28 11:49:13','2014-03-28 11:49:13'),(8,'kathydoll',5,'','',0,5,NULL,'2014-03-28 11:49:27','2014-03-28 11:49:27');

/*Table structure for table `laimages` */

DROP TABLE IF EXISTS `laimages`;

CREATE TABLE `laimages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `latitle` varchar(50) DEFAULT NULL,
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
  PRIMARY KEY (`id`)
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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

/*Data for the table `laproducts` */

insert  into `laproducts`(`id`,`latitle`,`lakeyword`,`ladescription`,`lashortinfo`,`lainfo`,`lauseguide`,`laimage`,`lacategory_id`,`lamanufactor_id`,`laoldprice`,`laprice`,`laamount`,`ladatenew`,`ladeleted`,`laurl`,`updated_at`,`created_at`) values (1,'Kem ủ trắng 2','tu khoa,hehe,haha',NULL,'thong tin ngan','thông tin2','hdsd222','TdYs3TtwU2ApJhIW6ga9QW7KxjXyLG8E.jpg',2,2,230000,200000,10,1399161600,NULL,'kemutrang2','2014-03-28 19:03:37','2014-03-28 18:55:50');

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

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
