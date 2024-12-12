-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 11, 2024 at 01:45 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ci_uas`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `alternative_data`
-- (See below for the actual view)
--
CREATE TABLE `alternative_data` (
`alternative_id` int
,`employee_name` varchar(255)
,`C1_value` double
,`C2_value` double
,`C3_value` double
,`C4_value` double
,`C5_value` double
);

-- --------------------------------------------------------

--
-- Table structure for table `alternative_raw`
--

CREATE TABLE `alternative_raw` (
  `alter_id` int NOT NULL,
  `employee_id` int NOT NULL,
  `C1` int NOT NULL,
  `C2` int NOT NULL,
  `C3` int NOT NULL,
  `C4` int NOT NULL,
  `C5` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `alternative_raw`
--

INSERT INTO `alternative_raw` (`alter_id`, `employee_id`, `C1`, `C2`, `C3`, `C4`, `C5`) VALUES
(1, 1, 1, 6, 10, 15, 18),
(2, 2, 2, 8, 9, 14, 19),
(3, 3, 1, 6, 10, 13, 18),
(4, 4, 2, 7, 12, 14, 18),
(5, 5, 2, 5, 10, 14, 17);

-- --------------------------------------------------------

--
-- Table structure for table `criteria_data`
--

CREATE TABLE `criteria_data` (
  `criteria_id` varchar(4) NOT NULL,
  `name` varchar(50) NOT NULL,
  `value` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `criteria_data`
--

INSERT INTO `criteria_data` (`criteria_id`, `name`, `value`) VALUES
('C1', 'Attendance', 30),
('C2', 'Behaviour', 20),
('C3', 'Experience', 15),
('C4', 'Discipline', 10),
('C5', 'Team Work', 25);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `name`) VALUES
(1, 'Santi'),
(2, 'Tya'),
(3, 'Eni'),
(4, 'Gita'),
(5, 'Adi/Aat');

-- --------------------------------------------------------

--
-- Table structure for table `weight_data`
--

CREATE TABLE `weight_data` (
  `weight_id` int NOT NULL,
  `criteria_id` varchar(4) NOT NULL,
  `type` varchar(50) NOT NULL,
  `value` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `weight_data`
--

INSERT INTO `weight_data` (`weight_id`, `criteria_id`, `type`, `value`) VALUES
(1, 'C1', 'Very Good', 1),
(2, 'C1', 'Good', 0.75),
(3, 'C1', 'Less', 0.5),
(4, 'C1', 'Bad', 0.25),
(5, 'C2', 'Very Good', 1),
(6, 'C2', 'Good', 0.75),
(7, 'C2', 'Less', 0.5),
(8, 'C2', 'Bad', 0.25),
(9, 'C3', 'Very Good', 1),
(10, 'C3', 'Good', 0.75),
(11, 'C3', 'Less', 0.5),
(12, 'C3', 'Bad', 0.25),
(13, 'C4', 'Very Good', 1),
(14, 'C4', 'Good', 0.75),
(15, 'C4', 'Less', 0.5),
(16, 'C4', 'Bad', 0.25),
(17, 'C5', 'Very Good', 1),
(18, 'C5', 'Good', 0.75),
(19, 'C5', 'Less', 0.5),
(20, 'C5', 'Bad', 0.25);

-- --------------------------------------------------------

--
-- Structure for view `alternative_data`
--
DROP TABLE IF EXISTS `alternative_data`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `alternative_data`  AS SELECT `ar`.`alter_id` AS `alternative_id`, `e`.`name` AS `employee_name`, `wd1`.`value` AS `C1_value`, `wd2`.`value` AS `C2_value`, `wd3`.`value` AS `C3_value`, `wd4`.`value` AS `C4_value`, `wd5`.`value` AS `C5_value` FROM ((((((`alternative_raw` `ar` join `employee` `e` on((`ar`.`employee_id` = `e`.`id`))) join `weight_data` `wd1` on((`ar`.`C1` = `wd1`.`weight_id`))) join `weight_data` `wd2` on((`ar`.`C2` = `wd2`.`weight_id`))) join `weight_data` `wd3` on((`ar`.`C3` = `wd3`.`weight_id`))) join `weight_data` `wd4` on((`ar`.`C4` = `wd4`.`weight_id`))) join `weight_data` `wd5` on((`ar`.`C5` = `wd5`.`weight_id`))) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alternative_raw`
--
ALTER TABLE `alternative_raw`
  ADD PRIMARY KEY (`alter_id`),
  ADD KEY `employee_key` (`employee_id`),
  ADD KEY `c1_key` (`C1`),
  ADD KEY `c2_key` (`C2`),
  ADD KEY `c3_key` (`C3`),
  ADD KEY `c4_key` (`C4`),
  ADD KEY `c5_key` (`C5`);

--
-- Indexes for table `criteria_data`
--
ALTER TABLE `criteria_data`
  ADD PRIMARY KEY (`criteria_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `weight_data`
--
ALTER TABLE `weight_data`
  ADD PRIMARY KEY (`weight_id`),
  ADD KEY `criteria_key` (`criteria_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `alternative_raw`
--
ALTER TABLE `alternative_raw`
  ADD CONSTRAINT `c1_key` FOREIGN KEY (`C1`) REFERENCES `weight_data` (`weight_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `c2_key` FOREIGN KEY (`C2`) REFERENCES `weight_data` (`weight_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `c3_key` FOREIGN KEY (`C3`) REFERENCES `weight_data` (`weight_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `c4_key` FOREIGN KEY (`C4`) REFERENCES `weight_data` (`weight_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `c5_key` FOREIGN KEY (`C5`) REFERENCES `weight_data` (`weight_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `employee_key` FOREIGN KEY (`employee_id`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `weight_data`
--
ALTER TABLE `weight_data`
  ADD CONSTRAINT `criteria_key` FOREIGN KEY (`criteria_id`) REFERENCES `criteria_data` (`criteria_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
