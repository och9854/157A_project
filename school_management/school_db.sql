-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2021 at 10:41 AM
-- Server version: 5.7.33
-- PHP Version: 7.4.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `email`, `password`, `name`) VALUES
(1, 'admin@yopmail.com', '123456', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_classes`
--

CREATE TABLE `tbl_classes` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_classes`
--

INSERT INTO `tbl_classes` (`id`, `name`, `created`, `modified`) VALUES
(2, 'Class 2', '2021-12-04 10:59:26', '2021-12-04 10:59:26'),
(3, 'Class 3', '2021-12-04 10:59:30', '2021-12-04 10:59:30'),
(4, 'Class 4', '2021-12-04 10:59:33', '2021-12-04 10:59:33'),
(5, 'Class 5', '2021-12-04 10:59:36', '2021-12-04 10:59:36'),
(6, 'Class 6', '2021-12-04 10:59:39', '2021-12-04 10:59:39'),
(7, 'Class 7', '2021-12-04 10:59:43', '2021-12-04 10:59:43');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_roles`
--

CREATE TABLE `tbl_roles` (
  `id` int(11) NOT NULL,
  `role` varchar(50) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sections`
--

CREATE TABLE `tbl_sections` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sections`
--

INSERT INTO `tbl_sections` (`id`, `class_id`, `name`, `created`, `modified`) VALUES
(1, 4, 'section A', '2021-12-11 10:35:54', '2021-12-19 00:56:22'),
(4, 2, 'Section B', '2021-12-19 03:01:13', '2021-12-19 03:01:13'),
(5, 6, 'Section A', '2021-12-19 03:01:30', '2021-12-19 03:01:30'),
(6, 4, 'Section B', '2021-12-19 03:01:42', '2021-12-19 03:01:42'),
(7, 4, 'Section C', '2021-12-19 03:01:53', '2021-12-19 03:01:53');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE `tbl_students` (
  `id` bigint(20) NOT NULL,
  `class_id` int(11) NOT NULL,
  `roll_no` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `sur_name` varchar(100) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `alternate_contact_no` varchar(10) DEFAULT NULL,
  `profile_pic` varchar(100) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`id`, `class_id`, `roll_no`, `password`, `first_name`, `middle_name`, `sur_name`, `contact_no`, `alternate_contact_no`, `profile_pic`, `is_active`, `created`, `modified`) VALUES
(41, 8, 'STU60405', 'AK4Oqdj4', 'Deepak', 'Chandr', 'Uniyal', '1234567899', '1234567899', 'Untitled_1.png', 1, '2021-12-19 01:55:05', '2021-12-19 03:41:39'),
(42, 7, 'STU688781', 'xAjXDSED', 'Rahul', '', 'Srivastava', '1234567899', '1234567899', 'Untitled_1.png', 1, '2021-12-19 01:55:39', '2021-12-19 01:55:39'),
(43, 3, 'STU221566', 'zC6ASzAZ', 'ABC', 'ABC', 'ABC', '1234567899', '1234567899', 'Untitled_1.png', 1, '2021-12-19 01:55:59', '2021-12-19 01:55:59'),
(44, 4, '123122', 'qD1LYDcN', 'Manoj', '', 'Rawat', '1234567899', '1234567899', 'image-20211029-173414.png', 1, '2021-12-19 01:58:36', '2021-12-19 01:58:36');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subjects`
--

CREATE TABLE `tbl_subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_subjects`
--

INSERT INTO `tbl_subjects` (`id`, `name`, `created`, `modified`) VALUES
(3, 'Physics11', '2021-12-02 14:32:11', '2021-12-02 15:52:46'),
(4, 'Chemistry', '2021-12-02 14:33:12', '2021-12-02 14:33:12'),
(5, 'Maths', '2021-12-02 14:33:14', '2021-12-02 14:33:14'),
(6, 'Geography', '2021-12-02 14:33:20', '2021-12-02 14:33:20'),
(7, 'Hindi', '2021-12-02 14:33:25', '2021-12-02 14:33:25'),
(8, 'English Language', '2021-12-02 14:33:30', '2021-12-02 14:33:30');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teachers`
--

CREATE TABLE `tbl_teachers` (
  `id` bigint(20) NOT NULL,
  `first_name` varchar(100) NOT NULL,
  `middle_name` varchar(100) DEFAULT NULL,
  `sur_name` varchar(100) NOT NULL,
  `contact_no` varchar(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `alternate_contact_no` varchar(10) DEFAULT NULL,
  `subjects` varchar(100) NOT NULL,
  `experience` int(11) NOT NULL,
  `profile_pic` varchar(100) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT '1',
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_teachers`
--

INSERT INTO `tbl_teachers` (`id`, `first_name`, `middle_name`, `sur_name`, `contact_no`, `password`, `alternate_contact_no`, `subjects`, `experience`, `profile_pic`, `is_active`, `created`, `modified`) VALUES
(3, 'xyz', 'xyz', 'xyz', '1234567899', 'u7sohNk4', '1234567899', '6,7', 4, 'Untitled_1.png', 1, '2021-12-19 00:53:38', '2021-12-19 00:53:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` bigint(20) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `mobile` varchar(10) NOT NULL,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_classes`
--
ALTER TABLE `tbl_classes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_roles`
--
ALTER TABLE `tbl_roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_sections`
--
ALTER TABLE `tbl_sections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_subjects`
--
ALTER TABLE `tbl_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_teachers`
--
ALTER TABLE `tbl_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_classes`
--
ALTER TABLE `tbl_classes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_sections`
--
ALTER TABLE `tbl_sections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_students`
--
ALTER TABLE `tbl_students`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_subjects`
--
ALTER TABLE `tbl_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_teachers`
--
ALTER TABLE `tbl_teachers`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
