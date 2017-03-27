-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Mar 27, 2017 at 09:09 PM
-- Server version: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project2`
--
CREATE DATABASE IF NOT EXISTS `project2` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `project2`;

-- --------------------------------------------------------

--
-- Table structure for table `items`
--
-- Creation: Mar 25, 2017 at 09:16 AM
--

CREATE TABLE `items` (
  `ad_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category` int(11) NOT NULL,
  `descp` longtext NOT NULL,
  `college` longtext NOT NULL,
  `contact` mediumtext NOT NULL,
  `price` int(11) NOT NULL,
  `image` mediumtext NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`ad_id`, `user_id`, `name`, `category`, `descp`, `college`, `contact`, `price`, `image`, `date`) VALUES
(1, 1, 'Three Mistakes Of My Life', 1, 'Book by Chetan Bhagat', 'IIT', 'naman@hasd.com', 200, '1490386163.jpg', '2017-03-25'),
(2, 1, 'Fault In our Stars', 1, 'Nice', 'NIT durgapur', 'asaklsl@hahja.com', 0, '1490386218.jpg', '2017-03-25'),
(3, 1, 'Harry Potter', 1, 'M', 'IIT Delhi', 'ajsk@askl.com', 0, '0', '2017-03-25');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--
-- Creation: Mar 16, 2017 at 03:55 AM
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `hash` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `hash`) VALUES
(1, 'naman', '$2y$10$Ws7W/jGqIIf7dURGuXPzPu7/eTETQnk4ar1bPANwVyDdWCYzDf2jC'),
(2, 'tiwari', '$2y$10$LQdG5Qn3XbGTnYphC6NP/eXIZavFtOV0hP/kuWhCFBLzrKGhyHinu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
