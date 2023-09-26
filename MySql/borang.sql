-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 26, 2023 at 02:24 PM
-- Server version: 11.1.2-MariaDB
-- PHP Version: 8.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `borang`
--

-- --------------------------------------------------------

--
-- Table structure for table `pelajar`
--

CREATE TABLE `pelajar` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jantina` varchar(10) NOT NULL,
  `tlahir` date NOT NULL,
  `peringkat` char(3) NOT NULL,
  `program` char(3) NOT NULL,
  `alamat` varchar(200) NOT NULL,
  `it` int(11) NOT NULL,
  `peranti0` varchar(255) NOT NULL,
  `peranti1` varchar(255) NOT NULL,
  `peranti2` varchar(255) NOT NULL,
  `peranti3` varchar(255) NOT NULL,
  `peranti4` varchar(255) NOT NULL,
  `pengguna_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pelajar`
--

INSERT INTO `pelajar` (`id`, `nama`, `jantina`, `tlahir`, `peringkat`, `program`, `alamat`, `it`, `peranti0`, `peranti1`, `peranti2`, `peranti3`, `peranti4`, `pengguna_id`) VALUES
(12, 'Pelajar 4', 'lelaki', '2004-09-16', 'DVM', 'KPD', 'Alamat 1', 3, 'smartphone', 'laptop', 'tablet', '', '', 6),
(14, 'Pelajar 1', 'lelaki', '2020-02-02', 'DVM', 'KPD', 'Alamat 1', 6, 'smartphone', 'laptop', 'tablet', '', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_hash` varchar(60) NOT NULL,
  `role` enum('admin','lecturer','student') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `username`, `password_hash`, `role`) VALUES
(1, 'Pengguna 1', '$2y$10$kfSWPo2vividkzQ69Qs51ecQWcltbZOtZb58xWXttn0XzUGTWMGjG', 'student'),
(2, 'Pengguna 2', '$2y$10$8sxj1MtfN7k88/zEPhFL6epi.W/UkOUDQUUp2xwRoDWoeOAcfrr0K', 'admin'),
(3, 'Pengguna 3', '$2y$10$46tcds.47VCPvIQl72qC4ew.jI/EHlOF4z3fAEoWza/2GKM758/ra', 'student'),
(6, 'Pengguna 4', '$2y$10$vmzzverHTfmGznq9miEw3.LuX5MgxM1NWNQHAo0rWpEBnDivRdH7C', 'student'),
(7, 'Pengguna Admin 1', '$2y$10$Z1Hxb3UKKIR2pbZgp/VkCOSQ31TGd7KSH81GTgpJMqp98LTaBq4n2', 'admin'),
(8, 'Pengguna Pesyarah 1', '$2y$10$RuMSqQpFJaRqmz1ApKU4huVm2cSn9Slk6IdsMFi8XOU43DOAXgDBu', 'lecturer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pelajar`
--
ALTER TABLE `pelajar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelajar_pengguna_id_pengguna_id_fk` (`pengguna_id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pelajar`
--
ALTER TABLE `pelajar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `pelajar`
--
ALTER TABLE `pelajar`
  ADD CONSTRAINT `pelajar_pengguna_id_pengguna_id_fk` FOREIGN KEY (`pengguna_id`) REFERENCES `pengguna` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
