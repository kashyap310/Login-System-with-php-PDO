-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 07, 2022 at 10:02 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company`
--

-- --------------------------------------------------------

--
-- Table structure for table `companyinfo`
--

CREATE TABLE `companyinfo` (
  `id` int(11) DEFAULT NULL,
  `cname` varchar(50) NOT NULL,
  `cdesc` varchar(4096) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companyinfo`
--

INSERT INTO `companyinfo` (`id`, `cname`, `cdesc`) VALUES
(22063607, '1_admin_company_edited', '1_admin company description'),
(22063707, '1_user_company', '1_user compnay description'),
(22063807, '2_admin_comapny', '2_admin company description'),
(22063907, '3_admin comapny', '3_admin company description'),
(22064007, '2_user_company', '2_user company description'),
(22093407, '3_user_company', '3_user company description');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user` varchar(16) NOT NULL,
  `pass` varchar(16) NOT NULL,
  `name` varchar(30) DEFAULT NULL,
  `email` varchar(30) DEFAULT NULL,
  `usertype` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user`, `pass`, `name`, `email`, `usertype`) VALUES
(22063607, '1_admin', '1_admin', '1_admin', '1_admin@mail.com', 1),
(22063707, '1_user', '1_user', '1_user', '1_user@mail.com', 0),
(22063807, '2_admin', '2_admin', '2_admin', '2_admin@mail.com', 1),
(22063907, '3_admin', '3_admin', '3_admin', '3_admin@mail.com', 1),
(22064007, '2_user', '2_user', '2_user_edited', '2_user@gmail.com', 0),
(22093407, '3_user', '3_user', '3_user_edited', '3_user@mail.com', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companyinfo`
--
ALTER TABLE `companyinfo`
  ADD KEY `cname` (`cname`(6)),
  ADD KEY `id_fk` (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user` (`user`(6));

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2147483648;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `companyinfo`
--
ALTER TABLE `companyinfo`
  ADD CONSTRAINT `id_fk` FOREIGN KEY (`id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
