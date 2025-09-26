-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Aug 31, 2018 at 10:54 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `PWD`
--

-- --------------------------------------------------------

--
-- Table structure for table `tabla`
--

CREATE TABLE `tabla` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `descrip` varchar(1024) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tabla`
--

INSERT INTO `tabla` (`id`, `descrip`) VALUES
(5, 'prueba 2'),
(6, 'prueba 3 con modificacion');

-- --------------------------------------------------------

--
-- Table structure for table `tablasinsecuencia`
--

CREATE TABLE `tablasinsecuencia` (
  `id` int(11) NOT NULL,
  `descrip` varchar(124) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tablasinsecuencia`
--

INSERT INTO `tablasinsecuencia` (`id`, `descrip`) VALUES(0, 'dato de prueba sin secuencia');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tabla`
--
ALTER TABLE `tabla`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tabla`
--
ALTER TABLE `tabla`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
