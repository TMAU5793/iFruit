/*
Navicat MySQL Data Transfer

Source Server         : T-hank
Source Server Version : 50505
Source Host           : localhost:3306
Source Database       : ifruit_db

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2020-09-09 12:40:42
*/

SET FOREIGN_KEY_CHECKS=0;

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
-- Records of tbl_provinces
-- ----------------------------
INSERT INTO `tbl_provinces` VALUES ('1', '10', 'กรุงเทพมหานคร', 'Bangkok', '2');
INSERT INTO `tbl_provinces` VALUES ('2', '11', 'สมุทรปราการ', 'Samut Prakan', '2');
INSERT INTO `tbl_provinces` VALUES ('3', '12', 'นนทบุรี', 'Nonthaburi', '2');
INSERT INTO `tbl_provinces` VALUES ('4', '13', 'ปทุมธานี', 'Pathum Thani', '2');
INSERT INTO `tbl_provinces` VALUES ('5', '14', 'พระนครศรีอยุธยา', 'Phra Nakhon Si Ayutthaya', '2');
INSERT INTO `tbl_provinces` VALUES ('6', '15', 'อ่างทอง', 'Ang Thong', '2');
INSERT INTO `tbl_provinces` VALUES ('7', '16', 'ลพบุรี', 'Loburi', '2');
INSERT INTO `tbl_provinces` VALUES ('8', '17', 'สิงห์บุรี', 'Sing Buri', '2');
INSERT INTO `tbl_provinces` VALUES ('9', '18', 'ชัยนาท', 'Chai Nat', '2');
INSERT INTO `tbl_provinces` VALUES ('10', '19', 'สระบุรี', 'Saraburi', '2');
INSERT INTO `tbl_provinces` VALUES ('11', '20', 'ชลบุรี', 'Chon Buri', '5');
INSERT INTO `tbl_provinces` VALUES ('12', '21', 'ระยอง', 'Rayong', '5');
INSERT INTO `tbl_provinces` VALUES ('13', '22', 'จันทบุรี', 'Chanthaburi', '5');
INSERT INTO `tbl_provinces` VALUES ('14', '23', 'ตราด', 'Trat', '5');
INSERT INTO `tbl_provinces` VALUES ('15', '24', 'ฉะเชิงเทรา', 'Chachoengsao', '5');
INSERT INTO `tbl_provinces` VALUES ('16', '25', 'ปราจีนบุรี', 'Prachin Buri', '5');
INSERT INTO `tbl_provinces` VALUES ('17', '26', 'นครนายก', 'Nakhon Nayok', '2');
INSERT INTO `tbl_provinces` VALUES ('18', '27', 'สระแก้ว', 'Sa Kaeo', '5');
INSERT INTO `tbl_provinces` VALUES ('19', '30', 'นครราชสีมา', 'Nakhon Ratchasima', '3');
INSERT INTO `tbl_provinces` VALUES ('20', '31', 'บุรีรัมย์', 'Buri Ram', '3');
INSERT INTO `tbl_provinces` VALUES ('21', '32', 'สุรินทร์', 'Surin', '3');
INSERT INTO `tbl_provinces` VALUES ('22', '33', 'ศรีสะเกษ', 'Si Sa Ket', '3');
INSERT INTO `tbl_provinces` VALUES ('23', '34', 'อุบลราชธานี', 'Ubon Ratchathani', '3');
INSERT INTO `tbl_provinces` VALUES ('24', '35', 'ยโสธร', 'Yasothon', '3');
INSERT INTO `tbl_provinces` VALUES ('25', '36', 'ชัยภูมิ', 'Chaiyaphum', '3');
INSERT INTO `tbl_provinces` VALUES ('26', '37', 'อำนาจเจริญ', 'Amnat Charoen', '3');
INSERT INTO `tbl_provinces` VALUES ('27', '39', 'หนองบัวลำภู', 'Nong Bua Lam Phu', '3');
INSERT INTO `tbl_provinces` VALUES ('28', '40', 'ขอนแก่น', 'Khon Kaen', '3');
INSERT INTO `tbl_provinces` VALUES ('29', '41', 'อุดรธานี', 'Udon Thani', '3');
INSERT INTO `tbl_provinces` VALUES ('30', '42', 'เลย', 'Loei', '3');
INSERT INTO `tbl_provinces` VALUES ('31', '43', 'หนองคาย', 'Nong Khai', '3');
INSERT INTO `tbl_provinces` VALUES ('32', '44', 'มหาสารคาม', 'Maha Sarakham', '3');
INSERT INTO `tbl_provinces` VALUES ('33', '45', 'ร้อยเอ็ด', 'Roi Et', '3');
INSERT INTO `tbl_provinces` VALUES ('34', '46', 'กาฬสินธุ์', 'Kalasin', '3');
INSERT INTO `tbl_provinces` VALUES ('35', '47', 'สกลนคร', 'Sakon Nakhon', '3');
INSERT INTO `tbl_provinces` VALUES ('36', '48', 'นครพนม', 'Nakhon Phanom', '3');
INSERT INTO `tbl_provinces` VALUES ('37', '49', 'มุกดาหาร', 'Mukdahan', '3');
INSERT INTO `tbl_provinces` VALUES ('38', '50', 'เชียงใหม่', 'Chiang Mai', '1');
INSERT INTO `tbl_provinces` VALUES ('39', '51', 'ลำพูน', 'Lamphun', '1');
INSERT INTO `tbl_provinces` VALUES ('40', '52', 'ลำปาง', 'Lampang', '1');
INSERT INTO `tbl_provinces` VALUES ('41', '53', 'อุตรดิตถ์', 'Uttaradit', '1');
INSERT INTO `tbl_provinces` VALUES ('42', '54', 'แพร่', 'Phrae', '1');
INSERT INTO `tbl_provinces` VALUES ('43', '55', 'น่าน', 'Nan', '1');
INSERT INTO `tbl_provinces` VALUES ('44', '56', 'พะเยา', 'Phayao', '1');
INSERT INTO `tbl_provinces` VALUES ('45', '57', 'เชียงราย', 'Chiang Rai', '1');
INSERT INTO `tbl_provinces` VALUES ('46', '58', 'แม่ฮ่องสอน', 'Mae Hong Son', '1');
INSERT INTO `tbl_provinces` VALUES ('47', '60', 'นครสวรรค์', 'Nakhon Sawan', '2');
INSERT INTO `tbl_provinces` VALUES ('48', '61', 'อุทัยธานี', 'Uthai Thani', '2');
INSERT INTO `tbl_provinces` VALUES ('49', '62', 'กำแพงเพชร', 'Kamphaeng Phet', '2');
INSERT INTO `tbl_provinces` VALUES ('50', '63', 'ตาก', 'Tak', '4');
INSERT INTO `tbl_provinces` VALUES ('51', '64', 'สุโขทัย', 'Sukhothai', '2');
INSERT INTO `tbl_provinces` VALUES ('52', '65', 'พิษณุโลก', 'Phitsanulok', '2');
INSERT INTO `tbl_provinces` VALUES ('53', '66', 'พิจิตร', 'Phichit', '2');
INSERT INTO `tbl_provinces` VALUES ('54', '67', 'เพชรบูรณ์', 'Phetchabun', '2');
INSERT INTO `tbl_provinces` VALUES ('55', '70', 'ราชบุรี', 'Ratchaburi', '4');
INSERT INTO `tbl_provinces` VALUES ('56', '71', 'กาญจนบุรี', 'Kanchanaburi', '4');
INSERT INTO `tbl_provinces` VALUES ('57', '72', 'สุพรรณบุรี', 'Suphan Buri', '2');
INSERT INTO `tbl_provinces` VALUES ('58', '73', 'นครปฐม', 'Nakhon Pathom', '2');
INSERT INTO `tbl_provinces` VALUES ('59', '74', 'สมุทรสาคร', 'Samut Sakhon', '2');
INSERT INTO `tbl_provinces` VALUES ('60', '75', 'สมุทรสงคราม', 'Samut Songkhram', '2');
INSERT INTO `tbl_provinces` VALUES ('61', '76', 'เพชรบุรี', 'Phetchaburi', '4');
INSERT INTO `tbl_provinces` VALUES ('62', '77', 'ประจวบคีรีขันธ์', 'Prachuap Khiri Khan', '4');
INSERT INTO `tbl_provinces` VALUES ('63', '80', 'นครศรีธรรมราช', 'Nakhon Si Thammarat', '6');
INSERT INTO `tbl_provinces` VALUES ('64', '81', 'กระบี่', 'Krabi', '6');
INSERT INTO `tbl_provinces` VALUES ('65', '82', 'พังงา', 'Phangnga', '6');
INSERT INTO `tbl_provinces` VALUES ('66', '83', 'ภูเก็ต', 'Phuket', '6');
INSERT INTO `tbl_provinces` VALUES ('67', '84', 'สุราษฎร์ธานี', 'Surat Thani', '6');
INSERT INTO `tbl_provinces` VALUES ('68', '85', 'ระนอง', 'Ranong', '6');
INSERT INTO `tbl_provinces` VALUES ('69', '86', 'ชุมพร', 'Chumphon', '6');
INSERT INTO `tbl_provinces` VALUES ('70', '90', 'สงขลา', 'Songkhla', '6');
INSERT INTO `tbl_provinces` VALUES ('71', '91', 'สตูล', 'Satun', '6');
INSERT INTO `tbl_provinces` VALUES ('72', '92', 'ตรัง', 'Trang', '6');
INSERT INTO `tbl_provinces` VALUES ('73', '93', 'พัทลุง', 'Phatthalung', '6');
INSERT INTO `tbl_provinces` VALUES ('74', '94', 'ปัตตานี', 'Pattani', '6');
INSERT INTO `tbl_provinces` VALUES ('75', '95', 'ยะลา', 'Yala', '6');
INSERT INTO `tbl_provinces` VALUES ('76', '96', 'นราธิวาส', 'Narathiwat', '6');
INSERT INTO `tbl_provinces` VALUES ('77', '97', 'บึงกาฬ', 'buogkan', '3');
