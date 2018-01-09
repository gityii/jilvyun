/*
MySQL Data Transfer
Source Host: localhost
Source Database: myframe
Target Host: localhost
Target Database: myframe
Date: 2018/1/9 20:16:33
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
-- Table structure for t_articlec
-- ----------------------------
CREATE TABLE `t_articlec` (
  `articleid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(360) COLLATE utf8_unicode_ci NOT NULL COMMENT 'æ–‡ç« æ ‡é¢˜',
  `type` int(11) NOT NULL DEFAULT '0' COMMENT 'åˆ†ç±»ID',
  `img` varchar(360) COLLATE utf8_unicode_ci DEFAULT '' COMMENT 'ç¼©ç•¥å›¾',
  `from` varchar(120) COLLATE utf8_unicode_ci DEFAULT '' COMMENT 'æ¥è‡ª',
  `content` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'å†…å®¹',
  `order` int(11) NOT NULL DEFAULT '999999' COMMENT 'æŽ’åº',
  `url` varchar(1200) COLLATE utf8_unicode_ci DEFAULT '' COMMENT 'å¤–éƒ¨é“¾æŽ¥',
  `dateline` int(11) NOT NULL DEFAULT '0' COMMENT 'å‘å¸ƒæ—¶é—´',
  `viewcount` int(11) NOT NULL DEFAULT '0' COMMENT 'é˜…è¯»é‡',
  `goodcount` int(11) NOT NULL DEFAULT '0' COMMENT 'ç‚¹èµžé‡',
  PRIMARY KEY (`articleid`),
  KEY `articlec_s1` (`type`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for t_articlec_type
-- ----------------------------
CREATE TABLE `t_articlec_type` (
  `typeid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(720) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `img` varchar(720) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(1200) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '999999' COMMENT 'æŽ’åº',
  PRIMARY KEY (`typeid`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `order` char(80) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `classid` int(11) NOT NULL DEFAULT '200' COMMENT '类别编号',
  `category` varchar(360) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '类别名称',
  `obj` varchar(80) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '部门',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
  `project` varchar(360) COLLATE utf8_unicode_ci NOT NULL COMMENT '项目',
  `family` varchar(360) COLLATE utf8_unicode_ci NOT NULL COMMENT '类别',
  `ruleid` int(11) NOT NULL DEFAULT '200' COMMENT '类别编号',
  `val` float NOT NULL DEFAULT '0' COMMENT '分值',
  `name` varchar(360) COLLATE utf8_unicode_ci NOT NULL COMMENT '记录人',
  `dept` varchar(360) COLLATE utf8_unicode_ci NOT NULL COMMENT '检查部门',
  `date` int(11) NOT NULL DEFAULT '0' COMMENT '检查时间',
  `content` longtext COLLATE utf8_unicode_ci COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for t_org
-- ----------------------------
CREATE TABLE `t_org` (
  `orgid` int(11) NOT NULL AUTO_INCREMENT,
  `orgname` varchar(72) COLLATE utf8_unicode_ci NOT NULL,
  `viewcount` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`orgid`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for t_rule
-- ----------------------------
CREATE TABLE `t_rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '序号',
  `project` varchar(360) COLLATE utf8_unicode_ci NOT NULL COMMENT '项目',
  `family` varchar(360) COLLATE utf8_unicode_ci NOT NULL COMMENT '类别',
  `classid` int(11) NOT NULL DEFAULT '200' COMMENT '类别编号',
  `objects` varchar(360) COLLATE utf8_unicode_ci NOT NULL COMMENT '对象',
  `val` float NOT NULL DEFAULT '0' COMMENT '分值',
  `comments` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=29 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Table structure for t_single
-- ----------------------------
CREATE TABLE `t_single` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '序号',
  `grade` int(11) NOT NULL DEFAULT '0' COMMENT '年级',
  `class` int(11) NOT NULL DEFAULT '0' COMMENT '班级',
  `project` varchar(360) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '项目',
  `family` varchar(360) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '类别',
  `val` float NOT NULL DEFAULT '0' COMMENT '分值',
  `uname` varchar(360) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '被记录人',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT '被记录人学号',
  `name` varchar(360) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '记录人',
  `dept` varchar(360) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '检查部门',
  `date` int(11) NOT NULL DEFAULT '0' COMMENT '检查时间',
  `content` longtext COLLATE utf8_unicode_ci COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

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
-- Table structure for t_zwfw_detail
-- ----------------------------
CREATE TABLE `t_zwfw_detail` (
  `projectid` int(11) NOT NULL DEFAULT '1' COMMENT 'æœåŠ¡ç¼–å·',
  `name` varchar(36) COLLATE utf8_unicode_ci DEFAULT '' COMMENT 'æœåŠ¡åç§°',
  `titleid` int(11) NOT NULL DEFAULT '1' COMMENT 'æ ‡é¢˜ç¼–å·',
  `title` varchar(36) COLLATE utf8_unicode_ci NOT NULL COMMENT 'åŠžå…¬æ ‡é¢˜',
  `address` varchar(720) COLLATE utf8_unicode_ci DEFAULT '' COMMENT 'åœ°å€',
  `lng` decimal(10,6) NOT NULL DEFAULT '116.306070' COMMENT 'ç»åº¦',
  `lat` decimal(10,6) NOT NULL DEFAULT '39.982163' COMMENT 'çº¬åº¦',
  `worktime` varchar(360) COLLATE utf8_unicode_ci DEFAULT '' COMMENT 'åŠžå…¬æ—¶é—´',
  `tel` varchar(15) COLLATE utf8_unicode_ci DEFAULT '' COMMENT 'å’¨è¯¢ç”µè¯',
  `order` int(11) NOT NULL AUTO_INCREMENT COMMENT 'æŽ’åº',
  PRIMARY KEY (`order`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for t_zwfw_project
-- ----------------------------
CREATE TABLE `t_zwfw_project` (
  `projectid` int(11) NOT NULL DEFAULT '1' COMMENT 'æœåŠ¡ç¼–å·',
  `name` varchar(36) COLLATE utf8_unicode_ci DEFAULT '' COMMENT 'æœåŠ¡åç§°',
  `order` int(11) NOT NULL AUTO_INCREMENT COMMENT 'æŽ’åº',
  PRIMARY KEY (`order`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `admin_user` VALUES ('1', 'admin', '4a7d1ed414474e4033ac29ccb8653d9b', '1');
INSERT INTO `t_articlec` VALUES ('26', '专题', '0', '', '', '11222', '999999', '', '0', '0', '0');
INSERT INTO `t_articlec` VALUES ('27', 'ssss555', '5', '/data/upload/imgge/20171114/20171114114043817.jpg', 'sss9999999', '<p>ssz</p>', '1', '', '1510631400', '0', '0');
INSERT INTO `t_articlec` VALUES ('29', 'hahhahhah', '6', '/data/upload/imgge/20171114/20171114115555179.jpg', '本地', '<p>ssssss</p>', '0', '', '1510631755', '0', '0');
INSERT INTO `t_articlec` VALUES ('30', '百度', '6', '/data/upload/imgge/20171114/20171114115637962.jpg', 'sss', '', '8', 'www.baidu.com', '1510631797', '0', '0');
INSERT INTO `t_articlec_type` VALUES ('7', 'niuniu', '/data/upload/imgge/20171114/2017111415543442.jpg', 'ssss', '4');
INSERT INTO `t_carousel` VALUES ('1', '冬天适当吃点甘蔗 补铁补维C', '/static/upload/images/20171226/20171226163905523.png', '<p style=\"margin-top: 0px; margin-bottom: 29px; line-height: 28px; font-family: 宋体, Arial, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-indent: 2em;\">有句谚语说得好“立冬食蔗不会牙痛”，甜甜的水果会受小朋友喜爱，家长又会担心这对牙齿不好。其实冬天可以适当吃点甘蔗。</p><p style=\"margin-top: 0px; margin-bottom: 29px; line-height: 28px; font-family: 宋体, Arial, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-indent: 2em;\">一是甘蔗里面含有大量的铁元素，每500克里就有4.5毫克的铁，且还有锌、锰等人体所必需的微量元素。铁是造血不可缺少的元素，利于养血，血补足了才有利于把“气”输送到身体的各个器官中。甘蔗富含的大量维生素C，对口腔炎症和口臭也有一定的疗效。</p><p style=\"margin-top: 0px; margin-bottom: 29px; line-height: 28px; font-family: 宋体, Arial, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-indent: 2em;\">二是甘蔗有大量的纤维。在吃甘蔗的过程中，通过反复咀嚼这些纤维，可以把口腔和牙缝中的食物残渣及沉积物清除干净，这个过程跟刷牙的原理是一样的，由此提高了牙齿的自洁和抗龋齿的能力，且在反复咀嚼甘蔗时，也充分锻炼了口腔的肌肉，增加了咬合及面部肌肉的力量。</p><p style=\"margin-top: 0px; margin-bottom: 29px; line-height: 28px; font-family: 宋体, Arial, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-indent: 2em;\">把甘蔗切成食指大小，更方便给小朋友食用。即使甘蔗渣吃进肚子里也不用紧张，甘蔗的纤维通过刺激肠道壁有促进肠道排便的功效。</p><p><br/></p>', '1514277545', '0', '0', 'Second slide');
INSERT INTO `t_carousel` VALUES ('2', ' 这8种食物最适合冬季滋补', '/static/upload/images/20171226/2017122616385854.png', '<p style=\"margin-top: 0px; margin-bottom: 29px; line-height: 28px; font-family: 宋体, Arial, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-indent: 2em;\">第一菜:莲藕】</p><p style=\"margin-top: 0px; margin-bottom: 29px; line-height: 28px; font-family: 宋体, Arial, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-indent: 2em;\">寒冬时节,正是鲜藕应市之时。冬季天气干燥,吃些藕,能起到养阴清热、润燥止渴、清心安神的作用。</p><p style=\"margin-top: 0px; margin-bottom: 29px; line-height: 28px; font-family: 宋体, Arial, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-indent: 2em;\">鲜藕除了含有大量的碳水化合物外,蛋白质和各种维生素及矿物质的含量也很丰富,还含有丰富的膳食纤维,对治疗便秘,促使有害物质排出,十分有益。</p><p style=\"margin-top: 0px; margin-bottom: 29px; line-height: 28px; font-family: 宋体, Arial, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-indent: 2em;\">最佳吃法:七孔藕淀粉含量较高,水分少,糯而不脆,适宜做汤；九孔藕水分含量高,脆嫩、汁多,凉拌或清炒最为合适。</p><p style=\"margin-top: 0px; margin-bottom: 29px; line-height: 28px; font-family: 宋体, Arial, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-indent: 2em;\">最好搭配:黑白木耳。</p><p style=\"margin-top: 0px; margin-bottom: 29px; line-height: 28px; font-family: 宋体, Arial, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-indent: 2em;\">搭配银耳可以滋补肺阴,搭配黑木耳则可以滋补肾阴。</p><p><br/></p>', '1514277538', '0', '0', 'Third slide');
INSERT INTO `t_carousel` VALUES ('5', ' 这8种食物最适合冬季', '/static/upload/images/20171226/20171226163813555.png', '<p style=\"margin-top: 0px; margin-bottom: 29px; line-height: 28px; font-family: 宋体, Arial, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-indent: 2em;\">【第一宴:火锅】</p><p style=\"margin-top: 0px; margin-bottom: 29px; line-height: 28px; font-family: 宋体, Arial, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-indent: 2em;\">一到冬天,朋友们最喜欢去的餐厅非火锅店莫属!尽管不断有人告诫我们,火锅吃多了容易上火,火锅里富含嘌呤,火锅热量比较高……但是实际上,火锅确实是冬季滋补的首选。</p><p style=\"margin-top: 0px; margin-bottom: 29px; line-height: 28px; font-family: 宋体, Arial, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-indent: 2em;\">唯一要注意的是,我们在选择火锅的时候不要选择浓汤或者过于辛辣的麻辣锅底,这样可以避免上火的现象；另外在选择涮菜的时候,一定不要多吃肉类、丸子类,也要选择一些茼蒿、海带这样的素菜,做到荤素搭配,防止热量超标、蛋白质过多的问题。</p><p style=\"margin-top: 0px; margin-bottom: 29px; line-height: 28px; font-family: 宋体, Arial, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-indent: 2em;\">【第一饮:黄酒】</p><p style=\"margin-top: 0px; margin-bottom: 29px; line-height: 28px; font-family: 宋体, Arial, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-indent: 2em;\">黄酒是世界上最古老的酒类之一,含有18种氨基酸,这在世界营养类酒中是少见的。黄酒还含较高的功能性低聚糖,能提高免疫力和抗病力,是葡萄酒、啤酒无法比拟的。中医认为,黄酒性热味甘苦,有通经络、行血脉、温脾胃、润皮肤、散湿气等治疗作用。</p><p style=\"margin-top: 0px; margin-bottom: 29px; line-height: 28px; font-family: 宋体, Arial, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-indent: 2em;\">最佳饮用方法:</p><p style=\"margin-top: 0px; margin-bottom: 29px; line-height: 28px; font-family: 宋体, Arial, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-indent: 2em;\">黄酒温饮,暖胃驱寒。温度以35℃～45℃为佳。</p><p style=\"margin-top: 0px; margin-bottom: 29px; line-height: 28px; font-family: 宋体, Arial, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-indent: 2em;\">最好搭配:乌梅。</p><p><br/></p>', '1514277493', '0', '0', 'First slide');
INSERT INTO `t_dept` VALUES ('1', '103', '值班老师');
INSERT INTO `t_dept` VALUES ('2', '102', '学生会');
INSERT INTO `t_dept` VALUES ('4', '101', '宿舍管理员');
INSERT INTO `t_family` VALUES ('1', '201', '宿舍内务及纪律', '集体');
INSERT INTO `t_family` VALUES ('2', '202', '日常纪律', '集体');
INSERT INTO `t_family` VALUES ('3', '203', '教室及公区卫生', '个人');
INSERT INTO `t_family` VALUES ('4', '204', '跑操', '个人');
INSERT INTO `t_family` VALUES ('6', '205', '考勤', '个人');
INSERT INTO `t_family` VALUES ('7', '206', '教室及公区卫生', '集体');
INSERT INTO `t_grade` VALUES ('2', '', '2', '');
INSERT INTO `t_grade` VALUES ('3', '', '3', '');
INSERT INTO `t_group` VALUES ('1', '2', '1', '地面有垃圾', '教室及公区卫生', '0', '-0.5', '小王', '教务处', '1515325599', '');
INSERT INTO `t_group` VALUES ('2', '2', '1', '精神面貌', '跑操', '0', '-0.1', '小王', '教务处', '1515328290', '');
INSERT INTO `t_group` VALUES ('3', '2', '1', '桌椅摆放不整齐', '教室及公区卫生', '0', '-0.5', '小王', '教务处', '1515376550', '');
INSERT INTO `t_group` VALUES ('4', '2', '1', '栏杆有灰尘', '教室及公区卫生', '0', '-0.5', '小王', '教务处', '1515498733', '');
INSERT INTO `t_group` VALUES ('5', '2', '2', '精神面貌', '跑操', '0', '-0.1', '小王', '教务处', '1515498766', '');
INSERT INTO `t_notice` VALUES ('1', ' 今年都不会再下雨了 元旦假期有较强冷空气影响', '<p style=\"margin-top: 0px; margin-bottom: 29px; line-height: 28px; font-family: 宋体, Arial, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-indent: 2em; text-align: left;\"><span style=\"text-indent: 2em;\">今年都不会再下雨了 元旦假期有较强冷空气影响&nbsp;今年都不会再下雨了 元旦假期有较强冷空气影响</span><br/></p><p>&nbsp;今年都不会再下雨了 元旦假期有较强冷空气影响&nbsp;今年都不会再下雨了 元旦假期有较强冷空气影响&nbsp;今年都不会再下雨了 元旦假期有较强冷空气影响&nbsp;今年都不会再下雨了 元旦假期有较强冷空气影响&nbsp;今年都不会再下雨了 元旦假期有较强冷空气影响&nbsp;今年都不会再下雨了 元旦假期有较强冷空气影响&nbsp;今年都不会再下雨了 元旦假期有较强冷空气影响&nbsp;今年都不会再下雨了 元旦假期有较强冷空气影响</p>', '1514186804', '0');
INSERT INTO `t_notice` VALUES ('3', ' 悬赏！徐州人看到他赶紧报警', '<p style=\"margin-top: 0px; margin-bottom: 29px; line-height: 28px; font-family: 宋体, Arial, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-indent: 2em; text-align: left;\">“终于看见了中央北路，以后到中央门更方便了。”12月21日晚，红山南路西延工程道路上，数十位市民在此散步，隔着半人高的围墙看着外面车来车往的中央北路，心情很激动。作为2017年南京市重大项目之一，红山南路西延这最后450米的施工意义重大。它打通了铁北区的对外交通，把南京站北广场与中央门商务区联系在了一起。</p><p style=\"margin-top: 0px; margin-bottom: 29px; line-height: 28px; font-family: 宋体, Arial, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-indent: 2em; text-align: left;\">红山南路西延工程西起中央北路，东至黄家圩路，全长1060米，工程分为一、二期，其中一期东半段工程已于2014年下半年竣工。为缓解铁北区域交通压力，今年力争攻克西半段最后的450米道路，即小市街到中央北路。记者在现场看到，目前这段道路快车道已经完成摊铺，中央隔离带的绿化和节点花境也已经基本完成。整条道路显得宽敞和平整，虽然还没有通车，却已吸引了附近许多市民前来参观。</p><p style=\"margin-top: 0px; margin-bottom: 29px; line-height: 28px; font-family: 宋体, Arial, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-indent: 2em; text-align: left;\">我住在附近的小市街88号小区。小区出门就是红山南路西延工程，只是2014年做了一半成了“断头路”。如今终于打通了，我和邻居们都很开心，每天晚上散步，都会走到路头看看中央北路的样子。今后去中央门再也不用绕路了，真希望快点通车。</p><p><br/></p>', '1514191067', '0');
INSERT INTO `t_notice` VALUES ('4', '南外仙林分校落户青龙地铁小镇', '<p><a href=\"http://nj.house.qq.com/a/20171225/001864.htm\" target=\"_blank\" style=\"cursor: pointer; color: rgb(8, 129, 222); transition: all 0.3s; font-family: &quot;Microsoft Yahei&quot;; font-size: 18px; white-space: normal;\">南外仙林分校落户青龙地铁小镇</a><a href=\"http://nj.house.qq.com/a/20171225/001864.htm\" target=\"_blank\" style=\"cursor: pointer; color: rgb(8, 129, 222); transition: all 0.3s; font-family: &quot;Microsoft Yahei&quot;; font-size: 18px; white-space: normal;\">南外仙林分校落户青龙地铁小镇</a></p>', '1514191653', '0');
INSERT INTO `t_notice` VALUES ('5', '90后老家装房被商家连坑5次 太心酸！', '<p><a href=\"http://js.qq.com/home/\" target=\"_blank\" style=\"cursor: pointer; color: rgb(51, 51, 51); transition: all 0.3s; font-family: &quot;Microsoft Yahei&quot;; font-size: 18px; white-space: normal;\">90后老家装房被商家连坑5次 太心酸！</a><a href=\"http://js.qq.com/home/\" target=\"_blank\" style=\"cursor: pointer; color: rgb(51, 51, 51); transition: all 0.3s; font-family: &quot;Microsoft Yahei&quot;; font-size: 18px; white-space: normal;\">90后老家装房被商家连坑5次 太心酸！</a><a href=\"http://js.qq.com/home/\" target=\"_blank\" style=\"cursor: pointer; color: rgb(51, 51, 51); transition: all 0.3s; font-family: &quot;Microsoft Yahei&quot;; font-size: 18px; white-space: normal;\">90后老家装房被商家连坑5次 太心酸！</a></p>', '1514191666', '0');
INSERT INTO `t_notice` VALUES ('6', '干女儿亲儿子为一套房子争了两年', '<p><a href=\"http://nj.house.qq.com/a/20171225/002074.htm\" target=\"_blank\" style=\"cursor: pointer; color: rgb(51, 51, 51); transition: all 0.3s; font-family: &quot;Microsoft Yahei&quot;; font-size: 18px; white-space: normal;\">干女儿亲儿子为一套房子争了两年</a><a href=\"http://nj.house.qq.com/a/20171225/002074.htm\" target=\"_blank\" style=\"cursor: pointer; color: rgb(51, 51, 51); transition: all 0.3s; font-family: &quot;Microsoft Yahei&quot;; font-size: 18px; white-space: normal;\">干女儿亲儿子为一套房子争了两年</a><a href=\"http://nj.house.qq.com/a/20171225/002074.htm\" target=\"_blank\" style=\"cursor: pointer; color: rgb(51, 51, 51); transition: all 0.3s; font-family: &quot;Microsoft Yahei&quot;; font-size: 18px; white-space: normal;\">干女儿亲儿子为一套房子争了两年</a><a href=\"http://nj.house.qq.com/a/20171225/002074.htm\" target=\"_blank\" style=\"cursor: pointer; color: rgb(51, 51, 51); transition: all 0.3s; font-family: &quot;Microsoft Yahei&quot;; font-size: 18px; white-space: normal;\">干女儿亲儿子为一套房子争了两年</a></p>', '1514191678', '0');
INSERT INTO `t_notice` VALUES ('7', '冬季润唇膏一天涂几次才最好？', '<p><a href=\"http://js.qq.com/health/\" target=\"_blank\" style=\"cursor: pointer; color: rgb(51, 51, 51); transition: all 0.3s; font-family: &quot;Microsoft Yahei&quot;; font-size: 18px; white-space: normal;\">冬季润唇膏一天涂几次才最好？</a><a href=\"http://js.qq.com/health/\" target=\"_blank\" style=\"cursor: pointer; color: rgb(51, 51, 51); transition: all 0.3s; font-family: &quot;Microsoft Yahei&quot;; font-size: 18px; white-space: normal;\">冬季润唇膏一天涂几次才最好？</a></p>', '1514191694', '0');
INSERT INTO `t_org` VALUES ('8', 'fffff', '0');
INSERT INTO `t_org` VALUES ('6', 'ffff', '0');
INSERT INTO `t_org` VALUES ('9', 'lll', '0');
INSERT INTO `t_rule` VALUES ('23', '桌椅摆放不整齐', '教室及公区卫生', '203', '集体', '-0.5', '');
INSERT INTO `t_rule` VALUES ('24', '地面有垃圾', '教室及公区卫生', '203', '集体', '-0.5', '');
INSERT INTO `t_rule` VALUES ('25', '精神面貌', '跑操', '204', '集体', '-0.1', '');
INSERT INTO `t_rule` VALUES ('26', '早退', '考勤', '205', '个人', '-1', '');
INSERT INTO `t_rule` VALUES ('27', '请假', '考勤', '205', '个人', '0', '');
INSERT INTO `t_rule` VALUES ('28', '栏杆有灰尘', '教室及公区卫生', '206', '集体', '-0.5', '33');
INSERT INTO `t_school` VALUES ('4', '', '2', '2', '');
INSERT INTO `t_school` VALUES ('2', '', '1', '4', '');
INSERT INTO `t_school` VALUES ('3', '', '1', '1', '');
INSERT INTO `t_school` VALUES ('5', '', '2', '1', '');
INSERT INTO `t_single` VALUES ('1', '2', '1', '请假', '考勤', '0', '小王', '5', '小王', '教务处', '1515397027', '');
INSERT INTO `t_single` VALUES ('2', '2', '1', '早退', '考勤', '-1', '小李', '20141056', '小王', '教务处', '1515397132', '');
INSERT INTO `t_topic` VALUES ('2', '中央政治局召开民主生活会 习近平主持并发表重要讲话', '/static/upload/images/20171227/20171227101813373.png', '<p><span style=\"font-family: \" microsoft=\"\" text-indent:=\"\" white-space:=\"\" background-color:=\"\">中共中央政治局于12月25日至26日召开民主生活会，以认真学习领会习近平新时代中国特色社会主义思想、坚定维护以习近平同志为核心的党中央权威和集中统一领导、全面贯彻落实党的十九大各项决策部署为主题，重点对照《中共中央政治局关于加强和维护党中央集中统一领导的若干规定》《中共中央政治局贯彻落实中央八项规定实施细则》，联系中央政治局工作，联系带头执行中央八项规定的实际，联系狠抓党的十九大决策部署的实际，进行自我检查、党性分析，开展批评和自我批评。</span></p>', '1514341093', '0', '0');
INSERT INTO `t_topic` VALUES ('3', '考研净土，必须毫无瑕疵', '', '<p style=\"margin-top: 0px; margin-bottom: 28px; word-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Helvetica, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-indent: 2em;\"><strong>项向荣 时评作者</strong></p><p style=\"margin-top: 0px; margin-bottom: 28px; word-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Helvetica, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-indent: 2em;\">近日，多名网友发微博称，2018年考研数学出现“神押题”，中试考研机构一位名叫李林的辅导老师在考前押题视频中举的例题与实际考试题十分相似。有考生表示，“每年押中几个题已经很牛了，这位老师押中线代大题原题、证明题原题也就罢了，连超纲的二阶微分都猜中，并且反复强调。”据此，不少考生怀疑考研泄题。</p><p style=\"margin-top: 0px; margin-bottom: 28px; word-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Helvetica, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-indent: 2em;\">李林是大连理工大学的教师，他自己也承认了私自在考研机构揽活的事实。新京报记者采访了李林所在的中试考研机构负责人，他对此解释说：“机构请的老师能押中题，也是多年教学的积累。”对于该机构网站介绍李林为“考研数学大纲的制定者之一”，该负责人称，这应该是网站工作人员的失误所致。目前已改为“考研数学大纲的研究者之一”。</p><p style=\"margin-top: 0px; margin-bottom: 28px; word-wrap: break-word; font-family: &quot;Microsoft Yahei&quot;, Helvetica, sans-serif; white-space: normal; background-color: rgb(255, 255, 255); text-indent: 2em;\">但是，网上的一些看法与此大相径庭。网友的普遍质疑是：数学哪有这么容易押中题的？数学解题思路千变万化，同样的知识点，换个假设条件，题目就会大相径庭。所以，数学押题，最多是知识点押中，如果真如考生所说：（李林）“讲的题跟原题很接近，还有些题基本上就是数据变了下”，甚至连超出教学大纲、一般人都不大复习的二阶微分都能猜中，那真有点神了。</p><p><br/></p>', '1514341081', '0', '0');
INSERT INTO `t_topic` VALUES ('4', '正确理解苹果“降速门”，再去讨伐它也不迟', '/static/upload/images/20171227/20171227101847886.jpg', '<p><span style=\"font-family: &quot;Microsoft Yahei&quot;, Helvetica, STHeiti, &quot;Droid Sans Fallback&quot;; text-indent: 80px; white-space: normal; background-color: rgb(255, 255, 255);\">你是苹果手机用户吗？你的苹果手机是旧款吗？如果是，你可能会非常关心最近的“降速门”问题——按照一些说法，“在新款苹果手机推出后，旧款手机变慢，修复了运行过度流畅的bug”并不再是玩笑话，认为苹果公司已经承认了“故意”使旧款手机变慢，这种手段叫做“计划报废”，目的是让用户尽快用上新款，以攫取更多利润。你相信这种说法吗？</span></p>', '1514341127', '0', '0');
INSERT INTO `t_user` VALUES ('1', '1', '王老师', '值班老师', '1', '宿舍内务及纪律');
INSERT INTO `t_user` VALUES ('2', '2', '李老师', '宿舍管理员', '1', '日常纪律');
INSERT INTO `t_zwfw_detail` VALUES ('7', '南京栖霞区迈皋桥街道办事处', '3', '南京栖霞区迈皋桥街道办事处', '南京市栖霞区迈皋桥创业园寅春路18号', '118.853020', '32.108250', '周一至周五上午8:30-下午17:30', '112', '2');
INSERT INTO `t_zwfw_project` VALUES ('9', '3333', '4');
INSERT INTO `t_zwfw_project` VALUES ('3', 'qier', '3');
INSERT INTO `t_zwfw_project` VALUES ('7', '指南', '5');
