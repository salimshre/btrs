-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2026 at 05:20 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `btrs`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, '1', '1'),
(2, '2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `bus_id` int(11) NOT NULL,
  `bus_number` varchar(20) DEFAULT NULL,
  `total_seats` int(11) DEFAULT NULL,
  `bus_type` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`bus_id`, `bus_number`, `total_seats`, `bus_type`) VALUES
(1, 'BA101', 40, 'AC'),
(2, 'BA102', 45, 'AC'),
(20, 'BA103', 41, 'AC'),
(21, 'BA104', 40, 'NO AC'),
(22, 'BA105', 35, 'AC'),
(23, 'BA106', 56, 'NO AC');

-- --------------------------------------------------------

--
-- Table structure for table `passenger`
--

CREATE TABLE `passenger` (
  `passenger_id` int(11) NOT NULL,
  `name` varchar(20) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `passenger`
--

INSERT INTO `passenger` (`passenger_id`, `name`, `phone`, `password`) VALUES
(5, 'Unknown', '2147483647', 'temp'),
(6, 'SALIM SHRESTHA', '2147483647', '1'),
(8, '1', '1', '1'),
(9, '2', '2', '2'),
(10, 'salim', '9705550012', '9705550012');

-- --------------------------------------------------------

--
-- Table structure for table `route`
--

CREATE TABLE `route` (
  `route_id` int(11) NOT NULL,
  `source` varchar(20) DEFAULT NULL,
  `destination` varchar(20) DEFAULT NULL,
  `distance` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `route`
--

INSERT INTO `route` (`route_id`, `source`, `destination`, `distance`) VALUES
(1, 'biratnagar', 'kathmandu', 450),
(2, 'kathmandu', 'pokhara', 200),
(3, 'biratnagar', 'pokhara', 100),
(6, 'bhaktapur', 'tokha', 16),
(10, 'dang', 'mustang', 100),
(11, 'doti', 'sindhuli', 200),
(12, 'surkhet', 'dhankuta', 1000),
(13, 'sarlahi', 'surkhet', 26),
(14, 'bara', 'kathmandu', 300);

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `schedule_id` int(11) NOT NULL,
  `bus_id` int(11) DEFAULT NULL,
  `route_id` int(11) DEFAULT NULL,
  `departure_time` time DEFAULT NULL,
  `travel_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`schedule_id`, `bus_id`, `route_id`, `departure_time`, `travel_date`) VALUES
(1, 23, 10, '06:00:00', '2026-02-05'),
(2, 2, 2, '06:00:00', '2026-02-04'),
(3, 21, 6, '01:13:00', '0006-04-05'),
(4, 22, 1, '03:44:00', '2026-02-11'),
(6, 20, 2, '15:42:00', '2026-02-18'),
(16, 1, 11, '10:51:00', '2026-02-26');

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `ticket_id` int(11) NOT NULL,
  `passenger_id` int(11) DEFAULT NULL,
  `schedule_id` int(11) DEFAULT NULL,
  `seat_number` int(11) DEFAULT NULL,
  `booking_date` date DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket`
--

INSERT INTO `ticket` (`ticket_id`, `passenger_id`, `schedule_id`, `seat_number`, `booking_date`, `status`) VALUES
(56, 6, 3, 12, '2026-02-08', 'book');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`bus_id`);

--
-- Indexes for table `passenger`
--
ALTER TABLE `passenger`
  ADD PRIMARY KEY (`passenger_id`);

--
-- Indexes for table `route`
--
ALTER TABLE `route`
  ADD PRIMARY KEY (`route_id`),
  ADD UNIQUE KEY `source` (`source`,`destination`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`schedule_id`),
  ADD KEY `schedule_ibfk_1` (`bus_id`),
  ADD KEY `schedule_ibfk_2` (`route_id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`ticket_id`),
  ADD KEY `ticket_ibfk_2` (`schedule_id`),
  ADD KEY `ticket_ibfk_1` (`passenger_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `passenger`
--
ALTER TABLE `passenger`
  MODIFY `passenger_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `route`
--
ALTER TABLE `route`
  MODIFY `route_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `schedule_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `ticket_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `schedule`
--
ALTER TABLE `schedule`
  ADD CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`bus_id`) REFERENCES `bus` (`bus_id`),
  ADD CONSTRAINT `schedule_ibfk_2` FOREIGN KEY (`route_id`) REFERENCES `route` (`route_id`);

--
-- Constraints for table `ticket`
--
ALTER TABLE `ticket`
  ADD CONSTRAINT `ticket_ibfk_1` FOREIGN KEY (`passenger_id`) REFERENCES `passenger` (`passenger_id`),
  ADD CONSTRAINT `ticket_ibfk_2` FOREIGN KEY (`schedule_id`) REFERENCES `schedule` (`schedule_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
