# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Host: 127.0.0.1 (MySQL 5.7.24)
# Database: main_db
# Generation Time: 2018-10-31 23:21:47 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Dump of table blind_secrets_long_random_unpredictable_table_name
# ------------------------------------------------------------

DROP TABLE IF EXISTS `blind_secrets_long_random_unpredictable_table_name`;

CREATE TABLE `blind_secrets_long_random_unpredictable_table_name` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `junk1` int(11) DEFAULT NULL,
  `junk2` int(11) DEFAULT NULL,
  `super_long_secret_column` varchar(256) NOT NULL DEFAULT '',
  `junk3` int(11) DEFAULT NULL,
  `junk4` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `blind_secrets_long_random_unpredictable_table_name` WRITE;
/*!40000 ALTER TABLE `blind_secrets_long_random_unpredictable_table_name` DISABLE KEYS */;

INSERT INTO `blind_secrets_long_random_unpredictable_table_name` (`id`, `junk1`, `junk2`, `super_long_secret_column`, `junk3`, `junk4`)
VALUES
	(1,NULL,NULL,'My secret is not all that long.',NULL,NULL);

/*!40000 ALTER TABLE `blind_secrets_long_random_unpredictable_table_name` ENABLE KEYS */;
UNLOCK TABLES;


# Dump of table blind_users
# ------------------------------------------------------------

DROP TABLE IF EXISTS `blind_users`;

CREATE TABLE `blind_users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(36) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

LOCK TABLES `blind_users` WRITE;
/*!40000 ALTER TABLE `blind_users` DISABLE KEYS */;

INSERT INTO `blind_users` (`id`, `username`)
VALUES
	(1,'admin'),
	(2,'abel'),
	(3,'gauss'),
	(4,'fermat'),
	(5,'fourier'),
	(6,'pascal'),
	(7,'fibonacci');

/*!40000 ALTER TABLE `blind_users` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
