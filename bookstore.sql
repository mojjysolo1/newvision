-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Sep 02, 2022 at 04:37 PM
-- Server version: 10.6.5-MariaDB
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `names` varchar(80) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `title` varchar(45) NOT NULL,
  `stamp` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `names`, `email`, `password`, `title`, `stamp`) VALUES
(1, 'admin', 'admin@newvision.com', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', '1662049566');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `bookcode` varchar(15) NOT NULL,
  `bookname` varchar(45) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `stamp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `bookcode`, `bookname`, `created_at`, `updated_at`, `stamp`) VALUES
(1, '001', 'Integrated Science', '2022-09-02 02:44:41', '0000-00-00 00:00:00', '1662086681'),
(2, '002', 'Social Studies', '2022-09-02 02:46:13', '0000-00-00 00:00:00', '1662086773'),
(3, '003', 'Mathematics', '2022-09-02 02:46:42', '0000-00-00 00:00:00', '1662086802'),
(4, '004', 'Integrated Science', '2022-09-02 02:47:16', '0000-00-00 00:00:00', '1662086836'),
(5, '005', 'Mathematics', '2022-09-02 02:47:43', '0000-00-00 00:00:00', '1662086863'),
(6, '006', 'Social Studies', '2022-09-02 02:48:32', '0000-00-00 00:00:00', '1662086912'),
(7, '007', 'English Language & Literature in English', '2022-09-02 02:51:17', '0000-00-00 00:00:00', '1662087077'),
(8, '008', 'Mathematics', '2022-09-02 02:51:30', '0000-00-00 00:00:00', '1662087090'),
(9, '009', 'Biology', '2022-09-02 02:51:43', '0000-00-00 00:00:00', '1662087103'),
(10, '0010', 'Physics', '2022-09-02 02:51:56', '0000-00-00 00:00:00', '1662087116'),
(11, '0011', 'Chemistry', '2022-09-02 02:52:10', '0000-00-00 00:00:00', '1662087130'),
(12, '0012', 'Kiswahili', '2022-09-02 02:52:34', '0000-00-00 00:00:00', '1662087154'),
(13, '0013', 'Technology and Design', '2022-09-02 02:52:50', '0000-00-00 00:00:00', '1662087170'),
(14, '0014', 'Nutrition and Food Technology', '2022-09-02 02:53:06', '0000-00-00 00:00:00', '1662087186'),
(15, '0015', 'Agriculture', '2022-09-02 02:53:33', '0000-00-00 00:00:00', '1662087213'),
(16, '0016', 'English Language & Literature in English', '2022-09-02 02:54:52', '0000-00-00 00:00:00', '1662087292'),
(17, '0017', 'Mathematics', '2022-09-02 02:55:08', '0000-00-00 00:00:00', '1662087308'),
(18, '0018', 'Biology', '2022-09-02 02:55:19', '0000-00-00 00:00:00', '1662087319'),
(19, '0019', 'Physics', '2022-09-02 02:55:32', '0000-00-00 00:00:00', '1662087332'),
(20, '0020', 'Chemistry', '2022-09-02 02:55:48', '0000-00-00 00:00:00', '1662087348'),
(21, '0021', 'Geography', '2022-09-02 02:56:03', '0000-00-00 00:00:00', '1662087363'),
(22, '0022', 'History & Political Education', '2022-09-02 02:56:16', '0000-00-00 00:00:00', '1662087376'),
(23, '0023', 'Physical Education', '2022-09-02 02:56:30', '0000-00-00 00:00:00', '1662087390'),
(24, '0024', 'Technology and Design', '2022-09-02 02:57:06', '0000-00-00 00:00:00', '1662087426'),
(25, '0025', 'Performing Arts', '2022-09-02 02:57:19', '0000-00-00 00:00:00', '1662087439'),
(26, '0026', 'Nutrition and Food Technology', '2022-09-02 02:57:31', '0000-00-00 00:00:00', '1662087451'),
(27, '0027', 'Art and Design', '2022-09-02 02:57:45', '0000-00-00 00:00:00', '1662087465');

-- --------------------------------------------------------

--
-- Table structure for table `book_details`
--

CREATE TABLE `book_details` (
  `book_det_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `bookname` varchar(45) NOT NULL,
  `class` varchar(5) NOT NULL,
  `bk_cost` int(11) NOT NULL,
  `bk_gd_cost` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `stamp` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `book_details`
--

INSERT INTO `book_details` (`book_det_id`, `book_id`, `bookname`, `class`, `bk_cost`, `bk_gd_cost`, `created_at`, `updated_at`, `stamp`) VALUES
(1, 1, 'Integrated Science', 'p.5', 25000, 20000, '2022-09-02 02:44:41', '0000-00-00 00:00:00', '1662086681'),
(2, 2, 'Social Studies', 'p.5', 25000, 20000, '2022-09-02 02:46:13', '0000-00-00 00:00:00', '1662086773'),
(3, 3, 'Mathematics', 'p.6', 28000, 20000, '2022-09-02 02:46:42', '0000-00-00 00:00:00', '1662086802'),
(4, 4, 'Integrated Science', 'p.6', 22000, 20000, '2022-09-02 02:47:16', '0000-00-00 00:00:00', '1662086836'),
(5, 5, 'Mathematics', 'p.7', 28000, 20000, '2022-09-02 02:47:43', '0000-00-00 00:00:00', '1662086863'),
(6, 6, 'Social Studies', 'p.7', 22000, 20000, '2022-09-02 02:48:32', '0000-00-00 00:00:00', '1662086912'),
(7, 7, 'English Language & Literature in English', 's.2', 25000, 20000, '2022-09-02 02:51:17', '0000-00-00 00:00:00', '1662087077'),
(8, 8, 'Mathematics', 's.2', 25000, 20000, '2022-09-02 02:51:30', '0000-00-00 00:00:00', '1662087090'),
(9, 9, 'Biology', 's.2', 25000, 20000, '2022-09-02 02:51:43', '0000-00-00 00:00:00', '1662087103'),
(10, 10, 'Physics', 's.2', 25000, 20000, '2022-09-02 02:51:56', '0000-00-00 00:00:00', '1662087116'),
(11, 11, 'Chemistry', 's.2', 25000, 20000, '2022-09-02 02:52:10', '0000-00-00 00:00:00', '1662087130'),
(12, 11, 'Physical Education', 's.2', 25000, 20000, '2022-09-02 02:52:22', '0000-00-00 00:00:00', '1662087142'),
(13, 12, 'Kiswahili', 's.2', 25000, 20000, '2022-09-02 02:52:34', '0000-00-00 00:00:00', '1662087154'),
(14, 13, 'Technology and Design', 's.2', 22000, 20000, '2022-09-02 02:52:50', '0000-00-00 00:00:00', '1662087170'),
(15, 14, 'Nutrition and Food Technology', 's.2', 22000, 20000, '2022-09-02 02:53:06', '0000-00-00 00:00:00', '1662087186'),
(16, 14, 'Art and Design', 's.2', 22000, 20000, '2022-09-02 02:53:21', '0000-00-00 00:00:00', '1662087201'),
(17, 15, 'Agriculture', 's.2', 22000, 20000, '2022-09-02 02:53:33', '0000-00-00 00:00:00', '1662087213'),
(18, 16, 'English Language & Literature in English', 's.1', 25000, 20000, '2022-09-02 02:54:52', '0000-00-00 00:00:00', '1662087292'),
(19, 17, 'Mathematics', 's.1', 25000, 20000, '2022-09-02 02:55:08', '0000-00-00 00:00:00', '1662087308'),
(20, 18, 'Biology', 's.1', 25000, 20000, '2022-09-02 02:55:19', '0000-00-00 00:00:00', '1662087319'),
(21, 19, 'Physics', 's.1', 25000, 20000, '2022-09-02 02:55:32', '0000-00-00 00:00:00', '1662087332'),
(22, 20, 'Chemistry', 's.1', 25000, 20000, '2022-09-02 02:55:48', '0000-00-00 00:00:00', '1662087348'),
(23, 21, 'Geography', 's.1', 25000, 20000, '2022-09-02 02:56:03', '0000-00-00 00:00:00', '1662087363'),
(24, 22, 'History & Political Education', 's.1', 25000, 20000, '2022-09-02 02:56:16', '0000-00-00 00:00:00', '1662087376'),
(25, 23, 'Physical Education', 's.1', 25000, 20000, '2022-09-02 02:56:30', '0000-00-00 00:00:00', '1662087390'),
(26, 24, 'Technology and Design', 's.1', 22000, 20000, '2022-09-02 02:57:06', '0000-00-00 00:00:00', '1662087426'),
(27, 25, 'Performing Arts', 's.1', 22000, 20000, '2022-09-02 02:57:19', '0000-00-00 00:00:00', '1662087439'),
(28, 26, 'Nutrition and Food Technology', 's.1', 22000, 20000, '2022-09-02 02:57:31', '0000-00-00 00:00:00', '1662087451'),
(29, 27, 'Art and Design', 's.1', 22000, 20000, '2022-09-02 02:57:45', '0000-00-00 00:00:00', '1662087465');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `book_det_id` int(11) NOT NULL,
  `order_tag` varchar(45) NOT NULL,
  `order_status` varchar(15) NOT NULL,
  `quantity` int(11) NOT NULL,
  `comment` text NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `stamp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_id`, `book_det_id`, `order_tag`, `order_status`, `quantity`, `comment`, `created_at`, `updated_at`, `stamp`) VALUES
(1, 1, 27, '', 'pending', 1, 'jj', '2022-09-02 16:10:14', '0000-00-00 00:00:00', '1662135014'),
(2, 2, 26, '', 'pending', 3, 'jk', '2022-09-02 16:10:54', '0000-00-00 00:00:00', '1662135054'),
(3, 2, 27, '', 'pending', 1, 'jk', '2022-09-02 16:10:54', '0000-00-00 00:00:00', '1662135054'),
(4, 3, 26, '', 'pending', 3, 'jk', '2022-09-02 16:30:01', '0000-00-00 00:00:00', '1662136201'),
(5, 3, 27, '', 'pending', 1, 'jk', '2022-09-02 16:30:01', '0000-00-00 00:00:00', '1662136201'),
(6, 4, 26, '', 'pending', 3, 'jk', '2022-09-02 16:30:26', '0000-00-00 00:00:00', '1662136226'),
(7, 4, 27, '', 'pending', 1, 'jk', '2022-09-02 16:30:26', '0000-00-00 00:00:00', '1662136226');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `sess_id` varchar(45) NOT NULL,
  `names` varchar(80) NOT NULL,
  `email` varchar(45) NOT NULL,
  `phone` varchar(45) NOT NULL,
  `stamp` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `sess_id`, `names`, `email`, `phone`, `stamp`) VALUES
(1, '7cpa37bca21rg0knon7fagfkak', 'jo', 'j@j.com', '788', '1662135014'),
(2, '7cpa37bca21rg0knon7fagfkak', 'f', 'f@gmail.com', '988', '1662135054'),
(3, '7cpa37bca21rg0knon7fagfkak', 'f', 'f@gmail.com', '988', '1662136201'),
(4, '7cpa37bca21rg0knon7fagfkak', 'f', 'f@gmail.com', '988', '1662136226');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `book_details`
--
ALTER TABLE `book_details`
  ADD PRIMARY KEY (`book_det_id`),
  ADD KEY `book_fk_idx` (`book_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `user_fk_idx` (`user_id`),
  ADD KEY `book_details_fk_idx` (`book_det_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `book_details`
--
ALTER TABLE `book_details`
  MODIFY `book_det_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `book_details`
--
ALTER TABLE `book_details`
  ADD CONSTRAINT `book_fk` FOREIGN KEY (`book_id`) REFERENCES `books` (`book_id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `book_details_fk` FOREIGN KEY (`book_det_id`) REFERENCES `book_details` (`book_det_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
