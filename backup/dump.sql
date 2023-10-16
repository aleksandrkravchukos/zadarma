-- Adminer 4.8.1 MySQL 5.7.43 dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `avatars`;
CREATE TABLE `avatars` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `contact_id` int(11) DEFAULT NULL,
  `path` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `contact_id` (`contact_id`),
  CONSTRAINT `avatars_ibfk_1` FOREIGN KEY (`contact_id`) REFERENCES `contacts` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `contacts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `contacts` (`id`, `user_id`, `name`, `last_name`, `email`, `phone`) VALUES
(1,	7,	'tetete',	'fghgjhg',	'testhgfhgnvnb@gmail.com',	'2345678'),
(2,	14,	'tedgfv11',	'Tedhfg11',	'test@gmail1.com',	'yfghjkl11');

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1,	'user',	'admin@admin.com',	'6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b'),
(7,	'test',	'test@gmail.com',	'6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b'),
(8,	'dfghj',	'qqq@gmail.com',	'd5ce2b19fbda14a25deac948154722f33efd37b369a32be8f03ec2be8ef7d3a5'),
(9,	'gfhvjbknl',	'fghj@gmail.com',	'6b86b273ff34fce19d6b804eff5a3f5747ada4eaa22f1d49c01e52ddb7875b4b'),
(12,	'fdghjk',	'testtt@gmail.com',	'61ae1cdc98f88384be4a18af84c4114a5ddff21f0d176b40f8d53e530c3e9c88'),
(13,	'yetytutyiuiklj',	'rrrrrr@gmail.com',	'61ae1cdc98f88384be4a18af84c4114a5ddff21f0d176b40f8d53e530c3e9c88'),
(14,	'test',	'r@gmail.com',	'61ae1cdc98f88384be4a18af84c4114a5ddff21f0d176b40f8d53e530c3e9c88');

-- 2023-10-14 08:58:39
