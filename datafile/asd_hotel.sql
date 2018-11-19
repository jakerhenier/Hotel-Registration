-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 19, 2018 at 06:07 PM
-- Server version: 5.7.15-log
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asd_hotel`
--

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `client_id` int(11) NOT NULL,
  `lastname` varchar(191) NOT NULL,
  `firstname` varchar(191) NOT NULL,
  `contactno` varchar(191) NOT NULL,
  `noofadults` int(11) DEFAULT NULL,
  `noofkids` int(11) DEFAULT NULL,
  `check_in` varchar(191) NOT NULL,
  `check_out` varchar(191) NOT NULL,
  `roomno` int(11) NOT NULL,
  `paymenttype` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`client_id`, `lastname`, `firstname`, `contactno`, `noofadults`, `noofkids`, `check_in`, `check_out`, `roomno`, `paymenttype`) VALUES
(1, 'Rezane', 'Warren', '9667591163', 1, 0, '2018-11-17', '2018-11-20', 10, 'onsite'),
(2, 'Pinili', 'Jaime', '9788125214', 1, 0, '2018-11-20', '2018-11-22', 1, 'onsite');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `roomNo` int(11) NOT NULL,
  `roomType` varchar(191) NOT NULL,
  `rate` double NOT NULL,
  `status` varchar(191) NOT NULL,
  `client_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `roomNo`, `roomType`, `rate`, `status`, `client_id`) VALUES
(1, 1, 'Standard', 2000, 'Occupied', 2),
(2, 2, 'Standard', 2300, 'Available', 0),
(3, 3, 'Standard', 2600, 'Available', 0),
(4, 10, 'Deluxe', 10000, 'Occupied', 1),
(5, 11, 'Deluxe', 12000, 'Available', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL,
  `firstname` varchar(191) NOT NULL,
  `middlename` varchar(191) NOT NULL,
  `lastname` varchar(191) NOT NULL,
  `emailadd` varchar(191) NOT NULL,
  `contactno` varchar(191) NOT NULL,
  `userType` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `firstname`, `middlename`, `lastname`, `emailadd`, `contactno`, `userType`) VALUES
(1, 'admin', 'fe08386f3819b6d97e0276cdd43fa353d88c7897', 'Warren', 'Dahan', 'Rezane', 'warrenskater1@gmail.com', '9667591163', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
