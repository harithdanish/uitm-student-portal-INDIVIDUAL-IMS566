-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: May 24, 2026 at 02:40 AM
-- Server version: 8.4.3
-- PHP Version: 8.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `assignments`
--

CREATE TABLE `assignments` (
  `assignment_id` int NOT NULL,
  `assignment_title` varchar(100) NOT NULL,
  `due_date` date NOT NULL,
  `submission_status` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `student_id` int DEFAULT NULL,
  `subject_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `assignments`
--

INSERT INTO `assignments` (`assignment_id`, `assignment_title`, `due_date`, `submission_status`, `student_id`, `subject_id`) VALUES
(57, 'Make a Resume', '2026-05-24', 'Submitted', 1, 3),
(58, 'Make a Resume', '2026-05-24', 'Pending', 2, 3),
(59, 'Make a Resume', '2026-05-24', 'Submitted', 7, 3),
(60, 'Make a Resume', '2026-05-24', 'Pending', 8, 3),
(61, 'Make a Resume', '2026-05-24', 'Pending', 9, 3),
(62, 'Make a Resume', '2026-05-24', 'Pending', 10, 3),
(63, 'Laws in Malaysia', '2026-05-28', 'Pending', 1, 5),
(64, 'Laws in Malaysia', '2026-05-28', 'Submitted', 2, 5),
(65, 'Laws in Malaysia', '2026-05-28', 'Pending', 7, 5),
(66, 'Laws in Malaysia', '2026-05-28', 'Pending', 8, 5),
(67, 'Laws in Malaysia', '2026-05-28', 'Submitted', 9, 5),
(68, 'Laws in Malaysia', '2026-05-28', 'Submitted', 10, 5);

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `attendance_id` int NOT NULL,
  `attendance_percentage` int NOT NULL,
  `attendance_status` varchar(50) NOT NULL,
  `student_id` int DEFAULT NULL,
  `subject_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`attendance_id`, `attendance_percentage`, `attendance_status`, `student_id`, `subject_id`) VALUES
(1, 90, 'Good', 1, 1),
(2, 85, 'Average', 1, 2),
(3, 95, 'Excellent', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `student_id` int NOT NULL,
  `student_number` varchar(20) NOT NULL,
  `ic_number` varchar(20) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `faculty` varchar(100) NOT NULL,
  `course` varchar(100) NOT NULL,
  `semester` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `student_number`, `ic_number`, `full_name`, `faculty`, `course`, `semester`, `email`, `password`) VALUES
(1, '2023103849', '040101-01-1234', 'Muhammad Harith Danish', 'Faculty of Information Management', 'IMS566', '5', 'harithanuar2004@gmail.com', '123'),
(2, '2023103850', '040202-01-5678', 'Ahmad Firdaus mamat', 'Faculty of Information Management', 'IM246', '4', 'ahmad@gmail.com', '123'),
(7, '2025235522', '090704-14-0455', 'Anis Nur\'Adirah', 'Ethic Law', 'IMD699', '5', 'anisadirah@gmail.com', '$2y$10$pdXh/4Y0SBRq1ZIuE4iJnuGT6B224fptRYgi1oKbDks00pY.QNF5e'),
(8, '2024269225', '60708-03-0383', 'Arron Naga', 'Business Managment', 'IMT480', '3', 'arron@gmail.com', '$2y$10$MylsOlGOkwkMbwoDa6HRUOF//1g5ltc4f5MDtbscOdN0FPPxz43c6'),
(9, '2022103867', '010106-07-0490', 'Faiq Hakim', 'FAKULTI SAINS MAKLUMAT', 'SI262', '5', 'faiq@gmail.com', '$2y$10$bepvlr056jHZO1gOVCIsMekxNedMPOo/oNm1/WwQxj8x2qHDT0PWC'),
(10, '2025239535', '210503-02-0275', 'Mohd Haikal', 'Fakulti of Public Admin', 'IMD239', '4', 'haikal69@gmail.com', '$2y$10$lngiXP5E4VXgU77D6S8PdO7fReZGu1KcNec/J/o2NMGHV/czHCIsy');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `subject_id` int NOT NULL,
  `subject_code` varchar(20) NOT NULL,
  `subject_name` varchar(100) NOT NULL,
  `lecturer_name` varchar(100) NOT NULL,
  `credit_hour` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`subject_id`, `subject_code`, `subject_name`, `lecturer_name`, `credit_hour`) VALUES
(1, 'IMS566', 'Advanced Web Design Development', 'Madam Aisyah Yah ya', 3),
(2, 'IMC258', 'Metadata', 'Sir Hafiz', 3),
(3, 'IMT572', 'ADD MATHEMATICS', 'SIR RAZIQ GHANI', 4),
(5, 'IMD239', 'Public Admin', 'Miss Syura', 3),
(6, 'ELC232', 'English Language', 'Sir Safaruddin', 3),
(7, 'TJC401', 'Japanese langguage', 'Sensei Miyagi', 4);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assignments`
--
ALTER TABLE `assignments`
  ADD PRIMARY KEY (`assignment_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`attendance_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `subject_id` (`subject_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`subject_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assignments`
--
ALTER TABLE `assignments`
  MODIFY `assignment_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `attendance_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `student_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `subject_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `assignments`
--
ALTER TABLE `assignments`
  ADD CONSTRAINT `assignments_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `assignments_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`);

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`),
  ADD CONSTRAINT `attendance_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`subject_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
