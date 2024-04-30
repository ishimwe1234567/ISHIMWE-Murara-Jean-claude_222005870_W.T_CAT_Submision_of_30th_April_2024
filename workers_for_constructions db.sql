-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 01:55 PM
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
-- Database: `workers_for_constructions`
--

-- --------------------------------------------------------

--
-- Table structure for table `application`
--

CREATE TABLE `application` (
  `application_id` int(11) NOT NULL,
  `Date` int(11) DEFAULT NULL,
  `status` varchar(250) DEFAULT NULL,
  `cover_letter` varchar(250) DEFAULT NULL,
  `job_id` int(11) DEFAULT NULL,
  `worker_id` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `application`
--

INSERT INTO `application` (`application_id`, `Date`, `status`, `cover_letter`, `job_id`, `worker_id`) VALUES
(1, 1, 'accauntant', 'cv', 2, '5'),
(4, 3, 'tech', 'calicium vitae', 2, '5'),
(20, 11, 'aproved', 'CV ', 3, '4');

-- --------------------------------------------------------

--
-- Table structure for table `employer`
--

CREATE TABLE `employer` (
  `employer_id` int(11) NOT NULL,
  `Names` varchar(255) DEFAULT NULL,
  `identity_number` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `employer`
--

INSERT INTO `employer` (`employer_id`, `Names`, `identity_number`, `phone_number`, `email`, `address`) VALUES
(7, 'erick', '556', '0789800000', 'erick@gmail.com', 'Togo'),
(8, 'kwizera', '9', '0784567099', 'kwizera@gmail.com', 'gabo'),
(8, 'kwizera', '9', '0784567099', 'kwizera@gmail.com', 'gabo'),
(9, 'nirere', '10', '0784567099', 'nirere@gmail.com', 'Madagascar '),
(9, 'nirere', '10', '0784567099', 'nirere@gmail.com', 'Madagascar '),
(9, 'nirere', '10', '0784567099', 'nirere@gmail.com', 'Madagascar '),
(10, 'pio', '23456789', '0784567099', 'pio@gmail.com', 'zanzibar'),
(2, 'braver', '8585e6', '078339986', 'bbaver@gmail.com', 'kibungo');

-- --------------------------------------------------------

--
-- Table structure for table `experience`
--

CREATE TABLE `experience` (
  `experience_id` int(250) DEFAULT NULL,
  `job_title` varchar(250) NOT NULL,
  `duration` varchar(250) DEFAULT NULL,
  `reference` varchar(100) DEFAULT NULL,
  `worker_id` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `experience`
--

INSERT INTO `experience` (`experience_id`, `job_title`, `duration`, `reference`, `worker_id`) VALUES
(0, 'manager', '4hours', 'worker', '5'),
(0, 'manager', '4hours', 'worker', '5'),
(1, 'manager', '3 hours', 'edfg', '4'),
(2, 'manager', '4hours', 'tyuiii', '5'),
(0, 'cleaner', '7years', 'job ', '4');

-- --------------------------------------------------------

--
-- Table structure for table `job`
--

CREATE TABLE `job` (
  `job_id` int(11) NOT NULL,
  `location` varchar(255) DEFAULT NULL,
  `Description` varchar(25) DEFAULT NULL,
  `skills` varchar(250) DEFAULT NULL,
  `compansation` varchar(250) DEFAULT NULL,
  `employer_id` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job`
--

INSERT INTO `job` (`job_id`, `location`, `Description`, `skills`, `compansation`, `employer_id`) VALUES
(2, 'Somalia', 'developer', 'A2', '', '1'),
(1, 'rwanda', 'fg', 'A2', '', '3'),
(3, 'Zimbabwe ', 'cons', 'A2', 'construction', '8'),
(4, 'Somalia', 'developer', 'A2', '', '1'),
(3, 'kigl', 'ghj', 'a2', 'bonus', '2'),
(3, 'kigl', 'ghj', 'a2', 'bonus', '2');

-- --------------------------------------------------------

--
-- Table structure for table `jobpreference`
--

CREATE TABLE `jobpreference` (
  `jobpreference_id` int(11) NOT NULL,
  `job_type` int(11) DEFAULT NULL,
  `work_schedule` varchar(255) DEFAULT NULL,
  `compansation` varchar(255) DEFAULT NULL,
  `mobility` int(11) DEFAULT NULL,
  `worker_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobpreference`
--

INSERT INTO `jobpreference` (`jobpreference_id`, `job_type`, `work_schedule`, `compansation`, `mobility`, `worker_id`) VALUES
(1, 1, '7hours', 'construction', 0, 6),
(3, 2, '5hour', 'Bonus', 0, 9),
(3, 2, '5hour', 'Bonus', 0, 9),
(3, 2, '5hour', 'Bonus', 0, 9),
(4, 0, '9hours', 'overtime pay', 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `activation_code` varchar(50) DEFAULT NULL,
  `is_activated` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `email`, `telephone`, `password`, `creationdate`, `activation_code`, `is_activated`) VALUES
(1, 'serge', 'titi', 'hakiza@gmail', 'srti@gmail.com', '78888899', '$2y$10$UDkcgEqajVUCrHQ/Hjo7/utkHTj02D4iha0JgaTZXsmlzOJF2IUVW', '2024-04-29 08:59:25', '3', 0),
(2, 'serge', 'titi', 'mmmm', 'cle@gmail.com', '78888899', '$2y$10$xBZVWSd5ghxPLwbTXSGL2O3gUOh/YLd81sOEuNeUZChItFKJNWUQi', '2024-04-29 09:01:09', '1', 0),
(3, 'murara', 'ishimwe', 'weeee', 'murara@gmail', '0781939656', '$2y$10$rqm0AUZSmF74A0nKIGIrFez2jT8njXoLXjB5ax7oo/cvZIUiGSdci', '2024-04-29 09:08:16', '2', 0),
(4, 'faustin', 'ndereya', 'ndereya@gmail', 'ndereya@gmail.com', '078958899', '$2y$10$setX8I9WWnpDoJj3y9bCB./roaAS8b3vUmBC/pe2ThHZZWb1kEAfW', '2024-04-29 11:51:04', '4', 0),
(10, 'emely', 'ishimwe', 'yyy', 'emely@gmail', '0781939689', '$2y$10$KwHG3N/M2TBjCHfROtVEkOx1yRAZmroDl6I/IXnpVYqk/G81WEUNW', '2024-04-29 11:54:25', '8', 0),
(11, 'teta', 'ishimwe', 'teta', 'teta@gmail', '0781934689', '$2y$10$lDCilPn1v2gQ0Ayhun8/xuF7P9bz2.U6l8R2UBHGUwpmiSyrLGGjC', '2024-04-29 18:29:27', '9', 0),
(13, 'murara', 'jean claude', 'dddd', 'murarajeanclaudeishimwe@gmail.com', '0781939656', '$2y$10$8G8HavR0gm55Ru2495SLPOFc1U7CssyaCfz3WKCF7hZ2NqC9PIf2K', '2024-04-30 09:31:02', '123', 0),
(14, 'esther', 'aline', 'aline', 'aline@gmail', '078677654', '$2y$10$mES7W7Ha/GiQUmekaW.fj.DiCea9HgFvGZFN7wqB04JRXHCC4tYIC', '2024-04-30 11:33:02', '4', 0);

-- --------------------------------------------------------

--
-- Table structure for table `worker`
--

CREATE TABLE `worker` (
  `worker_id` int(250) NOT NULL,
  `Names` varchar(250) NOT NULL,
  `Email` text NOT NULL,
  `Phone_number` int(10) NOT NULL,
  `nationality` varchar(250) NOT NULL,
  `experience` varchar(250) NOT NULL,
  `certificate` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `worker`
--

INSERT INTO `worker` (`worker_id`, `Names`, `Email`, `Phone_number`, `nationality`, `experience`, `certificate`) VALUES
(2, 'murara', 'murara@gmail.com', 7819396, 'china', 'A2', 'A2'),
(5, 'Radukunda', 'srti@gmail.com', 708888888, 'ethiopia', 'Bachalars degree', 'Bachalars d'),
(8, 'og', 'ogi@gmail.com', 78888899, 'Rwanda ', 'A2', 'A2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `worker`
--
ALTER TABLE `worker`
  ADD PRIMARY KEY (`worker_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `worker`
--
ALTER TABLE `worker`
  MODIFY `worker_id` int(250) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
