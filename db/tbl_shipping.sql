/*
Navicat MySQL Data Transfer

Source Server         : T-hank
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : ifruit_db

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-09-09 12:41:00
*/

SET FOREIGN_KEY_CHECKS=0;

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
-- Records of tbl_shipping
-- ----------------------------
INSERT INTO `tbl_shipping` VALUES ('1', 'ส่งธรรมดา', '1', 'superadmin', '2020-08-25 12:50:37', 'superadmin', '2020-08-25 12:50:37', '');
INSERT INTO `tbl_shipping` VALUES ('2', 'EMS', '1', 'superadmin', '2020-08-25 12:51:29', 'superadmin', '2020-08-25 12:55:17', '');
INSERT INTO `tbl_shipping` VALUES ('3', 'ส่งธรรมดา (เคอรี่)', '1', 'superadmin', '2020-08-25 12:52:10', 'superadmin', '2020-08-25 12:52:10', '');
INSERT INTO `tbl_shipping` VALUES ('4', 'EMS (เคอรี่)', '1', 'superadmin', '2020-08-25 12:52:26', 'superadmin', '2020-08-25 12:55:28', '');
