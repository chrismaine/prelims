-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2024 at 09:21 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lms`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

CREATE TABLE `appointment` (
  `id` int(100) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `slots` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`id`, `date`, `start_time`, `end_time`, `slots`) VALUES
(1, '2024-02-14', '08:00:00', '20:00:00', 50);

-- --------------------------------------------------------

--
-- Table structure for table `cards`
--

CREATE TABLE `cards` (
  `id` int(11) NOT NULL,
  `image_path` blob NOT NULL,
  `title` varchar(255) NOT NULL,
  `caption` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cards`
--

INSERT INTO `cards` (`id`, `image_path`, `title`, `caption`) VALUES
(1, 0x2e2e2f6173736574732f63617264732f636d732e706e67, 'Content Management System', 'Using a CMS is the ability to easily set up and manage website elements such as carousels, blogs, footers, and more. For example, you can easily create and manage a carousel, which is a slideshow of images or other content, to showcase your services on your website. You can also set up and manage a blog, which allows you to regularly publish new content to your website.'),
(2, 0x2e2e2f6173736574732f63617264732f626d732e706e67, 'Basic Messaging System', 'A basic messaging app can be a valuable tool for students or users to communicate with an administrator or other authorized parties. With this app, users can send messages that will be displayed in an inbox, where they can be reviewed and responded to as needed.'),
(3, 0x2e2e2f6173736574732f63617264732f6465732e706e67, 'Digital Enrollment System', 'Enrollment systems typically include a wide range of features, including student registration, course management, academic records management, and reporting. Students can use the system to select and register for courses');

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `id` int(100) NOT NULL,
  `course` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cover`
--

CREATE TABLE `cover` (
  `id` int(11) NOT NULL,
  `picture_path` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cover`
--

INSERT INTO `cover` (`id`, `picture_path`) VALUES
(1, 0x2e2e2f6173736574732f636f766572732f6261636b67726f756e64312e706e67),
(2, 0x2e2e2f6173736574732f636f766572732f6261636b67726f756e64322e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `grid_content`
--

CREATE TABLE `grid_content` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `caption` text NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grid_content`
--

INSERT INTO `grid_content` (`id`, `title`, `caption`, `size`) VALUES
(1, 'ewew', 'erer', 12),
(2, 'ewew', 'erer', 12),
(3, 'waw', 'ewe', 12);

-- --------------------------------------------------------

--
-- Table structure for table `grid_data`
--

CREATE TABLE `grid_data` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `caption` text NOT NULL,
  `size` int(11) NOT NULL,
  `background_color` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `grid_data`
--

INSERT INTO `grid_data` (`id`, `title`, `caption`, `size`, `background_color`) VALUES
(1, 'REMINDER!', 'CLASS, DO NOT UPLOAD UNNECESSARY FILES, OR ELSE I WILL CLOSE THE WEBSITE. THANK YOU', 5, '#f0efc6'),
(2, 'CMS Activity', 'Deadline po will be on Feb 9', 5, '#f0efc6'),
(3, 'Preliminary Examination', 'During prelim examination po presentation ng system which includes; cms, messaging and, enrollment system with appointment scheduling', 5, '#f0efc6');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

CREATE TABLE `logo` (
  `id` int(169) NOT NULL,
  `pic` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `pic`) VALUES
(1, 0x6c6f676f2e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `school_profile`
--

CREATE TABLE `school_profile` (
  `id` int(11) NOT NULL,
  `school_name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `contact_number` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `school_profile`
--

INSERT INTO `school_profile` (`id`, `school_name`, `address`, `contact_number`) VALUES
(1, 'College University', 'Sta. Ana, Pampanga', '09123456789');

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `id` int(100) NOT NULL,
  `section` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(169) NOT NULL,
  `username` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL,
  `email` varchar(100) NOT NULL,
  `role` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `role`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', '', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `year`
--

CREATE TABLE `year` (
  `id` int(100) NOT NULL,
  `year` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointment`
--
ALTER TABLE `appointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cards`
--
ALTER TABLE `cards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cover`
--
ALTER TABLE `cover`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grid_content`
--
ALTER TABLE `grid_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grid_data`
--
ALTER TABLE `grid_data`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `school_profile`
--
ALTER TABLE `school_profile`
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
-- AUTO_INCREMENT for table `appointment`
--
ALTER TABLE `appointment`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `cards`
--
ALTER TABLE `cards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cover`
--
ALTER TABLE `cover`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grid_content`
--
ALTER TABLE `grid_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `grid_data`
--
ALTER TABLE `grid_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(169) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `school_profile`
--
ALTER TABLE `school_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(169) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
