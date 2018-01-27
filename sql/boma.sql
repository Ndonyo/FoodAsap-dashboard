-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 25, 2018 at 08:11 PM
-- Server version: 10.1.29-MariaDB
-- PHP Version: 7.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `boma`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`name`, `password`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `chats`
--

CREATE TABLE `chats` (
  `sno` int(11) NOT NULL,
  `userid` varchar(255) NOT NULL,
  `device_id` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `chats`
--

INSERT INTO `chats` (`sno`, `userid`, `device_id`, `timestamp`) VALUES
(8, 'jj@g.com', '1041c002ad5c4d55', '2018-01-21 11:58:31'),
(9, 'moms@gmail.com', '1041c002ad5c4d55', '2018-01-21 11:56:12');

-- --------------------------------------------------------

--
-- Table structure for table `foods`
--

CREATE TABLE `foods` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `contents` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `quantity_remaining` int(10) NOT NULL,
  `qntytype` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foods`
--

INSERT INTO `foods` (`id`, `name`, `price`, `contents`, `image`, `category`, `quantity_remaining`, `qntytype`) VALUES
(73, 'Soya meat', 45, 'Most delicious food ever in the morden history. Be proud of the revolution nigger\r', 'lib.jpg', 'Beverage', 2039, 'Plates'),
(77, 'Beef stew', 340, '<strong>Best meat in East Africa</strong>\r', 'beefstew.jpg', 'Beverage', 0, 'plates');

-- --------------------------------------------------------

--
-- Table structure for table `grocery`
--

CREATE TABLE `grocery` (
  `name` varchar(200) NOT NULL,
  `price` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `grocery`
--

INSERT INTO `grocery` (`name`, `price`) VALUES
('Brown Flowers ', 300),
('Flower', 230),
('Pink Flowers ', 300),
('Red flowers', 500);

-- --------------------------------------------------------

--
-- Table structure for table `item_category`
--

CREATE TABLE `item_category` (
  `category_name` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `item_category`
--

INSERT INTO `item_category` (`category_name`) VALUES
('grocery'),
('meat');

-- --------------------------------------------------------

--
-- Table structure for table `slsts`
--

CREATE TABLE `slsts` (
  `tprice` int(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `trxID` varchar(50) NOT NULL,
  `uID` varchar(50) NOT NULL,
  `contents` text NOT NULL,
  `status` varchar(10) DEFAULT 'PENDING',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `slsts`
--

INSERT INTO `slsts` (`tprice`, `date`, `trxID`, `uID`, `contents`, `status`, `time`, `location`) VALUES
(2100, '2018-01-16 09:32:53', '1516095172302', 'jj@g.com', 'Soya', 'PENDING', '2018-01-16 09:32:53', 'worried'),
(450, '2018-01-21 12:02:18', '1516536136797', 'jj@g.com', 'Soya', 'PENDING', '2018-01-21 12:02:18', 'KIsii'),
(17000, '2018-01-23 07:52:33', '1516693952565', 'jj@g.com', 'Beef stew', 'PENDING', '2018-01-23 07:52:33', 'KIsii'),
(1020, '2018-01-23 09:53:02', '1516701185108', 'jjs@g.com', '<br/>Beef stew', 'PENDING', '2018-01-23 09:53:02', 'bbbbb'),
(1020, '2018-01-23 09:53:37', '1516701220062', 'jjs@g.com', '<br/>Beef stew', 'PENDING', '2018-01-23 09:53:37', 'bbbbb'),
(2040, '2018-01-23 09:54:22', '1516701264468', 'jjs@g.com', '<br/>Beef stew<br/>Beef stew', 'PENDING', '2018-01-23 09:54:22', 'bbbbb'),
(1020, '2018-01-23 10:01:58', '1516701721083', 'jjs@g.com', '<br/>Beef stew', 'PENDING', '2018-01-23 10:01:58', 'bbbbb'),
(1020, '2018-01-23 10:03:26', '1516701805150', 'jjs@g.com', '<br/>Beef stew', 'PENDING', '2018-01-23 10:03:26', 'bbbbb'),
(1020, '2018-01-23 10:04:19', '1516701857513', 'jjs@g.com', '<br/>Beef stew', 'PENDING', '2018-01-23 10:04:19', 'bbbbb'),
(4080, '2018-01-23 10:15:47', '1516702545657', 'jjs@g.com', '<br/>Beef stew<br/>Beef stew<br/>Beef stew<br/>Beef stew', 'PENDING', '2018-01-23 10:15:47', 'bbbbb'),
(1020, '2018-01-23 10:17:27', '1516702645317', 'jjs@g.com', '<br/>Beef stew', 'PENDING', '2018-01-23 10:17:27', 'kisii'),
(1020, '2018-01-23 10:28:45', '1516703323562', 'jjs@g.com', '<br/>Beef stew', 'PENDING', '2018-01-23 10:28:45', 'Kisii'),
(1700, '2018-01-23 10:32:01', '1516703520140', 'jjs@g.com', '<br/>Beef stew', 'PENDING', '2018-01-23 10:32:01', 'kisii'),
(135, '2018-01-23 10:44:50', '1516704289123', 'ndonyokamau@gmail.com', '<br/>Soya meat', 'PENDING', '2018-01-23 10:44:50', 'kisii'),
(1155, '2018-01-23 12:10:28', '1516709425985', 'jj@g.com', '<br/>Beef stew<br/>Soya meat', 'PENDING', '2018-01-23 12:10:28', 'KIsii'),
(1020, '2018-01-23 12:11:49', '1516709507802', 'jj@g.com', '<br/>Beef stew', 'PENDING', '2018-01-23 12:11:49', 'nyeri');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`name`, `email`, `password`, `phone`, `location`) VALUES
('1234', 'bkangogo39@gmail.com', '1234', 'bkangogo39@gmail.com', '1234'),
('joseph', 'jj@g.com', 'bbbbb', '0726442087', 'KIsii'),
('bbbbb', 'jjs@g.com', 'bbbbb', 'jjs@g.com', 'bbbbb'),
('bbbbb', 'moms@gmail.com', 'bbbbb', 'moms@gmail.com', 'bbbbb'),
('ndonyo', 'ndonyokamau@gmail.com', '3612', 'ndonyokamau@gmail.com', '3612');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `chats`
--
ALTER TABLE `chats`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grocery`
--
ALTER TABLE `grocery`
  ADD PRIMARY KEY (`name`);

--
-- Indexes for table `item_category`
--
ALTER TABLE `item_category`
  ADD PRIMARY KEY (`category_name`);

--
-- Indexes for table `slsts`
--
ALTER TABLE `slsts`
  ADD PRIMARY KEY (`trxID`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chats`
--
ALTER TABLE `chats`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `foods`
--
ALTER TABLE `foods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
