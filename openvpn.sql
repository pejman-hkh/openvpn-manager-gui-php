-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 26, 2018 at 12:19 PM
-- Server version: 5.7.23-0ubuntu0.18.04.1
-- PHP Version: 7.2.7-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `openvpn`
--

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `ip` char(20) COLLATE utf8_persian_ci NOT NULL,
  `remote_ip` char(20) COLLATE utf8_persian_ci NOT NULL,
  `port` char(10) COLLATE utf8_persian_ci NOT NULL,
  `remote_port` char(5) COLLATE utf8_persian_ci NOT NULL,
  `start` int(11) NOT NULL,
  `end` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `send` char(50) COLLATE utf8_persian_ci NOT NULL,
  `recieve` char(50) COLLATE utf8_persian_ci NOT NULL,
  `date` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `status` enum('0','1') COLLATE utf8_persian_ci NOT NULL DEFAULT '0',
  `main` enum('0','1') COLLATE utf8_persian_ci NOT NULL,
  `online` enum('0','1') COLLATE utf8_persian_ci NOT NULL,
  `ip` char(20) COLLATE utf8_persian_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `mobile` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_persian_ci NOT NULL,
  `date` int(11) NOT NULL,
  `expire` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `status`, `main`, `online`, `ip`, `name`, `username`, `mobile`, `email`, `password`, `date`, `expire`) VALUES
(1, '1', '0', '0', '', '', 'admin1', '', '', 'e10adc3949ba59abbe56e057f20f883e', 0, 1526428800),
(2, '1', '0', '0', '', '', 'test3', '', '', 'e10adc3949ba59abbe56e057f20f883e', 0, 1526428800),
(4, '1', '0', '0', '', 'ttt2', 'phpmyadmin', '9130003499', 'test@test.test', 'e10adc3949ba59abbe56e057f20f883e', 0, 1527724800),
(5, '', '1', '0', '', 'admin', 'admin', 'admin', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 1527145512, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `online` (`online`),
  ADD KEY `status` (`status`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
