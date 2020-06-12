/*
Navicat MySQL Data Transfer

Source Server         : Ming
Source Server Version : 50562
Source Host           : localhost:3306
Source Database       : zhou2db56

Target Server Type    : MYSQL
Target Server Version : 50562
File Encoding         : 65001

Date: 2020-06-12 22:59:45
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
  `end_time` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `sign_up` tinyint(1) NOT NULL DEFAULT '1',
  `image` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`act_id`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of activity
-- ----------------------------
INSERT INTO `activity` VALUES ('1', '西湖游玩', '杭州这座江南之城冬无严寒夏无酷暑的地方,西湖在一年四季都是有自己特有的景色。所以,一年四季都是可以来这里游玩的,不过曲院风荷是以荷花为核心主题的景区,', '2020-06-09 01:48:00', '2020-06-10 01:49:00', '1', '1', '../../../upload/20200608191107.jpg', '浙江省杭州市西湖区西湖风景区');
INSERT INTO `activity` VALUES ('2', '千岛湖秋游', '千岛湖秋游，内容应有尽有.巨型排球、巨轮滚滚、运转乾坤、激情碰碰球、翻越巨轮、激情横渡、障碍赛道、马到成功、撕名牌、疯狂蜈蚣、不倒森林、摸石过河、同舟共济、两人三足、体验射击打靶、集体动力绳、超级皮皮虾、鹿角套圈圈、屏气传粉、无敌风火轮、巨龙探珠、群龙取水,等你来战。', '2020-06-01 00:00:00', '2020-06-02 00:00:00', '0', '1', '../../../upload/20200608194246.jfif', '杭州千岛湖');
INSERT INTO `activity` VALUES ('3', '秋游', '地中海风格网红打卡点、无动力游乐设施、真人CS等等，美丽的夜晚更不能辜负漫天星光下热闹纷呈的篝火晚会给你不一样的生活体验一起唱歌跳舞庆祝精彩又充实的一天。藏匿在深山中的欧陆风情庄园，新晋网红打卡圣地，等你来！', '2020-06-09 15:30:46', '2020-06-11 15:30:51', '1', '1', '../../../upload/20200608203955.jpg', '绿湾山庄');
INSERT INTO `activity` VALUES ('4', '磐安银杏林一日游', '在磐安的旅游景点多到数不过来，但当所有人来磐安玩过所有的景点后给人留下最深印象的莫过于这个宁静祥和、民风纯朴的银杏村了。磐安银杏村最美的一面就是那3000多棵古银杏树，每年深秋时节，这里便成了金色的海洋，可谓“树树秋声，山山寒色”，尽显云南五彩纷呈的美丽秋景。', '2020-06-06 05:07:00', '2020-06-07 16:07:00', '1', '1', '../../../upload/20200608194425.jpg', '浙江省金华市磐安');
INSERT INTO `activity` VALUES ('5', '体验秋收', '随着天气逐渐转入深秋，水稻、瓜果、秋菜陆续成熟。不少城区市民都愿意过把“农民瘾”，纷纷到乡下体验农事活动。我市不少县市区农场、景点开始挖掘自身优势，摸索体验型农业休闲旅游。一些景点以及农场、农家乐借机纷纷推出以割水稻、挖番薯、摘柑橘等为主题的“秋收体验游”，在旅游淡季中的形成了一波旅游小高潮。', '2020-06-06 22:45:00', '2020-06-07 22:45:00', '1', '1', '../../../upload/20200607231329.jpg', '台州玉环漩门湾农业园');
INSERT INTO `activity` VALUES ('6', '神射手竞技', '竹林砍竹 、自制竹筒饭、户外小火锅 、弓箭制作、竹林神射手竞技、巨型排球、巨轮滚滚、运转乾坤、激情碰碰球、翻越巨轮、激情横渡、障碍赛道、马到成功、撕名牌、疯狂蜈蚣、不倒森林、摸石过河、同舟共济、两人三足、体验射击打靶、集体动力绳、超级皮皮虾、鹿角套圈圈、屏气传粉、无敌风火轮、巨龙探珠、群龙取水', '2020-06-01 00:00:00', '2020-06-02 00:00:00', '0', '1', '../../../upload/20200607231349.jpg', '永嘉.九丈甸园');
INSERT INTO `activity` VALUES ('43', 'B区足球场小活动', '大家一起交谈，狼人杀，UNO各种桌游等你来玩。大小朋友齐上车，毛毛虫极速前进，看看哪个队伍速度更快，输的队伍的小朋友要进行表演哦！', '2020-06-07 22:07:00', '2020-06-30 19:07:00', '1', '1', '../../../upload/20200608193730.jfif', '浙江省杭州市余杭区西环路杭州师范大学(仓前新校区)');
INSERT INTO `activity` VALUES ('44', '攀岩活动', '体验攀岩的快乐吧，还有集体动力绳 、军事体能训练（负重越野）、 毕业墙、信任背摔、障碍赛道、激情碰碰球、雷区探宝 、孤岛求生  、撕名牌呢！', '2020-06-17 19:55:00', '2020-06-20 19:55:00', '1', '1', '../../../upload/20200608195521.jfif', '浙江省杭州市西湖区蒋村街6顽攀攀岩馆');
INSERT INTO `activity` VALUES ('45', '杭师大联谊大会', '正是红薯成熟的季节，与秋收的农民们一起挖红署，长长的红薯子爬满了地面...每一根红薯的根下面，都躲着很多红薯宝宝，等着大家一起把他们找出来，比比看谁找到的红薯又大又多。挖的红署可以带回家哦。乡野里童年，怎能没有烤地瓜，想要烤地瓜，妈妈刨坑生火，宝贝拾柴火，炊烟袅袅升起，一家三口其乐融融的翻烤着芬芳四溢的红薯，品尝着自己亲手烤出的美味，那感觉真是帅的掉渣~~~~', '2020-06-03 19:58:00', '2020-06-05 19:58:00', '1', '1', '../../../upload/20200608195859.jfif', '浙江省杭州市余杭区西环路杭州师范大学(仓前新校区)');

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
  CONSTRAINT `activity_join_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `activity_join_ibfk_2` FOREIGN KEY (`act_id`) REFERENCES `activity` (`act_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of activity_join
-- ----------------------------
INSERT INTO `activity_join` VALUES ('1', '1', '43', '1', '0');
INSERT INTO `activity_join` VALUES ('2', '2', '43', '1', '1');
INSERT INTO `activity_join` VALUES ('3', '3', '43', '0', '0');
INSERT INTO `activity_join` VALUES ('4', '4', '43', '1', '0');
INSERT INTO `activity_join` VALUES ('6', '7', '43', '1', '0');
INSERT INTO `activity_join` VALUES ('7', '8', '1', '1', '0');
INSERT INTO `activity_join` VALUES ('19', '9', '1', '1', '0');
INSERT INTO `activity_join` VALUES ('24', '10', '1', '0', '0');
INSERT INTO `activity_join` VALUES ('25', '11', '2', '1', '1');
INSERT INTO `activity_join` VALUES ('26', '12', '2', '1', '0');
INSERT INTO `activity_join` VALUES ('27', '13', '2', '1', '0');
INSERT INTO `activity_join` VALUES ('28', '14', '2', '0', '0');
INSERT INTO `activity_join` VALUES ('29', '15', '4', '1', '0');
INSERT INTO `activity_join` VALUES ('32', '16', '6', '0', '0');
INSERT INTO `activity_join` VALUES ('33', '17', '44', '0', '0');
INSERT INTO `activity_join` VALUES ('34', '18', '45', '0', '0');
INSERT INTO `activity_join` VALUES ('35', '1', '1', '0', '0');

-- ----------------------------
-- Table structure for admin
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_id` int(3) NOT NULL AUTO_INCREMENT,
  `account` varchar(20) NOT NULL,
  `password` char(40) NOT NULL,
  `admin_name` varchar(20) NOT NULL,
  `gender` char(1) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('1', '1000', '3486bd9968af56ad40d1b312d207019d409d65ab', '管理员1号', '男', null);
INSERT INTO `admin` VALUES ('3', 'admin', '3486bd9968af56ad40d1b312d207019d409d65ab', '管理员', '男', null);

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
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of evaluate
-- ----------------------------
INSERT INTO `evaluate` VALUES ('6', '1', '1', '评论测试', '2020-06-08 19:12:25');
INSERT INTO `evaluate` VALUES ('7', '1', '1', '测试评论', '2020-06-08 19:12:38');
INSERT INTO `evaluate` VALUES ('8', '43', '1', 'B区冲冲冲！', '2020-06-08 20:43:38');
INSERT INTO `evaluate` VALUES ('9', '43', '1', '我爱杭师大', '2020-06-06 20:44:14');
INSERT INTO `evaluate` VALUES ('10', '43', '3', '奥利给！', '2020-06-06 20:44:30');
INSERT INTO `evaluate` VALUES ('13', '43', '11', '评论测试', '2020-06-07 20:45:23');

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
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of service
-- ----------------------------
INSERT INTO `service` VALUES ('3', '千岛湖环岛骑行体验', '2', '0.00', '可体验环岛骑行，观赏千岛湖美景', '1');
INSERT INTO `service` VALUES ('4', '千岛湖上岛体验', '2', '50.00', '可上岛观赏各种美景，感受千岛湖景色', '0');
INSERT INTO `service` VALUES ('10', '绿湾山庄包A', '3', '40.00', '体验传统石磨坊-制作磨豆腐', '0');
INSERT INTO `service` VALUES ('11', '绿湾山庄包B', '3', '60.99', '体验传统石磨坊-制作磨豆腐、无动力游乐设施', '0');
INSERT INTO `service` VALUES ('12', '杏林包：舞龙峡景区', '4', '99.00', '景区游玩', '0');
INSERT INTO `service` VALUES ('13', '全套服务包', '6', '99.88', '竹林砍竹 、自制竹筒饭、户外小火锅 、弓箭制作、竹林神射手竞技 、亲子游戏趴', '0');
INSERT INTO `service` VALUES ('14', '仙居公孟徒步', '5', '20.00', '挖红薯 、烤红薯', '0');
INSERT INTO `service` VALUES ('15', '免费观摩', '5', '0.00', '看看就好', '0');
INSERT INTO `service` VALUES ('16', '免费游玩', '1', '0.00', '观赏', '0');
INSERT INTO `service` VALUES ('17', '提供划船，零食包', '1', '30.00', '花钱可以更快乐', '0');
INSERT INTO `service` VALUES ('19', '不用花钱', '43', '0.00', '随心交谈', '0');
INSERT INTO `service` VALUES ('20', '禁用服务包测试', '5', '55.00', '禁用测试', '1');
INSERT INTO `service` VALUES ('21', '喝点小酒', '43', '10.00', '还是禁了吧', '1');
INSERT INTO `service` VALUES ('22', '攀岩必备装备', '44', '40.00', '低价享受攀岩装备', '0');
INSERT INTO `service` VALUES ('23', '攀岩保险', '44', '30.00', '可享受保险', '0');

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
  CONSTRAINT `service_buy_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `service_buy_ibfk_2` FOREIGN KEY (`service_id`) REFERENCES `service` (`service_id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of service_buy
-- ----------------------------
INSERT INTO `service_buy` VALUES ('7', '2', '19');
INSERT INTO `service_buy` VALUES ('11', '1', '19');
INSERT INTO `service_buy` VALUES ('17', '3', '19');
INSERT INTO `service_buy` VALUES ('18', '4', '19');
INSERT INTO `service_buy` VALUES ('19', '7', '19');
INSERT INTO `service_buy` VALUES ('21', '8', '16');
INSERT INTO `service_buy` VALUES ('22', '9', '17');
INSERT INTO `service_buy` VALUES ('23', '11', '3');
INSERT INTO `service_buy` VALUES ('24', '12', '3');
INSERT INTO `service_buy` VALUES ('25', '13', '4');
INSERT INTO `service_buy` VALUES ('26', '15', '12');
INSERT INTO `service_buy` VALUES ('28', '14', '12');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(3) NOT NULL AUTO_INCREMENT,
  `account` varchar(20) NOT NULL,
  `password` char(40) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `gender` char(1) NOT NULL,
  `balance` decimal(10,2) NOT NULL DEFAULT '0.00',
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '123', '5ea345ab330cf29f81d8de9bf5466f508fe351e1', 'web真难', '男', '0.00', '1', '../../../upload/20200606131328.jpg');
INSERT INTO `user` VALUES ('2', '124', '5ea345ab330cf29f81d8de9bf5466f508fe351e1', '小绿', '男', '0.00', '1', '../../../upload/20200605130736.jpg');
INSERT INTO `user` VALUES ('3', '125', '5ea345ab330cf29f81d8de9bf5466f508fe351e1', '小蓝', '女', '0.00', '1', '../../../upload/20200605130736.jpg');
INSERT INTO `user` VALUES ('4', '126', '5ea345ab330cf29f81d8de9bf5466f508fe351e1', '小红', '男', '0.00', '1', '../../../upload/20200606192243.jpg');
INSERT INTO `user` VALUES ('7', '127', '5ea345ab330cf29f81d8de9bf5466f508fe351e1', '花花', '男', '0.00', '0', '../../../upload/20200605130736.jpg');
INSERT INTO `user` VALUES ('8', 'abc1', '5ea345ab330cf29f81d8de9bf5466f508fe351e1', '草草', '女', '0.00', '-1', '../../../upload/20200606192243.jpg');
INSERT INTO `user` VALUES ('9', '231', '5ea345ab330cf29f81d8de9bf5466f508fe351e1', '张三', '男', '0.00', '0', '../../../upload/20200601112110.jfif');
INSERT INTO `user` VALUES ('10', 'qwe1', '5ea345ab330cf29f81d8de9bf5466f508fe351e1', '李四', '女', '0.00', '1', '../../../upload/default.jfif');
INSERT INTO `user` VALUES ('11', 'xiaoming', '5ea345ab330cf29f81d8de9bf5466f508fe351e1', '王五', '男', '0.00', '0', '../../../upload/20200601112110.jfif');
INSERT INTO `user` VALUES ('12', 'lili222', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '刘亦菲', '女', '0.00', '1', '../../../upload/20200605130736.jpg');
INSERT INTO `user` VALUES ('13', '123anan', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', '彭于晏', '女', '0.00', '0', '../../../upload/20200606192243.jpg');
INSERT INTO `user` VALUES ('14', '871', '5ea345ab330cf29f81d8de9bf5466f508fe351e1', '吴彦祖', '女', '0.00', '1', '../../../upload/20200606131328.jpg');
INSERT INTO `user` VALUES ('15', 'qwe123', '5ea345ab330cf29f81d8de9bf5466f508fe351e1', '用户', '男', '0.00', '1', '../../../images/QQ.png');
INSERT INTO `user` VALUES ('16', 'ceshi', '5ea345ab330cf29f81d8de9bf5466f508fe351e1', '测试', '男', '0.00', '1', '../../../upload/20200606131328.jpg');
INSERT INTO `user` VALUES ('17', 'ceshi2', '7c4a8d09ca3762af61e59520943dc26494f8941b', '测试2号', '女', '0.00', '0', '../../../upload/20200606131328.jpg');
INSERT INTO `user` VALUES ('18', 'cechi3', '7c4a8d09ca3762af61e59520943dc26494f8941b', '测试3号', '女', '0.00', '0', '../../../upload/20200606131328.jpg');

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
INSERT INTO `vip_buy` VALUES ('1', '2020-05-26 13:48:49', '2020-06-28 13:48:49');
INSERT INTO `vip_buy` VALUES ('15', '2020-06-07 19:50:35', '2020-06-26 19:50:40');
INSERT INTO `vip_buy` VALUES ('16', '2020-06-03 20:32:31', '2020-06-27 20:32:34');
