-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2020 at 07:53 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `renaldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` bigint(255) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `mono` bigint(255) NOT NULL,
  `gender` text NOT NULL,
  `image` longtext NOT NULL,
  `ea` text NOT NULL,
  `an` text NOT NULL,
  `da` text NOT NULL,
  `status` text NOT NULL,
  `createdby` text NOT NULL,
  `editedby` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `email`, `password`, `mono`, `gender`, `image`, `ea`, `an`, `da`, `status`, `createdby`, `editedby`) VALUES
(1, 'admin', 'admin@admin.com', 'asdf', 1234567890, 'M', 'male.png', 'YES', 'YES', 'YES', 'on', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `branch`
--

CREATE TABLE `branch` (
  `id` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `cpp` bigint(20) NOT NULL,
  `createdby` text NOT NULL,
  `editedby` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `branch`
--

INSERT INTO `branch` (`id`, `name`, `cpp`, `createdby`, `editedby`) VALUES
(1, 'Jalgaon', 100, 'sw', 'sw');

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `id` bigint(255) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `mono` bigint(255) NOT NULL,
  `gender` text NOT NULL,
  `image` longtext NOT NULL,
  `status` text NOT NULL,
  `createdby` text NOT NULL,
  `editedby` text NOT NULL,
  `branch` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`id`, `name`, `email`, `password`, `mono`, `gender`, `image`, `status`, `createdby`, `editedby`, `branch`) VALUES
(1, 'doctor', 'doctor@doctor.com', 'asdf', 1234567890, 'M', 'male.png', 'off', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `pcpp` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `gender` text NOT NULL,
  `dob` date NOT NULL,
  `createdby` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `pcpp`, `age`, `gender`, `dob`, `createdby`) VALUES
(1, 'Manti Patel', 100, 1, 'M', '2020-09-26', '1'),
(2, 'rohan', 100, 22, 'M', '1997-06-08', '1');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `name` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `mono` bigint(30) NOT NULL,
  `id` int(11) NOT NULL,
  `createdby` text NOT NULL,
  `editedby` text NOT NULL,
  `image` varchar(1000) CHARACTER SET latin1 NOT NULL DEFAULT 'avatar.png',
  `gender` text NOT NULL,
  `status` text NOT NULL,
  `noe` int(11) NOT NULL,
  `branch` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`name`, `email`, `password`, `mono`, `id`, `createdby`, `editedby`, `image`, `gender`, `status`, `noe`, `branch`) VALUES
('Saurabh Wani', 'saurabh1@gmail.com', 'asdf', 1234567890, 1, 'Saurabh Wani', 'Saurabh Wani', 'avatar.png', 'M', 'off', 2, 'Jalgaon'),
('Shree sutar', 'shree123@gmail.com', 'asdff', 1234567891, 2, 'Saurabh Sunil Wani', 'Saurabh Sunil Wani', 'avatar.png', 'M', '', 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `branch`
--
ALTER TABLE `branch`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctor`
--
ALTER TABLE `doctor`
  MODIFY `id` bigint(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
