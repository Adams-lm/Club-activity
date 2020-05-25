/*
Navicat MySQL Data Transfer

Source Server         : Ming
Source Server Version : 50562
Source Host           : localhost:3306
Source Database       : club_activity

Target Server Type    : MYSQL
Target Server Version : 50562
File Encoding         : 65001

Date: 2020-05-25 20:21:47
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
  PRIMARY KEY (`act_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of activity
-- ----------------------------
INSERT INTO `activity` VALUES ('1', '爬山活动', '爬山爬山爬山嗯嗯嗯', '2020-06-02 00:00:00', '2020-06-02 00:00:00', '1', '1', null);
INSERT INTO `activity` VALUES ('2', '千岛湖秋游', '秋游秋游秋游嗯嗯嗯', '2020-06-01 00:00:00', '2020-06-02 00:00:00', '1', '1', null);
INSERT INTO `activity` VALUES ('3', '暂时没人参加的活动', '嗯嗯嗯呢', '2020-05-23 15:30:46', '2020-05-29 15:30:51', '1', '1', null);

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
  KEY `user_id` (`user_id`),
  KEY `activity_join_ibfk_2` (`act_id`),
  CONSTRAINT `activity_join_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  CONSTRAINT `activity_join_ibfk_2` FOREIGN KEY (`act_id`) REFERENCES `activity` (`act_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of activity_join
-- ----------------------------
INSERT INTO `activity_join` VALUES ('1', '1', '1', '1', '0');
INSERT INTO `activity_join` VALUES ('2', '2', '2', '1', '0');
INSERT INTO `activity_join` VALUES ('3', '3', '1', '1', '0');
INSERT INTO `activity_join` VALUES ('4', '4', '2', '0', '0');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', '1000', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '管理员1号', '男', null);
INSERT INTO `admin` VALUES ('2', '1001', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '管理员2号', '男', null);

-- ----------------------------
-- Table structure for evaluate
-- ----------------------------
DROP TABLE IF EXISTS `evaluate`;
CREATE TABLE `evaluate` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `act_id` int(3) NOT NULL,
  `user_id` int(3) NOT NULL,
  `contend` text,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `conment_ibfk_1` (`act_id`),
  CONSTRAINT `evaluate_ibfk_1` FOREIGN KEY (`act_id`) REFERENCES `activity` (`act_id`),
  CONSTRAINT `evaluate_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of evaluate
-- ----------------------------
INSERT INTO `evaluate` VALUES ('1', '1', '1', '用户1的评论测试');
INSERT INTO `evaluate` VALUES ('2', '2', '2', '用户2的评论测试');
INSERT INTO `evaluate` VALUES ('4', '1', '1', '用户3的评论测试');
INSERT INTO `evaluate` VALUES ('5', '1', '1', '用户1再来一次评论');

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
  KEY `act_id` (`act_id`),
  CONSTRAINT `service_ibfk_1` FOREIGN KEY (`act_id`) REFERENCES `activity` (`act_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of service
-- ----------------------------
INSERT INTO `service` VALUES ('1', '爬山服务包1', '1', '30.00', '爬山必备装备，食物，饮用水', '0');
INSERT INTO `service` VALUES ('2', '爬山服务包2', '1', '0.00', '提供饮用水', '0');
INSERT INTO `service` VALUES ('3', '千岛湖环岛骑行体验', '2', '0.00', '可体验环岛骑行，观赏千岛湖美景', '0');
INSERT INTO `service` VALUES ('4', '千岛湖上岛体验', '2', '50.00', '可上岛观赏各种美景，感受千岛湖景色', '0');
INSERT INTO `service` VALUES ('5', '服务包测试', '1', '33.80', '不知道说什么', '0');

-- ----------------------------
-- Table structure for service_buy
-- ----------------------------
DROP TABLE IF EXISTS `service_buy`;
CREATE TABLE `service_buy` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `user_id` int(3) NOT NULL,
  `service_id` int(3) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `service_id` (`service_id`),
  CONSTRAINT `service_buy_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  CONSTRAINT `service_buy_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `service` (`service_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of service_buy
-- ----------------------------
INSERT INTO `service_buy` VALUES ('1', '1', '1');

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
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '123', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '买了服务包', '男', '0.00', '1', null);
INSERT INTO `user` VALUES ('2', '124', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '买了vip', '男', '0.00', '1', null);
INSERT INTO `user` VALUES ('3', '125', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '什么都不买', '女', '0.00', '1', null);
INSERT INTO `user` VALUES ('4', '126', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '还没报名成功的人', '女', '0.00', '1', null);

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
INSERT INTO `vip` VALUES ('6', '150.00');
INSERT INTO `vip` VALUES ('12', '288.00');

-- ----------------------------
-- Table structure for vip_buy
-- ----------------------------
DROP TABLE IF EXISTS `vip_buy`;
CREATE TABLE `vip_buy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` tinyint(4) NOT NULL,
  `user_id` int(3) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`),
  KEY `type` (`type`),
  CONSTRAINT `vip_buy_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  CONSTRAINT `vip_buy_ibfk_2` FOREIGN KEY (`type`) REFERENCES `vip` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of vip_buy
-- ----------------------------
INSERT INTO `vip_buy` VALUES ('1', '6', '2', '2020-05-23 15:26:06', '2020-11-23 15:26:16');
