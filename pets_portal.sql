-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 06, 2025 at 01:54 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pets_testing`
--

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

DROP TABLE IF EXISTS `doctor`;
CREATE TABLE IF NOT EXISTS `doctor` (
  `doctor_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `dob` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(25) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` text,
  `license_no` varchar(10) NOT NULL,
  `specialization` text,
  `experience` text,
  `certification` text,
  `role_id` int DEFAULT '3',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(10) DEFAULT 'Inactive',
  `approval` varchar(10) DEFAULT 'Pending',
  PRIMARY KEY (`doctor_id`),
  UNIQUE KEY `phone` (`phone`),
  KEY `role_id` (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`doctor_id`, `name`, `email`, `phone`, `dob`, `address`, `gender`, `password`, `profile`, `license_no`, `specialization`, `experience`, `certification`, `role_id`, `created_at`, `updated_at`, `status`, `approval`) VALUES
(1, 'Dr. Anjali Mehta', 'anjalimehta@gmail.com', '9096758272', '1990-05-31', 'Subash Nagar Nagpur', 'female', '$2y$10$L8eMXPsMD9T/5u4Ntr21SueSqsCjPZKzZZudI9Dc.BweA/1hZOPcK', 'doctor1.jpg', '9876543210', 'Small Animals', '10 Year', 'BDVP', 3, '2024-11-16 03:01:34', '2024-11-16 07:22:25', 'Active', 'Approved'),
(3, 'Dr. Karan Ram', 'karanram@gmail.com', '8523697456', '1998-05-10', 'Mangal Murti Square Nagpur', 'male', '$2y$10$ESrAfEdamRBT7Bf5Gqzvee0hrMCNDyc6dI.PdyopgbfxaL..lotVq', 'Screenshot 2024-11-09 134139.png', '1232434343', 'Small Animals', '10 years of experience', ' Bachelor of Veterinary Science (BVSc), Certified in Small Animal', 3, '2024-11-16 07:29:02', '2024-11-16 07:29:32', 'Active', 'Approved'),
(7, 'Dr. Priya Sharma', 'priyasharma@gmail.com', '9273636363', '1989-03-23', 'Chattrapati Square Nagpur', 'female', '$2y$10$/YHVZGsAuxTDeSB5c9K3v.vTSikMQ5qzh3Oc1nlFsZdqOpulv9Nga', 'd3.jpeg', '2321324534', 'Dermatology and Preventive Care', '5+ years addressing skin conditions, allergies, and overall pet wellness.', 'DVM, Certified in Animal Dermatology', 3, '2025-01-06 12:14:57', '2025-01-06 12:16:02', 'Active', 'Approved'),
(5, 'Dr. Sameer Malhotra', 'sameermalhotra@gmail.com', '8298767823', '1980-02-22', 'Pratap Nagar Nagpur', 'male', '$2y$10$TPkah79m/WClWtKvlLXe8.g.yuEkZsKjpjHil5vausmHAnnCuRBxi', 'doctor1.jpg', '1234567890', 'Small  Animals', '7 years of experience in canine health, specializing in preventive care, behavior training, and rehabilitation for dogs.', 'Bachelor of Veterinary Science (BVSc)', 3, '2024-12-02 12:50:23', '2024-12-02 12:50:54', 'Active', 'Approved'),
(6, 'Dr. Tejas Sunil Wankhede', 'tejaswankhede@gmail.com', '9876543694', '1990-04-04', 'Laxmi Nagar Nagpur', 'male', '$2y$10$rg2yxvdA9O/6Q5zYGB6Hq.oN/mXxLCPhIkJfyBjCPZN3jcYnONPjy', 'Screenshot 2024-11-09 134139.png', '4234453454', 'Small Animals', '10 years Experience', 'BSVP', 3, '2024-12-12 05:11:41', '2024-12-12 05:12:03', 'Active', 'Approved');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
