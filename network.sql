-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 26, 2017 at 01:04 PM
-- Server version: 5.7.19-0ubuntu0.16.04.1
-- PHP Version: 7.0.18-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `network`
--

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE `friends` (
  `user_id1` int(11) NOT NULL,
  `user_id2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `friend_requests`
--

CREATE TABLE `friend_requests` (
  `id` int(11) NOT NULL,
  `user_to` int(11) NOT NULL,
  `user_from` int(11) NOT NULL,
  `accepted` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend_requests`
--

INSERT INTO `friend_requests` (`id`, `user_to`, `user_from`, `accepted`) VALUES
(1, 1, 6, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `surname` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `username` varchar(33) NOT NULL,
  `password` varchar(250) NOT NULL,
  `gender` tinytext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `firstname`, `surname`, `email`, `username`, `password`, `gender`) VALUES
(1, 'Gog', 'Papinyan', 'gogliki@rambler.ru', 'goggayik', '$2y$10$W7i7Kd.VKV80QH1bgFkzfu5UoyeWfAn3eqHf1Mlns0JYp/mksTyyC', 'female'),
(6, 'usernameone', 'usersurnameone', 'g@gmail.com', 'user1', '$2y$10$DEBcjE7yIclX4zoOtGthH.ZmLMnmOVen4.V2AL9cI9WXWRd84ZvmK', 'female'),
(7, 'usernametwo', 'usersurnametwo', 'g@gmail.com', 'user2', '$2y$10$dQjYiF31pni8iVdzHsAoVuZ.Sr9nuWWdLsk9eF18quj4YajFbzjl2', 'female'),
(8, 'usernamethree', 'usersurnamethree', 'g@gmail.com', 'user3', '$2y$10$rCDTOZ4hMbwJldO/WXnCmOAL8TkgohmDKnhwGAivnhpkKchxj2TP6', 'female'),
(9, 'usernamefour', 'usersurnamefour', 'g@gmail.com', 'user4', '$2y$10$uGYusyPYBzjfknVVZyvjyu2j0o69.xhyQj7GTukv4jC6S5lz4rptK', 'female'),
(10, 'usernamefive', 'usersurnamefive', 'g@gmail.com', 'user5', '$2y$10$ehbdTVjy0qrxgopz22M/qe6LLG0xHVToCJ9Gb0CoaU5OSuDaNupOi', 'female'),
(11, 'usernamesix', 'usersurnamesix', 'goglik@rambler.ru', 'user6', '$2y$10$rArrkPr1VqtI/bZWviXhOOoN6Otv9hm43cPs19GsEE2AyS54q8XJO', 'female');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `friend_requests`
--
ALTER TABLE `friend_requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `friend_requests`
--
ALTER TABLE `friend_requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
