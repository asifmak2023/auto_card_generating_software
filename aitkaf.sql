-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 31, 2024 at 01:49 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aitkaf`
--

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `sno` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `fname` text DEFAULT NULL,
  `gender` text NOT NULL DEFAULT 'male',
  `forum` text DEFAULT 'other',
  `id_no` int(11) DEFAULT NULL,
  `town` text DEFAULT NULL,
  `phone` text DEFAULT NULL,
  `cnic` text DEFAULT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`sno`, `name`, `fname`, `gender`, `forum`, `id_no`, `town`, `phone`, `cnic`, `image`) VALUES
(749, 'Muhammad Asif Ahmed', 'Ahmed Khan', 'Male', 'PAT', 1, 'Orangi Town', '0300987654', '3333333', 'assets/uploads/IMG_3243B.jpg'),
(752, 'Muhammad Asif', 'Ahmed Khan', 'Male', 'PAT', 2, 'Orangi Town', '03303696062', '42465756322', 'assets/uploads/IMG_3243B.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `sno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=753;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
