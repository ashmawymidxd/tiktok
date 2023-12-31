-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2023 at 10:54 AM
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
-- Database: `tiktok`
--

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `password` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`id`, `password`, `username`, `email`, `image`) VALUES
(1, '203b1b642b33933b83db3652111d7b93', 'ahmed hassan', 'uyu365656@gmail.com', NULL),
(2, 'f941a71ef190018c8530319b3fcf397d', 'sayed ali', 'uyu365666@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` varchar(200) NOT NULL,
  `video_path` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`id`, `title`, `description`, `video_path`, `user_id`, `created_at`) VALUES
(14, 'qoran', 'yasser', 'videos/video3.mp4', 1, '2023-10-30 19:30:51'),
(15, 'ahmed hassan', 'for last', 'videos/video3.mp4', 1, '2023-10-30 19:56:22');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `video_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `member` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
