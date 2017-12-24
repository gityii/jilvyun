
DROP TABLE IF EXISTS `t_rule`;
CREATE TABLE `t_rule` (
  `id` int(11) NOT NULL auto_increment  COMMENT '序号',
  `project` varchar(360) collate utf8_unicode_ci NOT NULL COMMENT '项目',
  `family` varchar(360) collate utf8_unicode_ci NOT NULL COMMENT '类别',
 `ruleid` int(11) NOT NULL default '200' COMMENT '类别编号',
  `objects` varchar(360) collate utf8_unicode_ci NOT NULL COMMENT '对象',
  `val` float NOT NULL default '0' COMMENT '分值',
  `comments` longtext collate utf8_unicode_ci NOT NULL COMMENT '备注',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `t_family`;
CREATE TABLE `t_family` (
  `id` int(11) NOT NULL auto_increment COMMENT '序号',
  `ruleid` int(11) NOT NULL default '200' COMMENT '类别编号',
  `name` varchar(360) collate utf8_unicode_ci default '' COMMENT '类别名称',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `t_user`;
CREATE TABLE `t_user` (
  `id` int(11) NOT NULL auto_increment COMMENT '序号',
  `type`  varchar(360) collate utf8_unicode_ci NOT NULL COMMENT '用户类型',
  `name`  varchar(360) collate utf8_unicode_ci NOT NULL COMMENT '用户姓名',
  `uid` int(11) NOT NULL default '0000' COMMENT '用户学号',
  `dept` varchar(360) collate utf8_unicode_ci NOT NULL COMMENT '检查部门',
  `right`  text collate utf8_unicode_ci NOT NULL COMMENT '权限列表',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;


DROP TABLE IF EXISTS `t_dept`;
CREATE TABLE `t_dept` (
  `id` int(11) NOT NULL auto_increment COMMENT '序号',
  `deptid` int(11) NOT NULL default '300' COMMENT '部门编号',
  `name` varchar(360) collate utf8_unicode_ci default '' COMMENT '部门名称',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `t_notice`;
CREATE TABLE `t_notice` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(360) collate utf8_unicode_ci NOT NULL COMMENT '标题',
  `content` longtext collate utf8_unicode_ci NOT NULL COMMENT '内容',
  `date` int(11) NOT NULL default '0' COMMENT '发布时间',
  `viewcount` int(11) NOT NULL default '0' COMMENT '阅读量',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

DROP TABLE IF EXISTS `t_topic`;
CREATE TABLE `t_topic` (
  `id` int(11) NOT NULL auto_increment,
  `title` varchar(360) collate utf8_unicode_ci NOT NULL COMMENT '标题',
  `content` longtext collate utf8_unicode_ci NOT NULL COMMENT '内容',
  `date` int(11) NOT NULL default '0' COMMENT '发布时间',
  `viewcount` int(11) NOT NULL default '0' COMMENT '阅读量',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;










