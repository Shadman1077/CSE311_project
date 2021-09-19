-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2021 at 05:48 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `demo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `course_id` int(3) NOT NULL,
  `course_code` varchar(10) NOT NULL,
  `course_title` varchar(255) NOT NULL,
  `course_credit` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`course_id`, `course_code`, `course_title`, `course_credit`) VALUES
(1, 'cse311', 'Database', 3),
(2, 'EEE111', 'Electrical circuit', 3),
(3, 'CSE215', 'Java Programming Language', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `department_id` int(2) NOT NULL,
  `department_name` varchar(255) NOT NULL,
  `department_chairman` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`department_id`, `department_name`, `department_chairman`) VALUES
(1, 'Electrical and Computer Engineering Department', 'Md. Abdul Kalam'),
(2, 'Civil and Environmental Engineering', 'Md. Rafiq Hasan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_enrollment`
--

CREATE TABLE `tbl_enrollment` (
  `enrollment_id` int(10) NOT NULL,
  `student_id` int(20) NOT NULL,
  `course_id` int(3) NOT NULL,
  `section_id` int(4) NOT NULL,
  `teacher_id` int(4) NOT NULL,
  `total_class_done` int(2) NOT NULL DEFAULT 0,
  `total_present` int(2) NOT NULL DEFAULT 0,
  `final_grade` varchar(2) NOT NULL DEFAULT '-',
  `gpa` float NOT NULL,
  `credit_count` tinyint(1) NOT NULL,
  `credit_passed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_enrollment`
--

INSERT INTO `tbl_enrollment` (`enrollment_id`, `student_id`, `course_id`, `section_id`, `teacher_id`, `total_class_done`, `total_present`, `final_grade`, `gpa`, `credit_count`, `credit_passed`) VALUES
(1, 1, 1, 1, 1, 2, 2, 'A', 4, 3, 3),
(2, 2, 1, 1, 1, 2, 2, 'A-', 3.75, 3, 3),
(3, 6, 3, 4, 3, 3, 3, 'A-', 3.75, 3, 3),
(4, 5, 3, 4, 3, 3, 2, 'B+', 3.3, 3, 3),
(5, 3, 2, 3, 2, 0, 0, 'B+', 3.3, 3, 3),
(6, 4, 2, 3, 2, 0, 0, 'A', 4, 3, 3),
(7, 5, 2, 3, 2, 0, 0, 'C-', 1.75, 3, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_parent_gurdian`
--

CREATE TABLE `tbl_parent_gurdian` (
  `id` int(20) NOT NULL,
  `student_id` int(20) NOT NULL,
  `father` varchar(255) NOT NULL,
  `mother` varchar(255) NOT NULL,
  `gurdian` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `phone` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_parent_gurdian`
--

INSERT INTO `tbl_parent_gurdian` (`id`, `student_id`, `father`, `mother`, `gurdian`, `email`, `phone`) VALUES
(1, 1, 'Md. Nazmul', 'Rokeya Akter', 'Md. Nazmul', 'md.nazmul@mail.com', '03222222222'),
(2, 2, 'Md. Jamal Khan', 'Ayesha Akter', 'Md. Jamal Khan', 'md.jamal@mail.com', '05555555555'),
(3, 3, 'Md. Karim', 'Roksana Akter', 'Md. Karim', 'karim@mail.com', '099999999999'),
(4, 4, 'Md. Afjal', 'Rabeya Akter', 'Md. Afjal', 'afjal@mail.com', '088888888888'),
(5, 5, 'Md. Rakib Hussain', 'Hasina Akter', 'Md. Rakib Hussain', 'md.rakib@mail.com', '00785421588'),
(6, 6, 'Md. Fahad Alam', 'Rehena Akter', 'Md. Fahad Alam', 'md.fahad@mail.com', '08546987459'),
(8, 12, 'Latif Mia', 'Shilpi Begum', 'Latif Mia', '', '01234567890');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_section`
--

CREATE TABLE `tbl_section` (
  `section_id` int(4) NOT NULL,
  `course_id` int(3) NOT NULL,
  `teacher_id` int(4) NOT NULL,
  `section_number` tinyint(2) NOT NULL,
  `section_time` varchar(8) NOT NULL,
  `section_room` varchar(4) NOT NULL,
  `semester` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_section`
--

INSERT INTO `tbl_section` (`section_id`, `course_id`, `teacher_id`, `section_number`, `section_time`, `section_room`, `semester`) VALUES
(1, 1, 1, 1, '08:30 AM', '202', 'fall-2021'),
(2, 1, 1, 2, '10:30 AM', '203', 'fall-2021'),
(3, 2, 2, 5, '11.10', '503', 'fall-2021'),
(4, 3, 3, 1, '9.40 AM', '606', 'fall-2021');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student`
--

CREATE TABLE `tbl_student` (
  `student_id` int(20) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `blood_group` varchar(3) NOT NULL,
  `address` text NOT NULL,
  `major` varchar(50) NOT NULL,
  `current_status` varchar(11) NOT NULL DEFAULT 'enrolled',
  `admission_semester` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_student`
--

INSERT INTO `tbl_student` (`student_id`, `full_name`, `email`, `password`, `phone`, `date_of_birth`, `gender`, `blood_group`, `address`, `major`, `current_status`, `admission_semester`) VALUES
(1, 'Shanjida', 'shanjida@gmail.com', '123456', '01111111111', '2000-09-01', 'Female', 'B+', 'Dhaka, Bangladesh', 'CSE', 'enrolled', 'Fall18'),
(2, 'Shadman', 'shadman@gmail.com', '123456', '02222222222', '2001-07-02', 'Male', 'O+', 'Dhaka, Bangladesh', 'EEE', 'enrolled', 'Fall18'),
(3, 'Nayeem', 'nayeem@gmail.com', '123456', '03333333333', '2000-06-06', 'Male', 'B+', 'Dhaka, Bangladesh', 'CSE', 'enrolled', 'summer18'),
(4, 'Rubel Rana', 'rana@gmail.com', '123456', '04444444444', '2001-01-07', 'Male', 'O+', 'Dhaka, Bangladesh', 'EEE', 'enrolled', 'fall18'),
(5, 'Md. Abdul', 'abdul@gmail.com', '123456', '088888888888', '2001-09-02', 'Male', 'O+', 'Dhaka, Bangladesh', 'EEE', 'enrolled', 'fall18'),
(6, 'Md. Faruqui', 'faruqui@gmail.com', '123456', '066666666666', '2000-09-08', 'Male', 'B+', 'Dhaka, Bangladesh', 'CSE', 'enrolled', 'summer18'),
(12, 'Swarna', 'swarna@gmail.com', '123456', '01111111100', '1999-12-03', 'Female', 'A-', 'Dhaka,Bangladesh', 'CSE', 'enrolled', 'Summer 201');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher`
--

CREATE TABLE `tbl_teacher` (
  `teacher_id` int(4) NOT NULL,
  `department_id` int(2) NOT NULL,
  `teacher_name` varchar(255) NOT NULL,
  `designation` varchar(50) NOT NULL,
  `phone` varchar(14) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_teacher`
--

INSERT INTO `tbl_teacher` (`teacher_id`, `department_id`, `teacher_name`, `designation`, `phone`, `email`, `username`, `password`, `address`) VALUES
(1, 1, 'Md. Kamal Hussain', 'Associate Professor', '05555555555', 'md.kamal@mail.com', 'MKH', '123456', 'Dhaka, Bangladesh'),
(2, 1, 'Md. Raju', 'Professor', '16516', 'raju@mail.com', 'MR', '123456', 'Sylhet'),
(3, 1, 'Md. Afser Khan', 'Professor', '078945612378', 'md.afser@mail.com', 'MAK', '123456', 'Dhaka, Bangladesh');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`course_id`);

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `tbl_enrollment`
--
ALTER TABLE `tbl_enrollment`
  ADD PRIMARY KEY (`enrollment_id`);

--
-- Indexes for table `tbl_parent_gurdian`
--
ALTER TABLE `tbl_parent_gurdian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_section`
--
ALTER TABLE `tbl_section`
  ADD PRIMARY KEY (`section_id`);

--
-- Indexes for table `tbl_student`
--
ALTER TABLE `tbl_student`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  ADD PRIMARY KEY (`teacher_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `course_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `department_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_enrollment`
--
ALTER TABLE `tbl_enrollment`
  MODIFY `enrollment_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_parent_gurdian`
--
ALTER TABLE `tbl_parent_gurdian`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_section`
--
ALTER TABLE `tbl_section`
  MODIFY `section_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_student`
--
ALTER TABLE `tbl_student`
  MODIFY `student_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_teacher`
--
ALTER TABLE `tbl_teacher`
  MODIFY `teacher_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
