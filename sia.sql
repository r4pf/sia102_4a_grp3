-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Dec 09, 2024 at 01:38 PM
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
-- Database: `sia`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblcomp`
--

CREATE TABLE `tblcomp` (
  `idnum` int(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `apartNum` varchar(50) NOT NULL,
  `comp` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tblcomp`
--

INSERT INTO `tblcomp` (`idnum`, `fname`, `apartNum`, `comp`) VALUES
(1, 'Yses', '1001', 'Noise complain on room 1002'),
(1, 'Yses', '1001', 'Noise complain on room 1002');

-- --------------------------------------------------------

--
-- Table structure for table `tbllandlord`
--

CREATE TABLE `tbllandlord` (
  `idnum` int(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `apartNum` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbllandlord`
--

INSERT INTO `tbllandlord` (`idnum`, `fname`, `lname`, `password`, `role`, `apartNum`) VALUES
(1, 'Yses', 'Morales', 'admin', '', 0),
(2, 'admin2', 'admin2', 'admin2', '', 0),
(3, 'admin3', 'admin3', 'admin3', '', 300);

-- --------------------------------------------------------

--
-- Table structure for table `tbltenant`
--

CREATE TABLE `tbltenant` (
  `idnum` int(50) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `apartNum` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbltenant`
--

INSERT INTO `tbltenant` (`idnum`, `fname`, `lname`, `password`, `role`, `apartNum`) VALUES
(1, 'Yses', 'Morales', 'user', '', 1001),
(5, 'tenant', 'tenant', 'tenant', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbllandlord`
--
ALTER TABLE `tbllandlord`
  ADD PRIMARY KEY (`idnum`);

--
-- Indexes for table `tbltenant`
--
ALTER TABLE `tbltenant`
  ADD PRIMARY KEY (`idnum`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
