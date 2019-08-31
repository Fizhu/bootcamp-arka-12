-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 31, 2019 at 05:06 PM
-- Server version: 10.1.40-MariaDB
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `arka`
--

-- --------------------------------------------------------

--
-- Table structure for table `Name`
--

CREATE TABLE `Name` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `id_work` int(11) NOT NULL,
  `id_salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Name`
--

INSERT INTO `Name` (`id`, `name`, `id_work`, `id_salary`) VALUES
(23, 'Rebecca', 1, 1),
(33, 'Woiiii', 2, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Name`
--
ALTER TABLE `Name`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_work` (`id_work`),
  ADD KEY `id_salary` (`id_salary`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Name`
--
ALTER TABLE `Name`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Name`
--
ALTER TABLE `Name`
  ADD CONSTRAINT `Name_ibfk_1` FOREIGN KEY (`id_salary`) REFERENCES `Salary` (`id`),
  ADD CONSTRAINT `Name_ibfk_2` FOREIGN KEY (`id_work`) REFERENCES `Work` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
