/*
Navicat MySQL Data Transfer

Source Server         : T-hank
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : ifruit_db

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-06-22 19:35:59
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
-- Records of tbl_admin
-- ----------------------------
INSERT INTO `tbl_admin` VALUES ('1', 'Super', 'Admin', 'superadmin', 'd98de8e37a1f2ae852cf9595076dc330', '', '1', '1', null, 'superadmin', '2020-06-01 11:30:05', 'superadmin', '2020-06-01 11:30:29', '2020-06-22 06:33:43', '2020-06-05 12:40:08');

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
-- Records of tbl_banner
-- ----------------------------
INSERT INTO `tbl_banner` VALUES ('1', 'สไลด์1', 'home', '1', 'uploads/banner/1/desktop-c4ca4238a0b923820dcc509a6f75849b1.jpg', 'uploads/banner/1/mobile-c4ca4238a0b923820dcc509a6f75849b.jpg', 'superadmin', '2020-06-16 09:01:27', '2020-06-16 12:38:39', '0000-00-00 00:00:00');
INSERT INTO `tbl_banner` VALUES ('2', 'สไลด์2', 'home', '1', 'uploads/banner/2/desktop-c81e728d9d4c2f636f067f89cc14862c1.jpg', 'uploads/banner/2/mobile-c81e728d9d4c2f636f067f89cc14862c.jpg', 'superadmin', '2020-06-16 12:11:31', '2020-06-16 12:38:25', '0000-00-00 00:00:00');
INSERT INTO `tbl_banner` VALUES ('3', 'สไลด์3', 'home', '1', 'uploads/banner/3/desktop-eccbc87e4b5ce2fe28308fd9f2a7baf31.jpg', 'uploads/banner/3/mobile-eccbc87e4b5ce2fe28308fd9f2a7baf3.jpg', 'superadmin', '2020-06-16 12:11:51', '2020-06-16 12:38:03', '0000-00-00 00:00:00');

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
-- Records of tbl_newspromotion
-- ----------------------------
INSERT INTO `tbl_newspromotion` VALUES ('1', '3', 'iFruit มีขายแล้วที่ Shopee', '', '<p>ออกกำลังกายมาเหนื่อยๆก็หิวเป็นธรรมดา&nbsp;แล้วอะไรที่กินแล้วไม่อ้วนแต่อร่อยละ&nbsp;ก็ไอฟรุ๊ตไง&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;กล้วยหอมทองทอดกรอบที่อร่อยและกินได้ทุกวัน&nbsp;โซเดียมน้อย!&nbsp;แคลลอรี่ต่ำ!!&nbsp;แถมยังมีประโยชน์อีกด้วย&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หาซื้อได้ง่ายๆเรามีหลายสาขาตามนี้&nbsp;สาขารัชโยธิน&nbsp;,&nbsp;สาขารัชดา&nbsp;,&nbsp;สาขาเอกมัย&nbsp;,&nbsp;สาขาปิ่นเกล้า&nbsp;และสาขาแคราย</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Line:&nbsp;https://lin.ee/189u8u3</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FB:&nbsp;https://www.facebook.com/iFRUITBRAND/</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IG:&nbsp;https://www.instagram.com</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;มีขายแล้วที่ร้าน&nbsp;Graf&nbsp;ใน&nbsp;WE&nbsp;Fitness&nbsp;ทุกสาขา</p><p><br>&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;สั่งซื้อ&nbsp;ใน&nbsp;Shoppe&nbsp;online&nbsp;ตามลิ้งนี้เลยคะ</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;สั่งซื้อ&nbsp;IFruit&nbsp;รสทรัฟเฟิลชีสได้ที่&nbsp;&gt;&gt;&gt;&nbsp;http://bit.ly/373XVdx</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;สั่งซื้อ&nbsp;IFruit&nbsp;รสฮอตชิลลี่ได้ที่&nbsp;&gt;&gt;&gt;&nbsp;http://bit.ly/36QScYc</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;สั่งซื้อสินค้าทั้งหมดได้ที่นี่&nbsp;&gt;&gt;&gt;&nbsp;http://bit.ly/2Q2pgpj</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;หรือทักมาใน&nbsp;Inbox&nbsp;ได้เลยค่ะ</p>', '1', 'uploads/newspromotion/1/np-c4ca4238a0b923820dcc509a6f75849b1.jpg', 'superadmin', '2020-06-15 11:05:00', 'superadmin', '2020-06-22 12:40:36', '2020-06-16', '2020-06-30', 'https://www.facebook.com/iFRUITBRAND/photos/a.156688912330877/163997238266711/?type=3&theater');
INSERT INTO `tbl_newspromotion` VALUES ('2', '3', 'iFruit จัดหนักความอร่อย', '<p>new1</p>', '<p>ออกกำลังกายมาเหนื่อยๆก็หิวเป็นธรรมดา&nbsp;แล้วอะไรที่กินแล้วไม่อ้วนแต่อร่อยละ&nbsp;ก็ไอฟรุ๊ตไง&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;กล้วยหอมทองทอดกรอบที่อร่อยและกินได้ทุกวัน&nbsp;โซเดียมน้อย!&nbsp;แคลลอรี่ต่ำ!!&nbsp;แถมยังมีประโยชน์อีกด้วย&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หาซื้อได้ง่ายๆเรามีหลายสาขาตามนี้&nbsp;สาขารัชโยธิน&nbsp;,&nbsp;สาขารัชดา&nbsp;,&nbsp;สาขาเอกมัย&nbsp;,&nbsp;สาขาปิ่นเกล้า&nbsp;และสาขาแคราย</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Line:&nbsp;https://lin.ee/189u8u3</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FB:&nbsp;https://www.facebook.com/iFRUITBRAND/</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IG:&nbsp;https://www.instagram.com</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;มีขายแล้วที่ร้าน&nbsp;Graf&nbsp;ใน&nbsp;WE&nbsp;Fitness&nbsp;ทุกสาขา</p><p><br>&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;สั่งซื้อ&nbsp;ใน&nbsp;Shoppe&nbsp;online&nbsp;ตามลิ้งนี้เลยคะ</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;สั่งซื้อ&nbsp;IFruit&nbsp;รสทรัฟเฟิลชีสได้ที่&nbsp;&gt;&gt;&gt;&nbsp;http://bit.ly/373XVdx</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;สั่งซื้อ&nbsp;IFruit&nbsp;รสฮอตชิลลี่ได้ที่&nbsp;&gt;&gt;&gt;&nbsp;http://bit.ly/36QScYc</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;สั่งซื้อสินค้าทั้งหมดได้ที่นี่&nbsp;&gt;&gt;&gt;&nbsp;http://bit.ly/2Q2pgpj</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;หรือทักมาใน&nbsp;Inbox&nbsp;ได้เลยค่ะ</p>', '1', 'uploads/newspromotion/2/np-c81e728d9d4c2f636f067f89cc14862c1.jpg', 'superadmin', '2020-06-15 12:21:37', 'superadmin', '2020-06-22 12:24:25', '0000-00-00', '0000-00-00', 'https://www.facebook.com/iFRUITBRAND/photos/a.156688912330877/156688895664212/?type=3&theater');
INSERT INTO `tbl_newspromotion` VALUES ('3', '3', 'เล่นเกมส์ แจกของรางวัล', '<p>news2</p>', '<p>ออกกำลังกายมาเหนื่อยๆก็หิวเป็นธรรมดา&nbsp;แล้วอะไรที่กินแล้วไม่อ้วนแต่อร่อยละ&nbsp;ก็ไอฟรุ๊ตไง&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;กล้วยหอมทองทอดกรอบที่อร่อยและกินได้ทุกวัน&nbsp;โซเดียมน้อย!&nbsp;แคลลอรี่ต่ำ!!&nbsp;แถมยังมีประโยชน์อีกด้วย&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หาซื้อได้ง่ายๆเรามีหลายสาขาตามนี้&nbsp;สาขารัชโยธิน&nbsp;,&nbsp;สาขารัชดา&nbsp;,&nbsp;สาขาเอกมัย&nbsp;,&nbsp;สาขาปิ่นเกล้า&nbsp;และสาขาแคราย</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Line:&nbsp;https://lin.ee/189u8u3</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FB:&nbsp;https://www.facebook.com/iFRUITBRAND/</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IG:&nbsp;https://www.instagram.com</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;มีขายแล้วที่ร้าน&nbsp;Graf&nbsp;ใน&nbsp;WE&nbsp;Fitness&nbsp;ทุกสาขา</p><p><br>&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;สั่งซื้อ&nbsp;ใน&nbsp;Shoppe&nbsp;online&nbsp;ตามลิ้งนี้เลยคะ</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;สั่งซื้อ&nbsp;IFruit&nbsp;รสทรัฟเฟิลชีสได้ที่&nbsp;&gt;&gt;&gt;&nbsp;http://bit.ly/373XVdx</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;สั่งซื้อ&nbsp;IFruit&nbsp;รสฮอตชิลลี่ได้ที่&nbsp;&gt;&gt;&gt;&nbsp;http://bit.ly/36QScYc</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;สั่งซื้อสินค้าทั้งหมดได้ที่นี่&nbsp;&gt;&gt;&gt;&nbsp;http://bit.ly/2Q2pgpj</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;หรือทักมาใน&nbsp;Inbox&nbsp;ได้เลยค่ะ</p>', '1', 'uploads/newspromotion/3/np-eccbc87e4b5ce2fe28308fd9f2a7baf3.jpg', 'superadmin', '2020-06-17 06:01:45', 'superadmin', '2020-06-22 12:25:03', '0000-00-00', '0000-00-00', 'https://web.facebook.com/iFRUITBRAND/videos/192683968644377/?_rdc=1&_rdr');
INSERT INTO `tbl_newspromotion` VALUES ('4', '3', 'คุณค่าทางโภชนาการของกล้วย', '<p>news3</p>', '<p>ออกกำลังกายมาเหนื่อยๆก็หิวเป็นธรรมดา&nbsp;แล้วอะไรที่กินแล้วไม่อ้วนแต่อร่อยละ&nbsp;ก็ไอฟรุ๊ตไง&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;กล้วยหอมทองทอดกรอบที่อร่อยและกินได้ทุกวัน&nbsp;โซเดียมน้อย!&nbsp;แคลลอรี่ต่ำ!!&nbsp;แถมยังมีประโยชน์อีกด้วย&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หาซื้อได้ง่ายๆเรามีหลายสาขาตามนี้&nbsp;สาขารัชโยธิน&nbsp;,&nbsp;สาขารัชดา&nbsp;,&nbsp;สาขาเอกมัย&nbsp;,&nbsp;สาขาปิ่นเกล้า&nbsp;และสาขาแคราย</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Line:&nbsp;https://lin.ee/189u8u3</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FB:&nbsp;https://www.facebook.com/iFRUITBRAND/</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IG:&nbsp;https://www.instagram.com</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;มีขายแล้วที่ร้าน&nbsp;Graf&nbsp;ใน&nbsp;WE&nbsp;Fitness&nbsp;ทุกสาขา</p><p><br>&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;สั่งซื้อ&nbsp;ใน&nbsp;Shoppe&nbsp;online&nbsp;ตามลิ้งนี้เลยคะ</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;สั่งซื้อ&nbsp;IFruit&nbsp;รสทรัฟเฟิลชีสได้ที่&nbsp;&gt;&gt;&gt;&nbsp;http://bit.ly/373XVdx</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;สั่งซื้อ&nbsp;IFruit&nbsp;รสฮอตชิลลี่ได้ที่&nbsp;&gt;&gt;&gt;&nbsp;http://bit.ly/36QScYc</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;สั่งซื้อสินค้าทั้งหมดได้ที่นี่&nbsp;&gt;&gt;&gt;&nbsp;http://bit.ly/2Q2pgpj</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;หรือทักมาใน&nbsp;Inbox&nbsp;ได้เลยค่ะ</p>', '1', 'uploads/newspromotion/4/np-a87ff679a2f3e71d9181a67b7542122c1.jpg', 'superadmin', '2020-06-17 06:02:08', 'superadmin', '2020-06-22 12:25:29', '0000-00-00', '0000-00-00', 'https://web.facebook.com/iFRUITBRAND/photos/a.114014753264960/172930694040032/?type=3&theater&_rdc=1&_rdr');
INSERT INTO `tbl_newspromotion` VALUES ('5', '3', 'ประโยชน์ของกล้วย', '<p>pro2</p>', '<p>ออกกำลังกายมาเหนื่อยๆก็หิวเป็นธรรมดา&nbsp;แล้วอะไรที่กินแล้วไม่อ้วนแต่อร่อยละ&nbsp;ก็ไอฟรุ๊ตไง&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;กล้วยหอมทองทอดกรอบที่อร่อยและกินได้ทุกวัน&nbsp;โซเดียมน้อย!&nbsp;แคลลอรี่ต่ำ!!&nbsp;แถมยังมีประโยชน์อีกด้วย&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;หาซื้อได้ง่ายๆเรามีหลายสาขาตามนี้&nbsp;สาขารัชโยธิน&nbsp;,&nbsp;สาขารัชดา&nbsp;,&nbsp;สาขาเอกมัย&nbsp;,&nbsp;สาขาปิ่นเกล้า&nbsp;และสาขาแคราย</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Line:&nbsp;https://lin.ee/189u8u3</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;FB:&nbsp;https://www.facebook.com/iFRUITBRAND/</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;IG:&nbsp;https://www.instagram.com</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;มีขายแล้วที่ร้าน&nbsp;Graf&nbsp;ใน&nbsp;WE&nbsp;Fitness&nbsp;ทุกสาขา</p><p><br>&nbsp;</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;สั่งซื้อ&nbsp;ใน&nbsp;Shoppe&nbsp;online&nbsp;ตามลิ้งนี้เลยคะ</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;สั่งซื้อ&nbsp;IFruit&nbsp;รสทรัฟเฟิลชีสได้ที่&nbsp;&gt;&gt;&gt;&nbsp;http://bit.ly/373XVdx</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;สั่งซื้อ&nbsp;IFruit&nbsp;รสฮอตชิลลี่ได้ที่&nbsp;&gt;&gt;&gt;&nbsp;http://bit.ly/36QScYc</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;สั่งซื้อสินค้าทั้งหมดได้ที่นี่&nbsp;&gt;&gt;&gt;&nbsp;http://bit.ly/2Q2pgpj</p><p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;*&nbsp;หรือทักมาใน&nbsp;Inbox&nbsp;ได้เลยค่ะ</p>', '1', 'uploads/newspromotion/5/np-e4da3b7fbbce2345d7772b0674a318d5.jpg', 'superadmin', '2020-06-17 06:02:38', 'superadmin', '2020-06-22 12:25:48', '2020-06-26', '2020-06-29', 'https://web.facebook.com/iFRUITBRAND?_rdc=1&_rdr');
INSERT INTO `tbl_newspromotion` VALUES ('7', '3', 'iFruit มีขายแล้วที่ We Fitness', '', '', '1', 'uploads/newspromotion/7/np-8f14e45fceea167a5a36dedd4bea2543.jpg', 'superadmin', '2020-06-22 11:22:29', 'superadmin', '2020-06-22 12:26:04', '2020-06-22', '2020-06-22', 'https://www.facebook.com/iFRUITBRAND/photos/a.114014753264960/177926456873789/?type=3&theater');

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
-- Records of tbl_option
-- ----------------------------
INSERT INTO `tbl_option` VALUES ('2', '<p>iFruit Co., Ltd. เรามีความห่วงใยและเข้าใจคนรักสุขภาพเป็นอย่างดี จึงได้คิดค้นของว่างที่รับประทานง่ายและดีต่อใจ เต็มที่กับทุกกระบวนการ เลือกผลิตจากวัตถุดิบ​ธรรมชาติ​เน้น ๆ เริ่มต้นใส่ใจและพิถีพิถันตั้งแต่การปลูก ไปจนถึงการคัดสรรกล้วยหอมทองลูกโต คุณภาพชั้นดี จากแหล่งปลูกที่ดีที่สุดของประเทศไทย มาเป็นวัตถุดิบในการผลิต iFruit Banana Chips กล้วยหอมทองทอดกรอบ​ ที่มีไฟเบอร์สูง​ แคลอรี่ต่ำ ผลิตภัณฑ์ของเราอัดแน่นไปด้วยคุณภาพ และ อร่อยถูกปาก รสชาติถูกใจ รับประทานได้ทุกวัน อีกทั้งยังมีคุณค่า​ทางอาหาร เราอยากมอบสิ่งที่ดีที่สุดให้กับคุณ</p>', null, null, null, null, null, null, null, null, null, 'about', 'uploads/option/2/thumb-c81e728d9d4c2f636f067f89cc14862c1.png', 'superadmin', '2020-06-03 12:52:52', 'superadmin', '2020-06-17 11:29:34');
INSERT INTO `tbl_option` VALUES ('4', null, 'I fruit CO., LTD 645/4 Sukhumvit Road Prakanong, Khlong toei ,Bangkok 10260', 'ifruitbrand.com@gmail.com', '+66 84 224 2924', '', 'ifruitbrand.com', '@ifruitbrand', 'ifruitbrand', 'ifruitbrand', '', 'contact', null, 'superadmin', '2020-06-03 13:28:49', 'superadmin', '2020-06-22 07:13:29');

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
-- Records of tbl_product
-- ----------------------------
INSERT INTO `tbl_product` VALUES ('1', 'รสฮอตชิลลี่', 'กล้วยหอมทองทอดอบกรอบ', '45', '', '<p>สัมผัสความเผ็ดร้อนในแบบกล้วยๆกับ Banana Chip Hot Chili flavor (รสฮอตชิลลี่) รสชาติถูกใจกับใครที่ไม่ชอบความจืดชืด</p><p>เพิ่มสีสันให้ชีวิตด้วยฮอตชิลลี่ผสมผสานกับกล้วยหอมทองทอดกรอบ จนได้รสชาติที่ลงตัวที่ใครได้ชิมก็ต้องชอบ</p>', 'uploads/product/1/product-c4ca4238a0b923820dcc509a6f75849b1.png', 'uploads/product/1/product-c4ca4238a0b923820dcc509a6f75849b.jpg', 'superadmin', '2020-06-12 12:16:02', 'superadmin', '2020-06-17 09:52:37', '1', 'uploads/product/1/product-c4ca4238a0b923820dcc509a6f75849b2.png');
INSERT INTO `tbl_product` VALUES ('2', 'รสทรัฟเฟิลชีส', 'กล้วยหอมทองทอดอบกรอบ', '45', '', '<p>ด้วยการผสมผลานความอร่อยกันอย่างลงตัวระหว่าง เห็ดทรัฟเฟิล กล้วย และชีส จนออกมาเป็น Banana Chip Truffle Cheese flavor (รสทรัฟเฟิลชีส) เห็ดทรัฟเฟิล ถือเป็นอีกหนึ่งขุมทรัพย์ทางด้านคุณค่าทางอาหาร กลิ่นที่มีลักษณะเฉพาะตัวชวนให้น่าหลงไหล</p><p>&nbsp;</p><p>ยิ่งนำมาผสมผสานในอาหารยิ่งมีความโดดเด่น เป็นที่นิยมมากในวงการอาหารได้รับการขนานนามว่าเป็นสุดยอดแห่งเครื่องปรุงรวมตัวกับกล้วยหอมทองลูกโตคลุกเคล้ากับชีสจนมารวมกันเป็นกล้วยหอมทองทอดกรอบรสเห็ดทรัฟเฟิลชีส</p>', 'uploads/product/2/product-c81e728d9d4c2f636f067f89cc14862c1.png', 'uploads/product/2/product-c81e728d9d4c2f636f067f89cc14862c.jpg', 'superadmin', '2020-06-12 12:19:49', 'superadmin', '2020-06-17 09:52:09', '1', 'uploads/product/2/product-c81e728d9d4c2f636f067f89cc14862c2.png');
