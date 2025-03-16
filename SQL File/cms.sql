-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2024 at 07:23 PM
-- Server version: 8.0.36
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int NOT NULL,
  `fullname` varchar(259) DEFAULT NULL,
  `mobilenumber` bigint DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `position` varchar(250) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(250) NOT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `UserId` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fullname`, `mobilenumber`, `email`, `position`, `password`, `creationDate`, `UserId`) VALUES
(1, 'admin', 8956232356, 'admin@gmail.com', 'admin', '202cb962ac59075b964b07152d234b70', '2023-09-12 05:16:16', ''),
(2, 'Jeckonia Ochieng Opiyo', 768061759, 'ochiengjeck@gmail.com', '', 'dfa70f5c896689a7abf0e603a12320e7', '2024-05-23 15:04:35', 'SJECOP2111');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`) VALUES
(1, 'Academic ', 'Academic ', '2023-08-28 07:10:55', '2024-05-15 08:30:38'),
(2, 'general', 'General', '2023-08-11 10:54:06', '2024-05-15 08:30:59'),
(4, 'Campus Facilities and Services', 'Campus Facilities and Services', '2023-09-12 06:26:48', '2024-05-15 08:32:17'),
(5, 'Student Life:', 'Student Life:\r\n', '2023-09-12 06:27:36', '2024-05-15 08:32:40'),
(6, 'Financial Matters', 'Financial Matters', '2023-09-12 06:33:43', '2024-05-15 08:33:02'),
(8, 'Administrative Procedures', 'Administrative Procedures', '2024-05-15 08:33:15', NULL),
(9, 'Career and Internship', 'Career and Internship', '2024-05-15 08:33:32', NULL),
(10, 'Diversity, Equity, and Inclusion', 'Diversity, Equity, and Inclusion', '2024-05-15 08:33:42', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `inquiryremark`
--

CREATE TABLE `inquiryremark` (
  `id` int NOT NULL,
  `inquiryNumber` int DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` mediumtext,
  `remarkDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `inquiryremark`
--

INSERT INTO `inquiryremark` (`id`, `inquiryNumber`, `status`, `remark`, `remarkDate`) VALUES
(1, 3, 'in process', 'your ticket forward to associated team', '2023-09-15 13:05:38'),
(2, 3, 'closed', 'Ticket close in favor of user', '2023-09-15 13:06:31'),
(3, 5, 'closed', 'we have sent you money', '2024-05-14 12:11:31'),
(4, 1, 'closed', 'closed', '2024-05-15 08:49:26'),
(5, 2, 'closed', 'it is sorted', '2024-05-18 07:48:53'),
(6, 2, 'closed', 'it is sorted', '2024-05-18 07:48:56'),
(7, 2, 'closed', 'sorted', '2024-05-18 07:49:18'),
(8, 6, 'closed', 'The school has employed security guards to watch over the dorms', '2024-05-18 07:57:06');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `id` int NOT NULL,
  `stateName` varchar(255) DEFAULT NULL,
  `stateDescription` tinytext,
  `postingDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`id`, `stateName`, `stateDescription`, `postingDate`, `updationDate`) VALUES
(9, 'Algeria', 'Located in North Africa, Algeria is the largest country on the continent. It is known for its diverse landscapes, including the Sahara Desert, ancient ruins such as Timgad and Tipasa, and vibrant cities like Algiers', '2024-05-15 08:44:27', NULL),
(10, 'Angola', 'Situated in Southern Africa, Angola is known for its rich natural resources, including oil and diamonds. It offers stunning landscapes such as the Tundavala Fissure and Kalandula Falls, as well as a vibrant music and dance scene.\r\n', '2024-05-15 08:45:16', NULL),
(11, 'South Africa', 'Located at the southernmost tip of the continent, South Africa is known for its diverse landscapes, including stunning coastlines, iconic Table Mountain, and renowned national parks like Kruger.', '2024-05-15 08:46:52', NULL),
(12, 'Kenya', 'situated in East Africa, Kenya is known for its incredible wildlife and safari opportunities. ', '2024-05-15 08:47:22', NULL),
(13, 'Tanzania', 'Located in East Africa, Tanzania is renowned for its breathtaking natural wonders, including Mount Kilimanjaro, the highest peak in Africa, and the Serengeti National Park, which hosts the Great Migration.', '2024-05-15 08:47:46', NULL),
(14, 'Uganda', 'Situated in East Africa, Uganda is known as the \"Pearl of Africa\" for its remarkable biodiversity and landscapes. ', '2024-05-15 08:48:02', NULL),
(15, 'Democratic Republic of the Congo (DRC)', 'Located in Central Africa, the DRC is the second-largest country on the continent.', '2024-05-15 08:48:20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int NOT NULL,
  `categoryid` int DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategory`, `creationDate`, `updationDate`) VALUES
(10, 1, 'course registration, scheduling, or class availability', '2024-05-15 08:36:34', NULL),
(11, 1, 'grading, assessment, or examination procedures', '2024-05-15 08:36:46', NULL),
(12, 1, 'quality of teaching and course material', '2024-05-15 08:37:18', NULL),
(13, 4, 'Maintenance or safety issues in student residences, classrooms, libraries, or laboratories', '2024-05-15 08:37:51', NULL),
(14, 4, 'Problems with technology, such as computer labs, Wi-Fi, or online learning platforms', '2024-05-15 08:38:05', NULL),
(15, 5, 'student organizations, clubs, or extracurricular activitie', '2024-05-15 08:38:27', NULL),
(16, 5, ' social or cultural events, including issues of inclusion or discrimination', '2024-05-15 08:38:38', NULL),
(17, 5, ' student conduct, disciplinary actions, or campus safety', '2024-05-15 08:38:52', NULL),
(18, 6, 'tuition fees, scholarships, grants, or financial aid', '2024-05-15 08:39:28', NULL),
(19, 6, 'student loans, repayment options, or financial counseling', '2024-05-15 08:39:40', NULL),
(20, 6, 'billing, refunds, or financial transactions', '2024-05-15 08:39:57', NULL),
(21, 8, 'registration, enrollment, or administrative paperwork', '2024-05-15 08:40:09', NULL),
(22, 8, ' bureaucratic delays or lack of communication', '2024-05-15 08:40:22', NULL),
(23, 8, 'university policies, procedures, or codes of conduct', '2024-05-15 08:40:34', NULL),
(24, 8, 'transcripts, official documents, or letters of recommendation', '2024-05-15 08:40:54', NULL),
(25, 9, 'career services, job fairs, or internship opportunities', '2024-05-15 08:41:45', NULL),
(26, 9, 'ob placement services, resume reviews, or interview preparation.', '2024-05-15 08:41:56', NULL),
(27, 9, ' internships, co-op programs, or work-study arrangements', '2024-05-15 08:42:18', NULL),
(28, 10, 'discrimination, harassment, or bias incidents on campus', '2024-05-15 08:42:23', NULL),
(29, 10, 'diversity initiatives, cultural competency training, or inclusive policies', '2024-05-15 08:42:32', NULL),
(30, 10, 'ccessibility, accommodation, or equal opportunities for all students', '2024-05-15 08:42:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tblinquiries`
--

CREATE TABLE `tblinquiries` (
  `inquiryNumber` int NOT NULL,
  `userId` int DEFAULT NULL,
  `category` int DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `inquiryType` varchar(255) DEFAULT NULL,
  `state` varchar(255) DEFAULT NULL,
  `noc` varchar(255) DEFAULT NULL,
  `inquiryDetails` mediumtext,
  `inquiryFile` varchar(255) DEFAULT NULL,
  `regDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(50) DEFAULT NULL,
  `lastUpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblinquiries`
--

INSERT INTO `tblinquiries` (`inquiryNumber`, `userId`, `category`, `subcategory`, `inquiryType`, `state`, `noc`, `inquiryDetails`, `inquiryFile`, `regDate`, `status`, `lastUpdationDate`) VALUES
(1, 3, 1, 'Online Shopping', ' inquiry', 'Punjab', 'Complain against Shopping website', 'company name xyz has not return my money after returning the item.', '', '2023-09-15 12:33:14', 'closed', '2024-05-15 08:49:26'),
(2, 4, 1, 'E-wllaet', 'General Query', 'Punjab', 'htrdy', 'dytuj', '7db575b77409a4ad74cb9620814085e8.jpg', '2023-09-15 12:41:41', 'closed', '2024-05-18 07:48:54'),
(3, 1, 1, 'E-wllaet', 'General Query', 'Punjab', 'htrdy', 'dytuj', '7db575b77409a4ad74cb9620814085e8.jpg', '2023-09-15 12:45:26', 'closed', '2023-09-15 13:06:31'),
(4, 5, 1, 'Online Shopping', ' inquiry', 'Delhi', 'Complain against Shopping website', 'This is for testing.', '2c86e2aa7eb4cb4db70379e28fab9b52.pdf', '2023-09-26 01:28:17', NULL, NULL),
(5, 6, 1, '', 'General Query', 'Punjab', 'lethal', 'i dont have money', '7c8e1c13539d476d80fbca4a31ca0c0c.jpg', '2024-05-14 09:07:23', 'closed', '2024-05-14 12:11:31'),
(6, 7, 4, '', 'General Query', 'Kenya', 'lethal', 'i wnat to know how the security in the ladies dorms are catered for', '3c166de53bc8fd7f116d3b3f2d9b49a3jpeg', '2024-05-18 07:53:42', 'closed', '2024-05-18 07:57:06'),
(7, 7, 1, 'course registration, scheduling, or class availability', 'General Query', 'Tanzania', 'ideal', 'I wish to know how to register as a parallel student', 'd00e2df8a305796e6a68a49e16d1f13fjpeg', '2024-05-23 15:29:11', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int NOT NULL,
  `uid` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `userip` binary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `userlog`
--

INSERT INTO `userlog` (`id`, `uid`, `username`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-28 17:04:36', '', 1),
(2, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-29 15:02:26', '', 1),
(3, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-30 14:58:00', '', 1),
(4, 0, 'dsad', 0x3a3a3100000000000000000000000000, '2017-03-31 17:39:07', '', 0),
(5, 0, 'dwerwer', 0x3a3a3100000000000000000000000000, '2017-03-31 17:41:22', '', 0),
(6, 0, 'ffert', 0x3a3a3100000000000000000000000000, '2017-03-31 17:41:29', '', 0),
(7, 0, 'ewrwe', 0x3a3a3100000000000000000000000000, '2017-03-31 17:42:12', '', 0),
(8, 0, 'ewrwe', 0x3a3a3100000000000000000000000000, '2017-03-31 17:47:51', '', 0),
(9, 0, 'ewrwe', 0x3a3a3100000000000000000000000000, '2017-03-31 17:47:54', '', 0),
(10, 0, 'fsdfsdff', 0x3a3a3100000000000000000000000000, '2017-03-31 17:48:11', '', 0),
(11, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-03-31 17:49:25', '', 1),
(12, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-04-01 18:52:35', '02-04-2017 12:24:41 AM', 1),
(13, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-04-01 18:58:09', '02-04-2017 12:50:42 AM', 1),
(14, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-04-01 19:38:15', '02-04-2017 01:08:19 AM', 1),
(15, 0, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-04-02 18:50:20', '', 0),
(16, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-04-02 18:50:28', '03-04-2017 12:26:50 AM', 1),
(17, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2017-05-02 18:01:26', '', 1),
(18, 0, 'test@gm.com', 0x3a3a3100000000000000000000000000, '2017-06-11 10:48:50', '', 0),
(19, 5, 'abc@abc.com', 0x3a3a3100000000000000000000000000, '2017-06-11 10:56:30', '11-06-2017 04:39:15 PM', 1),
(20, 6, 'xyz@xyz.com', 0x3a3a3100000000000000000000000000, '2017-06-11 11:13:28', '11-06-2017 04:45:46 PM', 1),
(21, 6, 'xyz@xyz.com', 0x3a3a3100000000000000000000000000, '2017-06-11 11:19:45', '11-06-2017 04:50:02 PM', 1),
(22, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2018-05-24 18:26:07', '', 1),
(23, 0, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2018-09-05 17:05:22', '', 0),
(24, 0, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2018-09-05 17:05:32', '', 0),
(25, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2018-09-05 17:07:12', '', 1),
(26, 1, 'anuj.lpu1@gmail.com', 0x3a3a3100000000000000000000000000, '2019-06-24 10:27:30', '24-06-2019 04:11:08 PM', 1),
(27, 2, 'test@123', 0x3a3a3100000000000000000000000000, '2023-09-13 05:05:32', '13-09-2023 10:38:37 AM', 1),
(28, 2, 'test@123', 0x3a3a3100000000000000000000000000, '2023-09-13 05:27:27', '14-09-2023 05:01:03 PM', 1),
(29, 2, 'test@123', 0x3a3a3100000000000000000000000000, '2023-09-15 06:13:31', '15-09-2023 11:57:33 AM', 1),
(30, 4, 'rakesh@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-15 07:01:27', '15-09-2023 06:33:37 PM', 1),
(31, 4, 'rakesh@gmail.com', 0x3a3a3100000000000000000000000000, '2023-09-15 13:16:57', '15-09-2023 06:55:45 PM', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `fullName` varchar(255) DEFAULT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `contactNo` bigint DEFAULT NULL,
  `address` tinytext,
  `State` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `pincode` int DEFAULT NULL,
  `userImage` varchar(255) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updationDate` timestamp NULL DEFAULT NULL,
  `status` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullName`, `userEmail`, `password`, `contactNo`, `address`, `State`, `country`, `pincode`, `userImage`, `regDate`, `updationDate`, `status`) VALUES
(6, 'JECK', 'sjecop2211@ueab.ac.ke', 'dfa70f5c896689a7abf0e603a12320e7', 768061759, NULL, NULL, NULL, NULL, NULL, '2024-05-14 09:03:31', NULL, 1),
(7, 'Faith', 'sfaimb2111@ueab.ac.ke', '1578a390fca85291d2c3928976291ffc', 768061759, NULL, NULL, NULL, NULL, NULL, '2024-05-17 04:49:28', NULL, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiryremark`
--
ALTER TABLE `inquiryremark`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblinquiries`
--
ALTER TABLE `tblinquiries`
  ADD PRIMARY KEY (`inquiryNumber`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `inquiryremark`
--
ALTER TABLE `inquiryremark`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tblinquiries`
--
ALTER TABLE `tblinquiries`
  MODIFY `inquiryNumber` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
