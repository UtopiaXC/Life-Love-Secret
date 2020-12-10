/*
 Navicat Premium Data Transfer

 Source Server         : MySQL
 Source Server Type    : MySQL
 Source Server Version : 80016
 Source Host           : localhost:3306
 Source Schema         : lls

 Target Server Type    : MySQL
 Target Server Version : 80016
 File Encoding         : 65001

 Date: 10/12/2020 12:29:58
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for announcement
-- ----------------------------
DROP TABLE IF EXISTS `announcement`;
CREATE TABLE `announcement`  (
  `AID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `Content` varchar(2550) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `Time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `Admin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `isUper` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`AID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of announcement
-- ----------------------------

-- ----------------------------
-- Table structure for confession
-- ----------------------------
DROP TABLE IF EXISTS `confession`;
CREATE TABLE `confession`  (
  `LID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) NULL DEFAULT NULL,
  `Hidden` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `Title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `Content` varchar(2550) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `SubmitTime` datetime(0) NULL DEFAULT NULL,
  `Likes` int(11) NULL DEFAULT NULL,
  `Picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `isClosed` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `ContactType` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `Contact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`LID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of confession
-- ----------------------------
INSERT INTO `confession` VALUES (18, 13, '是', '表白墙测试', '这是一个表白墙测试内容', '2020-11-21 15:02:22', 0, 'images/uploaded/451182dd6ca45600ec7a76458f2c0150.jpg', '否', 'QQ', '123456789');

-- ----------------------------
-- Table structure for confession_comment
-- ----------------------------
DROP TABLE IF EXISTS `confession_comment`;
CREATE TABLE `confession_comment`  (
  `LCID` int(11) NOT NULL AUTO_INCREMENT,
  `LID` int(11) NULL DEFAULT NULL,
  `UID` int(11) NULL DEFAULT NULL,
  `FatherLCID` int(11) NULL DEFAULT NULL,
  `Content` varchar(2550) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `SubmitTime` datetime(0) NULL DEFAULT NULL,
  `Likes` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`LCID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of confession_comment
-- ----------------------------
INSERT INTO `confession_comment` VALUES (1, 1, 13, NULL, '测试评论', '2020-10-23 11:21:31', 0);

-- ----------------------------
-- Table structure for found
-- ----------------------------
DROP TABLE IF EXISTS `found`;
CREATE TABLE `found`  (
  `FID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) NULL DEFAULT NULL,
  `Hidden` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `Title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `Content` varchar(2550) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `SubmitTime` datetime(0) NULL DEFAULT NULL,
  `Likes` int(11) NULL DEFAULT NULL,
  `Picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `isClosed` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `ContactType` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `Contact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`FID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of found
-- ----------------------------

-- ----------------------------
-- Table structure for found_comment
-- ----------------------------
DROP TABLE IF EXISTS `found_comment`;
CREATE TABLE `found_comment`  (
  `FCID` int(11) NOT NULL AUTO_INCREMENT,
  `FID` int(11) NULL DEFAULT NULL,
  `UID` int(11) NULL DEFAULT NULL,
  `FatherFCID` int(11) NULL DEFAULT NULL,
  `Content` varchar(2550) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `SubmitTime` datetime(0) NULL DEFAULT NULL,
  `Likes` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`FCID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of found_comment
-- ----------------------------

-- ----------------------------
-- Table structure for post_report
-- ----------------------------
DROP TABLE IF EXISTS `post_report`;
CREATE TABLE `post_report`  (
  `PRID` int(11) NOT NULL,
  `Plate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `ID` int(11) NULL DEFAULT NULL,
  `Reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `Time` datetime(0) NULL DEFAULT NULL,
  `isOver` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `Result` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`PRID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of post_report
-- ----------------------------

-- ----------------------------
-- Table structure for secret
-- ----------------------------
DROP TABLE IF EXISTS `secret`;
CREATE TABLE `secret`  (
  `SID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) NULL DEFAULT NULL,
  `Hidden` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `Title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `Content` varchar(2550) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `SubmitTime` datetime(0) NULL DEFAULT NULL,
  `Likes` int(11) NULL DEFAULT NULL,
  `Picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `isClosed` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `ContactType` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `Contact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`SID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of secret
-- ----------------------------

-- ----------------------------
-- Table structure for secret_comment
-- ----------------------------
DROP TABLE IF EXISTS `secret_comment`;
CREATE TABLE `secret_comment`  (
  `SCID` int(11) NOT NULL AUTO_INCREMENT,
  `SID` int(11) NULL DEFAULT NULL,
  `UID` int(11) NULL DEFAULT NULL,
  `FatherSCID` int(11) NULL DEFAULT NULL,
  `Content` varchar(2550) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `SubmitTime` datetime(0) NULL DEFAULT NULL,
  `Likes` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`SCID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of secret_comment
-- ----------------------------

-- ----------------------------
-- Table structure for transaction
-- ----------------------------
DROP TABLE IF EXISTS `transaction`;
CREATE TABLE `transaction`  (
  `TID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) NULL DEFAULT NULL,
  `Hidden` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `Title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `Content` varchar(2550) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `SubmitTime` datetime(0) NULL DEFAULT NULL,
  `Likes` int(11) NULL DEFAULT NULL,
  `Picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `isClosed` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `ContactType` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `Contact` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`TID`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 1 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of transaction
-- ----------------------------

-- ----------------------------
-- Table structure for transaction_comment
-- ----------------------------
DROP TABLE IF EXISTS `transaction_comment`;
CREATE TABLE `transaction_comment`  (
  `TCID` int(11) NOT NULL AUTO_INCREMENT,
  `TID` int(11) NULL DEFAULT NULL,
  `UID` int(11) NULL DEFAULT NULL,
  `FatherTCID` int(11) NULL DEFAULT NULL,
  `Content` varchar(2550) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `SubmitTime` datetime(0) NULL DEFAULT NULL,
  `Likes` int(10) NULL DEFAULT NULL,
  PRIMARY KEY (`TCID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of transaction_comment
-- ----------------------------

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `VerifiedCode` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Timeout` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `isVerified` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `TokenID` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Token` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `isHidden` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Theme` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `UserGroup` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `isBanned` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`UID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (13, 'UtopiaXC', 'dys1025@sina.com', '59178ff1a38fa82b3e0825a75208c567', '5465fc650276b852095141f622813b72', '1603007988', '是', '017eef208d5d16ec1d72a0b0864ee97c', '85c00d31dc97652fc6c295f8a20c1c90', '是', '默认', 'admin', NULL);

-- ----------------------------
-- Table structure for user_messages
-- ----------------------------
DROP TABLE IF EXISTS `user_messages`;
CREATE TABLE `user_messages`  (
  `UID` int(11) NOT NULL AUTO_INCREMENT,
  `Avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Name` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Sex` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Birthday` date NULL DEFAULT NULL,
  `Motto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Major` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `Location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `URL` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `QQ` int(11) NULL DEFAULT NULL,
  `Wechat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`UID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user_messages
-- ----------------------------
INSERT INTO `user_messages` VALUES (13, 'sources/avatar/user-img.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for user_report
-- ----------------------------
DROP TABLE IF EXISTS `user_report`;
CREATE TABLE `user_report`  (
  `URID` int(11) NOT NULL AUTO_INCREMENT,
  `UID` int(11) NULL DEFAULT NULL,
  `Reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `Time` datetime(0) NULL DEFAULT NULL,
  `isOver` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `Result` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`URID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of user_report
-- ----------------------------

-- ----------------------------
-- Table structure for web_message
-- ----------------------------
DROP TABLE IF EXISTS `web_message`;
CREATE TABLE `web_message`  (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `Title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  `Content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NULL DEFAULT NULL,
  PRIMARY KEY (`ID`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_0900_ai_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of web_message
-- ----------------------------
INSERT INTO `web_message` VALUES (1, '网站标题', 'Life&Love&Secret');
INSERT INTO `web_message` VALUES (2, '运营方', '<a target=\'_blank\' href=\'https://oj.dlnu-acm.com\'>大连民族大学ACM工作室</a>');
INSERT INTO `web_message` VALUES (3, '页脚', '&copy;2020 <a href=\'https://www.utopiaxc.cn\'> UtopiaXC </a> All Rights Reserved.');
INSERT INTO `web_message` VALUES (4, '欢迎语句', '欢迎来到Life&Love&Secret');
INSERT INTO `web_message` VALUES (5, '显示首页banner', '是');
INSERT INTO `web_message` VALUES (6, '使用邮箱', '是');
INSERT INTO `web_message` VALUES (7, '发件信箱', 'utopiaxc@utopiaxc.com');
INSERT INTO `web_message` VALUES (8, '发件服务器', 'mail.utopiaxc.com');
INSERT INTO `web_message` VALUES (9, '发件端口', '25');
INSERT INTO `web_message` VALUES (10, '安全协议', '不使用');
INSERT INTO `web_message` VALUES (11, '发件人名', 'UtopiaXC');
INSERT INTO `web_message` VALUES (12, '发件密码', '');
INSERT INTO `web_message` VALUES (13, '域名', 'http://127.0.0.1:1080/');

-- ----------------------------
-- Triggers structure for table confession
-- ----------------------------
DROP TRIGGER IF EXISTS `BeforeConfessionInsert`;
delimiter ;;
CREATE TRIGGER `BeforeConfessionInsert` BEFORE INSERT ON `confession` FOR EACH ROW BEGIN
SET new.SubmitTime=NOW(),new.isClosed="否",new.Likes=0;
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table found
-- ----------------------------
DROP TRIGGER IF EXISTS `BeforeFoundInsert`;
delimiter ;;
CREATE TRIGGER `BeforeFoundInsert` BEFORE INSERT ON `found` FOR EACH ROW BEGIN
SET new.SubmitTime=NOW(),new.isClosed="否",new.Likes=0;
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table secret
-- ----------------------------
DROP TRIGGER IF EXISTS `BeforeSecretInsert`;
delimiter ;;
CREATE TRIGGER `BeforeSecretInsert` BEFORE INSERT ON `secret` FOR EACH ROW BEGIN
SET new.SubmitTime=NOW(),new.isClosed="否",new.Likes=0;
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table transaction
-- ----------------------------
DROP TRIGGER IF EXISTS `BeforeTransactionInsert`;
delimiter ;;
CREATE TRIGGER `BeforeTransactionInsert` BEFORE INSERT ON `transaction` FOR EACH ROW BEGIN
SET new.SubmitTime=NOW(),new.isClosed="否",new.Likes=0;
END
;;
delimiter ;

-- ----------------------------
-- Triggers structure for table user
-- ----------------------------
DROP TRIGGER IF EXISTS `AddUser`;
delimiter ;;
CREATE TRIGGER `AddUser` AFTER INSERT ON `user` FOR EACH ROW BEGIN

INSERT INTO user_messages (UID,Avatar,Name,Sex)VALUES(new.UID,"/sources/avatar/user-img.jpg",new.UserName,"未知");

END
;;
delimiter ;

SET FOREIGN_KEY_CHECKS = 1;
