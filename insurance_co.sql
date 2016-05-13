-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 18, 2010 at 08:16 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `insurance_co`
--

-- --------------------------------------------------------

--
-- Table structure for table `accident_details`
--

CREATE TABLE IF NOT EXISTS `accident_details` (
  `licence_plate` varchar(20) NOT NULL,
  `fir_no` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `expense` int(11) NOT NULL,
  `claim_no` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`fir_no`),
  KEY `VIN` (`licence_plate`,`fir_no`),
  KEY `VIN_2` (`licence_plate`,`fir_no`),
  KEY `Report_num` (`fir_no`),
  KEY `Report_num_2` (`fir_no`),
  KEY `VIN_3` (`licence_plate`,`fir_no`,`description`),
  KEY `licence_plate` (`licence_plate`),
  KEY `report_no` (`fir_no`),
  KEY `claim_no` (`claim_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `accident_details`
--

INSERT INTO `accident_details` (`licence_plate`, `fir_no`, `description`, `expense`, `claim_no`, `date`) VALUES
('ka-25-0111', 26532, 'dfgdf dfg sdf', 123234, 1001, '2010-02-04'),
('ka-25-0111', 264851, 'i am death', 56000, 1001, '2010-04-14'),
('ka-25-0111', 12864123, 'bhuihjkh mhn k', 150000, 1001, '2010-09-12');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE IF NOT EXISTS `address` (
  `street` varchar(50) NOT NULL,
  `city` varchar(20) NOT NULL,
  `state` varchar(20) NOT NULL,
  `zip` int(11) NOT NULL,
  PRIMARY KEY (`street`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `address`
--


-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `admin_id` varchar(20) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
('1', 'admin', 'admin'),
('abararS', 'abrars', 'password'),
('akashr', 'akashr', 'password');

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE IF NOT EXISTS `agent` (
  `agent_id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(100) NOT NULL,
  `hashed_password` varchar(60) NOT NULL,
  `email` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`agent_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`agent_id`, `name`, `phone`, `address`, `hashed_password`, `email`) VALUES
('ban2541', 'Akash Rungta', '9154321763', 'nitk', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'akash.rngt@gmail.com'),
('dummy', 'dummy', 'dummy', 'dummy', 'dummydummy', 'dummy'),
('man5148', 'Archit Sinha', '9535616467', 'A504, tower 3, mega hostels, NITK', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'architsinha@gmail.com'),
('mum654', 'shardul mhetre', '81457924185', 'mega hostel 3', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'shardul.mhetre@gmail.com'),
('nag478', 'Sanketh Naragrude', '7812458769', 'nagpur', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'sanket.n@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE IF NOT EXISTS `car` (
  `licence_plate` varchar(20) NOT NULL,
  `purchase_date` date NOT NULL,
  `make` varchar(20) DEFAULT NULL,
  `model_no` int(11) NOT NULL,
  `description` varchar(100) DEFAULT NULL,
  `policy_no` varchar(20) NOT NULL,
  `value` int(11) NOT NULL,
  PRIMARY KEY (`licence_plate`),
  KEY `policy_no` (`policy_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`licence_plate`, `purchase_date`, `make`, `model_no`, `description`, `policy_no`, `value`) VALUES
('154582560', '2003-03-16', 'icon', 1684065, 'asd asd sad as', 'mn120', 650000),
('23820', '1999-09-12', 'maruthi', 321651464, 'jhgjhgb g jh j j\r\ng vj\r\n \r\n', 'hg189', 350000),
('361251', '2002-02-16', 'suzuki', 25151510, 'hello world 2', 'gb240', 520000),
('4586214', '2001-09-17', 'volvo', 2244410, 'uykh ihjgrt n hfu\r\n uincvh\r\n', 'mk458', 1050000),
('9561821', '2001-02-17', 'kavasaki', 268740, 'mbn sdmf jksdf sdf sd', 'as461', 450000),
('ka-25-0111', '2005-02-15', 'maruti', 800, NULL, 'ac452', 2000000);

-- --------------------------------------------------------

--
-- Table structure for table `claim`
--

CREATE TABLE IF NOT EXISTS `claim` (
  `claim_no` int(11) NOT NULL AUTO_INCREMENT,
  `policy_no` varchar(20) NOT NULL,
  `dispatch_amt` int(11) DEFAULT NULL,
  `claim_status` varchar(20) NOT NULL DEFAULT 'not_verified',
  PRIMARY KEY (`claim_no`),
  KEY `policy_no` (`policy_no`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1006 ;

--
-- Dumping data for table `claim`
--

INSERT INTO `claim` (`claim_no`, `policy_no`, `dispatch_amt`, `claim_status`) VALUES
(1000, 'dummy', -1, 'not_verified'),
(1001, 'ac452', 4000, 'verified'),
(1004, 'fr4567', 2000, 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `city` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  KEY `city` (`city`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--


-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE IF NOT EXISTS `customer` (
  `cust_id` varchar(20) NOT NULL,
  `name` varchar(20) NOT NULL,
  `ssn` int(11) NOT NULL,
  `licence_no` varchar(10) DEFAULT NULL,
  `dob` date NOT NULL,
  `age` int(2) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `hashed_password` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  PRIMARY KEY (`cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Custumer information';

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `name`, `ssn`, `licence_no`, `dob`, `age`, `phone`, `address`, `hashed_password`, `email`) VALUES
('abrars2002', 'Abrar S', 12345, '0', '1984-05-06', 26, '9154214589', 'Hubli', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'abrar2002as@hotmail.com'),
('akhilshah', 'Akhil Shah', 65475, 'k0206-187', '1985-01-05', 25, '78457842874', 'hubli', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'akhilshah@gmail.com'),
('ayush990', 'Ayush kumar', 19875, '0', '1988-05-06', 22, '9154213226', 'bihar', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'ayush990@gmail.com'),
('dummy', 'dummy', -1, 'dummy', '1985-11-14', 0, 'dummy', 'dummy', 'dummy', 'dummy'),
('rahulk90', 'Rahul Kumar', 64854, 'bh0306-255', '1990-05-04', 20, '9743521478', 'B105, tower 3 , mega hostel, NITK', '5baa61e4c9b93f3f0682250b6cf8331b7ee68fd8', 'rahulk@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `house`
--

CREATE TABLE IF NOT EXISTS `house` (
  `house_no` varchar(20) NOT NULL,
  `house_value` int(11) NOT NULL,
  `build_date` date NOT NULL,
  `policy_no` varchar(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `description` varchar(1000) NOT NULL,
  PRIMARY KEY (`house_no`),
  KEY `policy_no` (`policy_no`),
  KEY `policy_no_2` (`policy_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `house`
--

INSERT INTO `house` (`house_no`, `house_value`, `build_date`, `policy_no`, `address`, `description`) VALUES
('10', 500000, '0000-00-00', 'ax240', 'fhjksd fsdf ksdfh sdk', 'sdfhksdfb idsfm sdf'),
('120', 500000, '0000-00-00', 'pl230', 'asd as as as', 'hksjdfhk sdf ksd fkhsdfk'),
('3650', 985000, '0000-00-00', 'wq589', 'sdf sd fkd sfjk', 'sdkf sdkf s\r\nsdf sdf\r\n sdf s\r\n'),
('650', 200000, '0000-00-00', 'xz840', 'fsd sdfb isdf', 'k sdfhksdfdfsf ds'),
('840', 560000, '0000-00-00', 'xm840', 'dsad as d asd', 'jasdb asd asd'),
('h45', 20000, '0000-00-00', 'fr4567', 'fvghf', 'gdfgvbdf');

-- --------------------------------------------------------

--
-- Table structure for table `house_claim`
--

CREATE TABLE IF NOT EXISTS `house_claim` (
  `house_no` varchar(20) NOT NULL,
  `fir_no` int(11) NOT NULL,
  `description` varchar(100) NOT NULL,
  `expense` int(11) NOT NULL,
  `claim_no` int(11) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`fir_no`),
  KEY `claim_no` (`claim_no`),
  KEY `house_no` (`house_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `house_claim`
--

INSERT INTO `house_claim` (`house_no`, `fir_no`, `description`, `expense`, `claim_no`, `date`) VALUES
('h45', 2142, 'fhjgygty', 20000, 1004, '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `image`
--

CREATE TABLE IF NOT EXISTS `image` (
  `ImgID` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `ImgTitle` varchar(255) NOT NULL DEFAULT 'Untitled',
  `ImgType` varchar(255) NOT NULL DEFAULT 'jpg',
  `ImgData` mediumblob NOT NULL,
  PRIMARY KEY (`ImgID`),
  UNIQUE KEY `ImgID` (`ImgID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `image`
--


-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE IF NOT EXISTS `payment` (
  `policy_no` varchar(20) NOT NULL,
  `premium` int(11) NOT NULL,
  `renewal_date` date NOT NULL,
  `status` varchar(10) NOT NULL,
  KEY `Policy_num` (`policy_no`),
  KEY `policy_no` (`policy_no`),
  KEY `policy_no_2` (`policy_no`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`policy_no`, `premium`, `renewal_date`, `status`) VALUES
('ac452', 90, '2010-11-20', 'Pending'),
('xz840', 1500, '2010-06-14', 'Pending'),
('fr4567', 2000, '1993-02-18', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE IF NOT EXISTS `policy` (
  `policy_no` varchar(20) NOT NULL,
  `agent_id` varchar(20) NOT NULL,
  `type` varchar(20) NOT NULL,
  `issue_date` date NOT NULL,
  `term_price` int(11) NOT NULL,
  `deductible` int(11) NOT NULL,
  `coverage` int(11) NOT NULL,
  `cust_id` varchar(20) NOT NULL,
  PRIMARY KEY (`policy_no`),
  KEY `Agent_id` (`agent_id`),
  KEY `Cust_id` (`cust_id`),
  KEY `Agent_id_2` (`agent_id`),
  KEY `cust_id_2` (`cust_id`),
  KEY `cust_id_3` (`cust_id`),
  KEY `agent_id_3` (`agent_id`),
  KEY `cust_id_4` (`cust_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `policy`
--

INSERT INTO `policy` (`policy_no`, `agent_id`, `type`, `issue_date`, `term_price`, `deductible`, `coverage`, `cust_id`) VALUES
('ac452', 'ban2541', 'Accident', '2006-08-14', 100, 10, 1000, 'abrars2002'),
('as150', 'ban2541', 'Accident', '2008-09-13', 100, 90, 10000, 'abrars2002'),
('as461', 'nag478', 'Accident', '2004-09-13', 250, 100, 56000, 'rahulk90'),
('ax240', 'ban2541', 'Fire', '2008-08-15', 540, 90, 45000, 'abrars2002'),
('dummy', 'dummy', 'dummy', '1982-11-14', -1, -1, -1, 'dummy'),
('fr4567', 'ban2541', 'Fire', '1994-03-16', 10000, 5000, 20000, 'abrars2002'),
('gb240', 'man5148', 'Accident', '2004-09-16', 240, 230, 42000, 'ayush990'),
('hg189', 'man5148', 'Accident', '2007-10-16', 120, 50, 156000, 'ayush990'),
('mk458', 'nag478', 'Accident', '2008-11-14', 4500, 1000, 950000, 'abrars2002'),
('mn120', 'ban2541', 'Accident', '2009-10-16', 120, 90, 15000, 'ayush990'),
('pl230', 'nag478', 'Fire', '1998-07-13', 350, 40, 45000, 'rahulk90'),
('wq589', 'nag478', 'Fire', '2007-10-16', 6500, 100, 560000, 'rahulk90'),
('xm840', 'mum654', 'Fire', '2008-09-16', 600, 100, 50600, 'akhilshah'),
('xz840', 'ban2541', 'Fire', '2006-10-15', 400, 90, 40000, 'akhilshah');

-- --------------------------------------------------------

--
-- Table structure for table `policy_type`
--

CREATE TABLE IF NOT EXISTS `policy_type` (
  `type_id` int(11) NOT NULL AUTO_INCREMENT,
  `type_name` varchar(20) CHARACTER SET latin1 NOT NULL,
  `description` varchar(5000) CHARACTER SET latin1 DEFAULT NULL,
  PRIMARY KEY (`type_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `policy_type`
--

INSERT INTO `policy_type` (`type_id`, `type_name`, `description`) VALUES
(1, 'Accident', NULL),
(2, 'Fire', NULL),
(3, 'Mediclaim', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accident_details`
--
ALTER TABLE `accident_details`
  ADD CONSTRAINT `accident_details_ibfk_1` FOREIGN KEY (`licence_plate`) REFERENCES `car` (`licence_plate`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `accident_details_ibfk_2` FOREIGN KEY (`claim_no`) REFERENCES `claim` (`claim_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `car`
--
ALTER TABLE `car`
  ADD CONSTRAINT `car_ibfk_1` FOREIGN KEY (`policy_no`) REFERENCES `policy` (`policy_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `claim`
--
ALTER TABLE `claim`
  ADD CONSTRAINT `claim_ibfk_1` FOREIGN KEY (`policy_no`) REFERENCES `policy` (`policy_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `house`
--
ALTER TABLE `house`
  ADD CONSTRAINT `house_ibfk_1` FOREIGN KEY (`policy_no`) REFERENCES `policy` (`policy_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `house_claim`
--
ALTER TABLE `house_claim`
  ADD CONSTRAINT `house_claim_ibfk_1` FOREIGN KEY (`house_no`) REFERENCES `house` (`house_no`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `house_claim_ibfk_2` FOREIGN KEY (`claim_no`) REFERENCES `claim` (`claim_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `payment`
--
ALTER TABLE `payment`
  ADD CONSTRAINT `payment_ibfk_1` FOREIGN KEY (`policy_no`) REFERENCES `policy` (`policy_no`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `policy`
--
ALTER TABLE `policy`
  ADD CONSTRAINT `policy_ibfk_2` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `policy_ibfk_3` FOREIGN KEY (`agent_id`) REFERENCES `agent` (`agent_id`) ON DELETE NO ACTION ON UPDATE CASCADE;
