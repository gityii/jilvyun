/*
MySQL Data Transfer
Source Host: localhost
Source Database: myframe
Target Host: localhost
Target Database: myframe
Date: 2018/1/7 ������ ���� 9:21:34
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for admin_user
-- ----------------------------
CREATE TABLE `admin_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员用户表',
  `name` varchar(36) COLLATE utf8_unicode_ci NOT NULL COMMENT '用户昵称',
  `pswd` char(32) COLLATE utf8_unicode_ci NOT NULL COMMENT '密码',
  `right` text COLLATE utf8_unicode_ci NOT NULL COMMENT '权限列表',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `adminuser_s1` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for t_carousel
-- ----------------------------
CREATE TABLE `t_carousel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(360) COLLATE utf8_unicode_ci NOT NULL COMMENT '标题',
  `img` varchar(360) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '缩略图',
  `content` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '内容',
  `date` int(11) NOT NULL DEFAULT '0' COMMENT '发布时间',
  `viewcount` int(11) NOT NULL DEFAULT '0' COMMENT '阅读量',
  `goodcount` int(11) NOT NULL DEFAULT '0' COMMENT '点赞量',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for t_dept
-- ----------------------------
CREATE TABLE `t_dept` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '序号',
  `deptid` int(11) NOT NULL DEFAULT '300' COMMENT '部门编号',
  `name` varchar(360) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '部门名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for t_family
-- ----------------------------
CREATE TABLE `t_family` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '序号',
  `ruleid` int(11) NOT NULL DEFAULT '200' COMMENT '类别编号',
  `category` varchar(360) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '类别名称',
  `deptid` int(11) NOT NULL DEFAULT '200' COMMENT '部门编号',
  `dept` varchar(80) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '部门',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for t_grade
-- ----------------------------
CREATE TABLE `t_grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(360) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '学校名',
  `grade` int(11) DEFAULT '0' COMMENT '年级',
  `content` longtext COLLATE utf8_unicode_ci COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for t_group
-- ----------------------------
CREATE TABLE `t_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '序号',
  `grade` int(11) NOT NULL DEFAULT '0' COMMENT '年级',
  `class` int(11) NOT NULL DEFAULT '0' COMMENT '班级',
  `project` varchar(360) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '项目',
  `family` varchar(360) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '类别',
  `ruleid` int(11) NOT NULL DEFAULT '200' COMMENT '类别编号',
  `val` float NOT NULL DEFAULT '0' COMMENT '分值',
  `name` varchar(360) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '记录人',
  `dept` varchar(360) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '检查部门',
  `date` int(11) NOT NULL DEFAULT '0' COMMENT '检查时间',
  `content` longtext COLLATE utf8_unicode_ci COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for t_notice
-- ----------------------------
CREATE TABLE `t_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(360) COLLATE utf8_unicode_ci NOT NULL COMMENT '标题',
  `content` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '内容',
  `date` int(11) NOT NULL DEFAULT '0' COMMENT '发布时间',
  `viewcount` int(11) NOT NULL DEFAULT '0' COMMENT '阅读量',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for t_org
-- ----------------------------
CREATE TABLE `t_org` (
  `orgid` int(11) NOT NULL AUTO_INCREMENT,
  `orgname` varchar(72) COLLATE utf8_unicode_ci NOT NULL,
  `viewcount` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`orgid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for t_person
-- ----------------------------
CREATE TABLE `t_person` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `project` varchar(360) COLLATE utf8_unicode_ci NOT NULL COMMENT '项目',
  `family` varchar(360) COLLATE utf8_unicode_ci NOT NULL COMMENT '类别',
  `objects` varchar(360) COLLATE utf8_unicode_ci NOT NULL COMMENT '对象',
  `val` float NOT NULL DEFAULT '0' COMMENT '分值',
  `comments` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for t_rule
-- ----------------------------
CREATE TABLE `t_rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '序号',
  `project` varchar(360) COLLATE utf8_unicode_ci NOT NULL COMMENT '项目',
  `family` varchar(360) COLLATE utf8_unicode_ci NOT NULL COMMENT '类别',
  `ruleid` int(11) NOT NULL DEFAULT '200' COMMENT '类别编号',
  `objects` varchar(360) COLLATE utf8_unicode_ci NOT NULL COMMENT '对象',
  `val` float NOT NULL DEFAULT '0' COMMENT '分值',
  `comments` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for t_school
-- ----------------------------
CREATE TABLE `t_school` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(360) COLLATE utf8_unicode_ci NOT NULL COMMENT '学校名',
  `grade` int(11) NOT NULL DEFAULT '0' COMMENT '年级',
  `class` int(11) NOT NULL DEFAULT '0' COMMENT '班级',
  `content` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '备注',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unid` (`class`,`grade`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for t_topic
-- ----------------------------
CREATE TABLE `t_topic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(360) COLLATE utf8_unicode_ci NOT NULL COMMENT '标题',
  `img` varchar(360) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '缩略图',
  `content` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '内容',
  `date` int(11) NOT NULL DEFAULT '0' COMMENT '发布时间',
  `viewcount` int(11) NOT NULL DEFAULT '0' COMMENT '阅读量',
  `goodcount` int(11) NOT NULL DEFAULT '0' COMMENT '点赞量',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for t_user
-- ----------------------------
CREATE TABLE `t_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '序号',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '用户学号',
  `name` varchar(360) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '用户姓名',
  `dept` varchar(360) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '检查部门',
  `right` int(11) NOT NULL DEFAULT '1' COMMENT '用户权限',
  `type` varchar(360) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `admin_user` VALUES ('1', 'admin', '4a7d1ed414474e4033ac29ccb8653d9b', '1');
INSERT INTO `t_carousel` VALUES ('1', '“旧款苹果手机会变慢”从笑话变现实', '/static/upload/images/20171227/20171227224328403.png', '<p data-page-model=\"text\" style=\"margin-top: 0px; margin-bottom: 0px; padding-bottom: 10px; line-height: 34px; text-indent: 2em; font-family: \" microsoft=\"\" droid=\"\" sans=\"\" white-space:=\"\" background-color:=\"\">苹果公司随后发出了声明，表示它发布过的一项“功能”会降低旧设备的处理能力，以防止设备突然关闭。苹果表示，这种降低是必要的，因为不然的话，旧电池可能会经常超负荷。</p><p data-page-model=\"text\" style=\"margin-top: 0px; margin-bottom: 0px; padding-bottom: 10px; line-height: 34px; text-indent: 2em; font-family: \" microsoft=\"\" droid=\"\" sans=\"\" white-space:=\"\" background-color:=\"\">这个声明几乎没有起到澄清的作用，反而似乎是印证了“故意使旧款手机变慢”的说法。美国已经有苹果用户提起了诉讼，认为这是“欺诈”。</p><p><br/></p>', '1514385808', '0', '0');
INSERT INTO `t_carousel` VALUES ('2', '全球五大最贵民用无人机 付钱你也买得到', '/static/upload/images/20171227/20171227224355937.png', '<p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; line-height: 2.2; font-family: \" microsoft=\"\" segoe=\"\" hiragino=\"\" sans=\"\" wenquanyi=\"\" micro=\"\" font-size:=\"\" white-space:=\"\">无人机除了娱乐用途，选择得宜亦能炫耀耍帅。不少价格非一般出众的高端无人机多用于军事、商业及政府事务，但其实只要付得起钱，这些无人机也能归于私有。本篇与大家一起看看 5 款流通于市面的全球最贵无人机，在外使用算不算另类炫富了？</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; line-height: 2.2; font-family: \" microsoft=\"\" segoe=\"\" hiragino=\"\" sans=\"\" wenquanyi=\"\" micro=\"\" font-size:=\"\" white-space:=\"\">　　<span style=\"font-weight: bolder;\">1 可载人无人机 EHang 184 － 300,000 美元</span></p><p><br/></p>', '1514385835', '0', '0');
INSERT INTO `t_carousel` VALUES ('3', '媒体回顾2017十大PC ThinkPad上榜', '/static/upload/images/20171227/20171227224405373.png', '<p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; line-height: 2.2; font-family: \" microsoft=\"\" segoe=\"\" hiragino=\"\" sans=\"\" wenquanyi=\"\" micro=\"\" font-size:=\"\" white-space:=\"\">　要拯救PC，看看这十个够不够分量。</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; line-height: 2.2; font-family: \" microsoft=\"\" segoe=\"\" hiragino=\"\" sans=\"\" wenquanyi=\"\" micro=\"\" font-size:=\"\" white-space:=\"\">　　同是日常需要的科技产品，手机市场表现火热，而PC行业却显得有些冷清。当然，在这“后PC”时代，这种情况并不为奇。近几年，PC厂商一直在寻找新的出路，就目前来看，商用及游戏本成了两个最大的希望。</p><p><br/></p>', '1514385845', '0', '0');
INSERT INTO `t_dept` VALUES ('1', '103', '值班老师');
INSERT INTO `t_dept` VALUES ('2', '102', '学生会');
INSERT INTO `t_dept` VALUES ('4', '101', '宿舍管理员');
INSERT INTO `t_family` VALUES ('1', '201', '宿舍内务及纪律', '103', '值班老师');
INSERT INTO `t_family` VALUES ('2', '202', '日常纪律', '103', '值班老师');
INSERT INTO `t_family` VALUES ('3', '203', '教室及公区卫生', '103', '值班老师');
INSERT INTO `t_family` VALUES ('4', '204', '跑操', '102', '学生会');
INSERT INTO `t_grade` VALUES ('2', '', '2', '');
INSERT INTO `t_grade` VALUES ('3', '', '3', '');
INSERT INTO `t_group` VALUES ('1', '2', '1', '地面有垃圾', '教室及公区卫生', '0', '-0.5', '小王', '教务处', '1515325599', '');
INSERT INTO `t_group` VALUES ('2', '2', '1', '精神面貌', '跑操', '0', '-0.1', '小王', '教务处', '1515328290', '');
INSERT INTO `t_person` VALUES ('1', 'qqq', 'qqq', 'qqqq', '-2', 'www');
INSERT INTO `t_person` VALUES ('2', 'sss', 'ddd', 'dddd', '1', 'cccc');
INSERT INTO `t_person` VALUES ('3', 'cdd', 'ddf', 'ssaa', '0.6', 'dff');
INSERT INTO `t_rule` VALUES ('23', '桌椅摆放不整齐', '教室及公区卫生', '203', '集体', '-0.5', '');
INSERT INTO `t_rule` VALUES ('24', '地面有垃圾', '教室及公区卫生', '203', '集体', '-0.5', '');
INSERT INTO `t_rule` VALUES ('25', '精神面貌', '跑操', '204', '集体', '-0.1', '');
INSERT INTO `t_school` VALUES ('4', '', '2', '2', '');
INSERT INTO `t_school` VALUES ('2', '', '1', '4', '');
INSERT INTO `t_school` VALUES ('3', '', '1', '1', '');
INSERT INTO `t_school` VALUES ('5', '', '2', '1', '');
INSERT INTO `t_topic` VALUES ('1', '周其仁：水大鱼大 水浑鱼杂——读吴晓波新书', '/static/upload/images/20171227/20171227222000513.png', '<p data-page-model=\"text\" style=\"margin-top: 30px; margin-bottom: 30px; border: 0px; line-height: 28px; color: rgb(51, 51, 51); text-indent: 2em; font-family: simsun, 宋体; white-space: normal; background-color: rgb(255, 255, 255);\">天就是围绕这本书，听晓波演讲。要我发言，就讲几句阅读的感受。这是一本好书。最让人欣赏之处，是作品所展示的那种观察与解析能力，对近十年中国市场与企业波澜壮阔的变迁，作出全景式精彩记录。题材重大，话题严肃，不过读着读着，有几处能让你笑出声来。咱们不妨一起来体验一例。<span style=\"text-indent: 2em;\">收购沃尔沃。听这一段，“李书福总能把出人意料的欢乐带到谈判桌上。一次与工会谈判，现场气氛很紧张</span></p><p><br/></p>', '1514385270', '0', '0');
INSERT INTO `t_topic` VALUES ('2', '陆金所1.39亿逾期是怎么回事', '/static/upload/images/20171227/20171227222049205.jpg', '<p data-page-model=\"text\" style=\"margin-top: 24px; margin-bottom: 24px; border: 0px; vertical-align: baseline; word-wrap: break-word; font-size: medium; line-height: 28px;\" microsoft=\"\" white-space:=\"\" background-color:=\"\">据了解，逾期1.39亿并非陆金所自己的产品，而是陆金所“代销”的大同证券资管计划，共有118名投资人投资了该产品，本金及收益总金额为1.39亿元。<span style=\"border: 0px; vertical-align: baseline; color: rgb(192, 0, 0);\"><strong style=\"border: 0px; vertical-align: baseline;\">小M通过查询发现，这个产品的主要信息有，管理人：大同证券有限责任公司；募集规模1.5亿；募集期起始日期为2016年12月1日，到期日为2017年12月7日；分红方式为现金分红；是否保本：不保本；“投资标的方”：山东龙力生物科技股</strong></span></p>', '1514385246', '0', '0');
INSERT INTO `t_user` VALUES ('1', '1', '王老师', '值班老师', '1', '宿舍内务及纪律');
INSERT INTO `t_user` VALUES ('2', '2', '李老师', '宿舍管理员', '1', '日常纪律');
