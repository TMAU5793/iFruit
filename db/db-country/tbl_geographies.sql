/*
Navicat MySQL Data Transfer

Source Server         : T-hank
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : ifruit_db

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-09-09 12:40:31
*/

SET FOREIGN_KEY_CHECKS=0;

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
-- Records of tbl_geographies
-- ----------------------------
INSERT INTO `tbl_geographies` VALUES ('1', 'ภาคเหนือ');
INSERT INTO `tbl_geographies` VALUES ('2', 'ภาคกลาง');
INSERT INTO `tbl_geographies` VALUES ('3', 'ภาคตะวันออกเฉียงเหนือ');
INSERT INTO `tbl_geographies` VALUES ('4', 'ภาคตะวันตก');
INSERT INTO `tbl_geographies` VALUES ('5', 'ภาคตะวันออก');
INSERT INTO `tbl_geographies` VALUES ('6', 'ภาคใต้');
