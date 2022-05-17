/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50733
 Source Host           : localhost:3306
 Source Schema         : tshirt

 Target Server Type    : MySQL
 Target Server Version : 50733
 File Encoding         : 65001

 Date: 18/05/2022 01:31:33
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for gallery
-- ----------------------------
DROP TABLE IF EXISTS `gallery`;
CREATE TABLE `gallery`  (
  `gallery_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_foto` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `foto` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `date_post` date NULL DEFAULT NULL,
  `projek_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`gallery_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of gallery
-- ----------------------------
INSERT INTO `gallery` VALUES (1, NULL, '1651709089.jpg', '2022-05-05', 1);
INSERT INTO `gallery` VALUES (2, NULL, '1651864284.jpg', '2022-05-06', 1);
INSERT INTO `gallery` VALUES (3, NULL, '1651938801.jpeg', '2022-05-07', 2);
INSERT INTO `gallery` VALUES (4, NULL, '1651938914.jpeg', '2022-05-07', 2);

-- ----------------------------
-- Table structure for projek
-- ----------------------------
DROP TABLE IF EXISTS `projek`;
CREATE TABLE `projek`  (
  `projek_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `link` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `date_post` date NULL DEFAULT NULL,
  `foto` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`projek_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of projek
-- ----------------------------
INSERT INTO `projek` VALUES (2, 'Web Bengkellas Rafi Utama', 'https://rafiutama.com', '2022-05-03', '1651546694.jpg');

-- ----------------------------
-- Table structure for set_kontak
-- ----------------------------
DROP TABLE IF EXISTS `set_kontak`;
CREATE TABLE `set_kontak`  (
  `kontak_id` int(11) NOT NULL AUTO_INCREMENT,
  `telpon` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `email` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `facebook` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `instagram` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `whatsap` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `github` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  PRIMARY KEY (`kontak_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of set_kontak
-- ----------------------------
INSERT INTO `set_kontak` VALUES (1, '87772211018', 'meinfo@anamsaepul.site', 'https://facebook.com/anam.as.1422409/', 'intagram.com', '87772211018', '');

-- ----------------------------
-- Table structure for set_profil
-- ----------------------------
DROP TABLE IF EXISTS `set_profil`;
CREATE TABLE `set_profil`  (
  `profil_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `kelamin` varchar(10) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `tgl_lahir` date NULL DEFAULT NULL,
  `alamat` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `deskripsi` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `logo` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `foto` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  `kontak_id` int(11) NULL DEFAULT NULL,
  `company_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL DEFAULT NULL,
  `web_url` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NULL,
  PRIMARY KEY (`profil_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of set_profil
-- ----------------------------
INSERT INTO `set_profil` VALUES (1, 'saepul anam', 'Laki-Laki', '1994-10-03', NULL, 'dcc', '1651221939.png', '1651222435.jpg', 1, 'saepul anam', 'https://www.anamsaepul.site');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `pass` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `foto` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `is_active` int(11) NOT NULL,
  `date_created` date NULL DEFAULT NULL,
  PRIMARY KEY (`user_id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = latin1 COLLATE = latin1_swedish_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'saepul anam', 'admin', '$2y$10$tTkqFyup5YE0PcP.VNs1lOl/CclznGAjbGpEnNd4yjj03KCmwDIyq', 'default.jfif', 1, '2022-04-28');
INSERT INTO `user` VALUES (2, 'saepul anam', 'admin', '$2y$10$DFXgfnGsF3bc2NekfhHJZuRvYWzzABWQC4gNYN.DQU7l6jtto3gne', 'default.jpg', 0, '2022-04-28');

SET FOREIGN_KEY_CHECKS = 1;
