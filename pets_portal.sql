-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 07, 2025 at 11:32 AM
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
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `appointment_id` int NOT NULL AUTO_INCREMENT,
  `appointment_date` date NOT NULL,
  `appointment_time` time NOT NULL,
  `appointment_description` text NOT NULL,
  `doctor_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `clinic_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  `pet_id` int DEFAULT NULL,
  `approval` varchar(20) DEFAULT 'Pending',
  `visit` varchar(20) DEFAULT 'Pending',
  PRIMARY KEY (`appointment_id`),
  KEY `user_id` (`user_id`),
  KEY `doctor_id` (`doctor_id`),
  KEY `clinic_id` (`clinic_id`),
  KEY `pet_id` (`pet_id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`appointment_id`, `appointment_date`, `appointment_time`, `appointment_description`, `doctor_id`, `user_id`, `clinic_id`, `created_at`, `updated_at`, `status`, `pet_id`, `approval`, `visit`) VALUES
(5, '2025-01-06', '11:46:00', 'Gromming', 1, 2, 1, '2025-01-04 04:16:30', '2025-01-06 13:45:56', 'active', 1, 'Approved', 'Visited'),
(2, '2024-11-19', '14:00:00', 'Routine Health Check-up', 2, 3, 2, '2024-11-16 04:32:27', '2024-11-16 04:37:46', 'active', 2, 'Approved', 'Booked'),
(3, '2024-11-17', '12:00:00', 'Dental Care', 3, 4, 3, '2024-11-16 07:34:23', '2024-11-16 07:35:13', 'active', 3, 'Approved', 'Booked'),
(4, '2025-01-04', '15:00:00', 'Health checkup', 3, 2, 3, '2025-01-04 04:09:25', '2025-01-04 04:09:25', 'active', 1, 'Pending', 'Pending'),
(6, '2025-01-07', '12:00:00', 'Teeth Cleaning', 1, 4, 1, '2025-01-04 04:26:50', '2025-01-06 13:24:08', 'active', 3, 'Approved', 'Visited'),
(7, '2025-01-07', '12:16:00', 'General Health Check-Up', 7, 7, 5, '2025-01-06 12:47:16', '2025-01-06 13:12:17', 'active', 4, 'Approved', 'Visited'),
(8, '2025-01-08', '11:00:00', 'Pet Dental Care', 7, 2, 5, '2025-01-06 13:40:31', '2025-01-06 13:40:31', 'active', 1, 'Pending', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `clinic`
--

DROP TABLE IF EXISTS `clinic`;
CREATE TABLE IF NOT EXISTS `clinic` (
  `clinic_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `doctor_id` int NOT NULL,
  `open_time` time NOT NULL,
  `close_time` time NOT NULL,
  `open_days` varchar(100) NOT NULL,
  `close_days` varchar(100) NOT NULL,
  `fees` text NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL DEFAULT 'Inactive',
  `approval` varchar(10) DEFAULT 'Pending',
  `pet_type` text,
  `photo` text,
  `email` text,
  `rating` varchar(10) DEFAULT NULL,
  `about_us` text,
  PRIMARY KEY (`clinic_id`),
  UNIQUE KEY `phone` (`phone`),
  KEY `doctor_id` (`doctor_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `clinic`
--

INSERT INTO `clinic` (`clinic_id`, `name`, `address`, `phone`, `doctor_id`, `open_time`, `close_time`, `open_days`, `close_days`, `fees`, `created_at`, `updated_at`, `status`, `approval`, `pet_type`, `photo`, `email`, `rating`, `about_us`) VALUES
(1, 'Small Animal Care Center', 'Trimurti Nagar Nagpur', '9383673618', 1, '10:00:00', '18:00:00', ' Monday to Saturday', 'Sundays and National Holidays', '500 /- Per Pet', '2024-11-16 03:13:50', '2024-11-16 07:22:25', 'Active', 'Approved', 'Dogs and Cats', 'imgcl.jpg', 'smallanimal@gmail.com', '4.8 (347)', 'All Pets Here'),
(3, 'Paws & Whiskers Veterinary Clinic', 'Mangal Murti Square Nagpur', '7896321455', 3, '10:00:00', '18:00:00', ' Monday to Friday', 'Saturdays, Sundays, and Public Holidays', 'Consultation: ₹500\r\nVaccination: Starting at ₹600 (per vaccine, varies by type)\r\nHealth Check-up: ₹700\r\nDental Care: ₹1,200\r\nSurgeries: Starting at ₹5,000 (varies by procedure)\r\nDeworming: Free for puppies, ₹200 for adult pets\r\nHouse Calls: ₹1,000 within 10 km radius\r\nBlood Check-up (Hematology & Biochemistry): ₹1,500\r\nPet Grooming: ₹800 - ₹1,500 (varies by pet size)\r\nPet Food and Supplies: Priced as per product', '2024-11-16 07:31:41', '2024-11-16 07:32:23', 'Active', 'Approved', 'Dogs, Cats, Small Pets, Birds', 'clinicsclinic1.png', 'paw@gmail.com', '4.8 (73)', ''),
(4, 'Real Care Small Animal Clinic', 'Laxmi Nagar Nagpur', '9632587411', 6, '10:00:00', '18:00:00', 'Monday to Friday', 'Saturdays, Sundays, and Public Holidays', 'Consultation: ₹500\r\nVaccination: ₹700 (per vaccine)\r\nSpay/Neuter: ₹2,000 - ₹5,000 (based on pet size)\r\nGrooming Services: ₹800 - ₹1,500\r\nEmergency Care: Starting at ₹1,000', '2024-12-12 05:15:30', '2024-12-12 05:16:45', 'Active', 'Approved', 'Dogs and Cats', 'WhatsApp Image 2024-11-09 at 13.54.06_462370b7.jpg', 'real@gmail.com', '4.7 (365)', 'Dogs and Cats Clinic and gromming'),
(5, 'Dogs, Cats and Birds Clinic', 'Chattrapati Square Nagpur', '8273635353', 7, '11:01:00', '17:00:00', 'Monday to Friday', 'Saturdays, Sundays, and Public Holidays', 'General Health Check-Up: ₹1,000 per visit\r\nVaccinations and Immunizations: ₹500 - ₹1,000 per vaccine\r\nPet Dental Care: ₹5,000 - ₹10,000 (varies by procedure)\r\nSpay/Neuter Procedures:\r\nCats: ₹7,500\r\nDogs: ₹10,000 - ₹15,000 (based on weight)\r\nDeworming Treatment: ₹500 - ₹1,000\r\nEmergency Care: ₹2,500 - ₹5,000 (per visit, depending on severity)\r\nGrooming Services: ₹1,500 - ₹3,000 (includes bath, nail trimming, and fur trimming)\r\nDiagnostic Tests: ₹1,000 - ₹5,000 (blood tests, X-rays, etc.)', '2025-01-06 12:31:23', '2025-01-06 12:35:14', 'Active', 'Approved', 'Dogs, Cats, Birds', 'IMG_20250106_174905.jpg', 'dogclinic@gmail.com', '3.9 (194)', 'Dogs, Cats and Birds Clinic prides itself on compassionate and comprehensive care, ensuring every pet feels safe and loved during their visit.');

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

-- --------------------------------------------------------

--
-- Table structure for table `pets`
--

DROP TABLE IF EXISTS `pets`;
CREATE TABLE IF NOT EXISTS `pets` (
  `pet_id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `gender` varchar(15) NOT NULL,
  `color` varchar(255) NOT NULL,
  `weight` varchar(10) NOT NULL,
  `image` varchar(100) NOT NULL,
  `medical` text NOT NULL,
  `note` text,
  `user_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(255) NOT NULL DEFAULT 'active',
  PRIMARY KEY (`pet_id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pets`
--

INSERT INTO `pets` (`pet_id`, `name`, `type`, `breed`, `dob`, `gender`, `color`, `weight`, `image`, `medical`, `note`, `user_id`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Chikku', 'Dog', 'Labrador Retriever', '2024-10-21', 'male', 'Golden Yellow', '5', 'view-cats-dogs-showing-friendship.jpg', 'No health issues; scheduled for first vaccination soon', ' Very friendly and playful; loves to explore and chew toys', 2, '2024-11-16 04:02:29', '2024-11-16 07:20:21', 'Active'),
(3, 'Bella', 'Dog', 'Golden Retriver', '2023-12-05', 'male', 'Golden Yellow', '15', 'happy-pet-dogs-playing-park.jpg', 'All Vaccination done', 'Happy and healthy pet', 4, '2024-11-16 07:26:03', '2024-11-16 07:26:03', 'active'),
(4, 'Charlie', 'Dog', 'Beagle', '2019-03-31', 'male', 'Tricolor (Black, White, and Brown)', '12', 'b3.jpeg', 'None; fully healthy.', 'Very energetic, loves long walks and sniffing trails.', 7, '2025-01-06 12:09:25', '2025-01-06 12:09:25', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `role_id` int NOT NULL AUTO_INCREMENT,
  `role` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL DEFAULT 'active',
  PRIMARY KEY (`role_id`),
  UNIQUE KEY `role` (`role`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`role_id`, `role`, `status`) VALUES
(1, 'admin', 'active'),
(2, 'user', 'active'),
(3, 'doctor', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(15) NOT NULL,
  `dob` date NOT NULL,
  `role_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Active',
  `profile` text,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `phone` (`phone`),
  KEY `role_id` (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`, `phone`, `address`, `gender`, `dob`, `role_id`, `created_at`, `updated_at`, `status`, `profile`) VALUES
(1, 'Safalya Kumbhare', 'safalyakumbhare@gmail.com', '$2y$10$DABTgnxItx6ovblPBcGVGu4fZXem40Ivz3pBQMTwmigJt4uzoDa.O', '9874563215', 'Trimurti Nagar, Nagpur', 'male', '2003-10-08', 1, '2024-11-16 02:47:55', '2024-12-12 05:06:24', 'Active', '53641cb7-49cf-4f41-8dbc-0d87b9e91fe8.jpg'),
(2, 'Prajakta Garodi', 'prajaktagarodi@gmail.com', '$2y$10$OOYh0WnmhsCNx6IsL2XfVuuvA9svG6VIWAA3QTf/Duov8QQvb/AdS', '9182736450', 'Gandhi Bagh Nagpur', 'Female', '2024-11-15', 2, '2024-11-16 02:50:40', '2024-11-16 07:20:21', 'Active', 'Screenshot 2024-11-03 233709.png'),
(4, 'Bhuvan', 'bhuvan@gmail.com', '$2y$10$NaB6aEm1p.uBwQLhESeFNOqGfapG05AO..6oAEVraEtIcNCmWUF4i', '7412589632', 'IT Park Nagpur', 'Male', '2001-11-15', 2, '2024-11-16 07:24:27', '2024-11-16 07:24:27', 'Active', 'chadengle.jpg'),
(5, 'Kartik Yadav', 'kartikyadav@gmail.com', '$2y$10$G857GCAZl2e9/G2IDfCt7Oah1Km/vz/SLRGMMAZMdZWS4iHNKL6oe', '9282383929', 'Wadi Nagpur', 'Male', '2003-02-12', 2, '2024-12-05 18:04:53', '2024-12-05 18:04:53', 'Active', 'arashmil.jpg'),
(6, 'Yashraj Mane', 'yashrajmane@gmail.com', '$2y$10$M9eE1xZ.V1HpYyZf6RyakOowbshMDPesARRoY55ig6kx3rR3v445O', '7534565197', 'Ram Nagar Nagpur', 'Male', '2001-06-05', 2, '2024-12-12 05:09:12', '2024-12-12 05:09:12', 'Active', 'a-young-men-with-dark-hair-and-a-confident-smile-h-deMZrbE2RUGzHpEGSLW9Mw-9Kp7BoJMQnOg0x8KFEPFCQ.jpeg'),
(7, 'Roshni Walia', 'roshniwalia@gmail.com', '$2y$10$hNHdFP2ERwFi91ZHaVXDH.x321Zm/1BDrquFJATjXEmHQUAHzeUkW', '9827364546', 'Friends Colony Nagpur', 'Female', '2002-02-07', 2, '2025-01-06 11:58:20', '2025-01-06 11:58:20', 'Active', 'images (3).jpeg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
