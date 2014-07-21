# --------------------------------------------------------
# Host:                         127.0.0.1
# Server version:               5.1.53-community-log
# Server OS:                    Win64
# HeidiSQL version:             6.0.0.3603
# Date/time:                    2013-05-08 10:44:54
# --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

# Dumping database structure for inventory
DROP DATABASE IF EXISTS `inventory`;
CREATE DATABASE IF NOT EXISTS `inventory` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `inventory`;


# Dumping structure for table inventory.tbl_brand
DROP TABLE IF EXISTS `tbl_brand`;
CREATE TABLE IF NOT EXISTS `tbl_brand` (
  `brand_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `brand` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

# Dumping data for table inventory.tbl_brand: 8 rows
/*!40000 ALTER TABLE `tbl_brand` DISABLE KEYS */;
INSERT INTO `tbl_brand` (`brand_id`, `brand`) VALUES
	(1, 'DELL'),
	(2, 'HP'),
	(3, 'ACCER'),
	(4, 'TOSHIBA'),
	(5, 'Lenovo'),
	(6, 'Apple'),
	(7, 'hello World'),
	(8, 'taasdf');
/*!40000 ALTER TABLE `tbl_brand` ENABLE KEYS */;


# Dumping structure for table inventory.tbl_category
DROP TABLE IF EXISTS `tbl_category`;
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `cat_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

# Dumping data for table inventory.tbl_category: 8 rows
/*!40000 ALTER TABLE `tbl_category` DISABLE KEYS */;
INSERT INTO `tbl_category` (`cat_id`, `category`) VALUES
	(1, 'Laptop'),
	(2, 'Desktop'),
	(3, 'Printer'),
	(4, 'Monitor'),
	(5, 'Server'),
	(6, 'Projector'),
	(23, 'test'),
	(24, 'hello world');
/*!40000 ALTER TABLE `tbl_category` ENABLE KEYS */;


# Dumping structure for table inventory.tbl_history
DROP TABLE IF EXISTS `tbl_history`;
CREATE TABLE IF NOT EXISTS `tbl_history` (
  `history_id` int(10) NOT NULL AUTO_INCREMENT,
  `stock_id` int(10) NOT NULL DEFAULT '0',
  `code` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `serial_number` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `category` varchar(255) CHARACTER SET utf8 DEFAULT '0',
  `brand` varchar(255) CHARACTER SET utf8 DEFAULT '0',
  `model` varchar(255) CHARACTER SET utf8 DEFAULT '0',
  `location` varchar(255) CHARACTER SET utf8 DEFAULT '0',
  `status` varchar(255) CHARACTER SET utf8 DEFAULT '0',
  `username` varchar(10) CHARACTER SET utf8 NOT NULL DEFAULT '0',
  `date_import` varchar(50) CHARACTER SET utf8 DEFAULT '1',
  `date_created` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `remark` text CHARACTER SET utf8,
  `do_action` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`history_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

# Dumping data for table inventory.tbl_history: 19 rows
/*!40000 ALTER TABLE `tbl_history` DISABLE KEYS */;
INSERT INTO `tbl_history` (`history_id`, `stock_id`, `code`, `serial_number`, `category`, `brand`, `model`, `location`, `status`, `username`, `date_import`, `date_created`, `remark`, `do_action`) VALUES
	(1, 1, NULL, 'sd', '24', '3', '0', '0', '1', '2', '2012-07-09', '2012-07-10 00:56:42', NULL, 'add new'),
	(2, 1, 'sss', 'sd', '24', '3', '0', '9', '2', '2', '2012-07-09', '2012-07-10 00:56:53', 'ss', 'update'),
	(3, 1, 'sss', 'sd', '24', '3', '0', '9', '3', '2', '2012-07-09', '2012-07-10 12:03:24', 'it is error harddish', 'update'),
	(4, 1, 'sss', 'sd', '24', '3', '0', '9', '2', '2', '2012-07-09', '2012-07-11 12:49:52', 'it is error harddish', 'update'),
	(5, 1, 'sss', 'sd', '24', '3', '0', '9', '3', '2', '2012-07-09', '2012-07-11 12:52:20', 'it is error harddish', 'update'),
	(6, 1, 'sss', 'sd', '24', '3', '0', '9', '2', '2', '2012-07-09', '2012-07-11 13:02:44', 'it is error harddish', 'update'),
	(7, 1, 'sss', 'sd', '24', '3', '0', '9', '3', '2', '2012-07-09', '2012-07-11 14:18:13', 'it is error harddish', 'update'),
	(8, 1, 'sss', 'sd', '24', '3', '0', '9', '2', '2', '2012-07-09', '2012-07-11 14:21:57', 'it is error harddish', 'update'),
	(9, 1, 'sss', 'sd', '24', '3', '0', '9', '3', '2', '2012-07-09', '2012-07-11 14:36:34', 'it is error harddish', 'update'),
	(10, 1, 'sss', 'sd', '24', '3', '0', '3', '2', '2', '2012-07-09', '2012-07-11 14:57:33', 'it is error harddish', 'update'),
	(11, 1, 'sss', 'sd', '24', '3', '0', '3', '3', '2', '2012-07-09', '2012-07-11 22:30:12', 'it is error harddish', 'update'),
	(12, 1, 'sss', 'sd', '24', '3', '0', '3', '3', '2', '2012-07-09', '2012-07-12 10:01:09', 'it is error harddish', 'update'),
	(13, 1, 'sss', 'sd', '24', '3', '0', '3', '3', '2', '2012-07-09', '2012-07-12 10:02:36', 'it is error harddish', 'update'),
	(14, 1, 'sss', 'sd', '24', '3', '0', '3', '2', '2', '2012-07-09', '2012-07-12 10:05:15', 'it is error harddish', 'update'),
	(15, 1, 'sss', 'sd', '24', '3', '0', '3', '3', '2', '2012-07-09', '2012-07-12 10:41:35', 'it is error harddish', 'update'),
	(16, 1, 'sss', 'sd', '24', '3', '0', '3', '3', '2', '2012-07-09', '2012-07-12 10:59:58', 'it is error harddish', 'update'),
	(17, 1, 'sss', 'sd', '24', '3', '0', '3', '3', '2', '2012-07-09', '2012-07-12 11:00:20', 'it is error harddish', 'update'),
	(18, 1, 'sss', 'sd', '24', '3', '0', '3', '3', '2', '2012-07-09', '2012-07-14 11:29:49', 'it is error harddish', 'update'),
	(19, 1, 'sss', 'sd', '24', '3', '0', '3', '3', '2', '2012-07-09', '2012-07-14 11:31:05', 'it is error harddish', 'update');
/*!40000 ALTER TABLE `tbl_history` ENABLE KEYS */;


# Dumping structure for table inventory.tbl_item
DROP TABLE IF EXISTS `tbl_item`;
CREATE TABLE IF NOT EXISTS `tbl_item` (
  `item_id` int(15) NOT NULL AUTO_INCREMENT,
  `stock_id` int(10) DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `date_created` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `date_modified` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

# Dumping data for table inventory.tbl_item: 2 rows
/*!40000 ALTER TABLE `tbl_item` DISABLE KEYS */;
INSERT INTO `tbl_item` (`item_id`, `stock_id`, `user_id`, `date_created`, `date_modified`) VALUES
	(2, 2, 1, '2011-06-09 15:36:12', '2011-10-05 11:29:43'),
	(3, 3, 1, '2011-06-09 15:40:20', '2011-09-20 08:31:08');
/*!40000 ALTER TABLE `tbl_item` ENABLE KEYS */;


# Dumping structure for table inventory.tbl_location
DROP TABLE IF EXISTS `tbl_location`;
CREATE TABLE IF NOT EXISTS `tbl_location` (
  `loc_id` int(10) NOT NULL AUTO_INCREMENT,
  `location` char(255) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`loc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

# Dumping data for table inventory.tbl_location: 16 rows
/*!40000 ALTER TABLE `tbl_location` DISABLE KEYS */;
INSERT INTO `tbl_location` (`loc_id`, `location`) VALUES
	(1, 'IT Room'),
	(2, 'SDT Room'),
	(3, 'HR Room'),
	(4, 'Operation Room'),
	(5, 'test'),
	(6, 'test1'),
	(7, 'test2'),
	(8, 'hello world'),
	(9, 'test34'),
	(10, 'sdfasdfsadfasdf'),
	(11, 'asdfs'),
	(12, 'dfdf'),
	(13, 'sadf'),
	(14, 'dsdfdf'),
	(15, 'veasna room'),
	(16, 'abclkasdf');
/*!40000 ALTER TABLE `tbl_location` ENABLE KEYS */;


# Dumping structure for table inventory.tbl_problem
DROP TABLE IF EXISTS `tbl_problem`;
CREATE TABLE IF NOT EXISTS `tbl_problem` (
  `pro_id` int(10) NOT NULL AUTO_INCREMENT,
  `stock_id` int(10) NOT NULL DEFAULT '0',
  `priority` varchar(50) NOT NULL DEFAULT '0',
  `process` varchar(50) NOT NULL DEFAULT '0',
  `assign_by` int(10) NOT NULL DEFAULT '0',
  `solve_by` int(10) NOT NULL DEFAULT '0',
  `close_by` int(10) NOT NULL DEFAULT '0',
  `msg` text CHARACTER SET utf8,
  `date_modified` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `date_created` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`pro_id`)
) ENGINE=MyISAM AUTO_INCREMENT=25 DEFAULT CHARSET=latin1;

# Dumping data for table inventory.tbl_problem: 1 rows
/*!40000 ALTER TABLE `tbl_problem` DISABLE KEYS */;
INSERT INTO `tbl_problem` (`pro_id`, `stock_id`, `priority`, `process`, `assign_by`, `solve_by`, `close_by`, `msg`, `date_modified`, `date_created`) VALUES
	(24, 1, 'Hight', 'Resolved', 2, 7, 0, 'testing', '2012-07-12 11:07:52', '2012-07-12 11:07:10');
/*!40000 ALTER TABLE `tbl_problem` ENABLE KEYS */;


# Dumping structure for table inventory.tbl_status
DROP TABLE IF EXISTS `tbl_status`;
CREATE TABLE IF NOT EXISTS `tbl_status` (
  `status_id` int(10) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

# Dumping data for table inventory.tbl_status: 3 rows
/*!40000 ALTER TABLE `tbl_status` DISABLE KEYS */;
INSERT INTO `tbl_status` (`status_id`, `status`) VALUES
	(1, 'Stock'),
	(2, 'Used'),
	(3, 'Problem');
/*!40000 ALTER TABLE `tbl_status` ENABLE KEYS */;


# Dumping structure for table inventory.tbl_stock
DROP TABLE IF EXISTS `tbl_stock`;
CREATE TABLE IF NOT EXISTS `tbl_stock` (
  `stock_id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `serial_number` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `cat_id` int(10) DEFAULT '0',
  `brand_id` int(10) DEFAULT '0',
  `model` varchar(255) CHARACTER SET utf8 DEFAULT '0',
  `loc_id` int(10) DEFAULT '0',
  `status_id` int(10) DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `active` int(1) DEFAULT '1',
  `date_import` varchar(50) CHARACTER SET utf8 DEFAULT '1',
  `date_created` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `date_modified` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `remark` text CHARACTER SET utf8,
  PRIMARY KEY (`stock_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

# Dumping data for table inventory.tbl_stock: 1 rows
/*!40000 ALTER TABLE `tbl_stock` DISABLE KEYS */;
INSERT INTO `tbl_stock` (`stock_id`, `code`, `serial_number`, `cat_id`, `brand_id`, `model`, `loc_id`, `status_id`, `user_id`, `active`, `date_import`, `date_created`, `date_modified`, `remark`) VALUES
	(1, 'sss', 'sd', 24, 3, '0', 3, 3, 2, 1, '2012-07-09', '2012-07-10 00:07:06', '2012-07-12 10:07:59', 'it is error harddish');
/*!40000 ALTER TABLE `tbl_stock` ENABLE KEYS */;


# Dumping structure for table inventory.tbl_tracking
DROP TABLE IF EXISTS `tbl_tracking`;
CREATE TABLE IF NOT EXISTS `tbl_tracking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `history_id` int(11) NOT NULL DEFAULT '0',
  `stock_id` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

# Dumping data for table inventory.tbl_tracking: 0 rows
/*!40000 ALTER TABLE `tbl_tracking` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_tracking` ENABLE KEYS */;


# Dumping structure for table inventory.tbl_trash
DROP TABLE IF EXISTS `tbl_trash`;
CREATE TABLE IF NOT EXISTS `tbl_trash` (
  `trash_id` int(10) NOT NULL AUTO_INCREMENT,
  `trash_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `description` text CHARACTER SET utf8,
  `stock_id` int(11) DEFAULT '0',
  `user_id` int(10) DEFAULT '0',
  PRIMARY KEY (`trash_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

# Dumping data for table inventory.tbl_trash: 2 rows
/*!40000 ALTER TABLE `tbl_trash` DISABLE KEYS */;
INSERT INTO `tbl_trash` (`trash_id`, `trash_name`, `description`, `stock_id`, `user_id`) VALUES
	(1, '1', '1', 0, 0),
	(2, '2', '2', 0, 0);
/*!40000 ALTER TABLE `tbl_trash` ENABLE KEYS */;


# Dumping structure for table inventory.tbl_user
DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `lastname` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `username` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(15) CHARACTER SET utf8 DEFAULT NULL,
  `role` int(1) unsigned DEFAULT '0',
  `active` int(1) DEFAULT '1',
  `date_created` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  `date_modified` varchar(50) CHARACTER SET utf8 DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

# Dumping data for table inventory.tbl_user: 5 rows
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` (`user_id`, `firstname`, `lastname`, `username`, `password`, `email`, `phone`, `role`, `active`, `date_created`, `date_modified`) VALUES
	(1, 'veasna', 'pen', 'veasna', '123', 'pen.veasna@gmail.com', '092730538', 1, 0, '2012-07-12 11:07:33', '2012-07-12 11:07:33'),
	(2, 'test', 'test', 'admin', 'admin', 'chantha.san@gmail.com', '092839389', 1, 1, '2012-07-09 22:07:48', '2012-07-09 22:07:48'),
	(6, 'hello', 'hello', 'hello', '123', 'pen.veasna@gmail.com', '134', 0, 0, '2012-01-01 03:07:54', '2012-01-01 03:07:54'),
	(7, 'Sva', 'khg', 'test', '123', 'svakhg@gmail.com', '134', 0, 1, '2012-07-12 11:07:11', '2012-07-12 11:07:11'),
	(8, '123', '0', 'abc123', '123', 'pen.veasna@gmail.com', '134', 0, 0, '2012-01-01 03:02:55', '2012-01-01 03:02:55');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;


# Dumping structure for view inventory.view_history
DROP VIEW IF EXISTS `view_history`;
# Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_history` (
	`stock_id` INT(10) NOT NULL DEFAULT '0',
	`code` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`serial_number` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`status` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`brand` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`location` CHAR(255) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`category` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`username` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`remark` TEXT NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`date_import` VARCHAR(50) NULL DEFAULT '1' COLLATE 'utf8_general_ci',
	`date_created` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`do_action` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


# Dumping structure for view inventory.view_item
DROP VIEW IF EXISTS `view_item`;
# Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_item` (
	`stock_id` INT(10) NOT NULL DEFAULT '0',
	`code` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`serial_number` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`status` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`brand` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`location` CHAR(255) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`category` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`username` VARCHAR(50) NOT NULL DEFAULT '' COLLATE 'utf8_general_ci',
	`remark` TEXT NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`date_import` VARCHAR(50) NULL DEFAULT '1' COLLATE 'utf8_general_ci',
	`date_created` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_general_ci'
) ENGINE=MyISAM;


# Dumping structure for view inventory.view_problem
DROP VIEW IF EXISTS `view_problem`;
# Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_problem` (
	`stock_id` INT(10) NOT NULL DEFAULT '0',
	`code` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`serial_number` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`remark` TEXT NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`date_import` DATE NULL DEFAULT NULL,
	`active` INT(1) NULL DEFAULT '1',
	`status_id` INT(10) NOT NULL DEFAULT '0',
	`status` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`brand_id` TINYINT(4) NOT NULL DEFAULT '0',
	`brand` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`cat_id` TINYINT(4) NOT NULL DEFAULT '0',
	`category` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`username` VARCHAR(50) NOT NULL DEFAULT '' COLLATE 'utf8_general_ci',
	`pro_id` INT(10) NOT NULL DEFAULT '0',
	`priority` VARCHAR(50) NOT NULL DEFAULT '0' COLLATE 'latin1_swedish_ci',
	`solve_by` INT(10) NOT NULL DEFAULT '0',
	`msg` TEXT NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`date_created` DATE NULL DEFAULT NULL,
	`process` VARCHAR(50) NOT NULL DEFAULT '0' COLLATE 'latin1_swedish_ci',
	`loc_id` INT(10) NULL DEFAULT '0',
	`location` CHAR(255) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`assign_by` INT(10) NOT NULL DEFAULT '0'
) ENGINE=MyISAM;


# Dumping structure for view inventory.view_stock
DROP VIEW IF EXISTS `view_stock`;
# Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `view_stock` (
	`stock_id` INT(10) NOT NULL DEFAULT '0',
	`code` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`serial_number` VARCHAR(255) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`status_id` INT(10) NOT NULL DEFAULT '0',
	`status` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`brand` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`cat_id` TINYINT(4) NOT NULL DEFAULT '0',
	`category` VARCHAR(50) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`username` VARCHAR(50) NOT NULL DEFAULT '' COLLATE 'utf8_general_ci',
	`remark` TEXT NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`date_import` VARCHAR(50) NULL DEFAULT '1' COLLATE 'utf8_general_ci',
	`date_created` DATE NULL DEFAULT NULL,
	`active` INT(1) NULL DEFAULT '1',
	`pro_id` INT(10) NULL DEFAULT '0',
	`location` CHAR(255) NULL DEFAULT NULL COLLATE 'utf8_general_ci',
	`priority` VARCHAR(50) NULL DEFAULT '0' COLLATE 'latin1_swedish_ci'
) ENGINE=MyISAM;


# Dumping structure for trigger inventory.history_after_stock_insert
DROP TRIGGER IF EXISTS `history_after_stock_insert`;
SET SESSION SQL_MODE='';
DELIMITER //
CREATE TRIGGER `history_after_stock_insert` AFTER INSERT ON `tbl_stock` FOR EACH ROW begin		
		insert into tbl_history(
			stock_id,
			code,
			serial_number,
			category,
			brand,
			model,
			location,
			status,
			username,
			date_import,
			remark,
			do_action,
			date_created
			) 
		values(
			new.stock_id,
			new.code,
			new.serial_number,
			new.cat_id,
			new.brand_id,
			new.model,
			new.loc_id,
			new.status_id,
			new.user_id,
			new.date_import,
			new.remark,
			'add new',
			now()
		);
	end//
DELIMITER ;
SET SESSION SQL_MODE=@OLD_SQL_MODE;


# Dumping structure for trigger inventory.history_after_stock_update
DROP TRIGGER IF EXISTS `history_after_stock_update`;
SET SESSION SQL_MODE='';
DELIMITER //
CREATE TRIGGER `history_after_stock_update` AFTER UPDATE ON `tbl_stock` FOR EACH ROW begin		
		insert into tbl_history(
			stock_id,
			code,
			serial_number,
			category,
			brand,
			model,
			location,
			status,
			username,
			date_import,
			remark,
			do_action,
			date_created
			) 
		values(
			new.stock_id,
			new.code,
			new.serial_number,
			new.cat_id,
			new.brand_id,
			new.model,
			new.loc_id,
			new.status_id,
			new.user_id,
			new.date_import,
			new.remark,
			'update',
			now()
		);
	end//
DELIMITER ;
SET SESSION SQL_MODE=@OLD_SQL_MODE;


# Dumping structure for view inventory.view_history
DROP VIEW IF EXISTS `view_history`;
# Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_history`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_history` AS (select `ht`.`stock_id` AS `stock_id`,`ht`.`code` AS `code`,`ht`.`serial_number` AS `serial_number`,`status`.`status` AS `status`,`br`.`brand` AS `brand`,`loc`.`location` AS `location`,`cat`.`category` AS `category`,`us`.`username` AS `username`,`ht`.`remark` AS `remark`,`ht`.`date_import` AS `date_import`,`ht`.`date_created` AS `date_created`,`ht`.`do_action` AS `do_action` from (((((`tbl_history` `ht` left join `tbl_category` `cat` on((`ht`.`category` = `cat`.`cat_id`))) left join `tbl_brand` `br` on((`ht`.`brand` = `br`.`brand_id`))) left join `tbl_user` `us` on((`ht`.`username` = `us`.`user_id`))) left join `tbl_location` `loc` on((`ht`.`location` = `loc`.`loc_id`))) left join `tbl_status` `status` on((`status`.`status_id` = `ht`.`status`))));


# Dumping structure for view inventory.view_item
DROP VIEW IF EXISTS `view_item`;
# Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_item`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_item` AS (select `st`.`stock_id` AS `stock_id`,`st`.`code` AS `code`,`st`.`serial_number` AS `serial_number`,`status`.`status` AS `status`,`br`.`brand` AS `brand`,`loc`.`location` AS `location`,`cat`.`category` AS `category`,`us`.`username` AS `username`,`st`.`remark` AS `remark`,`st`.`date_import` AS `date_import`,`st`.`date_created` AS `date_created` from (((((`tbl_stock` `st` join `tbl_category` `cat` on((`st`.`cat_id` = `cat`.`cat_id`))) join `tbl_brand` `br` on((`st`.`brand_id` = `br`.`brand_id`))) join `tbl_user` `us` on((`st`.`user_id` = `us`.`user_id`))) join `tbl_location` `loc` on((`st`.`loc_id` = `loc`.`loc_id`))) join `tbl_status` `status` on((`status`.`status_id` = `st`.`status_id`))) where ((`st`.`active` = 1) and (`status`.`status` = 'Used')));


# Dumping structure for view inventory.view_problem
DROP VIEW IF EXISTS `view_problem`;
# Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_problem`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_problem` AS select `st`.`stock_id` AS `stock_id`,`st`.`code` AS `code`,`st`.`serial_number` AS `serial_number`,`st`.`remark` AS `remark`,str_to_date(`st`.`date_import`,'%Y-%m-%d') AS `date_import`,`st`.`active` AS `active`,`status`.`status_id` AS `status_id`,`status`.`status` AS `status`,`br`.`brand_id` AS `brand_id`,`br`.`brand` AS `brand`,`cat`.`cat_id` AS `cat_id`,`cat`.`category` AS `category`,`us`.`username` AS `username`,`pr`.`pro_id` AS `pro_id`,`pr`.`priority` AS `priority`,`pr`.`solve_by` AS `solve_by`,`pr`.`msg` AS `msg`,str_to_date(`pr`.`date_created`,'%Y-%m-%d') AS `date_created`,`pr`.`process` AS `process`,`loc`.`loc_id` AS `loc_id`,`loc`.`location` AS `location`,`pr`.`assign_by` AS `assign_by` from ((((((`tbl_stock` `st` join `tbl_category` `cat` on((`st`.`cat_id` = `cat`.`cat_id`))) join `tbl_brand` `br` on((`st`.`brand_id` = `br`.`brand_id`))) join `tbl_status` `status` on((`status`.`status_id` = `st`.`status_id`))) left join `tbl_location` `loc` on((`loc`.`loc_id` = `st`.`loc_id`))) join `tbl_problem` `pr` on((`pr`.`stock_id` = `st`.`stock_id`))) join `tbl_user` `us` on((`pr`.`assign_by` = `us`.`user_id`))) where (`st`.`active` = 1);


# Dumping structure for view inventory.view_stock
DROP VIEW IF EXISTS `view_stock`;
# Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `view_stock`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_stock` AS select `st`.`stock_id` AS `stock_id`,`st`.`code` AS `code`,`st`.`serial_number` AS `serial_number`,`status`.`status_id` AS `status_id`,`status`.`status` AS `status`,`br`.`brand` AS `brand`,`cat`.`cat_id` AS `cat_id`,`cat`.`category` AS `category`,`us`.`username` AS `username`,`st`.`remark` AS `remark`,`st`.`date_import` AS `date_import`,str_to_date(`st`.`date_created`,'%Y-%m-%d') AS `date_created`,`st`.`active` AS `active`,`pr`.`pro_id` AS `pro_id`,`loc`.`location` AS `location`,`pr`.`priority` AS `priority` from ((((((`tbl_stock` `st` join `tbl_category` `cat` on((`st`.`cat_id` = `cat`.`cat_id`))) join `tbl_brand` `br` on((`st`.`brand_id` = `br`.`brand_id`))) join `tbl_user` `us` on((`st`.`user_id` = `us`.`user_id`))) join `tbl_status` `status` on((`status`.`status_id` = `st`.`status_id`))) left join `tbl_problem` `pr` on((`pr`.`stock_id` = `st`.`stock_id`))) left join `tbl_location` `loc` on((`loc`.`loc_id` = `st`.`loc_id`)));
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
