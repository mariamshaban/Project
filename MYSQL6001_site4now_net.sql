-- phpMyAdmin SQL Dump
-- version 4.7.0-rc1
-- https://www.phpmyadmin.net/
--
-- Host: MYSQL6001.site4now.net
-- Generation Time: Feb 06, 2019 at 04:02 AM
-- Server version: 5.6.26-log
-- PHP Version: 7.0.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_a44015_mariamn`
--
CREATE DATABASE IF NOT EXISTS `db_a44015_mariamn` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `db_a44015_mariamn`;

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `Itemno` int(11) NOT NULL,
  `ItemName` varchar(100) NOT NULL,
  `Quantity` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Subtotal` float NOT NULL,
  `Username` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`Itemno`, `ItemName`, `Quantity`, `Price`, `Subtotal`, `Username`) VALUES
(6, ' Pants ', 1, 700, 700, 'Mariam Shaban');

-- --------------------------------------------------------

--
-- Table structure for table `clint`
--

CREATE TABLE `clint` (
  `Username` varchar(255) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Phone` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `SecurityQ` varchar(255) DEFAULT NULL,
  `SecurityAnswer` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clint`
--

INSERT INTO `clint` (`Username`, `Name`, `Phone`, `Email`, `Location`, `password`, `SecurityQ`, `SecurityAnswer`) VALUES
('salmanm', 'salma shaban', '01129222882', 'mariam.shabannti@gmail.com', 'giza', '0123', 'ok', 'not'),
('Mariam Shaban', 'fatmaaa', '201129222882', 'mm@outlook.com', 'giza', 'mariam', 'mko', 'okm'),
('lkala', 'mmmmaw', '0147895', 'm@jj.com', 'weewe', 'qqqqqqqqqq', 'kPP', 'EH'),
('salmaa', 'salma shaban', '01236383', 'sa@outlook.cpm', 'giza', 'mm', 'hhh', 'hahha'),
('Lola', 'Alaa', '01016009541', 'alaa@gmail.com', 'October', '1234', 'Hello?', 'Yes'),
('hagr', 'hagr', '0992', 'ffssss@g.com', 'qqqqqqqqqqqqqqqq', 'yy', 'kaka', 'hhuhu'),
('koku', 'kouy', '089532', 'ni@ki.com', 'l;kaha', 'hh', 'yuu', 'tt'),
('Ayman', 'Ayman hussein', '201122225766', 'ayman.oracle.h@gmail.com', 'Haram', 'abc', 'How', 'Fine'),
('esraa123', 'esraa', '01014335613', 'esraaroaa289@gmail.com', 'benha', '123', 'what is your hoppy?', 'drawing'),
('Toty', 'Toty', '01124283446', 'fatmasaeed362@gmail.com', 'Zagaziig', '1234567890', 'Ff', 'rr'),
('Moka', 'Maha', '01837473946', 'maha@yahoo.com', 'October', '55', 'Fav car', 'Opel'),
('yarahossam', 'yaraaa', '02598774563', 'yara@gg.com', 's', '011', 'aaaaaaaa', 'sssssss'),
('fatmasa', 'fftma', '0111', 'ffsssssss@g.com', 'ss', '011', 'qwqwq', 'ww'),
('sosy', 'salma shabann', '02929', 'salma@ggg.com', 'giza', 'salma', 'yuu', ',,m');

-- --------------------------------------------------------

--
-- Table structure for table `delivery`
--

CREATE TABLE `delivery` (
  `DeliveryNo` int(11) NOT NULL,
  `Phone` varchar(255) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `have`
--

CREATE TABLE `have` (
  `Itemno` varchar(255) NOT NULL DEFAULT '',
  `Orderno` varchar(255) NOT NULL DEFAULT '',
  `QTY` varchar(255) DEFAULT NULL,
  `Price` varchar(255) DEFAULT NULL,
  `Total` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `Itemno` int(255) NOT NULL,
  `Description` varchar(255) NOT NULL,
  `Price` varchar(255) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `SectionNo` int(11) DEFAULT NULL,
  `DiscountValue` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`Itemno`, `Description`, `Price`, `Name`, `Username`, `SectionNo`, `DiscountValue`) VALUES
(1, 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic ', '200$', 'Shirt', '', 2, 20),
(2, 'Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic ', '300$', 'Skirt', NULL, 3, 0),
(3, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque ', '800$', 'Shoes', NULL, 2, 160),
(6, 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque ', '700$', 'Pants ', NULL, 1, 70);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `OrderNo` varchar(255) NOT NULL DEFAULT '',
  `Total` varchar(255) DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `SpecialRequirements` varchar(255) DEFAULT NULL,
  `Order Date` varchar(255) DEFAULT NULL,
  `Username` varchar(255) DEFAULT NULL,
  `DeliveryNo` int(11) DEFAULT NULL,
  `typeofpaid` varchar(100) NOT NULL,
  `expiredate` date NOT NULL,
  `visano` int(100) NOT NULL,
  `nameincard` varchar(2000) NOT NULL,
  `status` varchar(100) NOT NULL,
  `cvn` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`OrderNo`, `Total`, `Location`, `SpecialRequirements`, `Order Date`, `Username`, `DeliveryNo`, `typeofpaid`, `expiredate`, `visano`, `nameincard`, `status`, `cvn`) VALUES
('1', '1900', '', ' popopopipop', '2019-02-03 02:00:12', 'Mariam Shaban', 0, 'option2', '0000-00-00', 0, '', 'Pending', ''),
('2', '1900', '', ' kjkjkhkhnmbm', '2019-02-03 02:01:09', 'Mariam Shaban', 0, 'option2', '2019-02-12', 888888, 'ggggggg', 'Pending', '999'),
('3', '1900', '', ' please deliver after 12 pm , because out my home before ', '2019-02-03 02:09:13', 'Mariam Shaban', 0, 'option2', '2019-03-01', 123456778, 'ayman hussein', 'Pending', '6767'),
('4', '1900', '', ' ghffgsxdjkhj', '2019-02-03 02:11:27', 'Mariam Shaban', 0, 'option2', '0000-00-00', 0, '', 'Pending', ''),
('5', '1900', '', ' ', '2019-02-04 00:27:54', 'Mariam Shaban', 0, 'option2', '0000-00-00', 0, '', 'Pending', ''),
('6', '2100', '', ' ', '2019-02-04 03:31:26', 'mariam shaban', 0, 'option2', '0000-00-00', 0, '', 'Pending', ''),
('7', '2100', '', ' ', '2019-02-06 02:03:12', 'Mariam Shaban', 0, 'option2', '0000-00-00', 0, '', 'Pending', ''),
('8', '700', '', ' ', '2019-02-06 03:45:11', 'Mariam Shaban', 0, 'option2', '0000-00-00', 0, '', 'Pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `OrderNo` int(11) NOT NULL,
  `itemno` int(11) NOT NULL,
  `Price` float NOT NULL,
  `Total` float NOT NULL,
  `Qty` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`OrderNo`, `itemno`, `Price`, `Total`, `Qty`) VALUES
(3, 1, 200, 200, 1),
(3, 2, 300, 900, 3),
(3, 3, 800, 800, 1),
(4, 1, 200, 200, 1),
(4, 2, 300, 900, 3),
(4, 3, 800, 800, 1),
(5, 1, 200, 200, 1),
(5, 2, 300, 900, 3),
(5, 3, 800, 800, 1),
(6, 1, 200, 200, 1),
(6, 2, 300, 300, 1),
(6, 3, 800, 1600, 2),
(7, 6, 700, 2100, 3),
(8, 6, 700, 700, 1);

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `Comment` varchar(255) DEFAULT NULL,
  `Rating date` varchar(255) DEFAULT NULL,
  `Value` varchar(255) DEFAULT NULL,
  `Orderno` int(11) NOT NULL DEFAULT '0',
  `commentno` varchar(25) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `SectionNo` varchar(255) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Details` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`SectionNo`, `Name`, `Details`) VALUES
('1', 'Men\'s Wear', 'Explore Leila Omidvar\'s board \"MENSWEAR DETAILS\" on Pinterest. '),
('2', 'Women\'s Wear', 'As of 2017, text messages are used by youth and adults for personal, '),
('3', 'Kis\'s Wear', 'A text file is a computer file that only contains text and has no special formatting such as bold tex');

-- --------------------------------------------------------

--
-- Table structure for table `seller`
--

CREATE TABLE `seller` (
  `Username` varchar(255) NOT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `Phone` varchar(255) DEFAULT NULL,
  `Email` varchar(255) DEFAULT NULL,
  `Security Q` varchar(255) DEFAULT NULL,
  `Security Answer` varchar(255) DEFAULT NULL,
  `Location` varchar(255) DEFAULT NULL,
  `Password` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Stand-in structure for view `viewrequst`
-- (See below for the actual view)
--
CREATE TABLE `viewrequst` (
`ordertotal` varchar(255)
,`SpecialRequirements` varchar(255)
,`Location` varchar(255)
,`Order Date` varchar(255)
,`Username` varchar(255)
,`DeliveryNo` int(11)
,`typeofpaid` varchar(100)
,`expiredate` date
,`visano` int(100)
,`nameincard` varchar(2000)
,`cvn` varchar(200)
,`status` varchar(100)
,`Name` varchar(255)
,`OrderNo` int(11)
,`itemno` int(11)
,`Price` float
,`subtotal` float
,`Qty` int(11)
);

-- --------------------------------------------------------

--
-- Structure for view `viewrequst`
--
DROP TABLE IF EXISTS `viewrequst`;

CREATE ALGORITHM=UNDEFINED DEFINER=`a44015_mariamn`@`%` SQL SECURITY DEFINER VIEW `viewrequst`  AS  (select `order`.`Total` AS `ordertotal`,`order`.`SpecialRequirements` AS `SpecialRequirements`,`order`.`Location` AS `Location`,`order`.`Order Date` AS `Order Date`,`order`.`Username` AS `Username`,`order`.`DeliveryNo` AS `DeliveryNo`,`order`.`typeofpaid` AS `typeofpaid`,`order`.`expiredate` AS `expiredate`,`order`.`visano` AS `visano`,`order`.`nameincard` AS `nameincard`,`order`.`cvn` AS `cvn`,`order`.`status` AS `status`,`items`.`Name` AS `Name`,`orderdetails`.`OrderNo` AS `OrderNo`,`orderdetails`.`itemno` AS `itemno`,`orderdetails`.`Price` AS `Price`,`orderdetails`.`Total` AS `subtotal`,`orderdetails`.`Qty` AS `Qty` from ((`order` join `orderdetails` on((`order`.`OrderNo` = `orderdetails`.`OrderNo`))) join `items` on((`items`.`Itemno` = `orderdetails`.`itemno`)))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clint`
--
ALTER TABLE `clint`
  ADD PRIMARY KEY (`Username`) USING BTREE,
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Phone` (`Phone`);

--
-- Indexes for table `delivery`
--
ALTER TABLE `delivery`
  ADD PRIMARY KEY (`DeliveryNo`);

--
-- Indexes for table `have`
--
ALTER TABLE `have`
  ADD PRIMARY KEY (`Itemno`),
  ADD KEY `itemfk` (`Itemno`),
  ADD KEY `ordfk` (`Orderno`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`Itemno`),
  ADD KEY `sectionfk` (`SectionNo`),
  ADD KEY `usernamefk` (`Username`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`OrderNo`),
  ADD KEY `OrderNo` (`OrderNo`),
  ADD KEY `usernameffk` (`Username`),
  ADD KEY `delivfk` (`DeliveryNo`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD KEY `itemfk` (`itemno`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`commentno`),
  ADD KEY `ratingfk` (`Orderno`);

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`SectionNo`);

--
-- Indexes for table `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`Username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `Itemno` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
