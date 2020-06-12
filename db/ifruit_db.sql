/*
Navicat MySQL Data Transfer

Source Server         : T-hank
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : ifruit_db

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-06-12 18:06:59
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
INSERT INTO `tbl_admin` VALUES ('1', 'Super', 'Admin', 'superadmin', 'd98de8e37a1f2ae852cf9595076dc330', '', '1', '1', null, 'superadmin', '2020-06-01 11:30:05', 'superadmin', '2020-06-01 11:30:29', '2020-06-12 10:35:47', '2020-06-05 12:40:08');

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_banner
-- ----------------------------
INSERT INTO `tbl_banner` VALUES ('1', 'แบนเนอร์หน้าแรก', 'home', '1', 'uploads/banner/1/desktop-c4ca4238a0b923820dcc509a6f75849b.jpg', 'uploads/banner/1/mobile-c4ca4238a0b923820dcc509a6f75849b.jpg', 'superadmin', '2020-06-03 17:58:12', '2020-06-04 12:08:51', '0000-00-00 00:00:00');
INSERT INTO `tbl_banner` VALUES ('2', 'แบนเนอร์หน้าเกี่ยวกับเรา', 'about', '1', 'uploads/banner/2/desktop-c81e728d9d4c2f636f067f89cc14862c.jpg', 'uploads/banner/2/mobile-c81e728d9d4c2f636f067f89cc14862c.jpg', 'superadmin', '2020-06-03 18:00:42', '2020-06-04 08:32:50', '0000-00-00 00:00:00');
INSERT INTO `tbl_banner` VALUES ('3', 'แบนเนอร์หน้าประวัติผู้บริหาร', 'executive', '1', 'uploads/banner/3/desktop-eccbc87e4b5ce2fe28308fd9f2a7baf31.jpg', 'uploads/banner/3/mobile-eccbc87e4b5ce2fe28308fd9f2a7baf3.jpg', 'superadmin', '2020-06-03 18:02:08', '2020-06-04 11:18:04', '0000-00-00 00:00:00');
INSERT INTO `tbl_banner` VALUES ('4', 'แบนเนอร์หน้าบริการของเรา', 'service', '1', 'uploads/banner/4/desktop-a87ff679a2f3e71d9181a67b7542122c.jpg', null, 'superadmin', '2020-06-03 18:07:05', '2020-06-03 18:07:05', '0000-00-00 00:00:00');
INSERT INTO `tbl_banner` VALUES ('5', 'แบนเนอร์หน้าผลงานของเรา', 'work', '1', 'uploads/banner/5/desktop-e4da3b7fbbce2345d7772b0674a318d51.jpg', 'uploads/banner/5/mobile-e4da3b7fbbce2345d7772b0674a318d5.jpg', 'superadmin', '2020-06-03 18:10:12', '2020-06-04 10:51:58', '0000-00-00 00:00:00');
INSERT INTO `tbl_banner` VALUES ('6', 'แบนเนอร์หน้าติดต่อเรา', 'contact', '1', 'uploads/banner/6/desktop-1679091c5a880faf6fb5e6087eb1b2dc.jpg', 'uploads/banner/6/mobile-1679091c5a880faf6fb5e6087eb1b2dc.jpg', 'superadmin', '2020-06-03 18:57:35', '2020-06-03 18:58:31', '0000-00-00 00:00:00');

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
INSERT INTO `tbl_option` VALUES ('1', '<h3>การให้บริการทางกฎหมายและคดีความ</h3><p>กฎหมายทั่วไป ทำนิติกรรมสัญญาทั้งภาษาไทยและภาษาอังกฤษ ให้คำปรึกษาและรับว่าความ ตลอดจนการดำเนินการต่างๆ ในคดีอาญาทุจริต คดีอาญาผู้ดำรงตำแหน่งทางการเมือง การดำเนินคดีความในชั้นศาลทุกศาลทั่วราชอาณาจักร ทั้งคดีแพ่ง คดีอาญา คดีแรงงาน คดีภาษีอากรคดีปกครองและคดีศาลทรัพย์สินทางปัญญาและการค้าระหว่างประเทศ ฯลฯ รวมทั้งการอุทธรณ์คำสั่งเจ้าพนักงานและการดำเนินการต่อสู้คดีในอนุญาโตตุลาการ</p><p>นอกจากนี้ บริษัทฯยังให้บริการจดทะเบียนจัดตั้งบริษัทและห้างหุ้นส่วนจำกัด จดทะเบียนการค้า เครื่องหมายการค้า ลิขสิทธิ์ สิทธิบัตร จดทะเบียนสิทธิและนิติกรรมทุกประเภท ขอใบอนุญาตทำงาน ขอวีซ่า ขอรับการส่งเสริมการลงทุน ให้คำปรึกษา ร่างสัญญาทั้งภาษาไทยและอังกฤษ จัดการทรัพย์สิน จัดการมรดก</p>', null, null, null, null, null, 'service', 'uploads/option/1/thumb-c4ca4238a0b923820dcc509a6f75849b1.jpg', 'superadmin', '2020-06-03 12:24:46', 'superadmin', '2020-06-03 13:00:55');
INSERT INTO `tbl_option` VALUES ('2', '<h3>บริษัท สำนักกฎหมาย นิติพีรฉัตร จำกัด</h3><p>เริ่มเปิดดำเนินการอย่างเป็นทางการ เมื่อต้นปี พ.ศ. 2545 มีผู้ร่วมก่อตั้ง 2 คน คือนายฉัตรทิพย์ ตัณฑประศาสน์ และนายพลพีร์ ตุลยสุวรรณ โดยเป็นทนายความประจำ ณ สำนักกฎหมายดังกล่าวกว่า 20 ปี ต่อมาเมื่อ ดร.พรเทพ พรประภา กรรมการผู้จัดการใหญ่ของกลุ่มสยามกลการ จำกัด และบริษัทในเครือทราบว่าผู้ก่อตั้งสำนักกฎหมายกำลังจะเปิดสำนักงานแห่งใหม่ของตนเอง จึงได้ชักชวนให้มาเปิดสำนักงานอยู่ที่ อาคารสยามกลการชั้น 10 เลขที่ 891/1 ถนนพระราม 1 แขวงวังใหม่ เขตปทุมวัน กรุงเทพฯ โดยให้การช่วยเหลือสนับสนุนด้วยดีมาตลอด อีกทั้ง ยังแต่งตั้งเป็นที่ปรึกษากฎหมายประจำให้กับบริษัท สยามกลการ จำกัด และบริษัทในกลุ่มสยาม รวมกว่า 30 บริษัท เช่น บริษัท สยามนิสสันเซลส์ จำกัด บริษัท สยามกลการอะไหล่ จำกัด บริษัท สยามดนตรียามาฮ่า จำกัด บริษัท สยามคันทรีคลับ จำกัด บริษัท สยาม ยีเอส แบตเตอรี่ จำกัด บริษัท สยามไดกิ้นเซลส์ จำกัด บริษัท เอ็นเอสเค แบริ่งส์ แมนูแฟคเจอริ่ง (ประเทศไทย) จำกัด บริษัท บางกอกโคมัตสุ จำกัด เป็นต้น</p><p>นอกจากนี้ บริษัทฯยังเป็นที่ปรึกษาและที่ปรึกษาประจำให้กับบริษัทชั้นนำต่างๆ อีกมากมาย เช่น ธนาคารกรุงไทย จำกัด (มหาชน) ธนาคารเพื่อการส่งออกและนำเข้าแห่งประเทศไทย บริษัท อนันดา ดีเวลลอปเม้นท์ จำกัด (มหาชน) และบริษัทในเครือ กลุ่มบริษัท SC กรุ๊ป บริษัท จาร์ดีน เอ็นจิเนียริ่ง จำกัด บริษัท ฟูคูอิ คาเซอิ (ประเทศไทย) จำกัด บริษัท ไทยมาร์ตินส์ เทรดดิ้ง จำกัด เป็นต้น</p><p>ในการดำเนินการต่างๆ บริษัทฯมีทนายความที่มีความเชี่ยวชาญ ความรู้ และมีประสบการณ์สูงในการว่าความในศาลทุกประเภท รวมทั้งด้านนิติกรรมสัญญาและให้คำปรึกษาจำนวนหลายคน ที่พร้อมให้บริการตามมาตรฐานวิชาชีพในระดับมาตรฐานสากล โดยมีค่าบริการที่เป็นธรรม</p>', null, null, null, null, null, 'about', 'uploads/option/2/thumb-c81e728d9d4c2f636f067f89cc14862c.jpg', 'superadmin', '2020-06-03 12:52:52', 'superadmin', '2020-06-03 13:01:22');
INSERT INTO `tbl_option` VALUES ('3', '<p>ให้บริการครอบคลุมทุกด้านของกฎหมาย โดยเรามีความเชี่ยวชาญเฉพาะในเรื่องการดำเนินคดีในชั้นศาล ทุกศาลทั่วราชอาณาจักร ทั้งคดีแพ่ง คดีอาญา คดีแรงงาน คดีภาษีอากร คดีปกครอง คดีล้มละลาย ขอฟื้นฟูกิจการ คดีผู้บริโภค คดีครอบครัว คดีมรดก คดีเกี่ยวกับความผิดตามพระราชบัญญัติว่าด้วยการกระทำความผิดเกี่ยวกับคอมพิวเตอร์ คดีทรัพย์สินทางปัญญาและการค้าระหว่างประเทศ คดีอาญาผู้ดำรงตำแหน่งทางการเมือง ฯลฯ รวมทั้งการดำเนินการต่อสู้คดีในอนุญาโตตุลาการ ให้ปรึกษาในการทำนิติกรรมสัญญาทุกประเภทและรับเป็นที่ปรึกษากฎหมายในธุรกิจต่างๆ (ไม่รับคดีเกี่ยวกับยาเสพติดและการค้ามนุษย์)</p>', null, null, null, null, null, 'home', 'uploads/option/3/thumb-eccbc87e4b5ce2fe28308fd9f2a7baf3.jpg', 'superadmin', '2020-06-03 13:07:08', 'superadmin', '2020-06-03 13:07:08');
INSERT INTO `tbl_option` VALUES ('4', null, '891/1 ชั้นที่ 10 อาคารสยามกลการ ถนนพระราม 1 แขวงวังใหม่ เขตปทุมวัน กรุงเทพฯ 10330', 'law@nitipeerachat.com', '02-2162006-9', '02-2162005', 'http://www.nitipeerachat.com', 'contact', null, 'superadmin', '2020-06-03 13:28:49', 'superadmin', '2020-06-03 13:38:22');

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
INSERT INTO `tbl_product` VALUES ('1', 'รสฮอตชิลลี่', 'กล้วยหอมทองทอดอบกรอบ', '45', '', '', 'uploads/product/1/product-c4ca4238a0b923820dcc509a6f75849b.png', 'uploads/product/1/product-c4ca4238a0b923820dcc509a6f75849b.jpg', 'superadmin', '2020-06-12 12:16:02', 'superadmin', '2020-06-12 12:20:36', '1', 'uploads/product/1/product-c4ca4238a0b923820dcc509a6f75849b1.png');
INSERT INTO `tbl_product` VALUES ('2', 'รสทรัฟเฟิลชีส', 'กล้วยหอมทองทอดอบกรอบ', '45', '', '', 'uploads/product/2/product-c81e728d9d4c2f636f067f89cc14862c.png', 'uploads/product/2/product-c81e728d9d4c2f636f067f89cc14862c.jpg', 'superadmin', '2020-06-12 12:19:49', 'superadmin', '2020-06-12 12:19:49', '1', 'uploads/product/2/product-c81e728d9d4c2f636f067f89cc14862c1.png');

-- ----------------------------
-- Table structure for tbl_promotion
-- ----------------------------
DROP TABLE IF EXISTS `tbl_promotion`;
CREATE TABLE `tbl_promotion` (
  `pt_id` int(11) NOT NULL AUTO_INCREMENT,
  `pt_name` varchar(255) DEFAULT NULL,
  `pt_shortdesc` text,
  `pt_description` text,
  `pt_status` char(1) DEFAULT NULL,
  `pt_thumbnail` varchar(255) DEFAULT NULL,
  `pt_recby` varchar(255) DEFAULT NULL,
  `pt_recdate` datetime DEFAULT NULL,
  `pt_update_by` varchar(255) DEFAULT NULL,
  `pt_update_date` datetime DEFAULT NULL,
  `pt_start` date DEFAULT NULL,
  `pt_end` date DEFAULT NULL,
  PRIMARY KEY (`pt_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of tbl_promotion
-- ----------------------------
