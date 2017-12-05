
DROP TABLE IF EXISTS `t_person`;
CREATE TABLE `t_person` (
  `id` int(11) NOT NULL auto_increment  COMMENT '编号',
  `project` varchar(360) collate utf8_unicode_ci NOT NULL COMMENT '项目',
  `family` varchar(360) collate utf8_unicode_ci NOT NULL COMMENT '类别',
  `objects` varchar(360) collate utf8_unicode_ci NOT NULL COMMENT '对象',
  `val` float NOT NULL default '0' COMMENT '分值',
  `comments` longtext collate utf8_unicode_ci NOT NULL COMMENT '备注',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

