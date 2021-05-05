-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 05, 2021 at 02:50 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test4`
--

-- --------------------------------------------------------

--
-- Table structure for table `authentication`
--

CREATE TABLE `authentication` (
  `auth_id` int(110) NOT NULL,
  `auth_code` varchar(205) NOT NULL,
  `new` datetime NOT NULL,
  `expire` datetime NOT NULL,
  `user_id` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authentication`
--

INSERT INTO `authentication` (`auth_id`, `auth_code`, `new`, `expire`, `user_id`) VALUES
(79, 'gcn0uy', '2021-05-05 20:46:05', '2021-05-05 20:51:05', 21),
(80, '67lokc', '2021-05-05 20:48:32', '2021-05-05 20:53:32', 21);

-- --------------------------------------------------------

--
-- Table structure for table `event_log`
--

CREATE TABLE `event_log` (
  `event_id` int(110) NOT NULL,
  `event_user` varchar(250) NOT NULL,
  `event_act` varchar(230) NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `event_log`
--

INSERT INTO `event_log` (`event_id`, `event_user`, `event_act`, `date`) VALUES
(63, 'louismoya', 'Registered', '2021-05-05 20:45:58'),
(64, 'louismoya', 'Signed-In', '2021-05-05 20:46:01'),
(65, 'louismoya', 'Signed-Out', '2021-05-05 20:46:19'),
(66, 'louismoya', 'Signed-In', '2021-05-05 20:48:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `question` varchar(230) NOT NULL,
  `answer` varchar(250) NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `question`, `answer`, `date`) VALUES
(21, 'louismoya', 'louismoya2@gmail.com', 'Hello123!', 'dunno', 'hahaha', '2021-05-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authentication`
--
ALTER TABLE `authentication`
  ADD PRIMARY KEY (`auth_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `event_log`
--
ALTER TABLE `event_log`
  ADD PRIMARY KEY (`event_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authentication`
--
ALTER TABLE `authentication`
  MODIFY `auth_id` int(110) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `event_log`
--
ALTER TABLE `event_log`
  MODIFY `event_id` int(110) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `authentication`
--
ALTER TABLE `authentication`
  ADD CONSTRAINT `authentication_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
