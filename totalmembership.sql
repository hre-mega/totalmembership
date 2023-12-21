-- --------------------------------------------------------
-- Host:                         172.31.18.245
-- Server version:               10.0.38-MariaDB-0ubuntu0.16.04.1 - Ubuntu 16.04
-- Server OS:                    debian-linux-gnu
-- HeidiSQL Version:             12.6.0.6765
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for [dev]_totalmembership
CREATE DATABASE IF NOT EXISTS `totalmembership` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;
USE `totalmembership`;

-- Dumping structure for table [dev]_totalmembership.membership_agents
CREATE TABLE IF NOT EXISTS `membership_agents` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `md5` char(32) NOT NULL,
  `agent` text NOT NULL,
  `type` char(50) NOT NULL,
  `platform` char(16) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table [dev]_totalmembership.membership_agents: ~0 rows (approximately)

-- Dumping structure for table [dev]_totalmembership.membership_bdaysend
CREATE TABLE IF NOT EXISTS `membership_bdaysend` (
  `mobile` char(11) NOT NULL,
  `detail_id` int(10) NOT NULL,
  `sent` year(4) NOT NULL,
  `blocked` enum('Y','N') NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table [dev]_totalmembership.membership_bdaysend: ~0 rows (approximately)

-- Dumping structure for table [dev]_totalmembership.membership_claimed_code
CREATE TABLE IF NOT EXISTS `membership_claimed_code` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `voucher` char(10) NOT NULL,
  `valid_code` text NOT NULL,
  `expire_date` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table [dev]_totalmembership.membership_claimed_code: ~0 rows (approximately)

-- Dumping structure for table [dev]_totalmembership.membership_cms_users
CREATE TABLE IF NOT EXISTS `membership_cms_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `password` varchar(255) NOT NULL,
  `status` enum('0','1') DEFAULT '1',
  `username` char(20) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table [dev]_totalmembership.membership_cms_users: ~0 rows (approximately)
INSERT INTO `membership_cms_users` (`id`, `password`, `status`, `username`) VALUES
	(2, 'megamobile', '1', 'membership');

-- Dumping structure for table [dev]_totalmembership.membership_cycles
CREATE TABLE IF NOT EXISTS `membership_cycles` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `cycle_name` char(20) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `text` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table [dev]_totalmembership.membership_cycles: ~0 rows (approximately)
INSERT INTO `membership_cycles` (`id`, `cycle_name`, `start_date`, `end_date`, `text`, `status`, `timestamp`) VALUES
	(1, 'Cycle 1: March 27 -', '2022-09-01', '2023-04-27', 'dadasda', 1, '2023-04-20 01:04:01');

-- Dumping structure for table [dev]_totalmembership.membership_details
CREATE TABLE IF NOT EXISTS `membership_details` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `md5` char(32) NOT NULL,
  `fname` varchar(32) NOT NULL,
  `lname` varchar(32) NOT NULL,
  `email` varchar(64) NOT NULL,
  `address` varchar(128) NOT NULL,
  `bday` date NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table [dev]_totalmembership.membership_details: ~0 rows (approximately)

-- Dumping structure for table [dev]_totalmembership.membership_entries
CREATE TABLE IF NOT EXISTS `membership_entries` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `mobile` char(11) NOT NULL,
  `detail_id` int(10) NOT NULL,
  `claimed_code_id` int(10) NOT NULL,
  `werdid_id` tinyint(3) NOT NULL,
  `agent_id` int(10) NOT NULL,
  `ip_id` int(10) NOT NULL,
  `cycle_id` int(10) NOT NULL,
  `station_code` char(50) DEFAULT NULL,
  `registration_number` char(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table [dev]_totalmembership.membership_entries: ~0 rows (approximately)

-- Dumping structure for table [dev]_totalmembership.membership_ipaddress
CREATE TABLE IF NOT EXISTS `membership_ipaddress` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `ip` char(15) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table [dev]_totalmembership.membership_ipaddress: ~0 rows (approximately)
INSERT INTO `membership_ipaddress` (`id`, `ip`, `timestamp`) VALUES
	(1, '165.225.230.186', '2023-05-02 02:46:21');

-- Dumping structure for table [dev]_totalmembership.membership_purchase
CREATE TABLE IF NOT EXISTS `membership_purchase` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` char(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table [dev]_totalmembership.membership_purchase: ~0 rows (approximately)

-- Dumping structure for table [dev]_totalmembership.membership_referral_type
CREATE TABLE IF NOT EXISTS `membership_referral_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` char(50) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table [dev]_totalmembership.membership_referral_type: ~8 rows (approximately)
INSERT INTO `membership_referral_type` (`id`, `name`, `status`, `timestamp`, `updated_timestamp`) VALUES
	(1, 'Facebook Ads', 0, '2023-02-22 07:05:17', '2023-02-22 07:05:17'),
	(2, 'Station Ads', 0, '2023-02-22 07:05:32', '2023-02-22 07:05:32'),
	(3, 'Station Pump Attendant', 1, '2023-03-21 11:04:56', '2023-03-21 11:04:56'),
	(4, 'Friend or Relative', 1, '2023-03-21 11:05:22', '2023-03-21 11:05:22'),
	(5, 'Facebook', 1, '2023-03-21 11:05:35', '2023-03-21 11:05:35'),
	(6, 'TikTok', 1, '2023-03-21 11:05:42', '2023-03-21 11:05:42'),
	(7, 'SMS', 1, '2023-03-21 11:05:51', '2023-03-21 11:05:51'),
	(8, 'Others', 1, '2023-03-21 11:05:59', '2023-03-21 11:05:59');

-- Dumping structure for table [dev]_totalmembership.membership_sms_out
CREATE TABLE IF NOT EXISTS `membership_sms_out` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `mobile` char(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table [dev]_totalmembership.membership_sms_out: ~0 rows (approximately)

-- Dumping structure for table [dev]_totalmembership.membership_visit_logs
CREATE TABLE IF NOT EXISTS `membership_visit_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ip` char(50) NOT NULL,
  `browser` char(50) NOT NULL,
  `platform` char(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table [dev]_totalmembership.membership_visit_logs: ~13 rows (approximately)
INSERT INTO `membership_visit_logs` (`id`, `ip`, `browser`, `platform`, `timestamp`) VALUES
	(1, '104.47.0.254', '', '', '2023-05-02 06:55:28'),
	(2, '165.225.230.186', 'Chrome', 'Windows 10', '2023-05-02 06:55:28'),
	(3, '40.94.239.40', 'Chrome', 'Windows 10', '2023-05-02 06:56:29'),
	(4, '180.190.60.120', 'Chrome', 'Android', '2023-05-02 07:21:58'),
	(5, '112.210.135.161', 'Chrome', 'Windows 10', '2023-05-18 09:24:29'),
	(6, '112.210.135.161', 'Chrome', 'Windows 10', '2023-05-19 02:37:02'),
	(7, '112.210.138.221', 'Chrome', 'Windows 10', '2023-06-07 01:12:20'),
	(8, '172.71.218.208', 'Chrome', 'Windows 10', '2023-12-21 03:13:37'),
	(9, '172.71.210.22', 'Chrome', 'Windows 10', '2023-12-21 03:16:40'),
	(10, '172.71.210.160', 'Chrome', 'Windows 10', '2023-12-21 03:16:54'),
	(11, '172.71.215.88', 'Chrome', 'Mac OS X', '2023-12-21 03:29:47'),
	(12, '172.70.222.209', 'Chrome', 'Mac OS X', '2023-12-21 07:30:58'),
	(13, '172.70.123.108', 'Chrome', 'Mac OS X', '2023-12-21 07:48:45');

-- Dumping structure for table [dev]_totalmembership.rep_daily
CREATE TABLE IF NOT EXISTS `rep_daily` (
  `date` date NOT NULL,
  `entries` mediumint(8) unsigned NOT NULL DEFAULT '0',
  `unique` mediumint(8) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Dumping data for table [dev]_totalmembership.rep_daily: ~0 rows (approximately)

-- Dumping structure for table [dev]_totalmembership.stations
CREATE TABLE IF NOT EXISTS `stations` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `station_name` char(50) NOT NULL,
  `station_code` char(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `system_region` char(50) NOT NULL,
  `mobile_num` char(11) NOT NULL,
  `province` char(50) NOT NULL,
  `area_manager` char(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=116 DEFAULT CHARSET=utf8mb4;

-- Dumping data for table [dev]_totalmembership.stations: ~115 rows (approximately)
INSERT INTO `stations` (`id`, `station_name`, `station_code`, `status`, `system_region`, `mobile_num`, `province`, `area_manager`, `timestamp`) VALUES
	(1, 'Megamobile 1', 'MEGA1', 1, 'National Capital Region', '09178099251', 'Metro Manila', 'Test Manager', '2023-02-21 13:51:22'),
	(2, 'Megamobile 2', 'MEGA2', 1, 'National Capital Region', '09178608163', 'Metro Manila', 'Test Manager', '2023-03-16 09:23:24'),
	(3, 'Megamobile 3', 'MEGA3', 1, 'National Capital Region', '09178108438', 'Metro Manila', 'Test Manager', '2023-03-16 09:23:38'),
	(4, 'Kalayaan Ave.', '00C10', 1, 'National Capital Region', '09152240856', 'Metro Manila', 'Joshua Romero', '2023-03-22 11:12:01'),
	(5, 'R. Magsaysay', '00C19', 1, 'National Capital Region', '09060715220', 'Metro Manila', 'Joshua Romero', '2023-03-22 11:12:01'),
	(6, 'Commonwealth', '00C2', 1, 'National Capital Region', '09272529493', 'Metro Manila', 'Joshua Romero', '2023-03-22 11:12:01'),
	(7, 'Visayas Ave.', '00C23', 1, 'National Capital Region', '09178649001', 'Metro Manila', 'Joshua Romero', '2023-03-22 11:12:01'),
	(8, 'Quirino Hiway', '00C18', 1, 'National Capital Region', '09770724635', 'Metro Manila', 'Joshua Romero', '2023-03-22 11:12:01'),
	(9, 'F. Blumentritt', '00C4', 1, 'National Capital Region', '09156952051', 'Metro Manila', 'Joshua Romero', '2023-03-22 11:12:01'),
	(10, 'Shaw Blvd.', '00C21', 1, 'National Capital Region', '09175010908', 'Metro Manila', 'Joshua Romero', '2023-03-22 11:12:01'),
	(11, 'C-5, Pasig', '00C28', 1, 'National Capital Region', '09603783534', 'Metro Manila', 'Joan Cleofe', '2023-03-23 04:27:27'),
	(12, 'EDSA', '00C31', 1, 'National Capital Region', '09176350430', 'Metro Manila', 'Joan Cleofe', '2023-03-23 04:27:27'),
	(13, 'Payatas, QC', '00C30', 1, 'National Capital Region', '09335872457', 'Metro Manila', 'Joan Cleofe', '2023-03-23 04:27:27'),
	(14, 'Shaw', '00C34', 1, 'National Capital Region', '09603783533', 'Metro Manila', 'Joan Cleofe', '2023-03-23 04:27:27'),
	(15, 'Regalado Ave.', '00C20', 1, 'National Capital Region', '09703673546', 'Metro Manila', 'Joshua Romero', '2023-03-23 04:32:01'),
	(16, 'Sta. Mesa', '00C22', 1, 'National Capital Region', '09776073034', 'Metro Manila', 'Joshua Romero', '2023-03-23 04:32:01'),
	(17, 'Fairview', '00C5', 1, 'National Capital Region', '09666424753', 'Metro Manila', 'Joshua Romero', '2023-03-23 04:32:01'),
	(18, 'Alabang', '00C36', 1, 'National Capital Region', '09171886825', 'Metro Manila', 'Mickey Quisumbing', '2023-03-23 04:39:23'),
	(19, 'Merville', '00C38', 1, 'National Capital Region', '09279978421', 'Metro Manila', 'Edcel Piramide', '2023-03-23 06:07:03'),
	(20, 'NAIA', '00C39', 1, 'National Capital Region', '09175540264', 'Metro Manila', 'Edcel Piramide', '2023-03-23 06:07:03'),
	(21, 'Newport', '00C40', 1, 'National Capital Region', '09178932679', 'Metro Manila', 'Edcel Piramide', '2023-03-23 06:07:03'),
	(22, 'Severina', '00C43', 1, 'National Capital Region', '09260274629', 'Metro Manila', 'Ken Carandang', '2023-03-23 06:08:32'),
	(23, 'Sucat 2', '00C45', 1, 'National Capital Region', '09159753642', 'Metro Manila', 'Edcel Piramide', '2023-03-23 06:11:27'),
	(24, 'West Service Road', '00C46', 1, 'National Capital Region', '09088113696', 'Metro Manila', 'Edcel Piramide', '2023-03-23 06:11:27'),
	(25, 'San Antonio', '00C42', 1, 'National Capital Region', '09171401480', 'Metro Manila', 'Joshua Romero', '2023-03-23 06:13:27'),
	(26, 'Tabuk', '00A41', 1, 'Cordillera Administrative Region', '09540771289', 'Kalinga', 'Derson Rolle', '2023-03-23 06:19:15'),
	(27, 'Tabuk 2', '00A42', 1, 'Cordillera Administrative Region', '09153534349', 'Kalinga', 'Derson Rolle', '2023-03-23 06:19:15'),
	(28, 'Alaminos - Poblacion', '00A14', 1, '', '09175033661', '', '', '2023-03-23 15:52:26'),
	(29, 'Pinili', '00A6', 1, '', '09993346759', '', '', '2023-03-23 15:52:26'),
	(30, 'Alicia', '00A55', 1, '', '09157419354', '', '', '2023-03-23 15:52:26'),
	(31, 'Tuguegarao 4', '00A47', 1, '', '09953650812', '', '', '2023-03-23 15:52:26'),
	(32, 'Guagua', '00B11', 1, '', '09081451070', '', '', '2023-03-23 15:52:26'),
	(33, 'Telabastagan', '00B30', 1, '', '09190798073', '', '', '2023-03-23 15:52:26'),
	(34, 'NLT', '00B21', 1, '', '09156096899', '', '', '2023-03-23 15:52:26'),
	(35, 'Maimpis', '00B19', 1, '', '09190798075', '', '', '2023-03-23 15:52:26'),
	(36, 'San Matias', '00B25', 1, '', '09109401184', '', '', '2023-03-23 15:52:26'),
	(37, 'Dau', '00B5', 1, '', '09054241495', '', '', '2023-03-23 15:52:26'),
	(38, 'San Fernando', '00B24', 1, '', '09190798069', '', '', '2023-03-23 15:52:26'),
	(39, 'San Jose, Del Monte', '00B83', 1, '', '09224883292', '', '', '2023-03-23 15:52:26'),
	(40, 'Marilao', '00B79', 1, '', '09062463160', '', '', '2023-03-23 15:52:26'),
	(41, 'Rodriguez', '00D12', 1, '', '09103555541', '', '', '2023-03-23 15:52:26'),
	(42, 'Sumulong Highway', '00D13', 1, '', '09271143813', '', '', '2023-03-23 15:52:26'),
	(43, 'Binan', '00D17', 1, '', '09512168934', '', '', '2023-03-23 15:52:26'),
	(44, 'Cabuyao', '00D18', 1, '', '09338180981', '', '', '2023-03-23 15:52:26'),
	(45, 'Calamba', '00D19', 1, '', '09058089884', '', '', '2023-03-23 15:52:26'),
	(46, 'Canlubang', '00D21', 1, '', '09336992639', '', '', '2023-03-23 15:52:26'),
	(47, 'Milagrosa', '00D27', 1, '', '09334893683', '', '', '2023-03-23 15:52:26'),
	(48, 'Paciano', '00D26', 1, '', '09171403845', '', '', '2023-03-23 15:52:26'),
	(49, 'San Pedro 3', '00D30', 1, '', '09287102872', '', '', '2023-03-23 15:52:26'),
	(50, 'San Pedro2', '00D31', 1, '', '09338512459', '', '', '2023-03-23 15:52:26'),
	(51, 'SLT', '00D32', 1, '', '09178990495', '', '', '2023-03-23 15:52:26'),
	(52, 'Alaminos Laguna', '00D59', 1, '', '09209695547', '', '', '2023-03-23 15:52:26'),
	(53, 'Alima', '00D34', 1, '', '09088914453', '', '', '2023-03-23 15:52:26'),
	(54, 'Bacoor', '00D36', 1, '', '09190736947', '', '', '2023-03-23 15:52:26'),
	(55, 'Cavite City', '00D38', 1, '', '09231950415', '', '', '2023-03-23 15:52:26'),
	(56, 'Molino Blvd.', '00D48', 1, '', '09669880522', '', '', '2023-03-23 15:52:26'),
	(57, 'Molino Blvd. 2', '00D49', 1, '', '09190736948', '', '', '2023-03-23 15:52:26'),
	(58, 'Tagaytay', '00D57', 1, '', '09171882535', '', '', '2023-03-23 15:52:26'),
	(59, 'Sto. Tomas', '00D80', 1, '', '09171882472', '', '', '2023-03-23 15:52:26'),
	(60, 'FBT - Mogpog', '11C7', 1, '', '09193806965', '', '', '2023-03-23 15:52:26'),
	(61, 'FBT - Sta. Cruz 1', '11C8', 1, '', '09338118986', '', '', '2023-03-23 15:52:26'),
	(62, 'Aborlan, Palawan', '11C47', 1, '', '09178974858', '', '', '2023-03-23 15:52:26'),
	(63, 'Brooke`s Point', '11C48', 1, '', '09065248160', '', '', '2023-03-23 15:52:26'),
	(64, 'Espanola', '11C50', 1, '', '09273395778', '', '', '2023-03-23 15:52:26'),
	(65, 'Puerto Princesa', '11C57', 1, '', '09366878151', '', '', '2023-03-23 15:52:26'),
	(66, 'Rizal, Palawan', '11C58', 1, '', '09078304583', '', '', '2023-03-23 15:52:26'),
	(67, 'Roxas, Palawan', '11C59', 1, '', '09206262438', '', '', '2023-03-23 15:52:26'),
	(68, 'San Jose PPC', '11C60', 1, '', '09686143730', '', '', '2023-03-23 15:52:26'),
	(69, 'San Manuel, Palawan', '11C61', 1, '', '09758533678', '', '', '2023-03-23 15:52:26'),
	(70, 'San Pedro, Palawan', '11C62', 1, '', '09997119937', '', '', '2023-03-23 15:52:26'),
	(71, 'Tiniguiban', '11C65', 1, '', '09190036124', '', '', '2023-03-23 15:52:26'),
	(72, 'Irawan', '11C56', 1, '', '09165772777', '', '', '2023-03-23 15:52:26'),
	(73, 'Bongabong', '11C26', 1, '', '09650578335', '', '', '2023-03-23 15:52:26'),
	(74, 'Calapan', '11C31', 1, '', '09993320922', '', '', '2023-03-23 15:52:26'),
	(75, 'Baco', '11C25', 1, '', '09984223087', '', '', '2023-03-23 15:52:26'),
	(76, 'FBT - San Agustin', '11C40', 1, '', '09498944800', '', '', '2023-03-23 15:52:26'),
	(77, 'FBT - Palanas', '11C69', 1, '', '09075332027', '', '', '2023-03-23 15:52:26'),
	(78, 'FBT - Umabay', '11C71', 1, '', '09469513509', '', '', '2023-03-23 15:52:26'),
	(79, 'FBT - Uson', '11C72', 1, '', '09566927493', '', '', '2023-03-23 15:52:26'),
	(80, 'Masbate City', '11C73', 1, '', '09482362647', '', '', '2023-03-23 15:52:26'),
	(81, 'Pinamarbuhan', '11C74', 1, '', '09509345319', '', '', '2023-03-23 15:52:26'),
	(82, 'Ticao', '11C75', 1, '', '09464682343', '', '', '2023-03-23 15:52:26'),
	(83, 'FBT - Cawayan', '11C68', 1, '', '09298734886', '', '', '2023-03-23 15:52:26'),
	(84, 'FBT - Cataingan', '11C67', 1, '', '09501810862', '', '', '2023-03-23 15:52:26'),
	(85, 'FBT - Pandan', '11C80', 1, '', '09557087409', '', '', '2023-03-23 15:52:26'),
	(86, 'FBT - San Angel', '11C82', 1, '', '09496146701', '', '', '2023-03-23 15:52:26'),
	(87, 'FBT - San Remigio', '11C83', 1, '', '09169537496', '', '', '2023-03-23 15:52:26'),
	(88, 'FBT - Sibalom 1', '11C84', 1, '', '09690348852', '', '', '2023-03-23 15:52:26'),
	(89, 'FBT - Sibalom 2', '11C85', 1, '', '09761825243', '', '', '2023-03-23 15:52:26'),
	(90, 'FBT - Tibiao', '11C86', 1, '', '09679923027', '', '', '2023-03-23 15:52:26'),
	(91, 'FBT - Pina', '11C92', 1, '', '09561333370', '', '', '2023-03-23 15:52:26'),
	(92, 'FBT - Mina', '11C91', 1, '', '09993712258', '', '', '2023-03-23 15:52:26'),
	(93, 'Carcar', '22D14', 1, '', '09771862719', '', '', '2023-03-23 15:52:26'),
	(94, 'Lapu - Lapu', '22D18', 1, '', '09152179427', '', '', '2023-03-23 15:52:26'),
	(95, 'Tagbilaran', '22D36', 1, '', '09457451888', '', '', '2023-03-23 15:52:26'),
	(96, 'Bata - Locsin', '22D38', 1, '', '09254552225', '', '', '2023-03-23 15:52:26'),
	(97, 'Bata - Pepsi', '22D39', 1, '', '09503986722', '', '', '2023-03-23 15:52:26'),
	(98, 'Binalbagan', '22D40', 1, '', '09177760080', '', '', '2023-03-23 15:52:26'),
	(99, 'Cadiz', '22D41', 1, '', '09166745828', '', '', '2023-03-23 15:52:26'),
	(100, 'FBT - Talisay', '22D46', 1, '', '09707418106', '', '', '2023-03-23 15:52:26'),
	(101, 'Mansilingan', '22D59', 1, '', '09956220556', '', '', '2023-03-23 15:52:26'),
	(102, 'San Enrique', '22D63', 1, '', '09996689525', '', '', '2023-03-23 15:52:26'),
	(103, 'Himamaylan', '22D49', 1, '', '09209730815', '', '', '2023-03-23 15:52:26'),
	(104, 'Gatuslao', '22D47', 1, '', '09507861480', '', '', '2023-03-23 15:52:26'),
	(105, 'Kabankalan', '22D53', 1, '', '09096777738', '', '', '2023-03-23 15:52:26'),
	(106, 'Luzuriaga', '22D56', 1, '', '09688802144', '', '', '2023-03-23 15:52:26'),
	(107, 'Bagacay', '22D68', 1, '', '09958700660', '', '', '2023-03-23 15:52:26'),
	(108, 'FBT - Batinguel', '22D73', 1, '', '09958700640', '', '', '2023-03-23 15:52:26'),
	(109, 'FBT - Jimalalud', '22D75', 1, '', '09175912331', '', '', '2023-03-23 15:52:26'),
	(110, 'Taclobo', '22D80', 1, '', '09958700775', '', '', '2023-03-23 15:52:26'),
	(111, 'Valencia', '22D81', 1, '', '09958700773', '', '', '2023-03-23 15:52:26'),
	(112, 'Canlaon', '22D42', 1, '', '09177170010', '', '', '2023-03-23 15:52:26'),
	(113, 'FBT-San Jose Extension', '22D78', 1, '', '09958700772', '', '', '2023-03-23 15:52:26'),
	(114, 'FBT- Amlan 2', '22D71', 1, '', '09958700670', '', '', '2023-03-23 15:52:26'),
	(115, 'FBT- Bacong', '22D72', 1, '', '09695201111', '', '', '2023-03-23 15:52:26');

-- Dumping structure for trigger [dev]_totalmembership.details_after_insert
-- SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_UNSIGNED_SUBTRACTION';
-- DELIMITER //
-- CREATE TRIGGER `details_after_insert` BEFORE INSERT ON `membership_details` FOR EACH ROW BEGIN
-- 	INSERT INTO `[dev]_tvouch332`.details
-- 	(`md5`, `fname`, `lname`, `email`, `address`, `bday`)
-- 	VALUES (NEW.md5, NEW.fname, NEW.lname, NEW.email, NEW.address, NEW.bday)
-- 	ON DUPLICATE KEY UPDATE `md5`= `md5`;
-- END//
-- DELIMITER ;
-- SET SQL_MODE=@OLDTMP_SQL_MODE;

-- -- Dumping structure for trigger [dev]_totalmembership.entries_after_insert
-- SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_UNSIGNED_SUBTRACTION';
-- DELIMITER //
-- CREATE TRIGGER `entries_after_insert` BEFORE INSERT ON `membership_entries` FOR EACH ROW BEGIN
-- 	INSERT INTO `[dev]_tvouch332`.bdaysend (`promo_id`, `mobile`, `detail_id`)
-- 	SELECT 2, NEW.mobile, id FROM `[dev]_tvouch332`.details,
-- 	(
-- 		SELECT `md5` FROM `[dev]_totalmembership`.membership_details
-- 		WHERE `[dev]_totalmembership`.membership_details.id = NEW.detail_id
-- 	) te
-- 	WHERE `[dev]_tvouch332`.details.`md5` = te.`md5`
-- 	ON DUPLICATE KEY UPDATE `mobile`= NEW.mobile;

-- 	INSERT INTO `rep_daily` (`date`, `unique`) VALUES (CURDATE(), 1)
-- 	ON DUPLICATE KEY UPDATE `unique` = `unique` + 1;
-- END//
-- DELIMITER ;
-- SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
