/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50725
Source Host           : localhost:3306
Source Database       : gamefc

Target Server Type    : MYSQL
Target Server Version : 50725
File Encoding         : 65001

Date: 2019-03-23 17:53:35
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for bankinfo
-- ----------------------------
DROP TABLE IF EXISTS `bankinfo`;
CREATE TABLE `bankinfo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proxy_id` varchar(100) DEFAULT NULL,
  `alipay` varchar(300) DEFAULT NULL,
  `alipay_name` varchar(100) DEFAULT NULL,
  `cardaccount` varchar(100) DEFAULT NULL COMMENT '卡号 ',
  `bank` varchar(100) DEFAULT NULL COMMENT '开户行',
  `name` varchar(300) DEFAULT NULL COMMENT '姓名',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of bankinfo
-- ----------------------------
INSERT INTO `bankinfo` VALUES ('1', 'FC0000004', '12345678902', '小刘', null, null, null);

-- ----------------------------
-- Table structure for checklog
-- ----------------------------
DROP TABLE IF EXISTS `checklog`;
CREATE TABLE `checklog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderid` varchar(30) DEFAULT NULL,
  `proxy_id` varchar(255) DEFAULT NULL,
  `amount` decimal(18,2) DEFAULT '0.00' COMMENT '结算金额',
  `actual_amount` decimal(18,2) DEFAULT NULL,
  `tax_amount` decimal(18,2) DEFAULT NULL,
  `balance` decimal(18,2) DEFAULT '0.00' COMMENT '结算余额',
  `checktype` int(11) DEFAULT NULL,
  `alipay` varchar(300) DEFAULT NULL,
  `alipay_name` varchar(100) DEFAULT NULL,
  `bank` varchar(100) DEFAULT NULL,
  `name` varchar(30) DEFAULT NULL,
  `cardaccount` varchar(50) DEFAULT NULL,
  `descript` varchar(1000) DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `createtime` int(11) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `checktime` datetime DEFAULT NULL,
  `checkuser` varchar(100) DEFAULT NULL,
  `info` varchar(1000) DEFAULT NULL,
  `tax` decimal(18,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `proxy_id` (`proxy_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of checklog
-- ----------------------------
INSERT INTO `checklog` VALUES ('1', '20190323185541', 'FC0000004', '1111.00', '1099.89', '11.11', '15100.48', '1', '12345678902', '小刘', null, null, null, 'FC0000004于2019-03-23 10:40:10提现金额1111元', '3', '1553308810', '2019-03-23 10:40:10', '2019-03-23 15:32:11', 'admin', '已完成', '0.01');
INSERT INTO `checklog` VALUES ('2', '20190323190999', 'FC0000004', '111.00', '109.89', '1.11', '14989.48', '1', '12345678902', '小刘', null, null, null, 'FC0000004于2019-03-23 10:40:50提现金额111元', '2', '1553308850', '2019-03-23 10:40:50', '2019-03-23 15:31:29', 'admin', '已驳回', '0.01');
INSERT INTO `checklog` VALUES ('3', '20190323321916', 'FC0000004', '333.00', '329.67', '3.33', '14656.48', '1', '12345678902', '小刘', null, null, null, 'FC0000004于2019-03-23 10:40:54提现金额333元', '2', '1553308854', '2019-03-23 10:40:54', '2019-03-23 15:31:29', 'admin', '已驳回', '0.01');
INSERT INTO `checklog` VALUES ('4', '20190323287979', 'FC0000004', '555.00', '549.45', '5.55', '14101.48', '1', '12345678902', '小刘', null, null, null, 'FC0000004于2019-03-23 10:40:58提现金额555元', '3', '1553308858', '2019-03-23 10:40:58', '2019-03-23 15:32:07', 'admin', '已完成', '0.01');
INSERT INTO `checklog` VALUES ('5', '20190323602307', 'FC0000004', '2222.00', '2199.78', '22.22', '11879.48', '1', '12345678902', '小刘', null, null, null, 'FC0000004于2019-03-23 10:41:02提现金额2222元', '3', '1553308862', '2019-03-23 10:41:02', '2019-03-23 15:32:07', 'admin', '已完成', '0.01');
INSERT INTO `checklog` VALUES ('6', '20190323331428', 'FC0000004', '1000.00', '990.00', '10.00', '10879.48', '1', '12345678902', '小刘', null, null, null, 'FC0000004于2019-03-23 10:41:06提现金额1000元', '3', '1553308866', '2019-03-23 10:41:06', '2019-03-23 15:32:07', 'admin', '已完成', '0.01');
INSERT INTO `checklog` VALUES ('7', '20190323422287', 'FC0000004', '100.00', '99.00', '1.00', '10779.48', '1', '12345678902', '小刘', null, null, null, 'FC0000004于2019-03-23 10:41:16提现金额100元', '3', '1553308876', '2019-03-23 10:41:16', '2019-03-23 15:32:07', 'admin', '已完成', '0.01');
INSERT INTO `checklog` VALUES ('8', '20190323384201', 'FC0000004', '666.00', '659.34', '6.66', '10113.48', '1', '12345678902', '小刘', null, null, null, 'FC0000004于2019-03-23 10:41:21提现金额666元', '3', '1553308881', '2019-03-23 10:41:21', '2019-03-23 15:31:42', 'admin', '已完成', '0.01');

-- ----------------------------
-- Table structure for dictionary
-- ----------------------------
DROP TABLE IF EXISTS `dictionary`;
CREATE TABLE `dictionary` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `key` varchar(30) DEFAULT NULL,
  `value` varchar(500) DEFAULT NULL,
  `descript` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of dictionary
-- ----------------------------

-- ----------------------------
-- Table structure for incomelog
-- ----------------------------
DROP TABLE IF EXISTS `incomelog`;
CREATE TABLE `incomelog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_id` varchar(50) DEFAULT NULL COMMENT '玩家直接代理',
  `proxy_id` varchar(50) DEFAULT NULL,
  `typeid` int(11) DEFAULT '0',
  `totaltax` varchar(50) DEFAULT NULL,
  `changmoney` varchar(100) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  `createtime` int(11) DEFAULT NULL,
  `createday` int(11) DEFAULT NULL COMMENT '新建日期',
  `descript` varchar(1000) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of incomelog
-- ----------------------------
INSERT INTO `incomelog` VALUES ('1', null, 'FC0000004', '0', '57.15', '40.005', '20190318', '1552987834', '20190319', 'FC0000004代理的玩家的税收分成，总金额40.005');
INSERT INTO `incomelog` VALUES ('2', null, 'FC0000004', '0', '57.15', '5.715', '20190318', '1552987834', '20190319', 'FC0000004给1级代理税收分成，总金额5.715');
INSERT INTO `incomelog` VALUES ('3', null, 'FC0000004', '0', '57.15', '5.715', '20190318', '1552987834', '20190319', 'FC0000004给2级代理税收分成，总金额5.715');
INSERT INTO `incomelog` VALUES ('4', null, 'FC0000004', '0', '57.15', '40.005', '20190318', '1552988936', '20190319', 'FC0000004代理的玩家的税收分成，总金额40.005');
INSERT INTO `incomelog` VALUES ('5', null, 'FC0000003', '0', '57.15', '5.715', '20190318', '1552988936', '20190319', 'FC0000004给1级代理税收分成，总金额5.715');
INSERT INTO `incomelog` VALUES ('6', null, 'FC0000002', '0', '57.15', '5.715', '20190318', '1552988936', '20190319', 'FC0000004给2级代理税收分成，总金额5.715');
INSERT INTO `incomelog` VALUES ('7', null, 'FC0000004', '0', '57.15', '40.005', '20190318', '1552989069', '20190319', 'FC0000004代理的玩家的税收分成，总金额40.005');
INSERT INTO `incomelog` VALUES ('8', null, 'FC0000003', '0', '57.15', '5.715', '20190318', '1552989069', '20190319', 'FC0000004给1级代理税收分成，总金额5.715');
INSERT INTO `incomelog` VALUES ('9', null, 'FC0000002', '0', '57.15', '5.715', '20190318', '1552989069', '20190319', 'FC0000004给2级代理税收分成，总金额5.715');
INSERT INTO `incomelog` VALUES ('10', 'FC0000004', 'FC0000004', '0', '57.15', '40.005', '20190318', '1552989159', '20190319', 'FC0000004代理的玩家的税收分成，总金额40.005');
INSERT INTO `incomelog` VALUES ('11', 'FC0000004', 'FC0000003', '0', '57.15', '5.715', '20190318', '1552989159', '20190319', 'FC0000004给1级代理税收分成，总金额5.715');
INSERT INTO `incomelog` VALUES ('12', 'FC0000004', 'FC0000002', '0', '57.15', '5.715', '20190318', '1552989159', '20190319', 'FC0000004给2级代理税收分成，总金额5.715');

-- ----------------------------
-- Table structure for paytime
-- ----------------------------
DROP TABLE IF EXISTS `paytime`;
CREATE TABLE `paytime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proxy_id` varchar(30) DEFAULT NULL,
  `userid` varchar(30) DEFAULT NULL,
  `totalfee` decimal(10,2) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `updatetime` datetime DEFAULT NULL,
  `createday` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='玩家充值明细表';

-- ----------------------------
-- Records of paytime
-- ----------------------------

-- ----------------------------
-- Table structure for planlog
-- ----------------------------
DROP TABLE IF EXISTS `planlog`;
CREATE TABLE `planlog` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `plan` varchar(50) DEFAULT '' COMMENT '计划任务名称',
  `day` int(11) DEFAULT '0' COMMENT '执行日期',
  `inserttime` datetime DEFAULT NULL,
  `updatetime` datetime DEFAULT NULL,
  `status` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx` (`plan`,`day`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of planlog
-- ----------------------------
INSERT INTO `planlog` VALUES ('1', 'getPlayerList', '20190318', '2019-03-18 18:14:27', '2019-03-18 18:14:28', '1');
INSERT INTO `planlog` VALUES ('2', 'getPlayerList', '20190319', '2019-03-19 16:57:34', '2019-03-19 16:57:35', '1');
INSERT INTO `planlog` VALUES ('3', 'getBillList', '20190319', '2019-03-19 17:30:33', '2019-03-19 17:30:34', '1');
INSERT INTO `planlog` VALUES ('4', 'getBillList', '20190319', '2019-03-19 17:37:16', null, '0');
INSERT INTO `planlog` VALUES ('5', 'getBillList', '20190319', '2019-03-19 17:38:09', null, '0');
INSERT INTO `planlog` VALUES ('6', 'getBillList', '20190319', '2019-03-19 17:39:23', null, '0');
INSERT INTO `planlog` VALUES ('7', 'getBillList', '20190319', '2019-03-19 17:39:53', null, '0');
INSERT INTO `planlog` VALUES ('8', 'getBillList', '20190319', '2019-03-19 17:40:19', null, '0');
INSERT INTO `planlog` VALUES ('9', 'getBillList', '20190319', '2019-03-19 17:40:48', null, '0');
INSERT INTO `planlog` VALUES ('10', 'getBillList', '20190319', '2019-03-19 17:42:59', null, '0');
INSERT INTO `planlog` VALUES ('11', 'getBillList', '20190319', '2019-03-19 17:43:45', null, '0');
INSERT INTO `planlog` VALUES ('12', 'getBillList', '20190319', '2019-03-19 17:44:01', null, '0');
INSERT INTO `planlog` VALUES ('13', 'getBillList', '20190319', '2019-03-19 17:44:30', null, '0');
INSERT INTO `planlog` VALUES ('14', 'getBillList', '20190319', '2019-03-19 17:45:10', null, '0');
INSERT INTO `planlog` VALUES ('15', 'getBillList', '20190319', '2019-03-19 17:45:58', null, '0');
INSERT INTO `planlog` VALUES ('16', 'getBillList', '20190319', '2019-03-19 17:46:31', null, '0');
INSERT INTO `planlog` VALUES ('17', 'getBillList', '20190319', '2019-03-19 17:47:38', null, '0');
INSERT INTO `planlog` VALUES ('18', 'getBillList', '20190319', '2019-03-19 17:47:58', null, '0');
INSERT INTO `planlog` VALUES ('19', 'getBillList', '20190319', '2019-03-19 17:48:55', '2019-03-19 17:48:56', '1');
INSERT INTO `planlog` VALUES ('20', 'getBillList', '20190319', '2019-03-19 17:50:48', null, '0');
INSERT INTO `planlog` VALUES ('21', 'getBillList', '20190319', '2019-03-19 17:51:08', '2019-03-19 17:51:09', '1');
INSERT INTO `planlog` VALUES ('22', 'getBillList', '20190319', '2019-03-19 17:52:39', '2019-03-19 17:52:39', '1');

-- ----------------------------
-- Table structure for player
-- ----------------------------
DROP TABLE IF EXISTS `player`;
CREATE TABLE `player` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gameid` varchar(30) DEFAULT NULL COMMENT '游戏id',
  `proxy_id` varchar(100) DEFAULT NULL,
  `userid` int(11) DEFAULT NULL COMMENT '用户id',
  `accountid` varchar(300) DEFAULT NULL COMMENT '用户账号',
  `leftmoney` decimal(10,2) DEFAULT '0.00' COMMENT '余额',
  `nickname` varchar(100) DEFAULT NULL,
  `ismobile` tinyint(1) DEFAULT '0' COMMENT '是否绑定手机',
  `regtime` varchar(30) DEFAULT NULL,
  `descript` varchar(255) DEFAULT NULL COMMENT '备注',
  `addtime` datetime DEFAULT NULL,
  `updatemoney` datetime DEFAULT NULL,
  `updatetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid` (`userid`) USING BTREE,
  KEY `proxy_id` (`proxy_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of player
-- ----------------------------
INSERT INTO `player` VALUES ('1', null, 'FC0000004', '83872430', null, '60000.00', '问翠梅', '0', '2018/11/20 18:49:34', '11223333', '2019-03-18 18:14:28', null, '2019-03-20 17:49:41');

-- ----------------------------
-- Table structure for playergame
-- ----------------------------
DROP TABLE IF EXISTS `playergame`;
CREATE TABLE `playergame` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `nickname` varchar(100) DEFAULT NULL,
  `roomname` varchar(100) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `changemoney` decimal(10,2) DEFAULT '0.00' COMMENT '输赢情况',
  `inserttime` datetime DEFAULT NULL,
  `proxy_id` varchar(100) DEFAULT NULL,
  `updatetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `proxy_id` (`proxy_id`) USING BTREE,
  KEY `userid` (`userid`,`roomname`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of playergame
-- ----------------------------

-- ----------------------------
-- Table structure for playerorder
-- ----------------------------
DROP TABLE IF EXISTS `playerorder`;
CREATE TABLE `playerorder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gameid` int(11) DEFAULT NULL,
  `proxy_id` varchar(100) DEFAULT NULL COMMENT '分成代理',
  `userid` varchar(30) DEFAULT NULL,
  `game` varchar(100) DEFAULT NULL,
  `total_tax` decimal(18,2) DEFAULT '0.00',
  `date` int(11) DEFAULT NULL,
  `createday` int(11) DEFAULT '0',
  `createtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `index1` (`proxy_id`,`createtime`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='税收获取';

-- ----------------------------
-- Records of playerorder
-- ----------------------------
INSERT INTO `playerorder` VALUES ('1', null, 'FC0000004', '83872430', '', '57.15', '20190318', '20190319', '2019-03-19 17:51:09');
INSERT INTO `playerorder` VALUES ('2', null, 'FC0000004', '83872430', '', '57.15', '20190318', '20190319', '2019-03-19 17:52:39');

-- ----------------------------
-- Table structure for proxy
-- ----------------------------
DROP TABLE IF EXISTS `proxy`;
CREATE TABLE `proxy` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(50) DEFAULT NULL COMMENT '生成6位代理号',
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(300) DEFAULT NULL,
  `salt` varchar(30) DEFAULT NULL,
  `allow_addproxy` tinyint(1) DEFAULT '0' COMMENT '允许添加下级代理0=不 1=是',
  `parent_id` varchar(255) DEFAULT NULL,
  `proxy_id` varchar(20) DEFAULT NULL,
  `lock` int(11) DEFAULT NULL,
  `grade` int(11) DEFAULT NULL COMMENT '代理等级',
  `nickname` varchar(30) DEFAULT NULL,
  `avatar` varchar(1000) DEFAULT NULL,
  `percent` int(11) DEFAULT NULL,
  `bind_mobile` varchar(20) DEFAULT NULL,
  `bind_ip` int(11) DEFAULT NULL,
  `balance` decimal(10,2) DEFAULT '0.00',
  `historyin` decimal(10,2) DEFAULT '0.00',
  `last_login` datetime DEFAULT NULL,
  `regtime` datetime DEFAULT NULL,
  `descript` text,
  `check_pass` varchar(100) DEFAULT NULL,
  `last_ip` varchar(20) DEFAULT NULL,
  `last_time` int(11) DEFAULT NULL,
  `logtimes` int(11) DEFAULT NULL,
  `islock` int(11) DEFAULT '0',
  `ban` int(11) DEFAULT '0',
  `isdel` int(11) DEFAULT '0',
  `updatetime` int(11) DEFAULT '0',
  `token` varchar(32) DEFAULT NULL COMMENT '记住登录标识',
  `identifier` varchar(32) DEFAULT NULL COMMENT '记住登录验证',
  `timeout` int(11) DEFAULT NULL COMMENT '记住登录超时时间',
  PRIMARY KEY (`id`),
  KEY `code` (`code`) USING BTREE,
  KEY `parent` (`parent_id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of proxy
-- ----------------------------
INSERT INTO `proxy` VALUES ('1', 'admin', 'admin', '276b28feea7d6b09bf0b6fc1152e0a4e', 'b0054m', '1', '0', null, null, null, null, null, '100', null, null, '0.00', '0.00', '2019-03-22 17:32:12', null, null, null, '127.0.0.1', null, null, '0', '0', '0', '1553249206', '5a94749208628d865402d913e4ea9216', 'c84c1082c2326c1677969d6dcb21ad4a', '1553851932');
INSERT INTO `proxy` VALUES ('2', 'FC0000002', '13215045605', '977d63a82133b164b5cb429b9d4a146c', '5c15d8', '1', 'admin', null, null, null, null, null, '90', null, null, '17.16', '17.16', '2019-03-22 14:35:41', '2019-03-18 18:13:05', 'sdsdsds', null, '127.0.0.1', null, null, '0', '0', '0', '1553247849', 'c777e41c3bcfacca7cd479f9c324b9b1', '12af1aaaadeea4c4b49426807142add0', '1553841341');
INSERT INTO `proxy` VALUES ('3', 'FC0000003', '13345609786', '8087fc3357c415e3589fbc29955a5972', 'ppc9hc', '1', 'FC0000002', null, null, null, null, null, '70', null, null, '17000.16', '17000.16', '2019-03-18 18:13:49', '2019-03-18 18:13:36', '', null, '127.0.0.1', null, null, '0', '0', '0', '0', 'ff80f00e12a9b3d3902504e61a1a4eb2', '914f3e52c384251abc6e54d14e72bd8b', '1553508829');
INSERT INTO `proxy` VALUES ('4', 'FC0000004', '13800138001', 'ffb178b2a2d21c9b7155acb1734374a2', 'ln7he4', '1', 'FC0000003', null, null, null, null, null, '60', '13215045605', null, '444.00', '17111.48', '2019-03-23 17:47:47', '2019-03-18 18:14:02', '', null, '127.0.0.1', null, null, '0', '0', '0', '1553307847', '6bcaf08c2a9bd39e2dd745bba83b5e98', 'f53ec9affaa007f106858023a1942eb9', '1553939267');
INSERT INTO `proxy` VALUES ('5', 'FC0000005', '13344556677', '556891cb29c56d3dfa2bdeb316461c5a', 'l2cnv3', '1', 'FC0000004', null, null, null, null, null, '20', null, null, '0.00', '0.00', null, '2019-03-19 09:11:22', '3323333333333', null, null, null, null, '0', '0', '0', '1553070641', null, null, null);
INSERT INTO `proxy` VALUES ('6', 'FC0000006', '14455667788', 'd9b360aab7b7fdbf4ec22d285c62777a', 'na4jus', '1', 'admin', null, null, null, null, null, '50', null, null, '0.00', '0.00', '2019-03-22 12:43:17', '2019-03-20 14:02:26', '', null, '127.0.0.1', null, null, '0', '0', '0', '0', 'c8f0e0201846974a69f8357dbbcfbcd6', '6505caeebbf74033eb44fb46304e01fa', '1553834597');
INSERT INTO `proxy` VALUES ('7', 'FC0000007', '16677889900', '94218b29d559236a04880140ae5f3b37', '6uhwvq', '1', 'FC0000004', null, null, null, null, null, '50', null, null, '0.00', '0.00', null, '2019-03-20 14:04:10', '1111123风格复古风', null, null, null, null, '0', '0', '0', '1553075398', null, null, null);
INSERT INTO `proxy` VALUES ('8', 'FC0000008', '14499055556', '8df81094bdae9ab012340604d1bee5cf', 'muyz4c', '1', 'FC0000004', null, null, null, null, null, '20', null, null, '0.00', '0.00', null, '2019-03-21 10:47:56', '得到的', null, null, null, null, '0', '0', '0', '0', null, null, null);
INSERT INTO `proxy` VALUES ('9', 'FC0000009', '14499055557', 'dbc56900690158eab953ecb0166a76bb', 'bc6kfn', '1', 'FC0000004', null, null, null, null, null, '40', null, null, '0.00', '0.00', null, '2019-03-21 10:48:49', '得到的22', null, null, null, null, '0', '0', '0', '0', null, null, null);
INSERT INTO `proxy` VALUES ('10', 'FC0000010', '14499055558', '617e7d5af20cf1e42aef537b3fe501b2', 'em34jf', '1', 'FC0000004', null, null, null, null, null, '20', null, null, '0.00', '0.00', null, '2019-03-21 10:50:13', '得到的223', null, null, null, null, '0', '0', '0', '0', null, null, null);
INSERT INTO `proxy` VALUES ('11', 'FC0000011', '13322332233', 'dbbb009f794eb92fbb347197005272d1', 'ipxixn', '1', 'FC0000004', null, null, null, null, null, '50', null, null, '0.00', '0.00', null, '2019-03-21 10:50:35', '34343', null, null, null, null, '0', '0', '0', '0', null, null, null);
INSERT INTO `proxy` VALUES ('12', 'FC0000012', '14434565552', 'b8dcfa9dab145ed0cefced520f131674', '7io607', '0', 'FC0000004', null, null, null, null, null, '50', null, null, '0.00', '0.00', null, '2019-03-21 11:49:01', 'eee', null, null, null, null, '0', '0', '0', '0', null, null, null);
INSERT INTO `proxy` VALUES ('13', 'FC0000013', '14455334433', '534dc006de404d19ca360af580f939d4', '74lpik', '1', 'FC0000006', null, null, null, null, null, '20', null, null, '0.00', '0.00', null, '2019-03-22 12:43:41', '11111', null, null, null, null, '0', '0', '0', '0', null, null, null);

-- ----------------------------
-- Table structure for sysadmin
-- ----------------------------
DROP TABLE IF EXISTS `sysadmin`;
CREATE TABLE `sysadmin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `salt` varchar(100) DEFAULT NULL,
  `realname` varchar(100) DEFAULT NULL,
  `isdel` bit(1) DEFAULT NULL,
  `roleid` varchar(255) DEFAULT NULL COMMENT '角色 1=管理员 2=财务',
  `last_login` datetime DEFAULT NULL,
  `last_ip` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `identifier` varchar(255) DEFAULT NULL,
  `timeout` int(11) DEFAULT NULL,
  `updatetime` int(11) DEFAULT NULL,
  `createtime` datetime DEFAULT NULL,
  `addid` int(11) DEFAULT NULL COMMENT '添加人id',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sysadmin
-- ----------------------------
INSERT INTO `sysadmin` VALUES ('1', 'admin', '2db4269e89b9e812ba1d347b68f990c7', 'lekxzp', null, null, '1', '2019-03-23 16:37:55', '127.0.0.1', 'f5fbd656e91f81b1913423ed155dd41d', '30a0331b38571b8091606f45d89f5874', '1553935075', '1553249349', null, null);
INSERT INTO `sysadmin` VALUES ('2', 'caiwu123', '5ac3c8435977af4d96e891d804fed9ef', 'wsunbg', null, null, '2', '2019-03-23 16:38:05', '127.0.0.1', 'f966981265a318e398684128ccdea867', '027824f075f09a09ba834cdb5ddc7710', '1553935085', '1553329165', null, '1');
INSERT INTO `sysadmin` VALUES ('3', 'caiwu222', 'aefc6d5781dfa6d5619e5d10ca8c6015', 'nu1m54', null, null, '2', null, null, null, null, null, '1553329250', null, '1');
INSERT INTO `sysadmin` VALUES ('4', 'caiwu233311', 'f73a6d79b5fc91ab51bf32c60c428bc0', 'ua0k7t', null, null, '2', null, null, null, null, null, '1553329272', null, '1');
INSERT INTO `sysadmin` VALUES ('5', 'caiwu333', '02490be271b888b79aa940007efadf34', 't5w3il', null, null, '2', null, null, null, null, null, '1553329302', null, '1');
INSERT INTO `sysadmin` VALUES ('6', 'caiwurr4', 'cb6c68bf72348b9c37c88c355b004fbd', '0qnrm4', null, null, '2', null, null, null, null, null, '1553329356', null, '1');
INSERT INTO `sysadmin` VALUES ('7', 'cauwueer22', '78308aab815c63d9251c35054129f94b', 'gslgr5', null, null, '2', null, null, null, null, null, '1553329988', '2019-03-23 16:33:08', '1');

-- ----------------------------
-- Table structure for teamlevel
-- ----------------------------
DROP TABLE IF EXISTS `teamlevel`;
CREATE TABLE `teamlevel` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL COMMENT '用户账号',
  `proxy_id` varchar(50) DEFAULT NULL COMMENT '用户Id',
  `parent_id` varchar(50) DEFAULT NULL COMMENT '上级Id',
  `level` int(10) DEFAULT NULL COMMENT '层级',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of teamlevel
-- ----------------------------
INSERT INTO `teamlevel` VALUES ('1', '13215045605', 'FC0000002', 'admin', '1');
INSERT INTO `teamlevel` VALUES ('2', '13345609786', 'FC0000003', 'FC0000002', '1');
INSERT INTO `teamlevel` VALUES ('3', '13345609786', 'FC0000003', 'admin', '2');
INSERT INTO `teamlevel` VALUES ('4', '13800138001', 'FC0000004', 'FC0000003', '1');
INSERT INTO `teamlevel` VALUES ('5', '13800138001', 'FC0000004', 'FC0000002', '2');
INSERT INTO `teamlevel` VALUES ('6', '13344556677', 'FC0000005', 'FC0000004', '1');
INSERT INTO `teamlevel` VALUES ('7', '13344556677', 'FC0000005', 'FC0000003', '2');
INSERT INTO `teamlevel` VALUES ('8', '14455667788', 'FC0000006', 'admin', '1');
INSERT INTO `teamlevel` VALUES ('9', '16677889900', 'FC0000007', 'FC0000004', '1');
INSERT INTO `teamlevel` VALUES ('10', '16677889900', 'FC0000007', 'FC0000003', '2');
INSERT INTO `teamlevel` VALUES ('11', '14499055556', 'FC0000008', 'FC0000004', '1');
INSERT INTO `teamlevel` VALUES ('12', '14499055556', 'FC0000008', 'FC0000003', '2');
INSERT INTO `teamlevel` VALUES ('13', '14499055557', 'FC0000009', 'FC0000004', '1');
INSERT INTO `teamlevel` VALUES ('14', '14499055557', 'FC0000009', 'FC0000003', '2');
INSERT INTO `teamlevel` VALUES ('15', '14499055558', 'FC0000010', 'FC0000004', '1');
INSERT INTO `teamlevel` VALUES ('16', '14499055558', 'FC0000010', 'FC0000003', '2');
INSERT INTO `teamlevel` VALUES ('17', '13322332233', 'FC0000011', 'FC0000004', '1');
INSERT INTO `teamlevel` VALUES ('18', '13322332233', 'FC0000011', 'FC0000003', '2');
INSERT INTO `teamlevel` VALUES ('19', '14434565552', 'FC0000012', 'FC0000004', '1');
INSERT INTO `teamlevel` VALUES ('20', '14434565552', 'FC0000012', 'FC0000003', '2');
INSERT INTO `teamlevel` VALUES ('21', '14455334433', 'FC0000013', 'FC0000006', '1');
INSERT INTO `teamlevel` VALUES ('22', '14455334433', 'FC0000013', 'admin', '2');

-- ----------------------------
-- Table structure for template
-- ----------------------------
DROP TABLE IF EXISTS `template`;
CREATE TABLE `template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template_code` int(11) DEFAULT NULL,
  `template_name` varchar(100) DEFAULT NULL,
  `template_image` varchar(1000) DEFAULT NULL,
  `distribute_url` varchar(1000) DEFAULT NULL,
  `x` int(11) DEFAULT NULL,
  `y` int(11) DEFAULT NULL,
  `isdel` bit(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of template
-- ----------------------------
INSERT INTO `template` VALUES ('1', '1', '五洲游戏', '/public/upload/1.png', 'https://download.gamewuzhou.com/?proxyid=', '280', '1080', '\0');
INSERT INTO `template` VALUES ('2', '2', '五洲游戏', '/public/upload/2.png', 'https://download.gamewuzhou.com/?proxyid=', '280', '1088', '\0');
INSERT INTO `template` VALUES ('3', '3', '五洲游戏', '/public/upload/3.png', 'https://download.gamewuzhou.com/?proxyid=', '528', '1090', '\0');
INSERT INTO `template` VALUES ('4', '4', '五洲游戏', '/public/upload/4.png', 'https://download.gamewuzhou.com/?proxyid=', '283', '1105', '\0');
INSERT INTO `template` VALUES ('5', '5', '五洲游戏', '/public/upload/5.png', 'https://download.gamewuzhou.com/?proxyid=', '280', '1095', '\0');
INSERT INTO `template` VALUES ('6', '6', '五洲游戏', '/public/upload/6.png', 'https://download.gamewuzhou.com/?proxyid=', '100', '1103', '\0');

-- ----------------------------
-- Table structure for thirdpaytime
-- ----------------------------
DROP TABLE IF EXISTS `thirdpaytime`;
CREATE TABLE `thirdpaytime` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loginid` varchar(50) DEFAULT NULL,
  `totalfee` varchar(50) DEFAULT NULL,
  `updatetime` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx` (`loginid`,`totalfee`,`updatetime`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of thirdpaytime
-- ----------------------------

-- ----------------------------
-- Table structure for thirdplayer
-- ----------------------------
DROP TABLE IF EXISTS `thirdplayer`;
CREATE TABLE `thirdplayer` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(30) DEFAULT NULL,
  `accountid` varchar(100) DEFAULT NULL,
  `nickname` varchar(100) DEFAULT NULL,
  `regtime` varchar(50) DEFAULT NULL,
  `ismobile` tinyint(1) DEFAULT '0',
  `balance` decimal(10,2) DEFAULT '0.00' COMMENT '玩家余额',
  `inserttime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid` (`userid`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of thirdplayer
-- ----------------------------
INSERT INTO `thirdplayer` VALUES ('1', '83872430', null, '问翠梅', '2018/11/20 18:49:34', '0', '60000000.00', '2019-03-18 18:14:28');

-- ----------------------------
-- Table structure for thirdplayergame
-- ----------------------------
DROP TABLE IF EXISTS `thirdplayergame`;
CREATE TABLE `thirdplayergame` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `userid` int(11) DEFAULT NULL,
  `nickname` varchar(100) DEFAULT NULL,
  `roomname` varchar(100) DEFAULT NULL,
  `addtime` datetime DEFAULT NULL,
  `changemoney` varchar(100) DEFAULT '0',
  `inserttime` datetime DEFAULT NULL,
  `updatetime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `idx` (`userid`,`roomname`) USING BTREE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of thirdplayergame
-- ----------------------------

-- ----------------------------
-- Table structure for third_player_order
-- ----------------------------
DROP TABLE IF EXISTS `third_player_order`;
CREATE TABLE `third_player_order` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(100) DEFAULT NULL,
  `game` varchar(300) DEFAULT NULL,
  `tax` varchar(100) DEFAULT NULL,
  `date` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of third_player_order
-- ----------------------------
INSERT INTO `third_player_order` VALUES ('1', '83872430', '', '57150', '20190318');
INSERT INTO `third_player_order` VALUES ('2', '83872430', '', '57150', '20190318');
INSERT INTO `third_player_order` VALUES ('3', '83872430', '', '57150', '20190318');
INSERT INTO `third_player_order` VALUES ('4', '83872430', '', '57150', '20190318');

-- ----------------------------
-- Table structure for user_template
-- ----------------------------
DROP TABLE IF EXISTS `user_template`;
CREATE TABLE `user_template` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proxy_id` varchar(30) DEFAULT NULL,
  `template_code` varchar(50) DEFAULT NULL,
  `template_name` varchar(300) DEFAULT NULL,
  `qrcode` varchar(1000) DEFAULT NULL,
  `image_url` varchar(1000) DEFAULT NULL,
  `down_url` varchar(1000) DEFAULT NULL,
  `short_url` varchar(1000) DEFAULT NULL,
  `descript` text,
  PRIMARY KEY (`id`),
  KEY `proxy` (`proxy_id`,`template_code`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_template
-- ----------------------------
INSERT INTO `user_template` VALUES ('1', 'FC0000002', '1', null, 'upload/qrcode/FC0000002.png', 'upload/qrcode/FC0000002_1.png', 'http://distribute.game2019.net/?proxyid=O%89s%60%60%60%60%60b', 'http://t.cn/ExBfL6a', null);
INSERT INTO `user_template` VALUES ('2', 'FC0000002', '2', null, 'upload/qrcode/FC0000002.png', 'upload/qrcode/FC0000002_2.png', 'http://distribute.game2019.net/?proxyid=O%89s%60%60%60%60%60b', 'http://t.cn/ExBfL6a', null);
INSERT INTO `user_template` VALUES ('3', 'FC0000002', '3', null, 'upload/qrcode/FC0000002.png', 'upload/qrcode/FC0000002_3.png', 'http://distribute.game2019.net/?proxyid=O%89s%60%60%60%60%60b', 'http://t.cn/ExBfL6a', null);
INSERT INTO `user_template` VALUES ('4', 'FC0000002', '4', null, 'upload/qrcode/FC0000002.png', 'upload/qrcode/FC0000002_4.png', 'http://distribute.game2019.net/?proxyid=O%89s%60%60%60%60%60b', 'http://t.cn/ExBfL6a', null);
INSERT INTO `user_template` VALUES ('5', 'FC0000002', '5', null, 'upload/qrcode/FC0000002.png', 'upload/qrcode/FC0000002_5.png', 'http://distribute.game2019.net/?proxyid=O%89s%60%60%60%60%60b', 'http://t.cn/ExBfL6a', null);
INSERT INTO `user_template` VALUES ('6', 'FC0000002', '6', null, 'upload/qrcode/FC0000002.png', 'upload/qrcode/FC0000002_6.png', 'http://distribute.game2019.net/?proxyid=O%89s%60%60%60%60%60b', 'http://t.cn/ExBfL6a', null);
