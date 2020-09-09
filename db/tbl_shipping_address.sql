/*
Navicat MySQL Data Transfer

Source Server         : T-hank
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : ifruit_db

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-09-09 12:41:09
*/

SET FOREIGN_KEY_CHECKS=0;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
