-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2020 at 09:11 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `infos`
--

-- --------------------------------------------------------

--
-- Table structure for table `bank`
--

CREATE TABLE `bank` (
  `bid` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `bank`
--

INSERT INTO `bank` (`bid`, `name`) VALUES
(3, 'الأهلي'),
(5, 'الإستثمار'),
(1, 'البلاد'),
(2, 'الراجحي'),
(4, 'الرياض');

-- --------------------------------------------------------

--
-- Table structure for table `cashier`
--

CREATE TABLE `cashier` (
  `cashier_id` int(10) NOT NULL,
  `cashier_name` varchar(100) NOT NULL,
  `position` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cid` int(10) NOT NULL,
  `name` varchar(90) NOT NULL,
  `tell1` varchar(90) NOT NULL,
  `cno` varchar(90) NOT NULL,
  `acno` varchar(90) NOT NULL,
  `bank` varchar(90) NOT NULL,
  `adres` varchar(90) NOT NULL,
  `item` text NOT NULL,
  `date` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cid`, `name`, `tell1`, `cno`, `acno`, `bank`, `adres`, `item`, `date`) VALUES
(4, 'عمر عبدالله', '055518848', '11233', '15555', 'الأهلي', '100', 'سكر', '2020-07-21'),
(5, 'بركات', '0584848822', '5488848484', '100101', 'الأهلي', '11', 'سكر', '2020-07-21'),
(6, 'على ابراهيم محمد نور ', '1', '123', '0', '12', '', 'null', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `doc`
--

CREATE TABLE `doc` (
  `did` int(11) NOT NULL,
  `fromid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `recive` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `chg` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cost` int(100) NOT NULL,
  `byan` text COLLATE utf8_unicode_ci NOT NULL,
  `datetime` datetime NOT NULL,
  `dates` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `emp`
--

CREATE TABLE `emp` (
  `eid` int(10) NOT NULL,
  `name` varchar(90) NOT NULL,
  `tell` varchar(90) NOT NULL,
  `adres` text NOT NULL,
  `nid` varchar(90) NOT NULL,
  `job` varchar(90) NOT NULL,
  `work` varchar(90) NOT NULL,
  `sal` int(20) NOT NULL,
  `date3` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `exp`
--

CREATE TABLE `exp` (
  `xid` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `exp`
--

INSERT INTO `exp` (`xid`, `name`) VALUES
(1, 'ضريبه7878'),
(2, 'إيجار'),
(3, 'ذكاة'),
(4, 'مشتريات'),
(5, 'كهرباء'),
(6, 'مياه'),
(7, '88'),
(8, '878');

-- --------------------------------------------------------

--
-- Table structure for table `expires`
--

CREATE TABLE `expires` (
  `id` int(11) NOT NULL,
  `months` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `serial` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `timeStop` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `expires`
--

INSERT INTO `expires` (`id`, `months`, `serial`, `timeStop`) VALUES
(1, '9', 'eb341820cd3a3485461a61b1e97d31b1', '2020-07-12 16:38:11');

-- --------------------------------------------------------

--
-- Table structure for table `expn`
--

CREATE TABLE `expn` (
  `exid` int(11) NOT NULL,
  `etype` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cost` int(11) NOT NULL,
  `byan` text COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `datetime` datetime NOT NULL,
  `year` int(11) NOT NULL,
  `user` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `expn`
--

INSERT INTO `expn` (`exid`, `etype`, `cost`, `byan`, `date`, `datetime`, `year`, `user`) VALUES
(1, 'مياه', 12, 'لفققف', '2020-07-18', '2020-07-18 22:10:35', 2020, '10'),
(2, 'إيجار', 1000, '888', '2020-08-02', '2020-08-02 23:54:25', 2020, '10');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id` int(11) NOT NULL,
  `barco` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `formatid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `item` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `unit` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `qunt` double NOT NULL,
  `price` double NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `cust` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `dateitem` datetime NOT NULL,
  `year` int(100) NOT NULL,
  `tax` double NOT NULL,
  `pros` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `barco`, `formatid`, `item`, `unit`, `qunt`, `price`, `type`, `cust`, `user`, `date`, `dateitem`, `year`, `tax`, `pros`) VALUES
(1, '7702018840786', '2020-07-0008-BME', 'موس', 'قطعة', 15, 1, 'نقدا', '', '10', '2020-07-14', '2020-07-14 19:54:10', 2020, 0.75, 'مبيعات'),
(2, '012000800344', '2020-07-0008-BME', 'سفناب', 'قطعة', 250, 10, 'نقدا', '', '10', '2020-07-14', '2020-07-14 19:54:10', 2020, 125, 'مبيعات'),
(3, '012000800344', '2020-07-0008-BME', 'سفناب', 'قطعة', 1, 10, 'نقدا', '', '10', '2020-07-14', '2020-07-14 19:54:10', 2020, 0.5, 'مبيعات'),
(4, '012000800344', '2020-07-0008-BME', 'سفناب', 'قطعة', 1, 10, 'نقدا', '', '10', '2020-07-14', '2020-07-14 19:54:24', 2020, 0.5, 'مبيعات'),
(45, '159993746397', '', 'حشاش', '0', 1, 0, '1', 'ahmed', '10', '2020-10-15', '2020-10-15 11:53:59', 2020, 15, 'مبيعات'),
(46, '159993746397', '', 'حشاش', '0', 1, 0, '1', 'ahmed', '10', '2020-10-15', '2020-10-15 11:54:03', 2020, 15, 'مبيعات'),
(47, '159993746397', '', 'حشاش', '0', 1, 0, '1', 'ahmed', '10', '2020-10-15', '2020-10-15 11:54:03', 2020, 15, 'مبيعات'),
(48, '159993746397', '', 'حشاش', '0', 1, 0, '1', 'ahmed', '10', '2020-10-15', '2020-10-15 11:54:04', 2020, 15, 'مبيعات'),
(49, '333', '', 'زبادي', '0', 1, 33, '1', 'ahmed', '10', '2020-10-15', '2020-10-15 11:54:11', 2020, 15, 'مبيعات'),
(50, '333', '', 'زبادي', '0', 1, 33, '1', 'ahmed', '10', '2020-10-15', '2020-10-15 11:54:13', 2020, 15, 'مبيعات'),
(51, '333', '', 'زبادي', '0', 1, 33, '1', 'ahmed', '10', '2020-10-15', '2020-10-15 11:54:13', 2020, 15, 'مبيعات'),
(52, '15999373544', '', 'العصيده الشنفاريه', '0', 1, 120, '1', 'ahmed', '10', '2020-10-15', '2020-10-15 12:38:06', 2020, 15, 'مبيعات');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `jid` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`jid`, `name`) VALUES
(1, '444');

-- --------------------------------------------------------

--
-- Table structure for table `month`
--

CREATE TABLE `month` (
  `id` int(10) NOT NULL,
  `name` varchar(80) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `month`
--

INSERT INTO `month` (`id`, `name`) VALUES
(1, 'يناير'),
(2, 'فبراير'),
(3, 'مارس'),
(4, 'ابريل'),
(5, 'مايو'),
(6, 'يونيو'),
(7, 'يوليو'),
(8, 'أغسطس'),
(9, 'سبتمبر'),
(10, 'أكتوبر'),
(11, 'نوفمبر'),
(12, 'ديسمبر');

-- --------------------------------------------------------

--
-- Table structure for table `movesh`
--

CREATE TABLE `movesh` (
  `id` int(11) NOT NULL,
  `code` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `movesh`
--

INSERT INTO `movesh` (`id`, `code`) VALUES
(1, '27');

-- --------------------------------------------------------

--
-- Table structure for table `mstor`
--

CREATE TABLE `mstor` (
  `mrid` int(11) NOT NULL,
  `barco` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(1000) COLLATE utf8_unicode_ci NOT NULL,
  `unit` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `qunt` int(11) NOT NULL,
  `price` int(100) NOT NULL,
  `store` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `datetime` datetime NOT NULL,
  `tell` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `numbercustmer` varchar(255) CHARACTER SET utf8 NOT NULL,
  `typecash` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `mstor`
--

INSERT INTO `mstor` (`mrid`, `barco`, `name`, `unit`, `qunt`, `price`, `store`, `user`, `date`, `datetime`, `tell`, `numbercustmer`, `typecash`) VALUES
(1, '111', 'عصير1', 'حبه', 20, 10, 'مخزن1', '10', '2020-07-23', '2020-07-23 17:14:50', '10', '', ''),
(2, '112', 'ملح', 'عبوه', 100, 2, 'مخزن1', '10', '2020-07-23', '2020-07-23 17:15:16', '10', '', ''),
(3, '111', 'عصير1', 'حبه', 580, 10, 'مخزن1', '10', '2020-07-23', '2020-07-23 17:15:46', '10', '', ''),
(4, '1', 'عصير1', '2', 1, 2, '', '10', '2020-07-25', '2020-07-25 10:45:42', '10', '', ''),
(5, '1', 'عصير1', '2', 1, 2, '', '10', '2020-07-25', '2020-07-25 10:48:52', '10', '', ''),
(6, '1', 's', '5', 5, 5, '', '10', '2020-07-25', '2020-07-25 11:22:50', '10', '', ''),
(7, '1', 's', '5', 5, 5, '', '10', '2020-07-25', '2020-07-25 11:23:19', '10', '', ''),
(8, '1', 's', '5', 5, 5, '', '10', '2020-07-25', '2020-07-25 11:23:39', '10', '', ''),
(9, '1', 's', '5', 5, 5, '', '10', '2020-07-25', '2020-07-25 11:23:47', '10', '', ''),
(10, '1', 's', '5', 5, 5, '', '10', '2020-07-25', '2020-07-25 11:24:31', '10', '', ''),
(11, '1', 's', '5', 5, 5, '', '10', '2020-07-25', '2020-07-25 11:25:22', '10', '', ''),
(12, '10', '101', '15', 55, 55, '', '10', '2020-07-25', '2020-07-25 11:26:09', '10', '', ''),
(13, '10', '101', '15', 55, 55, '', '10', '2020-07-25', '2020-07-25 11:26:31', '10', '', ''),
(14, '1', '1', '1', 1, 1, '', '10', '2020-07-25', '2020-07-25 11:27:00', '10', '', ''),
(15, '1111', '111', '11', 1, 11, '', '10', '2020-07-25', '2020-07-25 11:27:30', '10', '', ''),
(16, '1111', '111', '11', 1, 11, '', '10', '2020-07-25', '2020-07-25 11:28:31', '10', '', ''),
(17, '111', '111', '111', 111, 111, '', '10', '2020-07-25', '2020-07-25 11:28:51', '10', '', ''),
(18, '111', '11111', '111', 1, 111, '', '10', '2020-07-25', '2020-07-25 11:50:51', '10', '', ''),
(19, '100', '500', '500', 500, 500, 'مخزن2', '10', '2020-07-25', '2020-07-25 11:56:08', '10', '', ''),
(20, '111', '111', '111', 1, 111, '', '10', '2020-07-25', '2020-07-25 12:35:12', '10', '', ''),
(21, '111', '111', '111', 1, 111, '', '10', '2020-07-25', '2020-07-25 12:35:12', '10', '', ''),
(22, '111', '111', '111', 50, 111, '', '10', '2020-07-29', '2020-07-29 09:16:02', '10', '', ''),
(23, '111', '111', '111', 1, 111, '1', '10', '2020-08-01', '2020-08-01 09:47:44', '10', '', ''),
(24, '111', '111', '111', 1, 111, '1', '10', '2020-08-01', '2020-08-01 09:49:42', '10', '', ''),
(25, '743016542200', 'قلم', 'حبه', 100, 8, '', '10', '2020-08-01', '2020-08-01 10:52:41', '10', '', ''),
(26, '6281071272464', 'مرامي رقائق بطاطس', 'قطعة', 18, 0, '', '10', '2020-08-01', '2020-08-01 17:33:56', '10', '', ''),
(27, '120120', 'المري', 'حبه', 20, 2, '', '10', '2020-08-01', '2020-08-01 19:15:24', '10', '', ''),
(28, '6281071272464', 'مرامي رقائق بطاطس', 'قطعة', 1, 0, '', '10', '2020-08-01', '2020-08-01 19:16:11', '10', '', ''),
(29, '111', '111', '111', 1, 111, '', '10', '2020-08-02', '2020-08-02 19:53:39', '10', '', ''),
(30, '111', '111', '111', 1, 111, '', '10', '2020-08-02', '2020-08-02 19:53:39', '10', '', ''),
(31, '6281071272464', 'مرامي رقائق بطاطس', 'قطعة', 1, 0, '', '10', '2020-08-02', '2020-08-02 19:53:39', '10', '', ''),
(32, '6281071272464', 'مرامي رقائق بطاطس', 'قطعة', 1, 0, '', '10', '2020-08-02', '2020-08-02 19:53:39', '10', '', ''),
(33, '6281071272464', 'مرامي رقائق بطاطس', 'قطعة', 1, 0, '', '10', '2020-08-02', '2020-08-02 19:53:39', '10', '', ''),
(34, '6281071272464', 'مرامي رقائق بطاطس', 'قطعة', 30, 50, 'مخزن1', 'الإدارة', '2020-08-03', '2020-08-03 14:46:22', '10', '', ''),
(35, '6281071272464', 'مرامي رقائق بطاطس', 'حبه', 10, 51, 'مخزن1', 'الإدارة', '2020-08-03', '2020-08-03 14:47:17', '10', '', ''),
(36, '6281071272464', 'مرامي رقائق بطاطس', 'قطعة', 50, 0, '', 'الإدارة', '2020-08-03', '2020-08-03 14:48:09', '10', '', ''),
(37, '111', '111', '111', 1, 111, '', 'الإدارة', '2020-08-04', '2020-08-04 14:05:11', '10', '', ''),
(38, '100', '500', '500', 1, 500, '', 'الإدارة', '2020-08-04', '2020-08-04 14:06:18', '10', '', ''),
(39, '23', '', '', 25, 255, 'مخزن1', 'الإدارة', '2020-08-06', '2020-08-06 10:18:47', '10', '', ''),
(40, '111', '11122', '111', 1, 111, '', 'الإدارة', '2020-08-08', '2020-08-08 11:43:33', '10', '', ''),
(41, '111', '111', '111', 1, 111, '', 'الإدارة', '2020-08-08', '2020-08-08 11:43:33', '10', '', ''),
(42, '11', '1', '1', 1, 0, '', 'الإدارة', '2020-08-08', '2020-08-08 11:43:33', '10', '', ''),
(43, '111', '111', '111', 1, 111, '', 'الإدارة', '2020-08-08', '2020-08-08 11:44:16', '10', '', ''),
(44, '111', '111', '111', 1, 111, '', 'الإدارة', '2020-08-08', '2020-08-08 11:44:16', '10', '', ''),
(45, '111', '111', '111', 1, 111, '', 'الإدارة', '2020-08-08', '2020-08-08 11:44:16', '10', '', ''),
(46, '111', '111', '111', 1, 111, '', 'الإدارة', '2020-08-08', '2020-08-08 11:44:16', '10', '', ''),
(47, '111', '111', '111', 1, 111, '', 'الإدارة', '2020-08-08', '2020-08-08 11:44:16', '10', '', ''),
(48, '111', '111', '111', 1, 111, '', 'الإدارة', '2020-08-08', '2020-08-08 11:44:16', '10', '', ''),
(49, '111', '111', '111', 1, 111, '', 'الإدارة', '2020-08-08', '2020-08-08 11:44:16', '10', '', ''),
(50, '111', '111', '111', 1, 111, '', 'الإدارة', '2020-08-08', '2020-08-08 11:44:16', '10', '', ''),
(51, '111', '111', '111', 1, 111, 'مخزن1', 'الإدارة', '2020-08-08', '2020-08-08 11:45:07', '10', '', ''),
(52, '0111', '111', '111', 1, 111, 'مخزن1', 'الإدارة', '2020-08-08', '2020-08-08 11:45:08', '10', '', ''),
(53, '111', '111', '111', 1, 111, '', 'الإدارة', '2020-08-08', '2020-08-08 11:45:14', '10', '', ''),
(54, '111', '111', '111', 1, 111, '', 'الإدارة', '2020-08-08', '2020-08-08 11:45:28', '10', '', ''),
(55, '111', '111', '111', 1, 111, '', 'الإدارة', '2020-08-11', '2020-08-11 11:00:53', '10', '', ''),
(56, '2000', 'مرامي رقائق بطاطس', 'قطعة', 200, 20, 'مخزن1', 'الإدارة', '2020-08-12', '2020-08-12 10:38:04', '10', '', ''),
(57, '85151555', 'عطور', 'فتيل', 10, 20, '', 'الإدارة', '2020-08-12', '2020-08-12 10:39:11', '10', '', ''),
(58, '444', '500', 'قطعة', 55, 55, 'مخزن1', 'الإدارة', '2020-08-13', '2020-08-13 09:28:53', '10', '', ''),
(59, '222', '22', '22', 22, 2, '', 'الإدارة', '2020-08-13', '2020-08-13 09:29:06', '10', '', ''),
(60, '333', 'زبادي', '3', 333, 33, '', 'الإدارة', '2020-08-13', '2020-08-13 09:29:21', '10', '', ''),
(61, '445', 'توت', 'حبه', 1, 55, '', 'الإدارة', '2020-08-13', '2020-08-13 09:29:38', '10', '', ''),
(62, '2020', 'حليب', 'رطل', 2, 22, '', 'الإدارة', '2020-08-13', '2020-08-13 09:30:14', '10', '', ''),
(63, '2021', 'زيتون', 'علبه', 2, 2, '', 'الإدارة', '2020-08-13', '2020-08-13 09:30:14', '10', '', ''),
(64, '654', 'عطر', '20', 20, 20, '', 'الإدارة', '2020-08-13', '2020-08-13 09:31:08', '10', '', ''),
(65, '9966230', 'fat', 'قطعة', 30, 44, 'مخزن3', 'الإدارة', '2020-09-09', '2020-09-09 15:51:34', '10', 'samba', ''),
(66, 'a50', 'food', 'حبه', 5, 40, 'مخزن1', 'الإدارة', '2020-09-10', '2020-09-10 08:26:42', '10', '170', 'نقدا'),
(67, '361161', 'بسكويت', 'حبه', 5, 5, 'مخزن1', 'الإدارة', '2020-09-11', '2020-09-11 15:51:36', '10', '65465', 'شبكة'),
(68, '11', '1', '1', 1, 0, '', 'الإدارة', '2020-09-11', '2020-09-11 23:48:45', '10', '121122', 'نقدا'),
(69, '11', '1', '1', 1, 0, '', 'الإدارة', '2020-09-11', '2020-09-11 23:48:45', '10', '121122', 'نقدا'),
(70, '2000', '????? ????? ?????', '????', 1, 20, '', 'الإدارة', '2020-09-11', '2020-09-11 23:56:28', '10', '156858', 'نقدا');

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `pxid` int(10) NOT NULL,
  `cust` varchar(90) NOT NULL,
  `item` varchar(90) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `qunt` double NOT NULL,
  `price` double NOT NULL,
  `total` double NOT NULL,
  `pay` int(11) NOT NULL,
  `date` date NOT NULL,
  `datetime` datetime NOT NULL,
  `costst` varchar(100) NOT NULL,
  `codes` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`pxid`, `cust`, `item`, `unit`, `qunt`, `price`, `total`, `pay`, `date`, `datetime`, `costst`, `codes`) VALUES
(1, '', 'عصير1', '2', 1, 2, 0, 1, '2020-07-21', '2020-07-21 12:51:29', '', '2020-07-0002-PA'),
(2, '', 'عصير120', '2', 1, 2, 0, 0, '2020-07-21', '2020-07-21 12:51:57', '', '2020-07-0002-PA');

-- --------------------------------------------------------

--
-- Table structure for table `person`
--

CREATE TABLE `person` (
  `prid` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bank` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `acount` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `person`
--

INSERT INTO `person` (`prid`, `name`, `phone`, `type`, `bank`, `acount`, `date`) VALUES
(3, 'ahmed', '0911139459', 'g', 'الأهلي', '25243423', '2020-08-27 05:06:59'),
(5, 'ali', '0912312399', 'ghfd', 'الأهلي', '47w774', '2020-10-15 13:33:48');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `prid` int(100) NOT NULL,
  `pid` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `product_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `unit` varchar(100) CHARACTER SET utf32 COLLATE utf32_unicode_ci NOT NULL,
  `product_price` double(10,2) NOT NULL,
  `product_stock` int(100) NOT NULL,
  `p_status` enum('1','0') CHARACTER SET latin1 NOT NULL,
  `tell` double(10,2) NOT NULL,
  `numbercustmer` varchar(255) CHARACTER SET utf8 NOT NULL,
  `typecash` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`prid`, `pid`, `product_name`, `unit`, `product_price`, `product_stock`, `p_status`, `tell`, `numbercustmer`, `typecash`) VALUES
(28, '1', 'Generic One Trip Grip Grocery Bag Holder, Blue', '111', 100.00, 1000000, '0', 110.00, '', ''),
(30, '2', 'Generic One1', '500', 200.00, 1000000, '0', 500.00, '', ''),
(31, '3', 'man prodeucts', 'Ø­Ø¨Ù‡', 300.00, 1000000, '0', 10.00, '', ''),
(32, '4', 'Generic One2', 'Ù‚Ø·Ø¹Ø©', 400.00, 1000000, '0', 0.50, '', ''),
(33, '5', 'Generic One3', 'Ø­Ø¨Ù‡', 500.00, 1000000, '0', 2.00, '', ''),
(36, '6', 'Generic One4', '1', 600.00, 1000000, '0', 1.00, '', ''),
(46, '8', 'Generic One5', '111', 700.00, 1000000, '0', 110.00, '', ''),
(47, '9', 'مرامي رقائق بطاطس', 'قطعة', 20.00, 1000000, '1', 10.00, '', ''),
(48, '10', 'Generic One6', 'ÙØªÙŠÙ„', 20.00, 1000000, '0', 22.00, '', ''),
(49, '11', 'Generic One7', 'قطعة', 55.00, 1000000, '1', 10.00, '', ''),
(50, '12', 'Generic One8', '22', 2.00, 1000000, '0', 2.00, '', ''),
(51, '13', 'Ø²Ø¨Ø§Ø¯ÙŠ', '3', 33.00, 1000000, '0', 33.00, '', ''),
(52, '14', 'ØªÙˆØª', 'Ø­Ø¨Ù‡', 55.00, 1000000, '0', 10.00, '', ''),
(53, '15', 'Ø­Ù„ÙŠØ¨', 'Ø±Ø·Ù„', 22.00, 1000000, '0', 23.00, '', ''),
(54, '16', 'Ø²ÙŠØªÙˆÙ†', 'Ø¹Ù„Ø¨Ù‡', 2.00, 1000000, '0', 3.00, '', ''),
(55, '17', 'Ø¹Ø·Ø±', '20', 20.00, 1000000, '0', 20.00, '', ''),
(56, '18', 'fat', 'Ù‚Ø·Ø¹Ø©', 44.00, 1000000, '0', 55.00, 's', ''),
(57, '19', 'Ø¨Ø³ÙƒÙˆÙŠØª', 'Ø­Ø¨Ù‡', 150.00, 1000000, '0', 55.00, '6', 'Ø'),
(58, '4557865215444477', 'ØªÙ…Ø±', 'Ø­Ø¨Ù‡', 10.00, 1000000, '0', 15.00, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

CREATE TABLE `salary` (
  `salid` int(10) NOT NULL,
  `eid` varchar(90) NOT NULL,
  `name` varchar(90) NOT NULL,
  `sal1` int(11) NOT NULL,
  `haf` int(11) NOT NULL,
  `badil` int(50) NOT NULL,
  `dis` int(11) NOT NULL,
  `insu` int(11) NOT NULL,
  `state` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `month` varchar(90) NOT NULL,
  `year` varchar(90) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `transaction_id` int(11) NOT NULL,
  `invoice` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `product` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `qty` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` double(10,2) NOT NULL,
  `discount` double(10,2) NOT NULL,
  `category` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `datetime` datetime NOT NULL,
  `type` int(11) NOT NULL,
  `user` varchar(100) NOT NULL,
  `vat` int(11) NOT NULL,
  `tell` varchar(100) NOT NULL,
  `customer_id` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`transaction_id`, `invoice`, `product`, `qty`, `name`, `price`, `discount`, `category`, `date`, `datetime`, `type`, `user`, `vat`, `tell`, `customer_id`) VALUES
(211, '41', '743016542200', '1', 'قلم', 10.00, 0.00, 'حبه', '2020-08-04', '2020-08-03 21:16:56', 0, '???????', 15, '10', 0),
(249, '20200003', '-120268085', '1', 'غير معروف', 3.00, 0.00, 'قطعة', '2020-08-04', '2020-08-04 19:16:34', 0, '???????', 0, '10', 0),
(251, '2020-08-0005-FT', '120120', '1', 'المري', 2.00, 1.50, 'حبه', '2020-08-06', '2020-08-06 11:29:25', 0, '???????', 15, '10', 0),
(1045, '64', '333', '1', 'زبادي', 33.00, 0.00, '3', '2020-10-15', '2020-10-15 11:45:15', 0, '', 0, '15', 0),
(1046, '65', '2000', '1', 'مرامي رقائق بطاطس', 20.00, 0.00, 'قطعة', '2020-10-15', '2020-10-15 11:46:29', 0, 'ahmed', 0, '15', 0),
(1047, '66', '9966230', '1', 'fat', 55.00, 0.00, 'قطعة', '2020-10-15', '2020-10-15 11:50:17', 2, 'ahmed', 15, '', 0),
(1048, '67', '333', '1', 'زبادي', 33.00, 0.00, '3', '2020-10-15', '2020-10-15 12:09:13', 1, 'ahmed', 15, '', 0),
(1049, '68', '333', '1', 'زبادي', 33.00, 0.00, '3', '2020-10-15', '2020-10-15 12:10:17', 1, '', 15, '', 0),
(1050, '68', '333', '1', 'زبادي', 33.00, 0.00, '3', '2020-10-15', '2020-10-15 12:10:23', 1, '', 15, '', 0),
(1051, '68', '333', '1', 'زبادي', 33.00, 0.00, '3', '2020-10-15', '2020-10-15 12:11:13', 1, '', 15, '', 0),
(1052, '68', '333', '1', 'زبادي', 33.00, 0.00, '3', '2020-10-15', '2020-10-15 12:12:34', 1, '', 15, '', 0),
(1053, '68', '2021', '1', 'زيتون', 66.00, 0.00, 'حبه', '2020-10-15', '2020-10-15 12:12:54', 1, '', 15, '', 0),
(1054, '68', '2021', '1', 'زيتون', 66.00, 0.00, 'حبه', '2020-10-15', '2020-10-15 12:13:21', 1, '', 15, '', 0),
(1060, '69', '333', '1', 'زبادي', 33.00, 0.00, '3', '2020-10-15', '2020-10-15 12:27:43', 0, '', 0, '15', 0),
(1061, '69', '333', '1', 'زبادي', 33.00, 0.00, '3', '2020-10-15', '2020-10-15 12:28:00', 0, '', 0, '15', 0),
(1062, '69', '222', '1', '22', 2.00, 0.00, '22', '2020-10-15', '2020-10-15 12:28:33', 0, 'ahmed', 0, '15', 0),
(1063, '69', '333', '1', 'زبادي', 33.00, 0.00, '3', '2020-10-15', '2020-10-15 12:31:17', 0, '0', 0, '15', 0),
(1069, '71', '159993718474', '1', 'عصيده', 45.00, 0.00, 'قطعه', '2020-10-15', '2020-10-15 13:04:13', 0, 'ali', 0, '15', 0),
(1070, '71', '159993718474', '1', 'عصيده', 45.00, 0.00, 'قطعه', '2020-10-15', '2020-10-15 13:04:40', 2, 'ali', 0, '15', 0),
(1071, '72', '333', '1', 'زبادي', 33.00, 0.00, '3', '2020-10-20', '2020-10-20 13:15:06', 1, 'ahmed', 0, '15', 0);

-- --------------------------------------------------------

--
-- Table structure for table `sales_order`
--

CREATE TABLE `sales_order` (
  `transaction_id` int(11) NOT NULL,
  `invoice` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `product` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `qty` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `discount` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `category` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `omonth` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `oyear` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `qtyleft` varchar(25) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `dname` varchar(100) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `vat` varchar(20) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `total_amount` varchar(30) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `share`
--

CREATE TABLE `share` (
  `pid` int(10) NOT NULL,
  `barco` varchar(90) NOT NULL,
  `name` varchar(90) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `qunt` int(90) NOT NULL,
  `price` double(10,2) NOT NULL,
  `sales` double(10,2) NOT NULL,
  `tax` float NOT NULL,
  `totals` double(10,2) NOT NULL,
  `store` varchar(80) NOT NULL,
  `date` date NOT NULL,
  `customer` varchar(100) NOT NULL,
  `formid` varchar(100) NOT NULL,
  `tell` varchar(100) NOT NULL,
  `numbercustmer` varchar(255) NOT NULL,
  `typecash` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `share`
--

INSERT INTO `share` (`pid`, `barco`, `name`, `unit`, `qunt`, `price`, `sales`, `tax`, `totals`, `store`, `date`, `customer`, `formid`, `tell`, `numbercustmer`, `typecash`) VALUES
(91, '654', 'عطر', '20', 20, 44.00, 20.00, 15, 0.00, 'مخزن1', '2020-08-13', 'بركات', '2020-08-0003-PA', '10', '', ''),
(89, '2020', 'حليب', 'رطل', 2, 22.00, 23.00, 15, 0.00, '', '2020-08-13', '', '2020-08-0003-PA', '10', '', ''),
(90, '2021', 'زيتون', 'علبه', 2, 77.00, 3.00, 15, 0.00, 'مخزن1', '2020-08-13', 'عمر عبدالله', '2020-08-0003-PA', '10', '', ''),
(88, '445', 'توت', 'حبه', 1, 55.00, 10.00, 15, 0.00, '', '2020-08-13', '', '2020-08-0003-PA', '10', '', ''),
(86, '222', '22', '22', 22, 2.00, 2.00, 15, 0.00, '', '2020-08-13', '', '2020-08-0003-PA', '10', '', ''),
(87, '333', 'زبادي', '3', 333, 55.00, 55.00, 15, 0.00, 'مخزن1', '2020-08-13', 'عمر عبدالله', '2020-08-0003-PA', '10', '', ''),
(85, '85151555', 'عطور', 'فتيل', 10, 20.00, 22.00, 15, 0.00, '', '2020-08-12', '', '2020-08-0003-PA', '10', '', ''),
(54, '1115444432415145454', '111', '111', 50, 111.00, 120.00, 15, 0.00, 'مخزن1', '2020-07-29', 'عمر عبدالله', '2020-07-0002-PA', '10', '', ''),
(53, '111', '111', '111', 1, 111.00, 110.00, 15, 0.00, '', '2020-07-25', '', '2020-07-0002-PA', '10', '', ''),
(92, '9966230', 'fat', 'قطعة', 30, 44.00, 55.00, 20, 0.00, 'مخزن3', '2020-09-09', '', '202000027', '10', 'samba', ''),
(93, 'a50', 'food', 'حبه', 5, 40.00, 700.00, 20, 0.00, 'مخزن1', '2020-09-10', '', '2020-09-00026-PA', '10', '170', 'نقدا'),
(94, '361161', 'بسكويت', 'حبه', 5, 5.00, 55.00, 20, 0.00, 'مخزن1', '2020-09-11', '', '2020-09-00027-PA', '10', '65465', 'شبكة'),
(97, '2000', '????? ????? ?????', '????', 1, 20.00, 10.00, 15, 0.00, '', '2020-09-11', '', '2020-09-00027-PA', '10', '156858', 'نقدا');

-- --------------------------------------------------------

--
-- Table structure for table `socode`
--

CREATE TABLE `socode` (
  `id` int(11) NOT NULL,
  `code` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `socode`
--

INSERT INTO `socode` (`id`, `code`) VALUES
(1, '28');

-- --------------------------------------------------------

--
-- Table structure for table `store`
--

CREATE TABLE `store` (
  `sid` int(10) NOT NULL,
  `name` varchar(90) NOT NULL,
  `tell` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `store`
--

INSERT INTO `store` (`sid`, `name`, `tell`) VALUES
(1, 'مخزن1', '10'),
(2, 'مخزن2', '10'),
(3, 'مخزن3', '10'),
(4, 'مخزن4', '10');

-- --------------------------------------------------------

--
-- Table structure for table `storing`
--

CREATE TABLE `storing` (
  `sid` int(10) NOT NULL,
  `barco` varchar(200) NOT NULL,
  `name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `unit` varchar(200) NOT NULL,
  `price` double(10,2) NOT NULL,
  `qunt` int(20) NOT NULL,
  `enddate` date NOT NULL,
  `date` date DEFAULT NULL,
  `store` varchar(80) NOT NULL,
  `tell` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `storing`
--

INSERT INTO `storing` (`sid`, `barco`, `name`, `unit`, `price`, `qunt`, `enddate`, `date`, `store`, `tell`) VALUES
(30, '85151555', 'عطور', 'فتيل', 22.00, 61, '2020-08-31', '2020-08-12', '', '10'),
(31, '444', '500', 'قطعة', 55.00, 29, '2020-08-13', '2020-08-13', 'مخزن1', '10'),
(32, '222', '22', '22', 2.00, 61, '2020-08-31', '2020-08-13', '', '10'),
(27, '10', '50000', 'قطعة', 10000.00, 1946, '2020-08-08', '2020-08-11', 'مخزن1', '10'),
(33, '333', 'زبادي', '3', 33.00, 246, '2020-08-13', '2020-08-13', '', '10'),
(34, '445', 'توت', 'حبه', 10.00, 21, '2020-08-13', '2020-08-13', '', '10'),
(35, '2020', 'حليب', 'رطل', 23.00, 0, '2020-08-13', '2020-08-13', '', '10'),
(24, '11', '11122', '111', 10000.00, 162, '2020-08-08', '2020-08-08', '', '10'),
(28, '111', '111', '111', 111.00, 4, '2020-08-11', '2020-08-11', '', '10'),
(29, '2000', 'مرامي رقائق بطاطس', 'قطعة', 20.00, 179, '2020-08-12', '2020-08-12', 'مخزن1', '10'),
(36, '2021', 'زيتون', 'حبه', 66.00, 12, '2020-08-13', '2020-08-27', 'مخزن1', '10'),
(37, '654', 'عطر', 'حبه', 88.00, 11, '2020-08-13', '2020-08-27', 'مخزن1', '10'),
(38, '9966230', 'fat', 'قطعة', 55.00, 29, '2020-09-09', '2020-09-09', 'مخزن3', '10'),
(39, 'a50', 'food', 'حبه', 700.00, 5, '2020-09-10', '2020-09-10', 'مخزن1', '10'),
(40, '361161', 'بسكويت', 'حبه', 55.00, 0, '2020-09-11', '2020-09-11', 'مخزن1', '10'),
(41, '11', '1', '1', 1.00, 1, '2020-09-11', '2020-09-11', '', '10'),
(42, '11', '1', '1', 1.00, 1, '2020-09-11', '2020-09-11', '', '10'),
(43, '20001', 'بنقو', '????', 10.00, 0, '2020-09-11', '2020-09-11', '', '10'),
(44, '159993718474', 'عصيده', 'قطعه', 45.00, 29, '0000-00-00', NULL, 'store', '11'),
(45, '159993724985', 'عصيده', 'قطعه', 45.00, 33, '0000-00-00', NULL, 'store', '11'),
(46, '15999373544', 'العصيده الشنفاريه', 'قطعه', 120.00, 496, '0000-00-00', NULL, 'store', '11'),
(47, '159993746397', 'حشاش', 'قطعه', 0.00, -14, '0000-00-00', NULL, 'store', '11'),
(48, '4557865215444477', 'تمر', 'حبه', 15.00, 50, '2020-10-20', '2020-10-20', 'مخزن1', '10'),
(49, '2', 'Generic One1', '500', 500.00, 1, '2020-10-20', '2020-10-20', 'مخزن1', '10');

-- --------------------------------------------------------

--
-- Table structure for table `systematical`
--

CREATE TABLE `systematical` (
  `id` int(11) NOT NULL,
  `ar` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `en` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `lino` varchar(100) NOT NULL,
  `taxno` varchar(100) NOT NULL,
  `phone` varchar(80) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `site` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `adres` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `imge` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `systematical`
--

INSERT INTO `systematical` (`id`, `ar`, `en`, `lino`, `taxno`, `phone`, `email`, `site`, `adres`, `imge`) VALUES
(7, '', '', '0', '0', '0', '0', '0', '0', 'upload/07-08-2020-1596803973.png');

-- --------------------------------------------------------

--
-- Table structure for table `tblproduct`
--

CREATE TABLE `tblproduct` (
  `id` int(8) NOT NULL,
  `name` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `image` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `price` double(10,2) NOT NULL,
  `type` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblproduct`
--

INSERT INTO `tblproduct` (`id`, `name`, `code`, `image`, `price`, `type`) VALUES
(1, 'oq', '1', '../cashier/product-images/01-08-2020-1596294384', 2.00, '1');

-- --------------------------------------------------------

--
-- Table structure for table `unitz`
--

CREATE TABLE `unitz` (
  `yid` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `unit` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tell` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `unitz`
--

INSERT INTO `unitz` (`yid`, `name`, `unit`, `tell`) VALUES
(1, 'حبه', '0', '10'),
(2, 'قطعة', '0', '10'),
(3, 'كرتونة', '0', '10'),
(4, 'كيلو', '0', '10'),
(5, 'ربع كيلو', '0', '10'),
(6, 'نصف كيلو', '0', '10'),
(7, 'عبوه', '0', '10'),
(8, '012000800344', '0', '10'),
(9, '5', '0', '10'),
(10, '45', '0', '10'),
(11, 'صندوق', '0', '10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `level` int(11) NOT NULL,
  `username` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `work` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `timestart` time NOT NULL,
  `timeend` time NOT NULL,
  `date` datetime NOT NULL,
  `tell` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `phone`, `level`, `username`, `password`, `work`, `timestart`, `timeend`, `date`, `tell`) VALUES
(1, 'الإدارة', '10', 1, '1010', '1010', '', '00:00:00', '00:00:00', '2020-10-20 13:46:50', '0'),
(2, 'المبيعات', '1010', 2, '2020', '2020', '', '00:00:00', '00:00:00', '2020-08-28 19:53:22', '0');

-- --------------------------------------------------------

--
-- Table structure for table `uservat`
--

CREATE TABLE `uservat` (
  `id` int(10) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `uservat`
--

INSERT INTO `uservat` (`id`, `username`, `pass`) VALUES
(1, '5050', '5050');

-- --------------------------------------------------------

--
-- Table structure for table `vat`
--

CREATE TABLE `vat` (
  `vid` int(11) NOT NULL,
  `vname` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tax` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vat`
--

INSERT INTO `vat` (`vid`, `vname`, `tax`) VALUES
(1, 'ضريبة القيمة المضافة', 15);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bank`
--
ALTER TABLE `bank`
  ADD PRIMARY KEY (`bid`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `cashier`
--
ALTER TABLE `cashier`
  ADD PRIMARY KEY (`cashier_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cid`),
  ADD UNIQUE KEY `name` (`name`,`tell1`);

--
-- Indexes for table `doc`
--
ALTER TABLE `doc`
  ADD PRIMARY KEY (`did`);

--
-- Indexes for table `emp`
--
ALTER TABLE `emp`
  ADD PRIMARY KEY (`eid`),
  ADD UNIQUE KEY `name` (`name`,`tell`,`nid`);

--
-- Indexes for table `exp`
--
ALTER TABLE `exp`
  ADD PRIMARY KEY (`xid`);

--
-- Indexes for table `expires`
--
ALTER TABLE `expires`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `months` (`months`),
  ADD UNIQUE KEY `serial` (`serial`);

--
-- Indexes for table `expn`
--
ALTER TABLE `expn`
  ADD PRIMARY KEY (`exid`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `job`
--
ALTER TABLE `job`
  ADD PRIMARY KEY (`jid`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `month`
--
ALTER TABLE `month`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `movesh`
--
ALTER TABLE `movesh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mstor`
--
ALTER TABLE `mstor`
  ADD PRIMARY KEY (`mrid`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`pxid`);

--
-- Indexes for table `person`
--
ALTER TABLE `person`
  ADD PRIMARY KEY (`prid`),
  ADD UNIQUE KEY `acount` (`acount`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`prid`),
  ADD UNIQUE KEY `pid` (`pid`);

--
-- Indexes for table `salary`
--
ALTER TABLE `salary`
  ADD PRIMARY KEY (`salid`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `sales_order`
--
ALTER TABLE `sales_order`
  ADD PRIMARY KEY (`transaction_id`);

--
-- Indexes for table `share`
--
ALTER TABLE `share`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `socode`
--
ALTER TABLE `socode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `store`
--
ALTER TABLE `store`
  ADD PRIMARY KEY (`sid`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `storing`
--
ALTER TABLE `storing`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `systematical`
--
ALTER TABLE `systematical`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ar` (`ar`);

--
-- Indexes for table `tblproduct`
--
ALTER TABLE `tblproduct`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_code` (`code`);

--
-- Indexes for table `unitz`
--
ALTER TABLE `unitz`
  ADD PRIMARY KEY (`yid`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `uservat`
--
ALTER TABLE `uservat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vat`
--
ALTER TABLE `vat`
  ADD PRIMARY KEY (`vid`),
  ADD UNIQUE KEY `vname` (`vname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bank`
--
ALTER TABLE `bank`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `cashier`
--
ALTER TABLE `cashier`
  MODIFY `cashier_id` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `doc`
--
ALTER TABLE `doc`
  MODIFY `did` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `emp`
--
ALTER TABLE `emp`
  MODIFY `eid` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `exp`
--
ALTER TABLE `exp`
  MODIFY `xid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `expires`
--
ALTER TABLE `expires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `expn`
--
ALTER TABLE `expn`
  MODIFY `exid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `job`
--
ALTER TABLE `job`
  MODIFY `jid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `month`
--
ALTER TABLE `month`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `movesh`
--
ALTER TABLE `movesh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mstor`
--
ALTER TABLE `mstor`
  MODIFY `mrid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=71;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `pxid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `person`
--
ALTER TABLE `person`
  MODIFY `prid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `prid` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `salary`
--
ALTER TABLE `salary`
  MODIFY `salid` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1072;
--
-- AUTO_INCREMENT for table `sales_order`
--
ALTER TABLE `sales_order`
  MODIFY `transaction_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `share`
--
ALTER TABLE `share`
  MODIFY `pid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;
--
-- AUTO_INCREMENT for table `socode`
--
ALTER TABLE `socode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `store`
--
ALTER TABLE `store`
  MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `storing`
--
ALTER TABLE `storing`
  MODIFY `sid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT for table `systematical`
--
ALTER TABLE `systematical`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `tblproduct`
--
ALTER TABLE `tblproduct`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `unitz`
--
ALTER TABLE `unitz`
  MODIFY `yid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `uservat`
--
ALTER TABLE `uservat`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `vat`
--
ALTER TABLE `vat`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
