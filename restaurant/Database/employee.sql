-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 18, 2016 at 03:06 PM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `employee`
--

-- --------------------------------------------------------

--
-- Table structure for table `foodorder`
--

CREATE TABLE IF NOT EXISTS `foodorder` (
`order_id` int(11) NOT NULL,
  `customar_name` varchar(50) NOT NULL,
  `table_number` varchar(20) NOT NULL,
  `waiter_name` varchar(80) NOT NULL,
  `chef_name` varchar(50) NOT NULL,
  `food_details` varchar(200) NOT NULL,
  `completestatus` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `foodorder`
--

INSERT INTO `foodorder` (`order_id`, `customar_name`, `table_number`, `waiter_name`, `chef_name`, `food_details`, `completestatus`, `created_at`) VALUES
(1, 'ABCD', '2', 'Rafatullah Mohmand', 'Azhar Ali', 'Fanta', 1, '2016-04-15 09:43:32'),
(2, 'EFGH', '6', 'Niyaz Uddin', 'Ahmed Shehzad', 'Water', 1, '2016-04-15 09:43:59'),
(3, 'HIJK', '7', 'Umar Akmal', 'Misbah ul Haq', 'Rosted Kabab', 1, '2016-04-15 09:47:16'),
(4, 'Tabassum', '2', 'Rafatullah Mohmand', 'Shahid Afridi', 'TIK Special Nan cake', 1, '2016-04-17 10:38:28'),
(5, 'Munia', '7', 'Niyaz Uddin', 'Ahmed Shehzad', '4', 0, '2016-04-17 10:48:40'),
(6, 'Marzan', '5', 'Umar Akmal', 'Misbah ul Haq', '3', 0, '2016-04-17 13:10:33'),
(7, 'miss', '3', 'Rafatullah Mohmand', 'Azhar Ali', 'pasta', 1, '2016-04-18 10:14:47');

-- --------------------------------------------------------

--
-- Table structure for table `ordertableofcustomer`
--

CREATE TABLE IF NOT EXISTS `ordertableofcustomer` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `tableno` varchar(255) NOT NULL,
  `itemno` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ordertableofcustomer`
--

INSERT INTO `ordertableofcustomer` (`id`, `name`, `tableno`, `itemno`, `quantity`) VALUES
(2, 'Tabassum', '2', '3', '1'),
(3, 'Munia', '7', '4', '2'),
(4, 'Onny', '3', '3', '1'),
(5, 'Labony', '2', '1', '6'),
(6, 'Easha', '3', '4', '6'),
(7, 'Ria', '4', '1', '1'),
(8, 'momo', '2', '4', '2'),
(9, 'nila', '2', '4', '4'),
(10, 'Marzan', '5', '3', '2'),
(11, 'Miss', '3', '3', '1');

-- --------------------------------------------------------

--
-- Table structure for table `requestcomplete`
--

CREATE TABLE IF NOT EXISTS `requestcomplete` (
`id_req` int(11) NOT NULL,
  `name_id` varchar(13) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `requestcomplete`
--

INSERT INTO `requestcomplete` (`id_req`, `name_id`) VALUES
(5, '4'),
(6, '7');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`user_id` int(5) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `user_email` varchar(35) NOT NULL,
  `user_pass` varchar(50) NOT NULL,
  `designation` int(5) NOT NULL,
  `chefavlinfo` int(5) NOT NULL,
  `waiteravlinfo` int(5) NOT NULL,
  `total_order` int(11) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `designation`, `chefavlinfo`, `waiteravlinfo`, `total_order`) VALUES
(1, 'Manager', 'admin@a.com', '81dc9bdb52d04dc20036dbd8313ed055', 0, 0, 0, 0),
(2, 'Misbah ul Haq', 'mis@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 0, 1, 2),
(3, 'Azhar Ali', 'az@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1, 1, 2),
(4, 'Shahid Afridi', 'sh@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1, 1, 1),
(5, 'Ahmed Shehzad', 'ash@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 0, 1, 2),
(6, 'Rafatullah Mohmand', 'rm@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 2, 1, 1, 3),
(7, 'Umar Akmal', 'ua@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 2, 1, 0, 2),
(8, 'Niyaz Uddin', 'nz@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 2, 1, 0, 2),
(9, 'ria', 'ria@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 1, 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `foodorder`
--
ALTER TABLE `foodorder`
 ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `ordertableofcustomer`
--
ALTER TABLE `ordertableofcustomer`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `requestcomplete`
--
ALTER TABLE `requestcomplete`
 ADD PRIMARY KEY (`id_req`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`user_id`), ADD UNIQUE KEY `email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `foodorder`
--
ALTER TABLE `foodorder`
MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `ordertableofcustomer`
--
ALTER TABLE `ordertableofcustomer`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `requestcomplete`
--
ALTER TABLE `requestcomplete`
MODIFY `id_req` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `user_id` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
