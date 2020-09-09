/*
Navicat MySQL Data Transfer

Source Server         : T-hank
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : ifruit_db

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-09-09 12:41:17
*/

SET FOREIGN_KEY_CHECKS=0;

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

-- ----------------------------
-- Records of tbl_shipping_rate
-- ----------------------------
INSERT INTO `tbl_shipping_rate` VALUES ('1', '', '25', '1', '5', 'superadmin', '2020-08-25 10:44:12', 'superadmin', '2020-08-25 13:24:29', '1', '1');
INSERT INTO `tbl_shipping_rate` VALUES ('2', '', '50', '6', '15', 'superadmin', '2020-08-25 10:57:36', 'superadmin', '2020-08-25 13:28:06', '1', '1');
INSERT INTO `tbl_shipping_rate` VALUES ('3', '', '100', '16', '999', 'superadmin', '2020-08-25 10:58:28', 'superadmin', '2020-08-25 13:28:10', '1', '1');
INSERT INTO `tbl_shipping_rate` VALUES ('4', '', '50', '1', '5', 'superadmin', '2020-08-25 11:01:16', 'superadmin', '2020-08-25 13:28:14', '1', '2');
INSERT INTO `tbl_shipping_rate` VALUES ('5', '', '150', '6', '15', 'superadmin', '2020-08-25 11:01:33', 'superadmin', '2020-08-25 13:28:18', '1', '2');
INSERT INTO `tbl_shipping_rate` VALUES ('6', '', '300', '16', '999', 'superadmin', '2020-08-25 11:01:50', 'superadmin', '2020-08-25 13:28:23', '1', '2');
