SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


DROP TABLE IF EXISTS `lacategories`;
CREATE TABLE IF NOT EXISTS `lacategories` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

INSERT INTO `lacategories` (`id`, `latitle`, `laparent_id`, `laurl`, `lainfo`, `ladeleted`, `laorder`, `laimage`, `updated_at`, `created_at`, `laicon`) VALUES
(1, 'Chăm sóc da', 0, 'cham-soc-da', 'Các bộ Dưỡng chính hãng giá tốt nhất thị trường giao Các bộ Dưỡng da Hàn Quốc nhanh tận nơi trên toàn quốc.', 0, 1, NULL, '2014-04-07 17:42:23', '2014-04-07 17:42:23', 'glyphicon glyphicon-link'),
(2, 'Sữa rửa mặt', 1, 'sua-rua-mat', '', 0, 1, NULL, '2014-04-07 17:43:16', '2014-04-07 17:43:16', 'glyphicon glyphicon-link'),
(3, 'Tẩy tế bào chết', 1, 'tay-te-bao-chet', '', 0, 2, NULL, '2014-04-07 17:43:32', '2014-04-07 17:43:32', 'glyphicon glyphicon-link'),
(4, 'Kem dưỡng', 1, 'kem-duong', '', 0, 3, NULL, '2014-04-07 17:43:44', '2014-04-07 17:43:44', 'glyphicon glyphicon-link'),
(5, 'Mặt nạ', 1, 'mat-na', '', 0, 4, NULL, '2014-04-07 17:43:58', '2014-04-07 17:43:58', 'glyphicon glyphicon-link'),
(6, 'Chống nắng', 1, 'chong-nang', '', 0, 5, NULL, '2014-04-07 17:44:10', '2014-04-07 17:44:10', 'glyphicon glyphicon-link'),
(7, 'Dưỡng thể và tóc', 0, 'duong-the-va-toc', '', 0, 2, NULL, '2014-04-07 17:44:55', '2014-04-07 17:44:55', 'glyphicon glyphicon-link'),
(8, 'Tắm trắng - Ủ trắng', 7, 'tam-trang-u-trang', '', 0, 1, NULL, '2014-04-07 17:45:24', '2014-04-07 17:45:24', 'glyphicon glyphicon-link'),
(9, 'Sữa tắm - Muối tắm', 7, 'sua-tam-muoi-tam', '', 0, 2, NULL, '2014-04-07 17:45:42', '2014-04-07 17:45:42', 'glyphicon glyphicon-link'),
(10, 'Dưỡng thể', 7, 'duong-the', '', 0, 3, NULL, '2014-04-07 17:45:57', '2014-04-07 17:45:57', 'glyphicon glyphicon-link'),
(12, 'Tẩy tế bào chết body', 7, 'tay-te-bao-chet-body', '', 0, 4, NULL, '2014-04-07 17:46:50', '2014-04-07 17:46:50', 'glyphicon glyphicon-link'),
(13, 'Mặt nạ body', 7, 'mat-na-body', '', 0, 5, NULL, '2014-04-07 17:47:05', '2014-04-07 17:47:05', 'glyphicon glyphicon-link'),
(14, 'Chăm sóc tóc', 7, 'cham-soc-toc', '', 0, 6, NULL, '2014-04-07 17:47:16', '2014-04-07 17:47:16', 'glyphicon glyphicon-link'),
(15, 'Trang điểm', 0, 'trang-diem', '', 0, 3, NULL, '2014-04-07 17:47:34', '2014-04-07 17:47:34', 'glyphicon glyphicon-link'),
(16, 'Kem lót nền', 15, 'kem-lot-nen', '', 0, 1, NULL, '2014-04-07 17:47:57', '2014-04-07 17:47:57', 'glyphicon glyphicon-link'),
(17, 'Phấn phủ - Phấn nền', 15, 'phan-phu-phan-nen', '', 0, 2, NULL, '2014-04-07 17:48:16', '2014-04-07 17:48:16', 'glyphicon glyphicon-link'),
(18, 'Phấn má hồng - Phấn mắt', 15, 'phan-ma-hong-phan-mat', '', 0, 3, NULL, '2014-04-07 17:48:36', '2014-04-07 17:48:36', 'glyphicon glyphicon-link'),
(19, 'Eyeliner - Kẻ mày - Mascara', 15, 'eyeliner-ke-may-mascara', '', 0, 4, NULL, '2014-04-07 17:48:54', '2014-04-07 17:48:54', 'glyphicon glyphicon-link'),
(20, 'Son dưỡng - Son môi', 15, 'son-duong-son-moi', '', 0, 5, NULL, '2014-04-07 17:49:13', '2014-04-07 17:49:13', 'glyphicon glyphicon-link'),
(21, 'Tẩy trang', 15, 'tay-trang', '', 0, 6, NULL, '2014-04-07 17:49:26', '2014-04-07 17:49:26', 'glyphicon glyphicon-link'),
(22, 'Thời trang', 0, 'thoi-trang', '', 0, 4, NULL, '2014-04-07 17:51:09', '2014-04-07 17:51:09', 'glyphicon glyphicon-link'),
(23, 'Tin tức', 0, 'tin-tuc', '', 0, 5, NULL, '2014-04-07 17:51:26', '2014-04-07 17:51:26', 'glyphicon glyphicon-link');

DROP TABLE IF EXISTS `laconfig`;
CREATE TABLE IF NOT EXISTS `laconfig` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `lavar` varchar(20) DEFAULT NULL,
  `lavalue` text,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

INSERT INTO `laconfig` (`id`, `lavar`, `lavalue`, `updated_at`, `created_at`) VALUES
(1, 'slide', 'wQ3P7QnAxNIRfC9FTKTQSRf7EZ3mXFLX.png|Thái Bouqique Facebook|https://www.facebook.com/ThaiBoutique88', '2014-04-08 03:40:55', '2014-04-08 03:40:55'),
(2, 'sidebarads', '', '2014-04-08 03:40:55', '2014-04-08 03:40:55');

DROP TABLE IF EXISTS `lafacebookprofiles`;
CREATE TABLE IF NOT EXISTS `lafacebookprofiles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned DEFAULT NULL,
  `username` text CHARACTER SET latin1,
  `uid` bigint(20) unsigned DEFAULT NULL,
  `laaccess_token` text CHARACTER SET latin1,
  `laaccess_token_secret` text CHARACTER SET latin1,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

INSERT INTO `lafacebookprofiles` (`id`, `user_id`, `username`, `uid`, `laaccess_token`, `laaccess_token_secret`, `updated_at`, `created_at`) VALUES
(1, 4, 'iamcot', 1657743351, 'CAAKtIWd1TRQBAFKaJKaRfqZBZCxPjhnH840ZBZAMeGJJpnRW4jFDUDPpqJ8JPbnCUWIWhF4ZCXeFEIv4SCd1yKZB1geXIoG4d2fYwpTs1M9K3ObzHqjtUl9fHEEmJvQnREiS8c63CTBZCZCJeLbIbPUZCGanlTU6X5tU7OcEX8CyQqoMK4LD8ZB8uJ', NULL, '2014-04-08 09:42:19', '2014-04-08 09:31:48'),
(2, 5, 'pepsi1903', 1669855124, 'CAAKtIWd1TRQBABjbjhoSZAgE1AHcm2CHDEtNMx4FVGa0m9hnbsJM4nI0j5NITXo5FGnRSsmiCjP9Jd0ltZAxFmTHZAyC63ZBn7ue0tZAjcaHHtWlbb4ZAQCbRd8hhZB67HcM1bT1Wg0jBox7qpIVbOIPmJAvXc6wJq1US6LyX4pjizstXGMzr94vSTRJZA3hl7MZD', NULL, '2014-04-08 13:48:49', '2014-04-08 09:36:37');

DROP TABLE IF EXISTS `laimages`;
CREATE TABLE IF NOT EXISTS `laimages` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `lapic` varchar(50) DEFAULT NULL,
  `latitle` varchar(100) DEFAULT NULL,
  `laproduct_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

INSERT INTO `laimages` (`id`, `lapic`, `latitle`, `laproduct_id`, `updated_at`, `created_at`) VALUES
(1, 'Of9MR4Rs3fuyi2vZlYIeQDQzpX8VIakl.jpg', '', 1, '2014-04-07 18:19:00', '2014-04-07 18:19:00'),
(2, 'EzD785JUThUf2ajaZyf91a40StiL7Iq8.gif', '', 2, '2014-04-07 18:35:49', '2014-04-07 18:35:49'),
(3, 'nloacYkLCsAH9NXKb5c2vGTzshp6W8uc.jpg', '', 3, '2014-04-07 18:37:41', '2014-04-07 18:37:41'),
(4, 'wQ3P7QnAxNIRfC9FTKTQSRf7EZ3mXFLX.png', '', 4, '2014-04-08 03:40:14', '2014-04-08 03:40:14');

DROP TABLE IF EXISTS `lamanufactors`;
CREATE TABLE IF NOT EXISTS `lamanufactors` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

INSERT INTO `lamanufactors` (`id`, `latitle`, `laurl`, `ladeleted`, `updated_at`, `created_at`, `lainfo`, `laimage`, `laorder`) VALUES
(1, 'The Face Shop', 'the-face-shop', NULL, '2014-04-07 17:54:04', '2014-04-07 17:54:04', '', NULL, 0),
(2, 'Holika', 'holika', NULL, '2014-04-07 17:54:31', '2014-04-07 17:54:31', '', NULL, 0),
(3, 'Tonymoly', 'tonymoly', NULL, '2014-04-07 17:54:43', '2014-04-07 17:54:43', '', NULL, 0),
(4, 'Nyx', 'nyx', NULL, '2014-04-07 17:54:54', '2014-04-07 17:54:54', '', NULL, 0),
(5, 'L''aila Spa', 'laila-spa', NULL, '2014-04-07 17:55:29', '2014-04-07 17:55:29', '', NULL, 0),
(6, 'Karmart', 'karmart', NULL, '2014-04-07 17:55:42', '2014-04-07 17:55:42', '', NULL, 0),
(7, 'Thailand', 'thailand', NULL, '2014-04-07 17:56:01', '2014-04-07 17:56:01', '', NULL, 0);

DROP TABLE IF EXISTS `laorderitems`;
CREATE TABLE IF NOT EXISTS `laorderitems` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

INSERT INTO `laorderitems` (`id`, `order_id`, `latitle`, `amount`, `laprice`, `variantname`, `producturl`, `caturl`, `variantid`, `laimage`, `lakhoiluong`, `updated_at`, `created_at`, `product_id`) VALUES
(1, 1, 'Huyết thanh bông tuyết', 1, 190000, '', 'huyet-thanh-bong-tuyet', 'kem-duong', 0, 'Of9MR4Rs3fuyi2vZlYIeQDQzpX8VIakl.jpg', 0, '2014-04-07 18:30:58', '2014-04-07 18:30:58', 1),
(2, 2, 'Huyết thanh bông tuyết', 1, 190000, '', 'huyet-thanh-bong-tuyet', 'kem-duong', 0, 'Of9MR4Rs3fuyi2vZlYIeQDQzpX8VIakl.jpg', 0, '2014-04-08 10:09:19', '2014-04-08 10:09:19', 1),
(3, 3, 'Huyết thanh bông tuyết', 1, 190000, '', 'huyet-thanh-bong-tuyet', 'kem-duong', 0, 'Of9MR4Rs3fuyi2vZlYIeQDQzpX8VIakl.jpg', 0, '2014-04-08 10:12:14', '2014-04-08 10:12:14', 1),
(4, 4, 'Huyết thanh bông tuyết', 2, 190000, '', 'huyet-thanh-bong-tuyet', 'kem-duong', 0, 'Of9MR4Rs3fuyi2vZlYIeQDQzpX8VIakl.jpg', 0, '2014-04-08 10:16:02', '2014-04-08 10:16:02', 1);

DROP TABLE IF EXISTS `laorders`;
CREATE TABLE IF NOT EXISTS `laorders` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=5 ;

INSERT INTO `laorders` (`id`, `lashipping`, `lapayment`, `lasumkhoiluong`, `lafeeshipping`, `laordername`, `laordertel`, `laorderemail`, `laorderaddr`, `laorderprovince`, `laorderdistrict`, `updated_at`, `created_at`, `uid`, `user_id`, `order_status`, `voucher`, `giamvoucher`, `sumsanpham`, `laordernote`) VALUES
(1, 'ship_hcm', 'pay_tienmat', 0, 25000, 'Trương Công Thắng', '01695359198', 'thang102@gmail.com', '90 Thăng Long', 'hcm', 'tb', '2014-04-07 18:33:14', '2014-04-07 18:30:58', NULL, NULL, '0', 'online05', 20000, 190000, 'test đơn hàng'),
(2, 'ship_ems', 'pay_chuyenkhoan', 0, 16500, 'Trương Thắng', '0123456788922', 'thang002@yahoo.com', 'buon ma thuot', 'bentre', '0', '2014-04-08 10:09:19', '2014-04-08 10:09:19', NULL, NULL, '0', '', 0, 190000, 'test'),
(3, 'ship_post', 'pay_chuyenkhoan', 0, 7590, 'Trương Thắng', '0123456788922', 'thang002@yahoo.com', 'buon ma thuot', 'bacgiang', '0', '2014-04-08 10:12:14', '2014-04-08 10:12:14', 1657743351, NULL, '0', '', 0, 190000, 'test'),
(4, 'ship_ems', 'pay_chuyenkhoan', 0, 16500, 'Trương Thắng', '0123456788922', 'thang002@yahoo.com', 'buon ma thuot', 'baclieu', '0', '2014-04-08 10:50:34', '2014-04-08 10:16:02', 1657743351, 4, '2', '', 0, 380000, '');

DROP TABLE IF EXISTS `laproducts`;
CREATE TABLE IF NOT EXISTS `laproducts` (
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
  `ladatenew` varchar(50) DEFAULT '0',
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

INSERT INTO `laproducts` (`id`, `latitle`, `lakeyword`, `ladescription`, `lashortinfo`, `lainfo`, `lauseguide`, `laimage`, `lacategory_id`, `lamanufactor_id`, `laoldprice`, `laprice`, `laamount`, `ladatenew`, `ladeleted`, `laurl`, `updated_at`, `created_at`, `lakhoiluong`, `ladungtich`, `laview`, `lachucnang`, `lavariant_id`, `laproduct_id`) VALUES
(1, 'Huyết thanh bông tuyết', 'huyet thanh, bong tuyet', NULL, '', '', '', 'Of9MR4Rs3fuyi2vZlYIeQDQzpX8VIakl.jpg', 4, 5, 230000, 190000, 20, '0', 0, 'huyet-thanh-bong-tuyet', '2014-04-08 18:38:37', '2014-04-07 18:02:33', '', '20', 12, 'làm đẹp', 0, ''),
(2, 'Giới thiệu', '', NULL, 'Giới thiệu về Thái Boutique và webmypham.vn', '', '', 'EzD785JUThUf2ajaZyf91a40StiL7Iq8.gif', 23, 0, 0, 0, 0, '0', 0, 'gioi-thieu', '2014-04-08 06:10:19', '2014-04-07 18:35:49', '', '', 2, '', 0, ''),
(3, 'Thanh toán', '', NULL, 'Cách thức thanh toán tại Thái Boutique', '', '', 'nloacYkLCsAH9NXKb5c2vGTzshp6W8uc.jpg', 23, 0, 0, 0, 0, '0', 0, 'thanh-toan', '2014-04-08 10:44:40', '2014-04-07 18:37:41', '', '', 3, '', 0, 'all'),
(4, 'Slider', '', NULL, '', '', '', 'wQ3P7QnAxNIRfC9FTKTQSRf7EZ3mXFLX.png', 0, 0, 0, 0, 0, '0', 1, 'slider', '2014-04-08 03:40:14', '2014-04-08 03:40:14', '', '', 0, '', 0, '');

DROP TABLE IF EXISTS `latags`;
CREATE TABLE IF NOT EXISTS `latags` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `latitle` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `laproduct_id` int(11) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

DROP TABLE IF EXISTS `lauser`;
CREATE TABLE IF NOT EXISTS `lauser` (
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
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

INSERT INTO `lauser` (`id`, `username`, `password`, `larole`, `lastatus`, `lafullname`, `updated_at`, `created_at`, `laemail`, `laphoto`) VALUES
(1, 'admin', '$2y$10$cn2evPkX0GMyAWcUZ37ab.1ilTXucy9oitCo7qOnUzBso0KAgQmsi', 'admin', 1, 'Administrator', '2014-04-07 16:53:53', NULL, NULL, NULL),
(2, 'cot', '$2y$10$ZLrOXEKCZGOV9zJb.FRd3.6bDe7m8Ecjr.ce57t5fx3mUzLFnH9cW', NULL, NULL, NULL, '2014-04-07 15:12:23', '2014-04-07 15:12:23', NULL, NULL),
(3, 'pepsi', '$2y$10$QD/0y/Xmf7ebvWiB19JMCOmlo3cXh7.xZ0c0/MfzIVt20gyhAZaDu', 'admin', NULL, 'Pepsi', '2014-04-07 18:20:39', '2014-04-07 16:52:49', '', NULL),
(4, NULL, NULL, 'admin', NULL, 'Trương Thắng', '2014-04-08 09:31:48', '2014-04-08 09:31:48', 'thang002@yahoo.com', 'https://graph.facebook.com/iamcot/picture?type=square'),
(5, NULL, NULL, NULL, NULL, 'Pep Si', '2014-04-08 09:36:37', '2014-04-08 09:36:37', 'pepsi_version88@yahoo.com', 'https://graph.facebook.com/pepsi1903/picture?type=square');
