/*
Navicat MySQL Data Transfer

Source Server         : Ming
Source Server Version : 50562
Source Host           : localhost:3306
Source Database       : club_activity

Target Server Type    : MYSQL
Target Server Version : 50562
File Encoding         : 65001

Date: 2020-06-06 11:28:01
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for activity
-- ----------------------------
DROP TABLE IF EXISTS `activity`;
CREATE TABLE `activity` (
  `act_id` int(3) NOT NULL AUTO_INCREMENT,
  `act_name` varchar(30) NOT NULL,
  `content` text,
  `start_time` datetime NOT NULL,
  `end_time` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `sign_up` tinyint(1) DEFAULT '1',
  `image` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`act_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of activity
-- ----------------------------
INSERT INTO `activity` VALUES ('1', '爬山活动', '213123123131231', '2020-05-07 00:00:00', '2020-06-02 00:00:00', '0', '1', '../../../upload/20200601111537.jfif', null);
INSERT INTO `activity` VALUES ('2', '千岛湖秋游', '秋游秋游秋游嗯嗯嗯5', '2020-06-01 00:00:00', '2020-06-02 00:00:00', '1', '1', '../../../upload/20200601111537.jfif', null);
INSERT INTO `activity` VALUES ('3', '暂时没人参加的活动', '嗯嗯嗯呢1', '2020-05-23 15:30:46', '2020-06-19 15:30:51', '1', '1', '../../../upload/20200604215946.jpg', null);
INSERT INTO `activity` VALUES ('4', '123', '123', '2020-06-01 00:00:00', '2020-06-02 13:39:00', '1', '1', '../../../upload/20200601111537.jfif', null);
INSERT INTO `activity` VALUES ('18', '测试吧吧', '讨厌web的第二天', '2020-06-26 14:41:00', '2020-06-30 14:41:00', '1', '1', '../../../upload/20200604215930.jpg', null);
INSERT INTO `activity` VALUES ('19', '测试9911', '1231231', '1231-05-25 05:05:00', '0123-12-12 03:12:00', '1', '1', '../../../upload/20200601112110.jfif', null);
INSERT INTO `activity` VALUES ('24', '最后一次', '3123123212', '2020-05-31 16:09:00', '2020-05-31 19:06:00', '1', '1', '../../../upload/default.jfif', null);
INSERT INTO `activity` VALUES ('25', '0601测试33', '', '2020-06-01 17:03:00', '2020-06-04 17:03:00', '1', '1', '../../../upload/20200601091823.jpg', null);
INSERT INTO `activity` VALUES ('26', '6月5日测试', '随便写吧', '2020-06-05 05:07:00', '2020-06-09 16:07:00', '1', '1', '../../../upload/20200605130736.jpg', null);
INSERT INTO `activity` VALUES ('31', '123123', '12321', '2020-06-05 23:48:00', '2020-06-05 20:52:00', '1', '1', '../../../upload/20200605204805.jpg', null);
INSERT INTO `activity` VALUES ('32', '6月6测试', '1231', '2020-06-06 11:21:00', '2020-06-06 11:25:00', '1', '1', '../../../upload/20200606112249.jpg', null);

-- ----------------------------
-- Table structure for activity_join
-- ----------------------------
DROP TABLE IF EXISTS `activity_join`;
CREATE TABLE `activity_join` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `user_id` int(3) NOT NULL,
  `act_id` int(3) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `is_sign` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `activity_join_ibfk_1` (`user_id`),
  KEY `activity_join_ibfk_2` (`act_id`),
  CONSTRAINT `activity_join_ibfk_2` FOREIGN KEY (`act_id`) REFERENCES `activity` (`act_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `activity_join_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of activity_join
-- ----------------------------
INSERT INTO `activity_join` VALUES ('1', '1', '1', '1', '0');
INSERT INTO `activity_join` VALUES ('2', '2', '2', '1', '1');
INSERT INTO `activity_join` VALUES ('3', '3', '1', '1', '0');
INSERT INTO `activity_join` VALUES ('4', '4', '2', '0', '0');
INSERT INTO `activity_join` VALUES ('5', '1', '4', '1', '0');
INSERT INTO `activity_join` VALUES ('6', '2', '3', '0', '0');
INSERT INTO `activity_join` VALUES ('9', '3', '4', '1', '0');
INSERT INTO `activity_join` VALUES ('10', '1', '18', '1', '0');
INSERT INTO `activity_join` VALUES ('11', '2', '18', '0', '0');
INSERT INTO `activity_join` VALUES ('13', '4', '24', '1', '0');
INSERT INTO `activity_join` VALUES ('14', '1', '24', '1', '0');
INSERT INTO `activity_join` VALUES ('15', '3', '25', '1', '0');
INSERT INTO `activity_join` VALUES ('17', '3', '2', '1', '0');
INSERT INTO `activity_join` VALUES ('18', '3', '32', '1', '0');

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_id` int(3) NOT NULL AUTO_INCREMENT,
  `account` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `admin_name` varchar(20) NOT NULL,
  `gender` char(1) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', '1000', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '管理员1号', '男', null);
INSERT INTO `admin` VALUES ('2', '1001', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '管理员2号', '男', null);
INSERT INTO `admin` VALUES ('3', '12312', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '22.3', '男', null);

-- ----------------------------
-- Table structure for evaluate
-- ----------------------------
DROP TABLE IF EXISTS `evaluate`;
CREATE TABLE `evaluate` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `act_id` int(3) NOT NULL,
  `user_id` int(3) NOT NULL,
  `content` text,
  `time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `evaluate_ibfk_1` (`act_id`),
  KEY `evaluate_ibfk_2` (`user_id`),
  CONSTRAINT `evaluate_ibfk_1` FOREIGN KEY (`act_id`) REFERENCES `activity` (`act_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `evaluate_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of evaluate
-- ----------------------------
INSERT INTO `evaluate` VALUES ('1', '1', '1', '用户1的评论测试', null);
INSERT INTO `evaluate` VALUES ('2', '2', '2', '用户2的评论测试', null);
INSERT INTO `evaluate` VALUES ('4', '1', '1', '用户3的评论测试', null);
INSERT INTO `evaluate` VALUES ('5', '1', '1', '用户1再来一次评论', null);

-- ----------------------------
-- Table structure for service
-- ----------------------------
DROP TABLE IF EXISTS `service`;
CREATE TABLE `service` (
  `service_id` int(3) NOT NULL AUTO_INCREMENT,
  `service_name` varchar(20) NOT NULL,
  `act_id` int(3) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `content` varchar(255) NOT NULL,
  `is_ban` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`service_id`),
  KEY `service_ibfk_1` (`act_id`),
  CONSTRAINT `service_ibfk_1` FOREIGN KEY (`act_id`) REFERENCES `activity` (`act_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of service
-- ----------------------------
INSERT INTO `service` VALUES ('1', '爬山服务包1', '1', '30.00', '爬山必备装备，食物，饮用水', '0');
INSERT INTO `service` VALUES ('2', '爬山服务包2', '1', '0.00', '提供饮用水', '1');
INSERT INTO `service` VALUES ('3', '千岛湖环岛骑行体验', '2', '0.00', '可体验环岛骑行，观赏千岛湖美景', '1');
INSERT INTO `service` VALUES ('4', '千岛湖上岛体验', '2', '50.00', '可上岛观赏各种美景，感受千岛湖景色', '0');
INSERT INTO `service` VALUES ('5', '11', '24', '22.00', '223', '0');
INSERT INTO `service` VALUES ('6', '1231', '26', '123.00', '1231', '1');

-- ----------------------------
-- Table structure for service_buy
-- ----------------------------
DROP TABLE IF EXISTS `service_buy`;
CREATE TABLE `service_buy` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `user_id` int(3) NOT NULL,
  `service_id` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `service_buy_ibfk_1` (`user_id`),
  KEY `service_buy_ibfk_2` (`service_id`),
  CONSTRAINT `service_buy_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `service` (`service_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `service_buy_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of service_buy
-- ----------------------------
INSERT INTO `service_buy` VALUES ('1', '1', '1');
INSERT INTO `service_buy` VALUES ('7', '2', '3');
INSERT INTO `service_buy` VALUES ('14', '4', '1');
INSERT INTO `service_buy` VALUES ('15', '1', '2');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(3) NOT NULL AUTO_INCREMENT,
  `account` varchar(20) NOT NULL,
  `password` char(64) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `gender` char(1) NOT NULL,
  `balance` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '买了服务包', '男', '2298.00', '1', '../../../upload/default.jfif');
INSERT INTO `user` VALUES ('2', '124', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '买了vip', '男', '735.00', '1', '../../../upload/default.jfif');
INSERT INTO `user` VALUES ('3', '125', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '没买服务包', '女', '0.00', '1', '../../../upload/default.jfif');
INSERT INTO `user` VALUES ('4', '126', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '还没报名成功的人', '男', '11986.00', '1', '../../../upload/default.jfif');
INSERT INTO `user` VALUES ('7', 'ceshi3', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '22.3', '男', '0.00', '0', '../../../upload/default.jfif');
INSERT INTO `user` VALUES ('8', '1且卫栖梧', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '123', '女', '0.00', '-1', '../../../upload/default.jfif');
INSERT INTO `user` VALUES ('9', '231', '123', '123', '我', '0.00', '0', '../../../upload/default.jfif');

-- ----------------------------
-- Table structure for vip
-- ----------------------------
DROP TABLE IF EXISTS `vip`;
CREATE TABLE `vip` (
  `type` tinyint(4) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  PRIMARY KEY (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of vip
-- ----------------------------
INSERT INTO `vip` VALUES ('1', '30.00');
INSERT INTO `vip` VALUES ('3', '88.00');
INSERT INTO `vip` VALUES ('12', '288.00');

-- ----------------------------
-- Table structure for vip_buy
-- ----------------------------
DROP TABLE IF EXISTS `vip_buy`;
CREATE TABLE `vip_buy` (
  `user_id` int(3) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime DEFAULT NULL,
  PRIMARY KEY (`user_id`),
  CONSTRAINT `vip_buy_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of vip_buy
-- ----------------------------
INSERT INTO `vip_buy` VALUES ('1', '2020-05-26 14:11:01', '2021-08-26 14:11:01');
INSERT INTO `vip_buy` VALUES ('2', '2020-05-26 13:48:49', '2020-06-11 13:48:49');
