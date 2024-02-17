-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Aug 20, 2018 at 11:39 AM
-- Server version: 5.1.33
-- PHP Version: 5.2.9

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mobiles`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE IF NOT EXISTS `cart` (
  `cid` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(20) NOT NULL,
  `model` varchar(20) NOT NULL,
  `quantity` int(10) NOT NULL,
  `price` int(10) NOT NULL,
  `tot_price` int(10) NOT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `cart`
--


-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `com_id` int(4) NOT NULL AUTO_INCREMENT,
  `com_date` varchar(15) NOT NULL,
  `com_desc` longtext NOT NULL,
  `com_unm` varchar(30) NOT NULL,
  `com_pid` int(5) NOT NULL,
  PRIMARY KEY (`com_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`com_id`, `com_date`, `com_desc`, `com_unm`, `com_pid`) VALUES
(1, '20/08/18', 'sr et', 'himanshu', 16);

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company`) VALUES
(1, 'Samsung'),
(2, 'Apple'),
(3, 'Gionee'),
(4, 'Sony'),
(5, 'Htc');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_name` varchar(40) NOT NULL,
  `c_email` varchar(40) NOT NULL,
  `c_query` longtext NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`c_id`, `c_name`, `c_email`, `c_query`) VALUES
(1, 'himanshu', 'abc@gmail.com', 'hiiii');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `cid` int(11) NOT NULL,
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `model` varchar(30) NOT NULL,
  `description` longtext NOT NULL,
  `display` varchar(100) NOT NULL,
  `color` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `img` varchar(100) NOT NULL,
  `rate` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_ibfk_2` (`cid`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`cid`, `id`, `model`, `description`, `display`, `color`, `price`, `img`, `rate`) VALUES
(1, 7, 'galaxy note', 'ram:2gb\r\nrom:16 gb', 'amoled display', 'black,white', 10000, 'samsung_galaxy_note.png', 4),
(1, 8, 'galaxy grand neo', 'ram:4 gb\r\nrom:32 gb', '4k,gorila glass', 'black,white', 45000, 'samsung-galaxy-grand-neo.jpeg', 0),
(2, 9, 'iphone 6 plus', 'ram:1 gb\r\nrom:16 gb', '4k', 'black,gray,rose gold', 25000, 'iphone 6plus.jpg', 2),
(2, 10, 'iphone 6', 'ram:1 gb\r\nrom:16 gb', '4k', 'black,gray,rose gold', 25000, 'iphone6.jpg', 0),
(3, 11, 'gionee m2', 'ram:2 gb\r\nrom:32 gb', 'gorila glass', 'black,white', 10000, 'gionee_m2.jpeg', 0),
(3, 12, 'gionee p2s', 'ram:2 gb\r\nrom:32 gb', '4k', 'black,blue', 20000, 'gionee_p2s.jpeg', 0),
(4, 13, 'xperia-M2', 'ram:2 gb\r\nrom:32 gb\r\n', 'amoled display', 'purple,black', 15000, 'sony_xperia_m2_dual.jpeg', 0),
(4, 14, 'xperia-E1', 'ram:4 gb\r\nrom:64 gb\r\n', '4k,gorila glass', 'black,blue', 35000, 'Sony-Xperia-E1.jpeg', 0),
(5, 15, 'desire eye-mate', 'ram:2 gb\r\nrom:32 gb', '4k', 'black,blue', 25000, 'HTC_Desire_Eye_Matt_Blue.jpg', 2),
(5, 16, 'desire-820', 'ram:4 gb\r\nrom:64 gb', '4k,gorila glass', 'black,white', 45000, 'HTC-Desire-820.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `rate`
--

CREATE TABLE IF NOT EXISTS `rate` (
  `r_id` int(4) NOT NULL AUTO_INCREMENT,
  `r_is_id` int(5) NOT NULL,
  `r_for_id` int(5) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `rate`
--

INSERT INTO `rate` (`r_id`, `r_is_id`, `r_for_id`) VALUES
(1, 2, 16),
(2, 1, 16);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fullname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `city` varchar(30) NOT NULL,
  `secque` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fullname`, `username`, `password`, `email`, `city`, `secque`, `answer`) VALUES
(1, 'gokul', 'gokul', '123456', 'gokulkansagara13@gmail.com', 'rajkot', 'What is your best friend?', 'himanshu'),
(2, 'himanshu dhamecha', 'himanshu', '123456789', 'hdhamecha3@gmail.com', 'rajkot', 'What is your best friend?', 'gokul');

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

CREATE TABLE IF NOT EXISTS `visit` (
  `v_id` int(4) NOT NULL AUTO_INCREMENT,
  `v_count` int(4) NOT NULL,
  PRIMARY KEY (`v_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `visit`
--

INSERT INTO `visit` (`v_id`, `v_count`) VALUES
(1, 5);
