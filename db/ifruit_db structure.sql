/*
Navicat MySQL Data Transfer

Source Server         : T-hank
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : ifruit_db

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-09-03 18:46:57
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tbl_admin
-- ----------------------------
DROP TABLE IF EXISTS `tbl_admin`;
CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `surname` varchar(255) DEFAULT NULL,
  `account` varchar(255) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `permission` char(10) DEFAULT '1' COMMENT 'สิทธิ์การใช้งาน',
  `profile` text COMMENT 'รูปภาพโปรไฟล์',
  `create_by` varchar(255) DEFAULT NULL,
  `create_date` datetime DEFAULT NULL,
  `update_by` varchar(255) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `last_login` datetime DEFAULT NULL,
  `update_pass` datetime DEFAULT NULL,
  PRIMARY KEY (`id`,`account`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tbl_amphures
-- ----------------------------
DROP TABLE IF EXISTS `tbl_amphures`;
CREATE TABLE `tbl_amphures` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `code` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `name_th` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `province_id` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1007 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for tbl_banner
-- ----------------------------
DROP TABLE IF EXISTS `tbl_banner`;
CREATE TABLE `tbl_banner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `page` varchar(255) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `images_desktop` varchar(255) DEFAULT NULL,
  `images_mobile` varchar(255) DEFAULT NULL,
  `rec_by` varchar(255) DEFAULT NULL,
  `rec_date` datetime DEFAULT NULL,
  `update_date` varchar(255) DEFAULT NULL,
  `update_by` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tbl_districts
-- ----------------------------
DROP TABLE IF EXISTS `tbl_districts`;
CREATE TABLE `tbl_districts` (
  `id` varchar(6) COLLATE utf8_bin NOT NULL,
  `zip_code` int(11) NOT NULL,
  `name_th` varchar(150) COLLATE utf8_bin NOT NULL,
  `name_en` varchar(150) COLLATE utf8_bin NOT NULL,
  `amphure_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8914 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='InnoDB free: 8192 kB';

-- ----------------------------
-- Table structure for tbl_geographies
-- ----------------------------
DROP TABLE IF EXISTS `tbl_geographies`;
CREATE TABLE `tbl_geographies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='InnoDB free: 8192 kB';

-- ----------------------------
-- Table structure for tbl_newspromotion
-- ----------------------------
DROP TABLE IF EXISTS `tbl_newspromotion`;
CREATE TABLE `tbl_newspromotion` (
  `np_id` int(11) NOT NULL AUTO_INCREMENT,
  `np_type` char(1) DEFAULT NULL,
  `np_name` varchar(255) DEFAULT NULL,
  `np_shortdesc` text,
  `np_description` text,
  `np_status` char(1) DEFAULT NULL,
  `np_thumbnail` varchar(255) DEFAULT NULL,
  `np_recby` varchar(255) DEFAULT NULL,
  `np_recdate` datetime DEFAULT NULL,
  `np_update_by` varchar(255) DEFAULT NULL,
  `np_update_date` datetime DEFAULT NULL,
  `np_start` date DEFAULT NULL,
  `np_end` date DEFAULT NULL,
  `np_link` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`np_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tbl_option
-- ----------------------------
DROP TABLE IF EXISTS `tbl_option`;
CREATE TABLE `tbl_option` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` text,
  `address` varchar(255) DEFAULT NULL,
  `contact_mail` varchar(255) DEFAULT NULL,
  `contact_tel` varchar(255) DEFAULT NULL,
  `contact_fax` varchar(255) DEFAULT NULL,
  `contact_web` varchar(255) DEFAULT NULL,
  `contact_line` varchar(255) DEFAULT NULL,
  `contact_facebook` varchar(255) DEFAULT NULL,
  `contact_instagram` varchar(255) DEFAULT NULL,
  `contact_youtube` varchar(255) DEFAULT NULL,
  `page` varchar(255) DEFAULT NULL,
  `thumbnail` varchar(255) DEFAULT NULL,
  `rec_by` varchar(255) DEFAULT NULL,
  `rec_date` datetime DEFAULT NULL,
  `update_by` varchar(255) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tbl_order
-- ----------------------------
DROP TABLE IF EXISTS `tbl_order`;
CREATE TABLE `tbl_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_no` varchar(50) DEFAULT NULL,
  `invoice_no` varchar(50) DEFAULT NULL,
  `subtotal` decimal(11,2) DEFAULT NULL,
  `nettotal` decimal(11,2) DEFAULT NULL,
  `shipping_id` int(11) DEFAULT NULL,
  `shipping_name` varchar(255) DEFAULT NULL,
  `shipping_rate` decimal(11,2) DEFAULT NULL,
  `vat` decimal(11,2) DEFAULT NULL,
  `order_status` char(1) DEFAULT '1' COMMENT '0=ยกเลิก, 1=กำลังดำเนินการ, 2=ยืนยันการสั่งซื้อ, 3=จัดส่งแล้ว',
  `payment_status` varchar(255) DEFAULT '1' COMMENT '0=ไม่ได้ชำระเงิน, 1=รอชำระเงิน, 2=ชำระเงินแล้ว',
  `charge_id` varchar(255) DEFAULT '' COMMENT 'หมายเลขการชำระเงิน จาก omise',
  `ip_address` varchar(255) DEFAULT NULL,
  `rec_by` varchar(255) DEFAULT NULL,
  `rec_date` datetime DEFAULT NULL,
  `update_by` varchar(255) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tbl_order_chanel
-- ----------------------------
DROP TABLE IF EXISTS `tbl_order_chanel`;
CREATE TABLE `tbl_order_chanel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `order_no` varchar(50) DEFAULT NULL,
  `ip_address` varchar(255) DEFAULT NULL,
  `user_agent` varchar(255) DEFAULT NULL,
  `accept_lang` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tbl_order_detail
-- ----------------------------
DROP TABLE IF EXISTS `tbl_order_detail`;
CREATE TABLE `tbl_order_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `order_no` varchar(50) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `price` decimal(11,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tbl_product
-- ----------------------------
DROP TABLE IF EXISTS `tbl_product`;
CREATE TABLE `tbl_product` (
  `p_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_name` varchar(255) DEFAULT NULL,
  `p_subtitle` varchar(255) DEFAULT NULL,
  `p_price` decimal(10,0) DEFAULT NULL,
  `p_shortdesc` text,
  `p_description` text,
  `p_thumbnail` varchar(255) DEFAULT NULL,
  `p_banner` varchar(255) DEFAULT NULL,
  `p_recby` varchar(255) DEFAULT NULL,
  `p_recdate` datetime DEFAULT NULL,
  `p_update_by` varchar(255) DEFAULT NULL,
  `p_update_date` datetime DEFAULT NULL,
  `p_status` char(1) DEFAULT NULL,
  `p_thumbnail_buy` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`p_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tbl_provinces
-- ----------------------------
DROP TABLE IF EXISTS `tbl_provinces`;
CREATE TABLE `tbl_provinces` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `code` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `name_th` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `geography_id` int(5) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=78 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for tbl_shipping
-- ----------------------------
DROP TABLE IF EXISTS `tbl_shipping`;
CREATE TABLE `tbl_shipping` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `rec_by` varchar(255) DEFAULT NULL,
  `rec_date` datetime DEFAULT NULL,
  `update_by` varchar(255) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `desc` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tbl_shipping_address
-- ----------------------------
DROP TABLE IF EXISTS `tbl_shipping_address`;
CREATE TABLE `tbl_shipping_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) DEFAULT NULL,
  `order_no` varchar(50) DEFAULT NULL,
  `cus_name` varchar(255) DEFAULT NULL,
  `cus_tel` char(15) DEFAULT NULL,
  `cus_email` varchar(255) DEFAULT NULL,
  `address` text,
  `province` char(10) DEFAULT NULL,
  `amphur` char(10) DEFAULT NULL,
  `district` char(10) DEFAULT NULL,
  `zipcode` char(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tbl_shipping_rate
-- ----------------------------
DROP TABLE IF EXISTS `tbl_shipping_rate`;
CREATE TABLE `tbl_shipping_rate` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `desc` text,
  `shipping_rate` int(255) DEFAULT NULL,
  `first_qty` int(11) DEFAULT NULL,
  `last_qty` int(11) DEFAULT NULL,
  `rec_by` varchar(255) DEFAULT NULL,
  `rec_date` datetime DEFAULT NULL,
  `update_by` varchar(255) DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `status` char(1) DEFAULT '1',
  `shipping_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;
