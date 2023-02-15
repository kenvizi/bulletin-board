-- --------------------------------------------------------

--
-- database `bbs` 
--

CREATE DATABASE IF NOT EXISTS `bbs` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `bbs`;

-- --------------------------------------------------------

--
-- table `t_board`
--

CREATE TABLE IF NOT EXISTS `t_board` (
  `index` int(4) NOT NULL auto_increment,
  `writer` varchar(40) character set utf8 collate utf8_unicode_ci NOT NULL,
  `subject` varchar(100) character set utf8 collate utf8_unicode_ci NOT NULL,
  `message` text character set utf8 collate utf8_unicode_ci NOT NULL,
  `registerTime` timestamp NOT NULL default CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP,
  `filename` varchar(100) character set utf8 collate utf8_unicode_ci NOT NULL,
  PRIMARY KEY  (`index`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;