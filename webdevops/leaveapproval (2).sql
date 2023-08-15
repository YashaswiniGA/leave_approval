-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 09, 2023 at 04:36 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leaveapproval`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminlogin`
--

CREATE TABLE `adminlogin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminlogin`
--

INSERT INTO `adminlogin` (`id`, `username`, `password`) VALUES
(1, 'admin', 'admin'),
(2, 'admin2', 'admin2');

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `id` int(4) NOT NULL,
  `clORrh` enum('cl','rh') NOT NULL,
  `employeeID` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `division` varchar(50) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `numberOfDays` int(4) NOT NULL,
  `leaveFrom` date NOT NULL,
  `leaveTo` date NOT NULL,
  `reason` varchar(250) NOT NULL,
  `altArrangements` varchar(250) NOT NULL,
  `cl_Count` int(4) NOT NULL DEFAULT 15,
  `rh_Count` int(4) NOT NULL DEFAULT 3,
  `status` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`id`, `clORrh`, `employeeID`, `name`, `division`, `designation`, `numberOfDays`, `leaveFrom`, `leaveTo`, `reason`, `altArrangements`, `cl_Count`, `rh_Count`, `status`) VALUES
(54, 'rh', '1BM21CS253', 'Yashaswini G A', 'Technical staff', 'Professor', 2, '2023-07-24', '2023-07-26', 'szdfghjhkl', '', 10, 1, 1),
(58, 'cl', '1BM21CS253', 'Yashaswini G A', 'Technical staff', 'professor', 2, '2023-07-24', '2023-07-26', 'phd work', '', 8, 3, 1),
(59, 'rh', 'lm1234', 'lmn', 'Technical staff', 'Professor', 1, '2023-07-24', '2023-07-25', 'trip', '', 15, 2, 0),
(60, 'cl', 'lm1234', 'Yashaswini G A', 'D', 'Professor', 2, '2023-07-25', '2023-07-27', 'aFasgbth', '', 13, 2, 0),
(61, '', '', '', '', '', 0, '0000-00-00', '0000-00-00', '', '', 15, 3, 0),
(62, 'rh', 'abcde1234', 'abcde', 'Technical staff', 'Professor', 2, '2023-07-25', '2023-07-27', 'phd work', '', 15, 1, 0),
(63, 'rh', 'abcde1234', 'abcde', 'Technical staff', 'Professor', 1, '2023-07-25', '2023-07-26', 'phd work', '', 15, -1, 0),
(64, 'cl', '1BM21CS253', 'Yashaswini G A', 'Technical staff', 'Professor', 2, '2023-07-25', '2023-07-27', 'trip', '', 6, 1, -1),
(65, 'cl', '1BM21CS00', 'Yashwanth G A', 'Technical staff', 'Professor', 2, '2023-07-25', '2023-07-27', 'PHD Work', '', 13, 3, 0),
(66, 'cl', '1BM21CS000', 'Yashwanth G A', 'Technical staff', 'Professor', 2, '2023-07-25', '2023-07-27', 'PHD work', '', 13, 3, 1),
(67, 'rh', '1BM21CS000', 'Yashwanth G A', 'Technical staff', 'Professor', 3, '2023-07-25', '2023-07-28', 'Trip', '', 13, -1, -1),
(68, 'cl', '1BM21CS252', 'Yashaswini M R', 'Technical staff', 'Professor', 2, '2023-07-29', '2023-07-31', 'TRIP', '', 13, 3, -1);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `id` int(4) NOT NULL,
  `firstName` varchar(30) NOT NULL,
  `lastName` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `employeeID` varchar(15) NOT NULL,
  `department` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `pp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`id`, `firstName`, `lastName`, `email`, `employeeID`, `department`, `password`, `pp`) VALUES
(5, 'Yashaswini', 'G A', 'yashaswiniga.cs21@bmsce.ac.in', '1BM21CS253', 'cse', '$2y$10$2MSu9l2Sylw6KsVJUoBkouGewEvgUDEVG5RuAF3w2L/8aWTaRk0ai', '1BM21CS25364bd008ac54f41.48209260.jpg'),
(7, 'lmn', 'Y Z', 'lmn@gmail.com', 'lm1234', 'ece', '$2y$10$s4t2xNx/zenPq/grzUKbHeJTdw2usoo4Am2crU5lJnkruEvw5rxqG', 'lm123464bd4ea5ec8033.99389683.jpg'),
(8, 'abcde', 'Y Z', 'abcde@gmail.com', 'abcde1234', 'mech', '$2y$10$tQs9jqt3CD7.fl1JqAL7LOpXgGJ7YVxbn9xwRUMozAdvbMPrRQV7.', 'abcde123464be5b70db9001.25418839.png'),
(9, 'Yashwanth', 'G A', 'yashwanth@gmail.com', '1BM21CS000', 'ece', '$2y$10$CooIvASvAJgXGwAOHbmR3ev01fAkcbpGDh1/9TcARyAQY9EH95rnu', '1BM21CS00064be6622a21f04.63426429.jpg'),
(10, 'yashu', 'M R', 'yashasvinimr@gmail.com', '1BM21CS252', 'cse', '$2y$10$PvCnZNOV.97mXdK9vtKRee1PP2NwJn.iFEwl1nHHrdO9szb80lcPi', '1BM21CS25264c39756932e60.16722520.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminlogin`
--
ALTER TABLE `adminlogin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `application`
--
ALTER TABLE `application`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adminlogin`
--
ALTER TABLE `adminlogin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `application`
--
ALTER TABLE `application`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
