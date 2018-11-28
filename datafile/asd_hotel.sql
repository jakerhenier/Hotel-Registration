-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2018 at 02:17 PM
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
-- Table structure for table `guests`
--

CREATE TABLE `guests` (
  `guest_id` int(11) NOT NULL,
  `firstname` varchar(191) NOT NULL,
  `lastname` varchar(191) NOT NULL,
  `contactno` varchar(191) NOT NULL,
  `username` varchar(191) NOT NULL,
  `password` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guests`
--

INSERT INTO `guests` (`guest_id`, `firstname`, `lastname`, `contactno`, `username`, `password`) VALUES
(1, 'Warren', 'Rezane', '09667591163', 'warshock10', '9538ab335d530f2ebde37a4b32dc396ee5eee758'),
(2, 'Jake', 'Lendio', '09078215066', 'jake123', 'ce94a14ea2e8a72a58aa4e6c35d7f91c7012bba1'),
(3, 'Jaime', 'Pinili', '09078215066', 'jaime', 'bf54f59ba326926334d94b932c4940edd1efbf7b');

-- --------------------------------------------------------

--
-- Table structure for table `histories`
--

CREATE TABLE `histories` (
  `history_id` int(11) NOT NULL,
  `guest_id` int(11) NOT NULL,
  `action` varchar(191) NOT NULL,
  `date_of_action` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `histories`
--

INSERT INTO `histories` (`history_id`, `guest_id`, `action`, `date_of_action`) VALUES
(5, 1, 'Warren Rezane reserved Room 11', '2018-11-26 14:54:57'),
(6, 1, 'Warren Rezane updated his reservation on Room 11', '2018-11-26 14:55:28'),
(7, 1, 'Warren Rezane cancelled his reservation on Room 11', '2018-11-26 15:18:10'),
(8, 3, 'Jaime Pinili reserved Room 1', '2018-11-26 15:21:57'),
(9, 3, 'Jaime Pinili cancelled his reservation on Room 1', '2018-11-26 15:23:30'),
(10, 3, 'Jaime Pinili reserved Room 3', '2018-11-26 15:24:25'),
(11, 3, 'Jaime Pinili updated his reservation on Room 3', '2018-11-26 15:32:16'),
(12, 3, 'Jaime Pinili updated his reservation on Room 3', '2018-11-26 15:32:56'),
(13, 3, 'Jaime Pinili reserved Room 11', '2018-11-28 10:21:49'),
(14, 3, 'Jaime Pinili updated his reservation on Room 3', '2018-11-28 11:17:47'),
(15, 3, 'Jaime Pinili updated his reservation on Room 3', '2018-11-28 11:18:10'),
(16, 1, 'Warren Rezane reserved Room 2', '2018-11-28 11:20:10'),
(17, 1, 'Warren Rezane updated his reservation on Room 2', '2018-11-28 11:22:57'),
(18, 3, 'Jaime Pinili cancelled his reservation on Room 3', '2018-11-28 11:33:41');

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `guest_id` int(11) NOT NULL,
  `lastname` varchar(191) NOT NULL,
  `firstname` varchar(191) NOT NULL,
  `contactno` varchar(191) NOT NULL,
  `noofadults` int(11) DEFAULT NULL,
  `noofkids` int(11) DEFAULT NULL,
  `check_in` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `check_out` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `roomno` int(11) NOT NULL,
  `paymenttype` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`guest_id`, `lastname`, `firstname`, `contactno`, `noofadults`, `noofkids`, `check_in`, `check_out`, `roomno`, `paymenttype`) VALUES
(3, 'Pinili', 'Jaime', '09078215066', 3, 2, '2018-12-05 16:00:00', '2018-12-07 16:00:00', 11, 'onsite'),
(1, 'Rezane', 'Warren', '09667591163', 2, 2, '2018-11-29 16:00:00', '2018-12-02 16:00:00', 2, 'onsite');

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
  `guest_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `roomNo`, `roomType`, `rate`, `status`, `guest_id`) VALUES
(1, 1, 'Standard', 2000, 'Available', 0),
(2, 2, 'Standard', 2300, 'Reserved', 1),
(3, 3, 'Standard', 2600, 'Available', 0),
(4, 10, 'Deluxe', 10000, 'Available', 0),
(5, 11, 'Deluxe', 12000, 'Reserved', 3);

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
-- Indexes for table `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`guest_id`);

--
-- Indexes for table `histories`
--
ALTER TABLE `histories`
  ADD PRIMARY KEY (`history_id`);

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
-- AUTO_INCREMENT for table `guests`
--
ALTER TABLE `guests`
  MODIFY `guest_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `histories`
--
ALTER TABLE `histories`
  MODIFY `history_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
