-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Apr 11, 2023 at 11:09 AM
-- Server version: 8.0.32-0ubuntu0.22.04.2
-- PHP Version: 8.1.2-1ubuntu2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hms`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int NOT NULL,
  `cat_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`) VALUES
(1, 'Adminstrator'),
(2, 'Technician'),
(3, 'Nurse'),
(4, 'Receptionist');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int NOT NULL,
  `uid` varchar(35) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `gender` varchar(8) NOT NULL,
  `address` mediumtext NOT NULL,
  `mobile` varchar(12) NOT NULL,
  `dob` varchar(15) NOT NULL,
  `doj` varchar(15) NOT NULL,
  `pan` varchar(20) NOT NULL,
  `aadhar` varchar(20) NOT NULL,
  `cat_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `uid`, `name`, `email`, `password`, `gender`, `address`, `mobile`, `dob`, `doj`, `pan`, `aadhar`, `cat_id`) VALUES
(1, 'U123456', 'John Doe', 'hospitalpr@saumyasarkar.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Male', 'Kolkata', '9830110244', '1996-09-11', '2014-08-08', 'NIZPS3660N', '123456784567', 1),
(2, 'U589729', 'Braden Bagrat', 'braden@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Male', 'Sodepur, Kolkata: 700114', '9876543210', '1990-10-03', '2011-09-08', 'HIXSE2990U', '567832450198', 2),
(3, 'U856249', 'Ramchandra Dilip', 'ramchandra@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Male', 'Belgharia, Kolkata: 700056', '9876543435', '1992-11-01', '2009-03-01', 'HGHSE2990U', '567832980198', 2),
(4, 'U643592', 'Gurdeep Sahni', 'gurdeep@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Male', 'Dumdum, Kolkata: 700077', '9876543325', '1992-02-24', '2009-05-09', 'HTYSE4560U', '385832980198', 2),
(5, 'U599898', 'Shanti Sulabha', 'shanti@gmail.com', '5f4dcc3b5aa765d61d8327deb882cf99', 'Female', 'Dhanbad, Jharkhand', '9456543325', '1998-05-14', '2015-06-24', 'HTJKI4560U', '385832975998', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD KEY `cat_id` (`cat_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `staff_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `staff`
--
ALTER TABLE `staff`
  ADD CONSTRAINT `staff_ibfk_1` FOREIGN KEY (`cat_id`) REFERENCES `category` (`cat_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
