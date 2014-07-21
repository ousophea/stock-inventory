# --------------------------------------------------------
# Host:                         127.0.0.1
# Server version:               5.1.37
# Server OS:                    Win32
# HeidiSQL version:             6.0.0.3603
# Date/time:                    2012-02-29 23:28:13
# --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

# Dumping database structure for inventory
CREATE DATABASE IF NOT EXISTS `inventory` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `inventory`;


# Dumping structure for table inventory.tbl_brand
CREATE TABLE IF NOT EXISTS `tbl_brand` (
  `brand_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `brand` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

# Dumping data for table inventory.tbl_brand: 6 rows
/*!40000 ALTER TABLE `tbl_brand` DISABLE KEYS */;
REPLACE INTO `tbl_brand` (`brand_id`, `brand`) VALUES
	(1, 'DELL'),
	(2, 'HP'),
	(3, 'ACCER'),
	(4, 'TOSHIBA'),
	(5, 'Lenovo'),
	(6, 'Apple');
/*!40000 ALTER TABLE `tbl_brand` ENABLE KEYS */;


# Dumping structure for table inventory.tbl_category
CREATE TABLE IF NOT EXISTS `tbl_category` (
  `cat_id` tinyint(4) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`cat_id`)
) ENGINE=MyISAM AUTO_INCREMENT=23 DEFAULT CHARSET=latin1;

# Dumping data for table inventory.tbl_category: 6 rows
/*!40000 ALTER TABLE `tbl_category` DISABLE KEYS */;
REPLACE INTO `tbl_category` (`cat_id`, `category`) VALUES
	(1, 'Laptop'),
	(2, 'Desktop'),
	(3, 'Printer'),
	(4, 'Monitor'),
	(5, 'Server'),
	(6, 'Projector');
/*!40000 ALTER TABLE `tbl_category` ENABLE KEYS */;


# Dumping structure for table inventory.tbl_history
CREATE TABLE IF NOT EXISTS `tbl_history` (
  `history_id` int(10) NOT NULL AUTO_INCREMENT,
  `stock_id` int(10) NOT NULL DEFAULT '0',
  `code` varchar(255) DEFAULT NULL,
  `serial_number` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT '0',
  `brand` varchar(255) DEFAULT '0',
  `model` varchar(255) DEFAULT '0',
  `location` varchar(255) DEFAULT '0',
  `status` varchar(255) DEFAULT '0',
  `username` varchar(10) NOT NULL DEFAULT '0',
  `date_import` varchar(50) DEFAULT '1',
  `date_created` varchar(50) DEFAULT NULL,
  `remark` text,
  `do_action` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`history_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

# Dumping data for table inventory.tbl_history: 0 rows
/*!40000 ALTER TABLE `tbl_history` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_history` ENABLE KEYS */;


# Dumping structure for table inventory.tbl_item
CREATE TABLE IF NOT EXISTS `tbl_item` (
  `item_id` int(15) NOT NULL AUTO_INCREMENT,
  `stock_id` int(10) DEFAULT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `date_created` varchar(50) DEFAULT NULL,
  `date_modified` varchar(50) NOT NULL,
  PRIMARY KEY (`item_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=latin1;

# Dumping data for table inventory.tbl_item: 2 rows
/*!40000 ALTER TABLE `tbl_item` DISABLE KEYS */;
REPLACE INTO `tbl_item` (`item_id`, `stock_id`, `user_id`, `date_created`, `date_modified`) VALUES
	(2, 2, 1, '2011-06-09 15:36:12', '2011-10-05 11:29:43'),
	(3, 3, 1, '2011-06-09 15:40:20', '2011-09-20 08:31:08');
/*!40000 ALTER TABLE `tbl_item` ENABLE KEYS */;


# Dumping structure for table inventory.tbl_location
CREATE TABLE IF NOT EXISTS `tbl_location` (
  `loc_id` int(10) NOT NULL AUTO_INCREMENT,
  `location` char(255) DEFAULT NULL,
  PRIMARY KEY (`loc_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

# Dumping data for table inventory.tbl_location: 14 rows
/*!40000 ALTER TABLE `tbl_location` DISABLE KEYS */;
REPLACE INTO `tbl_location` (`loc_id`, `location`) VALUES
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
	(14, 'dsdfdf');
/*!40000 ALTER TABLE `tbl_location` ENABLE KEYS */;


# Dumping structure for table inventory.tbl_status
CREATE TABLE IF NOT EXISTS `tbl_status` (
  `status_id` int(10) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`status_id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

# Dumping data for table inventory.tbl_status: 3 rows
/*!40000 ALTER TABLE `tbl_status` DISABLE KEYS */;
REPLACE INTO `tbl_status` (`status_id`, `status`) VALUES
	(1, 'Stock'),
	(2, 'Used'),
	(3, 'Problem');
/*!40000 ALTER TABLE `tbl_status` ENABLE KEYS */;


# Dumping structure for table inventory.tbl_stock
CREATE TABLE IF NOT EXISTS `tbl_stock` (
  `stock_id` int(10) NOT NULL AUTO_INCREMENT,
  `code` varchar(255) DEFAULT NULL,
  `serial_number` varchar(255) DEFAULT NULL,
  `cat_id` int(10) DEFAULT '0',
  `brand_id` int(10) DEFAULT '0',
  `model` varchar(255) DEFAULT '0',
  `loc_id` int(10) DEFAULT '0',
  `status_id` int(10) DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0',
  `active` int(1) DEFAULT '1',
  `date_import` varchar(50) DEFAULT '1',
  `date_created` varchar(50) DEFAULT NULL,
  `date_modified` varchar(50) DEFAULT NULL,
  `remark` text,
  PRIMARY KEY (`stock_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=latin1;

# Dumping data for table inventory.tbl_stock: 17 rows
/*!40000 ALTER TABLE `tbl_stock` DISABLE KEYS */;
REPLACE INTO `tbl_stock` (`stock_id`, `code`, `serial_number`, `cat_id`, `brand_id`, `model`, `loc_id`, `status_id`, `user_id`, `active`, `date_import`, `date_created`, `date_modified`, `remark`) VALUES
	(2, 'DDD-IT-Jun-08-PNH-550', '2324hp', 1, 1, '1', 1, 1, 1, 1, '2012-01-01', '2011-12-31 01:08:50', '2012-01-12 19:01:48', ''),
	(3, 'DDD-IT-Jun-08-PNH-534', '23124', 1, 1, '1', 3, 2, 1, 1, '2012-01-01', '2011-12-31 01:09:23', '2012-01-07 16:01:36', 'asdf'),
	(4, 'DDD-IT-Jun-08-PNH-549', '98234sdf', 1, 1, '1', 1, 1, 1, 1, '2012-01-01', '2011-12-31 09:00:10', '2012-01-12 19:01:35', ''),
	(5, 'DDD-IT-Jun-08-PNH-536', '1234123', 1, 1, '1', 3, 1, 1, 1, '2012-01-11', '2011-12-31 11:58:48', '2012-01-07 16:01:28', 'asdf'),
	(6, 'DDD-IT-Jun-08-PNH-548', 'sdfsa', 2, 1, '0', 0, 1, 1, 1, '2012-01-03', '2012-01-03 09:15:44', '2012-01-12 19:01:16', ''),
	(8, NULL, 'safsafd', 6, 2, '0', 0, 1, 1, 1, '2012-01-03', '2012-01-03 09:16:10', '2012-01-03 09:16:10', NULL),
	(9, NULL, 'sfdasd', 1, 3, '0', 0, 1, 1, 1, '2012-01-03', '2012-01-03 09:16:24', '2012-01-03 09:16:24', NULL),
	(10, 'DDD-IT-Jun-08-PNH-537', 'sdfaa233', 1, 1, '0', 0, 1, 1, 1, '2012-01-03', '2012-01-03 09:16:32', '2012-01-03 09:16:32', 'test'),
	(11, 'DDD-IT-Jun-08-PNH-538', 'asdf', 4, 1, '0', 0, 1, 1, 1, '2012-01-03', '2012-01-03 09:16:40', '2012-01-03 09:16:40', 'asdf'),
	(12, 'DDD-IT-Jun-08-PNH-539', 'asf24123', 1, 2, '0', 1, 2, 1, 1, '2012-01-03', '2012-01-03 09:16:59', '2012-01-03 09:16:59', 'test'),
	(13, 'DDD-IT-Jun-08-PNH-540', 'asdf', 3, 4, '0', 1, 2, 1, 1, '2012-01-03', '2012-01-03 09:17:07', '2012-01-03 09:17:07', 'asdfasdf'),
	(14, 'DDD-IT-Jun-08-PNH-541', 'asdf23gdf', 1, 2, '0', 1, 2, 1, 1, '2012-01-03', '2012-01-03 09:18:14', '2012-01-03 09:18:14', 'asdfasd'),
	(15, 'DDD-IT-Jun-08-PNH-542', 'dasdf', 4, 2, '0', 1, 2, 1, 1, '2012-01-03', '2012-01-03 09:18:33', '2012-01-03 09:18:33', 'test abc abc'),
	(16, 'DDD-IT-Jun-08-PNH-543', '23234', 4, 2, '0', 2, 2, 1, 1, '2012-01-03', '2012-01-03 09:52:06', '2012-01-03 09:52:06', 'asdafsd'),
	(17, 'DDD-IT-Jun-08-PNH-545', 'asdf', 4, 2, '0', 1, 2, 1, 1, '2012-01-03', '2012-01-03 09:52:14', '2012-01-15 13:01:19', 'test'),
	(18, 'DDD-IT-Jun-08-PNH-546', 'asdf323', 4, 1, '0', 0, 1, 1, 1, '2012-01-03', '2012-01-03 09:52:24', '2012-01-03 09:52:24', 'sdfasdfsa'),
	(19, 'DDD-IT-Jun-08-PNH-547', '12345678', 2, 3, '0', 3, 2, 1, 1, '2012-01-04', '2012-01-04 23:01:00', '2012-01-15 13:01:58', 'dasdasf');
/*!40000 ALTER TABLE `tbl_stock` ENABLE KEYS */;


# Dumping structure for table inventory.tbl_tracking
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
CREATE TABLE IF NOT EXISTS `tbl_trash` (
  `trash_id` int(10) NOT NULL AUTO_INCREMENT,
  `trash_name` varchar(255) DEFAULT NULL,
  `description` text,
  `stock_id` int(11) DEFAULT '0',
  `user_id` int(10) DEFAULT '0',
  PRIMARY KEY (`trash_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

# Dumping data for table inventory.tbl_trash: 2 rows
/*!40000 ALTER TABLE `tbl_trash` DISABLE KEYS */;
REPLACE INTO `tbl_trash` (`trash_id`, `trash_name`, `description`, `stock_id`, `user_id`) VALUES
	(1, '1', '1', 0, 0),
	(2, '2', '2', 0, 0);
/*!40000 ALTER TABLE `tbl_trash` ENABLE KEYS */;


# Dumping structure for table inventory.tbl_user
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `firstname` varchar(20) DEFAULT NULL,
  `lastname` varchar(20) DEFAULT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `role` int(1) unsigned DEFAULT '0',
  `active` int(1) DEFAULT '1',
  `date_created` varchar(50) DEFAULT NULL,
  `date_modified` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

# Dumping data for table inventory.tbl_user: 5 rows
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
REPLACE INTO `tbl_user` (`user_id`, `firstname`, `lastname`, `username`, `password`, `email`, `phone`, `role`, `active`, `date_created`, `date_modified`) VALUES
	(1, 'veasna123', 'pen13', 'veasna', '123', 'pen.veasna@gmail.com', '092730538', 1, 1, '2011-09-18 00:00:00', NULL),
	(2, 'test', 'test', 'admin', '123', 'test@gmail.com', '092839389', 0, 1, '2011-09-19 13:51:05', NULL),
	(6, 'hello', 'hello', 'hello', '123', 'pen.veasna@gmail.com', '134', 0, 1, '2012-01-01 03:07:54', '2012-01-01 03:07:54'),
	(7, 'test', '0', 'abc', '123', 'pen.veasna@gmail.com', '134', 0, 1, '2012-01-01 03:02:00', '2012-01-01 03:02:00'),
	(8, '123', '0', 'abc123', '123', 'pen.veasna@gmail.com', '134', 0, 1, '2012-01-01 03:02:55', '2012-01-01 03:02:55');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
