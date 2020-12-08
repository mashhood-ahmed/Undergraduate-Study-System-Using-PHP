-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 25, 2020 at 09:19 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `accounts`
--

-- --------------------------------------------------------

--
-- Table structure for table `faculty`
--

CREATE TABLE `faculty` (
  `id` int(10) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `dept` varchar(20) NOT NULL,
  `gender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faculty`
--

INSERT INTO `faculty` (`id`, `firstName`, `lastName`, `email`, `password`, `dept`, `gender`) VALUES
(1, 'Sohail', 'Baig', 'sohailbaig@gmail.com', 'admin', 'computer science', 'male'),
(2, 'Shahid', 'Mehmood', 'shahid@gmail.com', 'admmin', 'software engineering', 'Male'),
(8, 'Amer', 'Taj', 'amer@gmail.com', 'amer', 'computer science', 'Male'),
(9, 'Iftikhar', 'Ahmed', 'ifthikhar@gmail.com', 'iftikhar', 'software engineering', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `offered`
--

CREATE TABLE `offered` (
  `id` int(11) NOT NULL,
  `title` varchar(20) NOT NULL,
  `code` varchar(10) NOT NULL,
  `credit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offered`
--

INSERT INTO `offered` (`id`, `title`, `code`, `credit`) VALUES
(1, 'C++', 'cs10', 4),
(2, 'Data Structures', 'cs20', 3),
(3, 'OOP', 'cs30', 4),
(4, 'Automata Theory', 'cs40', 3),
(10, 'Web Technologies', 'CS-50', 3);

-- --------------------------------------------------------

--
-- Table structure for table `stdcourse`
--

CREATE TABLE `stdcourse` (
  `id` int(11) NOT NULL,
  `std_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `stdcourse`
--

INSERT INTO `stdcourse` (`id`, `std_id`, `c_id`) VALUES
(21, 13, 1),
(22, 13, 2);

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(10) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `regNo` varchar(15) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `dept` varchar(30) NOT NULL,
  `gender` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `firstName`, `lastName`, `regNo`, `email`, `password`, `dept`, `gender`) VALUES
(13, 'Abubakar', 'Khan', '001', 'abubakar@gmail.com', 'admin', 'computer science', 'Male'),
(17, 'Umer', 'Khan', '002', 'aizaz762@gmail.com', 'asd', 'computer science', 'Male'),
(18, 'Usman', 'Khan', '003', 'usman@gmail.com', '123', 'computer system', 'Male'),
(20, 'Muhammad', 'Ali', '004', 'ali@gmail.com', 'ali', 'software engineering', 'Male');

-- --------------------------------------------------------

--
-- Table structure for table `timetable`
--

CREATE TABLE `timetable` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `tt` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `timetable`
--

INSERT INTO `timetable` (`id`, `title`, `description`, `tt`) VALUES
(20, 'What is Lorem Ipsum', 'Sep/2020', 'hunza1.jpeg'),
(21, 'What is Lorem Ipsum', 'Sep/2020', 'hunza2.jpg'),
(22, 'What is Lorem Ipsum', 'Oct/2020', 'islamabad1.jfif'),
(23, 'What is Lorem Ipsum', 'Dec/2020', 'lahore3.jfif');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `faculty`
--
ALTER TABLE `faculty`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indexes for table `offered`
--
ALTER TABLE `offered`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stdcourse`
--
ALTER TABLE `stdcourse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `regNo` (`regNo`),
  ADD UNIQUE KEY `password` (`password`);

--
-- Indexes for table `timetable`
--
ALTER TABLE `timetable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `faculty`
--
ALTER TABLE `faculty`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `offered`
--
ALTER TABLE `offered`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `stdcourse`
--
ALTER TABLE `stdcourse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `timetable`
--
ALTER TABLE `timetable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
