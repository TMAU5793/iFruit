/*
Navicat MySQL Data Transfer

Source Server         : T-hank
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : ifruit_db

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-09-09 12:44:22
*/

SET FOREIGN_KEY_CHECKS=0;

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
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;
