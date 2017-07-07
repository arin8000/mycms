# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.5.42)
# Database: mycms
# Generation Time: 2017-06-19 15:29:38 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table categories
# ------------------------------------------------------------

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `cat_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `cat_title` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`cat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;

INSERT INTO `categories` (`cat_id`, `cat_title`)
VALUES
	(1,'World News'),
	(2,'Asia News'),
	(3,'Sports'),
	(4,'Showbiz'),
	(5,'Politics');

/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `post_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` int(10) DEFAULT NULL,
  `post_title` varchar(100) DEFAULT '',
  `post_date` text,
  `post_author` varchar(50) DEFAULT NULL,
  `post_keywords` text,
  `post_image` text,
  `post_content` text,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`post_id`, `category_id`, `post_title`, `post_date`, `post_author`, `post_keywords`, `post_image`, `post_content`)
VALUES
	(2,0,'asdf','0','asdfa','','Nairi.PDF','<p>asdfasdfasdfasdf</p>'),
	(3,0,'This is 2nd post','0','Arin Yaghoubi','','logo-img.png','<p>Welcome to my post</p>'),
	(4,0,'3rd post','2017-06-18 21:39:32','asdfa','','Office Lens 20170523-223302.jpg','<p>asdfasdfasdfasdf</p>'),
	(5,2,'4rd post','2017-06-18 22:17:54','Arin Yaghoubi','','5735_1081300287310_1670400461_93216_7891845_n (1).jpg','<p>This is a test</p>');

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
