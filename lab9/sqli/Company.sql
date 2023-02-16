/*
 Navicat Premium Data Transfer

 Source Server         : 192.168.76.129
 Source Server Type    : MySQL
 Source Server Version : 80028
 Source Host           : 192.168.76.129:3306
 Source Schema         : Company

 Target Server Type    : MySQL
 Target Server Version : 80028
 File Encoding         : 65001

 Date: 24/03/2022 16:44:32
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for Communications
-- ----------------------------
DROP TABLE IF EXISTS `Communications`;
CREATE TABLE `Communications`  (
  `EID` int NOT NULL,
  `Name` varchar(255) CHARACTER SET ascii COLLATE ascii_bin NULL DEFAULT NULL,
  `Department` varchar(255) CHARACTER SET ascii COLLATE ascii_bin NULL DEFAULT NULL,
  `Office` varchar(255) CHARACTER SET ascii COLLATE ascii_bin NULL DEFAULT NULL,
  `Phone` varchar(255) CHARACTER SET ascii COLLATE ascii_bin NULL DEFAULT NULL,
  PRIMARY KEY (`EID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = ascii COLLATE = ascii_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of Communications
-- ----------------------------
INSERT INTO `Communications` VALUES (101, 'Zodiac', 'Business', 'M324', '13588387893');
INSERT INTO `Communications` VALUES (102, 'Leedia', 'Business', 'M324', '15193844657');
INSERT INTO `Communications` VALUES (103, 'Mick', 'Business', 'M324', '19148976038');
INSERT INTO `Communications` VALUES (201, 'Eason', 'Personnel', 'M515', '18724116579');
INSERT INTO `Communications` VALUES (202, 'Limbo', 'Personnel', 'M515', '17188603356');
INSERT INTO `Communications` VALUES (203, 'ReIori', 'Personnel', 'M511', '18218359548');
INSERT INTO `Communications` VALUES (301, 'Carry', 'Accounting', 'M514', '18940932956');
INSERT INTO `Communications` VALUES (302, 'Leepay', 'Accounting', 'M514', '13059632562');

-- ----------------------------
-- Table structure for Password
-- ----------------------------
DROP TABLE IF EXISTS `Password`;
CREATE TABLE `Password`  (
  `EID` int NOT NULL,
  `Name` varchar(255) CHARACTER SET ascii COLLATE ascii_bin NULL DEFAULT NULL,
  `Password` varchar(255) CHARACTER SET ascii COLLATE ascii_bin NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = ascii COLLATE = ascii_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of Password
-- ----------------------------
INSERT INTO `Password` VALUES (0, 'Elden', '4e285bf43985d2b8febca583e22f074e403231b9');
INSERT INTO `Password` VALUES (101, 'Zodiac', '282c0a20f0520a152c89d8c0489426c0668ca495');
INSERT INTO `Password` VALUES (102, 'Leedia', '69bd8a15effab14e5a2d5d440190feca07ed40c6');
INSERT INTO `Password` VALUES (103, 'Mick', 'aff024fe4ab0fece4091de044c58c9ae4233383a');
INSERT INTO `Password` VALUES (201, 'Eason', '032b1296b32496566ea385ce1c1d6fbcac301a0e');
INSERT INTO `Password` VALUES (202, 'Limbo', '2d86c2a659e364e9abba49ea6ffcd53dd5559f05');
INSERT INTO `Password` VALUES (203, 'ReIori', '059263c433e27ee509f537890943dbc8b8574ba4');
INSERT INTO `Password` VALUES (301, 'Carry', '4a2b94f8a97ab5760cddd2707413b9edfddcae58');
INSERT INTO `Password` VALUES (302, 'Leepay', 'ed9d3d832af899035363a69fd53cd3be8f71501c');

-- ----------------------------
-- Table structure for Password_backup
-- ----------------------------
DROP TABLE IF EXISTS `Password_backup`;
CREATE TABLE `Password_backup`  (
  `EID` int NOT NULL,
  `Name` varchar(255) CHARACTER SET ascii COLLATE ascii_bin NULL DEFAULT NULL,
  `Password` varchar(255) CHARACTER SET ascii COLLATE ascii_bin NULL DEFAULT NULL,
  PRIMARY KEY (`EID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = ascii COLLATE = ascii_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of Password_backup
-- ----------------------------
INSERT INTO `Password_backup` VALUES (0, 'Elden', '4e285bf43985d2b8febca583e22f074e403231b9');
INSERT INTO `Password_backup` VALUES (101, 'Zodiac', '282c0a20f0520a152c89d8c0489426c0668ca495');
INSERT INTO `Password_backup` VALUES (102, 'Leedia', '69bd8a15effab14e5a2d5d440190feca07ed40c6');
INSERT INTO `Password_backup` VALUES (103, 'Mick', 'aff024fe4ab0fece4091de044c58c9ae4233383a');
INSERT INTO `Password_backup` VALUES (201, 'Eason', '032b1296b32496566ea385ce1c1d6fbcac301a0e');
INSERT INTO `Password_backup` VALUES (202, 'Limbo', '2d86c2a659e364e9abba49ea6ffcd53dd5559f05');
INSERT INTO `Password_backup` VALUES (203, 'ReIori', '059263c433e27ee509f537890943dbc8b8574ba4');
INSERT INTO `Password_backup` VALUES (301, 'Carry', '4a2b94f8a97ab5760cddd2707413b9edfddcae58');
INSERT INTO `Password_backup` VALUES (302, 'Leepay', 'ed9d3d832af899035363a69fd53cd3be8f71501c');

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin`  (
  `EID` int NOT NULL,
  `Name` varchar(255) CHARACTER SET ascii COLLATE ascii_bin NULL DEFAULT NULL,
  `isAdmin` bit(1) NULL DEFAULT NULL,
  PRIMARY KEY (`EID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = ascii COLLATE = ascii_bin ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES (0, 'Elden', b'1');
INSERT INTO `admin` VALUES (101, 'Zodiac', b'0');
INSERT INTO `admin` VALUES (102, 'Leedia', b'0');
INSERT INTO `admin` VALUES (103, 'Mick', b'0');
INSERT INTO `admin` VALUES (201, 'Eason', b'0');
INSERT INTO `admin` VALUES (202, 'Limbo', b'0');
INSERT INTO `admin` VALUES (203, 'ReIori', b'0');
INSERT INTO `admin` VALUES (301, 'Carry', b'0');
INSERT INTO `admin` VALUES (302, 'Leepay', b'0');

SET FOREIGN_KEY_CHECKS = 1;
