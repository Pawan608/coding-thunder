-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2022 at 01:22 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `roll` varchar(20) NOT NULL,
  `name` varchar(30) NOT NULL,
  `phoneno` varchar(10) NOT NULL,
  `password` varchar(30) NOT NULL,
  `marks` int(11) DEFAULT 0,
  `submit` varchar(1) DEFAULT 'N',
  `certno` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`roll`, `name`, `phoneno`, `password`, `marks`, `submit`, `certno`) VALUES
('19VBIT040948', 'Kajal Singh', '123456789', '123456', 60, 'Y', 0),
('19VBIT040962', 'Abhishek Kumar', '9123187863', '123456', 20, 'Y', 0),
('19VBIT040975', 'Ritika Bhatia', '1234567890', '123456', 50, 'Y', 0),
('19VBIT040976', 'Rituja Sinha', '6299135287', '123456', 80, 'Y', 74480056);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`roll`),
  ADD UNIQUE KEY `phoneno` (`phoneno`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
