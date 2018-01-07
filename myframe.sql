/*
MySQL Data Transfer
Source Host: localhost
Source Database: myframe
Target Host: localhost
Target Database: myframe
Date: 2018/1/7 ÐÇÆÚÈÕ ÏÂÎç 9:21:34
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for admin_user
-- ----------------------------
CREATE TABLE `admin_user` (
  `uid` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ç®¡çåç¨æ·è¡¨',
  `name` varchar(36) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ç¨æ·æµç§°',
  `pswd` char(32) COLLATE utf8_unicode_ci NOT NULL COMMENT 'å¯ç ',
  `right` text COLLATE utf8_unicode_ci NOT NULL COMMENT 'æéåè¡¨',
  PRIMARY KEY (`uid`),
  UNIQUE KEY `adminuser_s1` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for t_articlec
-- ----------------------------
CREATE TABLE `t_articlec` (
  `articleid` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(360) COLLATE utf8_unicode_ci NOT NULL COMMENT 'æç« æ é¢',
  `type` int(11) NOT NULL DEFAULT '0' COMMENT 'åç±»ID',
  `img` varchar(360) COLLATE utf8_unicode_ci DEFAULT '' COMMENT 'ç¼©ç¥å¾',
  `from` varchar(120) COLLATE utf8_unicode_ci DEFAULT '' COMMENT 'æ¥èª',
  `content` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'åå®¹',
  `order` int(11) NOT NULL DEFAULT '999999' COMMENT 'æåº',
  `url` varchar(1200) COLLATE utf8_unicode_ci DEFAULT '' COMMENT 'å¤é¨é¾æ¥',
  `dateline` int(11) NOT NULL DEFAULT '0' COMMENT 'åå¸æ¶é´',
  `viewcount` int(11) NOT NULL DEFAULT '0' COMMENT 'éè¯»é',
  `goodcount` int(11) NOT NULL DEFAULT '0' COMMENT 'ç¹èµé',
  PRIMARY KEY (`articleid`),
  KEY `articlec_s1` (`type`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for t_articlec_type
-- ----------------------------
CREATE TABLE `t_articlec_type` (
  `typeid` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(720) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `img` varchar(720) COLLATE utf8_unicode_ci NOT NULL,
  `desc` varchar(1200) COLLATE utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL DEFAULT '999999' COMMENT 'æåº',
  PRIMARY KEY (`typeid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for t_carousel
-- ----------------------------
CREATE TABLE `t_carousel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(360) COLLATE utf8_unicode_ci NOT NULL COMMENT 'æ é¢',
  `img` varchar(360) COLLATE utf8_unicode_ci DEFAULT '' COMMENT 'ç¼©ç¥å¾',
  `content` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'åå®¹',
  `date` int(11) NOT NULL DEFAULT '0' COMMENT 'åå¸æ¶é´',
  `viewcount` int(11) NOT NULL DEFAULT '0' COMMENT 'éè¯»é',
  `goodcount` int(11) NOT NULL DEFAULT '0' COMMENT 'ç¹èµé',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for t_dept
-- ----------------------------
CREATE TABLE `t_dept` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'åºå·',
  `deptid` int(11) NOT NULL DEFAULT '300' COMMENT 'é¨é¨ç¼å·',
  `name` varchar(360) COLLATE utf8_unicode_ci DEFAULT '' COMMENT 'é¨é¨åç§°',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for t_family
-- ----------------------------
CREATE TABLE `t_family` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'åºå·',
  `ruleid` int(11) NOT NULL DEFAULT '200' COMMENT 'ç±»å«ç¼å·',
  `category` varchar(360) COLLATE utf8_unicode_ci DEFAULT '' COMMENT 'ç±»å«åç§°',
  `deptid` int(11) NOT NULL DEFAULT '200' COMMENT 'é¨é¨ç¼å·',
  `dept` varchar(80) COLLATE utf8_unicode_ci DEFAULT '' COMMENT 'é¨é¨',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for t_grade
-- ----------------------------
CREATE TABLE `t_grade` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(360) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'å­¦æ ¡å',
  `grade` int(11) DEFAULT '0' COMMENT 'å¹´çº§',
  `content` longtext COLLATE utf8_unicode_ci COMMENT 'å¤æ³¨',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for t_group
-- ----------------------------
CREATE TABLE `t_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'åºå·',
  `grade` int(11) NOT NULL DEFAULT '0' COMMENT 'å¹´çº§',
  `class` int(11) NOT NULL DEFAULT '0' COMMENT 'ç­çº§',
  `project` varchar(360) COLLATE utf8_unicode_ci DEFAULT '' COMMENT 'é¡¹ç®',
  `family` varchar(360) COLLATE utf8_unicode_ci DEFAULT '' COMMENT 'ç±»å«',
  `ruleid` int(11) NOT NULL DEFAULT '200' COMMENT 'ç±»å«ç¼å·',
  `val` float NOT NULL DEFAULT '0' COMMENT 'åå¼',
  `name` varchar(360) COLLATE utf8_unicode_ci DEFAULT '' COMMENT 'è®°å½äºº',
  `dept` varchar(360) COLLATE utf8_unicode_ci DEFAULT '' COMMENT 'æ£æ¥é¨é¨',
  `date` int(11) NOT NULL DEFAULT '0' COMMENT 'æ£æ¥æ¶é´',
  `content` longtext COLLATE utf8_unicode_ci COMMENT 'å¤æ³¨',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for t_notice
-- ----------------------------
CREATE TABLE `t_notice` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(360) COLLATE utf8_unicode_ci NOT NULL COMMENT 'æ é¢',
  `content` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'åå®¹',
  `date` int(11) NOT NULL DEFAULT '0' COMMENT 'åå¸æ¶é´',
  `viewcount` int(11) NOT NULL DEFAULT '0' COMMENT 'éè¯»é',
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
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ç¼å·',
  `project` varchar(360) COLLATE utf8_unicode_ci NOT NULL COMMENT 'é¡¹ç®',
  `family` varchar(360) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ç±»å«',
  `objects` varchar(360) COLLATE utf8_unicode_ci NOT NULL COMMENT 'å¯¹è±¡',
  `val` float NOT NULL DEFAULT '0' COMMENT 'åå¼',
  `comments` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'å¤æ³¨',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for t_rule
-- ----------------------------
CREATE TABLE `t_rule` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'åºå·',
  `project` varchar(360) COLLATE utf8_unicode_ci NOT NULL COMMENT 'é¡¹ç®',
  `family` varchar(360) COLLATE utf8_unicode_ci NOT NULL COMMENT 'ç±»å«',
  `ruleid` int(11) NOT NULL DEFAULT '200' COMMENT 'ç±»å«ç¼å·',
  `objects` varchar(360) COLLATE utf8_unicode_ci NOT NULL COMMENT 'å¯¹è±¡',
  `val` float NOT NULL DEFAULT '0' COMMENT 'åå¼',
  `comments` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'å¤æ³¨',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for t_school
-- ----------------------------
CREATE TABLE `t_school` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit` varchar(360) COLLATE utf8_unicode_ci NOT NULL COMMENT 'å­¦æ ¡å',
  `grade` int(11) NOT NULL DEFAULT '0' COMMENT 'å¹´çº§',
  `class` int(11) NOT NULL DEFAULT '0' COMMENT 'ç­çº§',
  `content` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'å¤æ³¨',
  PRIMARY KEY (`id`),
  UNIQUE KEY `unid` (`class`,`grade`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for t_topic
-- ----------------------------
CREATE TABLE `t_topic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(360) COLLATE utf8_unicode_ci NOT NULL COMMENT 'æ é¢',
  `img` varchar(360) COLLATE utf8_unicode_ci DEFAULT '' COMMENT 'ç¼©ç¥å¾',
  `content` longtext COLLATE utf8_unicode_ci NOT NULL COMMENT 'åå®¹',
  `date` int(11) NOT NULL DEFAULT '0' COMMENT 'åå¸æ¶é´',
  `viewcount` int(11) NOT NULL DEFAULT '0' COMMENT 'éè¯»é',
  `goodcount` int(11) NOT NULL DEFAULT '0' COMMENT 'ç¹èµé',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for t_user
-- ----------------------------
CREATE TABLE `t_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'åºå·',
  `uid` int(11) NOT NULL DEFAULT '0' COMMENT 'ç¨æ·å­¦å·',
  `name` varchar(360) COLLATE utf8_unicode_ci DEFAULT '' COMMENT 'ç¨æ·å§å',
  `dept` varchar(360) COLLATE utf8_unicode_ci DEFAULT '' COMMENT 'æ£æ¥é¨é¨',
  `right` int(11) NOT NULL DEFAULT '1' COMMENT 'ç¨æ·æé',
  `type` varchar(360) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for t_zwfw_detail
-- ----------------------------
CREATE TABLE `t_zwfw_detail` (
  `projectid` int(11) NOT NULL DEFAULT '1' COMMENT 'æå¡ç¼å·',
  `name` varchar(36) COLLATE utf8_unicode_ci DEFAULT '' COMMENT 'æå¡åç§°',
  `titleid` int(11) NOT NULL DEFAULT '1' COMMENT 'æ é¢ç¼å·',
  `title` varchar(36) COLLATE utf8_unicode_ci NOT NULL COMMENT 'åå¬æ é¢',
  `address` varchar(720) COLLATE utf8_unicode_ci DEFAULT '' COMMENT 'å°å',
  `lng` decimal(10,6) NOT NULL DEFAULT '116.306070' COMMENT 'ç»åº¦',
  `lat` decimal(10,6) NOT NULL DEFAULT '39.982163' COMMENT 'çº¬åº¦',
  `worktime` varchar(360) COLLATE utf8_unicode_ci DEFAULT '' COMMENT 'åå¬æ¶é´',
  `tel` varchar(15) COLLATE utf8_unicode_ci DEFAULT '' COMMENT 'å¨è¯¢çµè¯',
  `order` int(11) NOT NULL AUTO_INCREMENT COMMENT 'æåº',
  PRIMARY KEY (`order`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Table structure for t_zwfw_project
-- ----------------------------
CREATE TABLE `t_zwfw_project` (
  `projectid` int(11) NOT NULL DEFAULT '1' COMMENT 'æå¡ç¼å·',
  `name` varchar(36) COLLATE utf8_unicode_ci DEFAULT '' COMMENT 'æå¡åç§°',
  `order` int(11) NOT NULL AUTO_INCREMENT COMMENT 'æåº',
  PRIMARY KEY (`order`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records 
-- ----------------------------
INSERT INTO `admin_user` VALUES ('1', 'admin', '4a7d1ed414474e4033ac29ccb8653d9b', '1');
INSERT INTO `t_carousel` VALUES ('1', 'âæ§æ¬¾è¹æææºä¼åæ¢âä»ç¬è¯åç°å®', '/static/upload/images/20171227/20171227224328403.png', '<p data-page-model=\"text\" style=\"margin-top: 0px; margin-bottom: 0px; padding-bottom: 10px; line-height: 34px; text-indent: 2em; font-family: \" microsoft=\"\" droid=\"\" sans=\"\" white-space:=\"\" background-color:=\"\">è¹æå¬å¸éåååºäºå£°æï¼è¡¨ç¤ºå®åå¸è¿çä¸é¡¹âåè½âä¼éä½æ§è®¾å¤çå¤çè½åï¼ä»¥é²æ­¢è®¾å¤çªç¶å³é­ãè¹æè¡¨ç¤ºï¼è¿ç§éä½æ¯å¿è¦çï¼å ä¸ºä¸ç¶çè¯ï¼æ§çµæ± å¯è½ä¼ç»å¸¸è¶è´è·ã</p><p data-page-model=\"text\" style=\"margin-top: 0px; margin-bottom: 0px; padding-bottom: 10px; line-height: 34px; text-indent: 2em; font-family: \" microsoft=\"\" droid=\"\" sans=\"\" white-space:=\"\" background-color:=\"\">è¿ä¸ªå£°æå ä¹æ²¡æèµ·å°æ¾æ¸çä½ç¨ï¼åèä¼¼ä¹æ¯å°è¯äºâææä½¿æ§æ¬¾ææºåæ¢âçè¯´æ³ãç¾å½å·²ç»æè¹æç¨æ·æèµ·äºè¯è®¼ï¼è®¤ä¸ºè¿æ¯âæ¬ºè¯âã</p><p><br/></p>', '1514385808', '0', '0');
INSERT INTO `t_carousel` VALUES ('2', 'å¨çäºå¤§æè´µæ°ç¨æ äººæº ä»é±ä½ ä¹ä¹°å¾å°', '/static/upload/images/20171227/20171227224355937.png', '<p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; line-height: 2.2; font-family: \" microsoft=\"\" segoe=\"\" hiragino=\"\" sans=\"\" wenquanyi=\"\" micro=\"\" font-size:=\"\" white-space:=\"\">æ äººæºé¤äºå¨±ä¹ç¨éï¼éæ©å¾å®äº¦è½ç«èèå¸ãä¸å°ä»·æ ¼éä¸è¬åºä¼çé«ç«¯æ äººæºå¤ç¨äºåäºãåä¸åæ¿åºäºå¡ï¼ä½å¶å®åªè¦ä»å¾èµ·é±ï¼è¿äºæ äººæºä¹è½å½äºç§æãæ¬ç¯ä¸å¤§å®¶ä¸èµ·çç 5 æ¬¾æµéäºå¸é¢çå¨çæè´µæ äººæºï¼å¨å¤ä½¿ç¨ç®ä¸ç®å¦ç±»ç«å¯äºï¼</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; line-height: 2.2; font-family: \" microsoft=\"\" segoe=\"\" hiragino=\"\" sans=\"\" wenquanyi=\"\" micro=\"\" font-size:=\"\" white-space:=\"\">ãã<span style=\"font-weight: bolder;\">1 å¯è½½äººæ äººæº EHang 184 ï¼ 300,000 ç¾å</span></p><p><br/></p>', '1514385835', '0', '0');
INSERT INTO `t_carousel` VALUES ('3', 'åªä½åé¡¾2017åå¤§PC ThinkPadä¸æ¦', '/static/upload/images/20171227/20171227224405373.png', '<p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; line-height: 2.2; font-family: \" microsoft=\"\" segoe=\"\" hiragino=\"\" sans=\"\" wenquanyi=\"\" micro=\"\" font-size:=\"\" white-space:=\"\">ãè¦æ¯æPCï¼ççè¿åä¸ªå¤ä¸å¤åéã</p><p class=\"one-p\" style=\"margin-top: 0px; margin-bottom: 2em; line-height: 2.2; font-family: \" microsoft=\"\" segoe=\"\" hiragino=\"\" sans=\"\" wenquanyi=\"\" micro=\"\" font-size:=\"\" white-space:=\"\">ããåæ¯æ¥å¸¸éè¦çç§æäº§åï¼ææºå¸åºè¡¨ç°ç«ç­ï¼èPCè¡ä¸å´æ¾å¾æäºå·æ¸ãå½ç¶ï¼å¨è¿âåPCâæ¶ä»£ï¼è¿ç§æåµå¹¶ä¸ä¸ºå¥ãè¿å å¹´ï¼PCååä¸ç´å¨å¯»æ¾æ°çåºè·¯ï¼å°±ç®åæ¥çï¼åç¨åæ¸¸ææ¬æäºä¸¤ä¸ªæå¤§çå¸æã</p><p><br/></p>', '1514385845', '0', '0');
INSERT INTO `t_dept` VALUES ('1', '103', 'å¼ç­èå¸');
INSERT INTO `t_dept` VALUES ('2', '102', 'å­¦çä¼');
INSERT INTO `t_dept` VALUES ('4', '101', 'å®¿èç®¡çå');
INSERT INTO `t_family` VALUES ('1', '201', 'å®¿èåå¡åçºªå¾', '103', 'å¼ç­èå¸');
INSERT INTO `t_family` VALUES ('2', '202', 'æ¥å¸¸çºªå¾', '103', 'å¼ç­èå¸');
INSERT INTO `t_family` VALUES ('3', '203', 'æå®¤åå¬åºå«ç', '103', 'å¼ç­èå¸');
INSERT INTO `t_family` VALUES ('4', '204', 'è·æ', '102', 'å­¦çä¼');
INSERT INTO `t_grade` VALUES ('2', '', '2', '');
INSERT INTO `t_grade` VALUES ('3', '', '3', '');
INSERT INTO `t_group` VALUES ('1', '2', '1', 'å°é¢æåå¾', 'æå®¤åå¬åºå«ç', '0', '-0.5', 'å°ç', 'æå¡å¤', '1515325599', '');
INSERT INTO `t_group` VALUES ('2', '2', '1', 'ç²¾ç¥é¢è²', 'è·æ', '0', '-0.1', 'å°ç', 'æå¡å¤', '1515328290', '');
INSERT INTO `t_person` VALUES ('1', 'qqq', 'qqq', 'qqqq', '-2', 'www');
INSERT INTO `t_person` VALUES ('2', 'sss', 'ddd', 'dddd', '1', 'cccc');
INSERT INTO `t_person` VALUES ('3', 'cdd', 'ddf', 'ssaa', '0.6', 'dff');
INSERT INTO `t_rule` VALUES ('23', 'æ¡æ¤ææ¾ä¸æ´é½', 'æå®¤åå¬åºå«ç', '203', 'éä½', '-0.5', '');
INSERT INTO `t_rule` VALUES ('24', 'å°é¢æåå¾', 'æå®¤åå¬åºå«ç', '203', 'éä½', '-0.5', '');
INSERT INTO `t_rule` VALUES ('25', 'ç²¾ç¥é¢è²', 'è·æ', '204', 'éä½', '-0.1', '');
INSERT INTO `t_school` VALUES ('4', '', '2', '2', '');
INSERT INTO `t_school` VALUES ('2', '', '1', '4', '');
INSERT INTO `t_school` VALUES ('3', '', '1', '1', '');
INSERT INTO `t_school` VALUES ('5', '', '2', '1', '');
INSERT INTO `t_topic` VALUES ('1', 'å¨å¶ä»ï¼æ°´å¤§é±¼å¤§ æ°´æµé±¼æââè¯»å´ææ³¢æ°ä¹¦', '/static/upload/images/20171227/20171227222000513.png', '<p data-page-model=\"text\" style=\"margin-top: 30px; margin-bottom: 30px; border: 0px; line-height: 28px; color: rgb(51, 51, 51); text-indent: 2em; font-family: simsun, å®ä½; white-space: normal; background-color: rgb(255, 255, 255);\">å¤©å°±æ¯å´ç»è¿æ¬ä¹¦ï¼å¬ææ³¢æ¼è®²ãè¦æåè¨ï¼å°±è®²å å¥éè¯»çæåãè¿æ¯ä¸æ¬å¥½ä¹¦ãæè®©äººæ¬£èµä¹å¤ï¼æ¯ä½åæå±ç¤ºçé£ç§è§å¯ä¸è§£æè½åï¼å¯¹è¿åå¹´ä¸­å½å¸åºä¸ä¼ä¸æ³¢æ¾å£®éçåè¿ï¼ä½åºå¨æ¯å¼ç²¾å½©è®°å½ãé¢æéå¤§ï¼è¯é¢ä¸¥èï¼ä¸è¿è¯»çè¯»çï¼æå å¤è½è®©ä½ ç¬åºå£°æ¥ãå±ä»¬ä¸å¦¨ä¸èµ·æ¥ä½éªä¸ä¾ã<span style=\"text-indent: 2em;\">æ¶è´­æ²å°æ²ãå¬è¿ä¸æ®µï¼âæä¹¦ç¦æ»è½æåºäººææçæ¬¢ä¹å¸¦å°è°å¤æ¡ä¸ãä¸æ¬¡ä¸å·¥ä¼è°å¤ï¼ç°åºæ°æ°å¾ç´§å¼ </span></p><p><br/></p>', '1514385270', '0', '0');
INSERT INTO `t_topic` VALUES ('2', 'ééæ1.39äº¿é¾ææ¯æä¹åäº', '/static/upload/images/20171227/20171227222049205.jpg', '<p data-page-model=\"text\" style=\"margin-top: 24px; margin-bottom: 24px; border: 0px; vertical-align: baseline; word-wrap: break-word; font-size: medium; line-height: 28px;\" microsoft=\"\" white-space:=\"\" background-color:=\"\">æ®äºè§£ï¼é¾æ1.39äº¿å¹¶éééæèªå·±çäº§åï¼èæ¯ééæâä»£éâçå¤§åè¯å¸èµç®¡è®¡åï¼å±æ118åæèµäººæèµäºè¯¥äº§åï¼æ¬éåæ¶çæ»éé¢ä¸º1.39äº¿åã<span style=\"border: 0px; vertical-align: baseline; color: rgb(192, 0, 0);\"><strong style=\"border: 0px; vertical-align: baseline;\">å°Méè¿æ¥è¯¢åç°ï¼è¿ä¸ªäº§åçä¸»è¦ä¿¡æ¯æï¼ç®¡çäººï¼å¤§åè¯å¸æéè´£ä»»å¬å¸ï¼åéè§æ¨¡1.5äº¿ï¼åéæèµ·å§æ¥æä¸º2016å¹´12æ1æ¥ï¼å°ææ¥ä¸º2017å¹´12æ7æ¥ï¼åçº¢æ¹å¼ä¸ºç°éåçº¢ï¼æ¯å¦ä¿æ¬ï¼ä¸ä¿æ¬ï¼âæèµæ çæ¹âï¼å±±ä¸é¾åçç©ç§æè¡</strong></span></p>', '1514385246', '0', '0');
INSERT INTO `t_user` VALUES ('1', '1', 'çèå¸', 'å¼ç­èå¸', '1', 'å®¿èåå¡åçºªå¾');
INSERT INTO `t_user` VALUES ('2', '2', 'æèå¸', 'å®¿èç®¡çå', '1', 'æ¥å¸¸çºªå¾');
