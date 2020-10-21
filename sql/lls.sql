-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- 主机： localhost
-- 生成日期： 2020-10-21 12:41:14
-- 服务器版本： 8.0.20
-- PHP 版本： 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `lls`
--

-- --------------------------------------------------------

--
-- 表的结构 `announcement`
--

CREATE TABLE `announcement` (
  `AID` int NOT NULL,
  `Title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Content` varchar(2550) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Admin` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `isUper` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- 表的结构 `confession`
--

CREATE TABLE `confession` (
  `LID` int NOT NULL,
  `UID` int DEFAULT NULL,
  `Hidden` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Content` varchar(2550) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `SubmitTime` datetime DEFAULT NULL,
  `Likes` int DEFAULT NULL,
  `Picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `isClosed` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- 表的结构 `confession_comment`
--

CREATE TABLE `confession_comment` (
  `LCID` int NOT NULL,
  `LID` int DEFAULT NULL,
  `UID` int DEFAULT NULL,
  `FatherLCID` int DEFAULT NULL,
  `Content` varchar(2550) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `SubmitTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- 表的结构 `found`
--

CREATE TABLE `found` (
  `FID` int NOT NULL,
  `UID` int DEFAULT NULL,
  `Hidden` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Content` varchar(2550) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `SubmitTime` datetime DEFAULT NULL,
  `Likes` int DEFAULT NULL,
  `Picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `isClosed` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- 表的结构 `found_comment`
--

CREATE TABLE `found_comment` (
  `FCID` int NOT NULL,
  `FID` int DEFAULT NULL,
  `UID` int DEFAULT NULL,
  `FatherFCID` int DEFAULT NULL,
  `Content` varchar(2550) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `SubmitTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- 表的结构 `post_report`
--

CREATE TABLE `post_report` (
  `PRID` int NOT NULL,
  `Plate` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `ID` int DEFAULT NULL,
  `Reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Time` datetime DEFAULT NULL,
  `isOver` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Result` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- 表的结构 `secret`
--

CREATE TABLE `secret` (
  `LID` int NOT NULL,
  `UID` int DEFAULT NULL,
  `Hidden` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Content` varchar(2550) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `SubmitTime` datetime DEFAULT NULL,
  `Likes` int DEFAULT NULL,
  `Picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `isClosed` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- 表的结构 `secret_comment`
--

CREATE TABLE `secret_comment` (
  `SCID` int NOT NULL,
  `SID` int DEFAULT NULL,
  `UID` int DEFAULT NULL,
  `FatherSCID` int DEFAULT NULL,
  `Content` varchar(2550) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `SubmitTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- 表的结构 `transaction`
--

CREATE TABLE `transaction` (
  `TID` int NOT NULL,
  `UID` int DEFAULT NULL,
  `Hidden` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Content` varchar(2550) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `SubmitTime` datetime DEFAULT NULL,
  `Likes` int DEFAULT NULL,
  `Picture` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `isClosed` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- 表的结构 `transaction_comment`
--

CREATE TABLE `transaction_comment` (
  `TCID` int NOT NULL,
  `TID` int DEFAULT NULL,
  `UID` int DEFAULT NULL,
  `FatherTCID` int DEFAULT NULL,
  `Content` varchar(2550) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `SubmitTime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- 表的结构 `user`
--

CREATE TABLE `user` (
  `UID` int NOT NULL,
  `UserName` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Password` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `VerifiedCode` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Timeout` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `isVerified` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `TokenID` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Token` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `isHiden` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Theme` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `UserGroup` varchar(10) COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `user`
--

INSERT INTO `user` (`UID`, `UserName`, `Email`, `Password`, `VerifiedCode`, `Timeout`, `isVerified`, `TokenID`, `Token`, `isHiden`, `Theme`, `UserGroup`) VALUES
(13, 'UtopiaXC', 'dys1025@sina.com', '59178ff1a38fa82b3e0825a75208c567', '5465fc650276b852095141f622813b72', '1603007988', '是', '616c5b12387faa1a3cd5ab2c2c1eeb69', '918424e00437703ea9707860d20d93cb', '否', '默认', 'admin');

--
-- 触发器 `user`
--
DELIMITER $$
CREATE TRIGGER `AddUser` AFTER INSERT ON `user` FOR EACH ROW BEGIN

INSERT INTO usermessages (UID,Avatar,Name,Sex)VALUES(new.UID,"DefaultAvatar",new.UserName,"未知");

END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- 表的结构 `usermessages`
--

CREATE TABLE `usermessages` (
  `UID` int NOT NULL,
  `Avatar` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `Name` varchar(10) COLLATE utf8mb4_general_ci NOT NULL,
  `Sex` varchar(5) COLLATE utf8mb4_general_ci NOT NULL,
  `Birthday` date DEFAULT NULL,
  `Motto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Major` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `Location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `URL` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `QQ` int DEFAULT NULL,
  `Wechat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- 转存表中的数据 `usermessages`
--

INSERT INTO `usermessages` (`UID`, `Avatar`, `Name`, `Sex`, `Birthday`, `Motto`, `Major`, `Location`, `URL`, `QQ`, `Wechat`) VALUES
(13, 'DefaultAvatar', 'UtopiaXC', '未知', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(14, 'DefaultAvatar', 'juejue', '未知', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- 表的结构 `user_messages`
--

CREATE TABLE `user_messages` (
  `UID` int NOT NULL,
  `Avatar` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Name` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Sex` varchar(5) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Birthday` date NOT NULL,
  `Motto` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Major` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `Location` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `URL` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `QQ` int NOT NULL,
  `Wechat` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- 表的结构 `user_report`
--

CREATE TABLE `user_report` (
  `URID` int NOT NULL,
  `UID` int DEFAULT NULL,
  `Reason` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Time` datetime DEFAULT NULL,
  `isOver` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Result` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

-- --------------------------------------------------------

--
-- 表的结构 `web_message`
--

CREATE TABLE `web_message` (
  `ID` int NOT NULL,
  `Title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `Content` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci ROW_FORMAT=DYNAMIC;

--
-- 转存表中的数据 `web_message`
--

INSERT INTO `web_message` (`ID`, `Title`, `Content`) VALUES
(1, '网站标题', 'Life&Love&Secret'),
(2, '运营方', '<a target=\'_blank\' href=\'https://oj.dlnu-acm.com\'>大连民族大学ACM工作室</a>'),
(3, '页脚', '&copy;2020 <a href=\'https://www.utopiaxc.cn\'> UtopiaXC </a> All Rights Reserved.'),
(4, '欢迎语句', '欢迎来到Life&Love&Secret'),
(5, '显示首页banner', '是'),
(6, '使用邮箱', '是'),
(7, '发件信箱', 'utopiaxc@utopiaxc.com'),
(8, '发件服务器', 'mail.utopiaxc.com'),
(9, '发件端口', '25'),
(10, '安全协议', '不使用'),
(11, '发件人名', 'UtopiaXC'),
(12, '发件密码', 'Dys299792458'),
(13, '域名', 'http://127.0.0.1:1080/');

--
-- 转储表的索引
--

--
-- 表的索引 `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`AID`) USING BTREE;

--
-- 表的索引 `confession`
--
ALTER TABLE `confession`
  ADD PRIMARY KEY (`LID`) USING BTREE;

--
-- 表的索引 `confession_comment`
--
ALTER TABLE `confession_comment`
  ADD PRIMARY KEY (`LCID`) USING BTREE;

--
-- 表的索引 `found`
--
ALTER TABLE `found`
  ADD PRIMARY KEY (`FID`) USING BTREE;

--
-- 表的索引 `found_comment`
--
ALTER TABLE `found_comment`
  ADD PRIMARY KEY (`FCID`) USING BTREE;

--
-- 表的索引 `post_report`
--
ALTER TABLE `post_report`
  ADD PRIMARY KEY (`PRID`) USING BTREE;

--
-- 表的索引 `secret`
--
ALTER TABLE `secret`
  ADD PRIMARY KEY (`LID`) USING BTREE;

--
-- 表的索引 `secret_comment`
--
ALTER TABLE `secret_comment`
  ADD PRIMARY KEY (`SCID`) USING BTREE;

--
-- 表的索引 `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`TID`) USING BTREE;

--
-- 表的索引 `transaction_comment`
--
ALTER TABLE `transaction_comment`
  ADD PRIMARY KEY (`TCID`) USING BTREE;

--
-- 表的索引 `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UID`) USING BTREE;

--
-- 表的索引 `usermessages`
--
ALTER TABLE `usermessages`
  ADD PRIMARY KEY (`UID`);

--
-- 表的索引 `user_messages`
--
ALTER TABLE `user_messages`
  ADD PRIMARY KEY (`UID`) USING BTREE;

--
-- 表的索引 `user_report`
--
ALTER TABLE `user_report`
  ADD PRIMARY KEY (`URID`) USING BTREE;

--
-- 表的索引 `web_message`
--
ALTER TABLE `web_message`
  ADD PRIMARY KEY (`ID`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `announcement`
--
ALTER TABLE `announcement`
  MODIFY `AID` int NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `confession`
--
ALTER TABLE `confession`
  MODIFY `LID` int NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `confession_comment`
--
ALTER TABLE `confession_comment`
  MODIFY `LCID` int NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `found`
--
ALTER TABLE `found`
  MODIFY `FID` int NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `found_comment`
--
ALTER TABLE `found_comment`
  MODIFY `FCID` int NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `secret`
--
ALTER TABLE `secret`
  MODIFY `LID` int NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `secret_comment`
--
ALTER TABLE `secret_comment`
  MODIFY `SCID` int NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `transaction`
--
ALTER TABLE `transaction`
  MODIFY `TID` int NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `transaction_comment`
--
ALTER TABLE `transaction_comment`
  MODIFY `TCID` int NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `user`
--
ALTER TABLE `user`
  MODIFY `UID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- 使用表AUTO_INCREMENT `usermessages`
--
ALTER TABLE `usermessages`
  MODIFY `UID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- 使用表AUTO_INCREMENT `user_messages`
--
ALTER TABLE `user_messages`
  MODIFY `UID` int NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `user_report`
--
ALTER TABLE `user_report`
  MODIFY `URID` int NOT NULL AUTO_INCREMENT;

--
-- 使用表AUTO_INCREMENT `web_message`
--
ALTER TABLE `web_message`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
