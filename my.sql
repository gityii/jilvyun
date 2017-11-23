/*
MySQL Backup
Source Server Version: 3.21.0
Source Database: qixiaxuanchuanbu
Date: 2017/9/15 17:07:17
*/


-- ----------------------------
--  Table structure for `t_admin_user`
-- ----------------------------
DROP TABLE IF EXISTS `admin_user`;
CREATE TABLE `admin_user` (
  `uid` int(11) NOT NULL auto_increment COMMENT '管理员用户表',
  `name` varchar(36) collate utf8_unicode_ci NOT NULL COMMENT '用户昵称',
  `pswd` char(32) collate utf8_unicode_ci NOT NULL COMMENT '密码',
  `right` text collate utf8_unicode_ci NOT NULL COMMENT '权限列表',
  PRIMARY KEY  (`uid`),
  UNIQUE KEY `adminuser_s1` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


-- ----------------------------
--  Table structure for `t_org`
-- ----------------------------
DROP TABLE IF EXISTS `t_org`;
CREATE TABLE `t_org` (
  `orgid` int(11) NOT NULL auto_increment,
  `orgname` varchar(72) collate utf8_unicode_ci NOT NULL,
  `viewcount` int(11) NOT NULL default '0',
  PRIMARY KEY  (`orgid`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;



DROP TABLE IF EXISTS `t_articlec_type`;
CREATE TABLE `t_articlec_type` (
  `typeid` int(11) NOT NULL auto_increment,
  `name` varchar(720) collate utf8_unicode_ci NOT NULL default '',
  `img` varchar(720) collate utf8_unicode_ci NOT NULL,
  `desc` varchar(1200) collate utf8_unicode_ci NOT NULL,
  `order` int(11) NOT NULL default '999999' COMMENT '排序',
  PRIMARY KEY  (`typeid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;




DROP TABLE IF EXISTS `t_articlec`;
CREATE TABLE `t_articlec` (
  `articleid` int(11) NOT NULL auto_increment,
  `title` varchar(360) collate utf8_unicode_ci NOT NULL COMMENT '文章标题',
  `type` int(11) NOT NULL default '0' COMMENT '分类ID',
  `img` varchar(360) collate utf8_unicode_ci default '' COMMENT '缩略图',
  `from` varchar(120) collate utf8_unicode_ci default '' COMMENT '来自',
  `content` longtext collate utf8_unicode_ci NOT NULL COMMENT '内容',
  `order` int(11) NOT NULL default '999999' COMMENT '排序',
  `url` varchar(1200) collate utf8_unicode_ci default '' COMMENT '外部链接',
  `dateline` int(11) NOT NULL default '0' COMMENT '发布时间',
  `viewcount` int(11) NOT NULL default '0' COMMENT '阅读量',
  `goodcount` int(11) NOT NULL default '0' COMMENT '点赞量',
  PRIMARY KEY  (`articleid`),
  KEY `articlec_s1` (`type`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `qixia_project_detail`
-- ----------------------------
DROP TABLE IF EXISTS `t_zwfw_detail`;
CREATE TABLE `t_zwfw_detail` (
  `projectid` int(11) NOT NULL default '1' COMMENT '服务编号',
  `name` varchar(36) collate utf8_unicode_ci default '' COMMENT '服务名称',
  `titleid` int(11) NOT NULL default '1' COMMENT '标题编号',
  `title` varchar(36) collate utf8_unicode_ci NOT NULL COMMENT '办公标题',
  `address` varchar(720) collate utf8_unicode_ci default '' COMMENT '地址',
  `lng`   decimal(10,6) NOT NULL default '116.306070' COMMENT '经度',
  `lat`   decimal(10,6) NOT NULL default '39.982163' COMMENT '纬度',
  `worktime` varchar(360) collate utf8_unicode_ci default '' COMMENT '办公时间',
  `tel` varchar(15) collate utf8_unicode_ci default '' COMMENT '咨询电话',
  `order` int(11) NOT NULL auto_increment COMMENT '排序',
  PRIMARY KEY  (`order`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Table structure for `t_zwfw_project`
-- ----------------------------
DROP TABLE IF EXISTS `t_zwfw_project`;
CREATE TABLE `t_zwfw_project` (
  `projectid` int(11) NOT NULL default '1' COMMENT '服务编号',
  `name` varchar(36) collate utf8_unicode_ci default '' COMMENT '服务名称',
  `order` int(11) NOT NULL auto_increment COMMENT '排序',
  PRIMARY KEY  (`order`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
