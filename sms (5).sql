-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2024 at 02:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sms`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `GetEmployeeAndUserCount` ()   BEGIN
    SELECT COUNT(*) as employee_count FROM sms WHERE role = 'employee';
    SELECT COUNT(*) as user_count FROM sms WHERE role = 'user';
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `alogin`
--

CREATE TABLE `alogin` (
  `Admin_id` int(11) NOT NULL,
  `name` varchar(8) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `Status` int(11) NOT NULL,
  `login_attempts` int(11) DEFAULT NULL,
  `lockout_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `alogin`
--

INSERT INTO `alogin` (`Admin_id`, `name`, `email`, `password`, `Status`, `login_attempts`, `lockout_time`) VALUES
(1, 'Benjamin', 'admin@gmail.com', 'admin', 0, 2, 1728173741),
(2, 'Benjamin', 'admin1@gmail.com', '$2y$10$uroFu92AS2zdW3Lnp8KJL.gmX/v5kuq1LrRFtDRUPcz', 0, 1, NULL),
(3, 'jeron L.', 'admin11@gmail.com', '$2y$10$KcnkUOJZctEN4qD5D9bqs.n7etjUQvRlyi2.GIB6QjW', 0, NULL, NULL),
(4, 'Ahron Ja', 'admin111@gmail.com', '$2y$10$jT5gqdMFO1iPLoPhqv.c9eNJ42iDYuaK5vrb5FDzl0p', 0, 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `captcha_images`
--

CREATE TABLE `captcha_images` (
  `id` int(11) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `answer` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `captcha_images`
--

INSERT INTO `captcha_images` (`id`, `image`, `answer`) VALUES
(1, 'assets/laz.jpeg', 'Lazada'),
(2, 'assets/amazon.jpeg', 'Amazon'),
(3, 'assets/google.jpeg', 'Google'),
(4, 'assets/facebook.jpeg', 'Facebook'),
(5, 'assets/X.jpeg', 'Twitter'),
(6, 'assets/microsoft.jpeg', 'Microsoft'),
(7, 'assets/apple.jpeg', 'Apple');

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `location` text NOT NULL,
  `pic` text NOT NULL,
  `clients` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `click_count` int(11) DEFAULT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`id`, `firstName`, `lastName`, `email`, `password`, `birthday`, `gender`, `contact`, `location`, `pic`, `clients`, `link`, `click_count`, `message`) VALUES
(19, 'Benjamin', 'Arcillo', 'pro11@gmail.com', '1234', '0012-03-12', 'Male', '91615256612', 'Tupi', 'images/Screenshot 2023-08-09 132820.png', '123', '123123', 123123, ''),
(20, 'jeron', 'Manila', 'arcillobenjamin102007@gmail.com', '1234', '0123-03-12', 'Male', '09776758555', 'Tupi', 'images/Screenshot 2023-08-09 132820.png', 'hanma', 'https://www.youtube.com/', 123123, ''),
(22, 'jeron', 'Manila', 'pro1@gmail.com', '1234', '0000-00-00', 'Male', '09776758555', 'Tupi', 'images/Screenshot 2023-08-16 073844.png', 'hanma', 'https://www.youtube.com/', 123123, ''),
(23, 'bertod', 'Santos', 'pro111@gmail.com', '1234', '0000-00-00', 'Male', '91615256611', 'Tupi', 'images/Screenshot 2023-08-09 132820.png', 'hanma', 'https://www.youtube.com/', 123123, '');

-- --------------------------------------------------------

--
-- Table structure for table `employee1`
--

CREATE TABLE `employee1` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `location` text NOT NULL,
  `pic` text NOT NULL,
  `clients` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `click_count` int(11) DEFAULT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee1`
--

INSERT INTO `employee1` (`id`, `firstName`, `lastName`, `email`, `password`, `birthday`, `gender`, `contact`, `location`, `pic`, `clients`, `link`, `click_count`, `message`) VALUES
(19, 'Benjamin', 'Arcillo', 'pro11@gmail.com', '1234', '0012-03-12', 'Male', '91615256612', 'Tupi', 'images/Screenshot 2023-08-09 132820.png', '123', '123123', 123123, ''),
(20, 'jeron', 'Manila', 'arcillobenjamin102007@gmail.com', '1234', '0123-03-12', 'Male', '09776758555', 'Tupi', 'images/Screenshot 2023-08-09 132820.png', 'hanma', 'https://www.youtube.com/', 123123, ''),
(22, 'jeron', 'Manila', 'pro1@gmail.com', '1234', '0000-00-00', 'Male', '09776758555', 'Tupi', 'images/Screenshot 2023-08-16 073844.png', 'hanma', 'https://www.youtube.com/', 123123, ''),
(23, 'bertod', 'Santos', 'pro111@gmail.com', '1234', '0000-00-00', 'Male', '91615256611', 'Tupi', 'images/Screenshot 2023-08-09 132820.png', 'hanma', 'https://www.youtube.com/', 123123, '');

-- --------------------------------------------------------

--
-- Table structure for table `employee2`
--

CREATE TABLE `employee2` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `location` text NOT NULL,
  `pic` text NOT NULL,
  `clients` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `click_count` int(11) DEFAULT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee2`
--

INSERT INTO `employee2` (`id`, `firstName`, `lastName`, `email`, `password`, `birthday`, `gender`, `contact`, `location`, `pic`, `clients`, `link`, `click_count`, `message`) VALUES
(19, 'Benjamin', 'Arcillo', 'pro11@gmail.com', '1234', '0012-03-12', 'Male', '91615256612', 'Tupi', 'images/Screenshot 2023-08-09 132820.png', '123', '123123', 123123, ''),
(20, 'jeron', 'Manila', 'arcillobenjamin102007@gmail.com', '1234', '0123-03-12', 'Male', '09776758555', 'Tupi', 'images/Screenshot 2023-08-09 132820.png', 'hanma', 'https://www.youtube.com/', 123123, ''),
(22, 'jeron', 'Manila', 'pro1@gmail.com', '1234', '0000-00-00', 'Male', '09776758555', 'Tupi', 'images/Screenshot 2023-08-16 073844.png', 'hanma', 'https://www.youtube.com/', 123123, ''),
(23, 'bertod', 'Santos', 'pro111@gmail.com', '1234', '0000-00-00', 'Male', '91615256611', 'Tupi', 'images/Screenshot 2023-08-09 132820.png', 'hanma', 'https://www.youtube.com/', 123123, '');

-- --------------------------------------------------------

--
-- Table structure for table `employee3`
--

CREATE TABLE `employee3` (
  `id` int(11) NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `birthday` date NOT NULL,
  `gender` varchar(10) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `location` text NOT NULL,
  `pic` text NOT NULL,
  `clients` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `click_count` int(11) DEFAULT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `employee3`
--

INSERT INTO `employee3` (`id`, `firstName`, `lastName`, `email`, `password`, `birthday`, `gender`, `contact`, `location`, `pic`, `clients`, `link`, `click_count`, `message`) VALUES
(19, 'Benjamin', 'Arcillo', 'pro11@gmail.com', '1234', '0012-03-12', 'Male', '91615256612', 'Tupi', 'images/Screenshot 2023-08-09 132820.png', '123', '123123', 123123, ''),
(20, 'jeron', 'Manila', 'arcillobenjamin102007@gmail.com', '1234', '0123-03-12', 'Male', '09776758555', 'Tupi', 'images/Screenshot 2023-08-09 132820.png', 'hanma', 'https://www.youtube.com/', 123123, ''),
(22, 'jeron', 'Manila', 'pro1@gmail.com', '1234', '0000-00-00', 'Male', '09776758555', 'Tupi', 'images/Screenshot 2023-08-16 073844.png', 'hanma', 'https://www.youtube.com/', 123123, ''),
(23, 'bertod', 'Santos', 'pro111@gmail.com', '1234', '0000-00-00', 'Male', '91615256611', 'Tupi', 'images/Screenshot 2023-08-09 132820.png', 'hanma', 'https://www.youtube.com/', 123123, '');

-- --------------------------------------------------------

--
-- Table structure for table `facebook_live_links`
--

CREATE TABLE `facebook_live_links` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `facebook_live_links`
--

INSERT INTO `facebook_live_links` (`id`, `link`) VALUES
(1, 'https://web.facebook.com/share/v/gpHBq9aNSnvfc6DN/');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(6) UNSIGNED NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `user_id` int(6) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `image_name`, `image_path`, `user_id`) VALUES
(1, 'Screenshot 2023-08-15 121834.png', 'uploads/66a37b71f338f_Screenshot 2023-08-15 121834.png', 123123),
(2, 'Screenshot 2023-08-15 121834.png', 'uploads/66a481363db5a_Screenshot 2023-08-15 121834.png', 123123),
(3, 'Screenshot 2023-08-16 073835.png', 'uploads/66a48145999ac_Screenshot 2023-08-16 073835.png', 123123),
(4, 'Screenshot 2023-08-16 073835.png', 'uploads/66a481f351c8d_Screenshot 2023-08-16 073835.png', 123123),
(5, 'Screenshot 2023-08-16 073835.png', 'uploads/66a4846d307e4_Screenshot 2023-08-16 073835.png', 0),
(6, 'Screenshot 2023-08-16 073835.png', 'uploads/66a485ef1cc37_Screenshot 2023-08-16 073835.png', 123123),
(7, 'Screenshot 2023-08-16 073835.png', 'uploads/66a4869989698_Screenshot 2023-08-16 073835.png', 123123),
(8, 'Screenshot 2023-08-16 073835.png', 'uploads/66a486e82855d_Screenshot 2023-08-16 073835.png', 123123),
(9, 'Screenshot 2023-08-16 073835.png', 'uploads/66a4875c296fb_Screenshot 2023-08-16 073835.png', 123123),
(10, 'Screenshot 2023-08-16 073835.png', 'uploads/66a487b9a62f1_Screenshot 2023-08-16 073835.png', 123123),
(11, 'Screenshot 2023-08-16 073835.png', 'uploads/66a487c06412c_Screenshot 2023-08-16 073835.png', 123123),
(12, 'Screenshot 2023-08-16 073835.png', 'uploads/66a487ed1b532_Screenshot 2023-08-16 073835.png', 123123),
(13, 'Screenshot 2023-08-16 073835.png', 'uploads/66a4880f29263_Screenshot 2023-08-16 073835.png', 123123),
(14, 'Screenshot 2023-08-16 073835.png', 'uploads/66a4882213880_Screenshot 2023-08-16 073835.png', 123123),
(15, 'Screenshot 2023-08-16 073835.png', 'uploads/66a48a9b6e884_Screenshot 2023-08-16 073835.png', 123123),
(16, 'Screenshot 2023-08-16 073835.png', 'uploads/66a48ad1a7b37_Screenshot 2023-08-16 073835.png', 123123),
(17, 'Screenshot 2023-08-16 073835.png', 'uploads/66a48aeac4155_Screenshot 2023-08-16 073835.png', 123123),
(18, 'Screenshot 2023-08-16 073835.png', 'uploads/66a48b096f750_Screenshot 2023-08-16 073835.png', 123123),
(19, 'Screenshot 2023-08-16 073835.png', 'uploads/66a48b1565509_Screenshot 2023-08-16 073835.png', 123123),
(20, 'Screenshot 2023-08-16 073835.png', 'uploads/66a48b2302c1a_Screenshot 2023-08-16 073835.png', 123123),
(21, 'Screenshot 2023-08-16 073835.png', 'uploads/66a48ba9bca17_Screenshot 2023-08-16 073835.png', 123123),
(22, 'Screenshot 2023-08-16 073835.png', 'uploads/66a48c08a4e49_Screenshot 2023-08-16 073835.png', 123123),
(23, 'Screenshot 2023-08-16 073835.png', 'uploads/66a48c59cca3e_Screenshot 2023-08-16 073835.png', 123123),
(24, 'Screenshot 2023-08-16 073835.png', 'uploads/66a48c74da451_Screenshot 2023-08-16 073835.png', 123123),
(25, 'Screenshot 2023-08-16 073835.png', 'uploads/66a48cc7064b7_Screenshot 2023-08-16 073835.png', 123123),
(26, 'Screenshot 2023-08-16 073835.png', 'uploads/66a48ccaa1e8e_Screenshot 2023-08-16 073835.png', 123123),
(27, 'Screenshot 2023-08-16 073835.png', 'uploads/66a48d68d6dec_Screenshot 2023-08-16 073835.png', 123123),
(28, 'Screenshot 2023-08-16 073835.png', 'uploads/66a48de2e5a73_Screenshot 2023-08-16 073835.png', 123123),
(29, 'Screenshot 2023-08-16 073835.png', 'uploads/66a48e2f8f5e1_Screenshot 2023-08-16 073835.png', 123123),
(30, 'Screenshot 2023-08-16 073835.png', 'uploads/66a48e32889f1_Screenshot 2023-08-16 073835.png', 123123),
(31, 'Screenshot 2023-08-16 073835.png', 'uploads/66a48e56ee247_Screenshot 2023-08-16 073835.png', 123123),
(32, 'Screenshot 2023-08-16 073835.png', 'uploads/66a48e8c270bf_Screenshot 2023-08-16 073835.png', 123123),
(33, 'Screenshot 2023-08-16 073835.png', 'uploads/66a48eaf3384a_Screenshot 2023-08-16 073835.png', 123123),
(34, 'Screenshot 2023-08-16 073835.png', 'uploads/66a48eb2103aa_Screenshot 2023-08-16 073835.png', 123123),
(35, 'Screenshot 2023-08-16 073835.png', 'uploads/66a4cc8c109d2_Screenshot 2023-08-16 073835.png', 123123),
(36, 'Screenshot 2023-08-09 132820.png', 'uploads/66ac4a5ab5583_Screenshot 2023-08-09 132820.png', 123123),
(37, 'Screenshot 2023-08-16 073835.png', 'uploads/66ad78d1b028f_Screenshot 2023-08-16 073835.png', 123123),
(38, 'Screenshot 2023-10-12 205718.png', 'uploads/66ae9c40a4118_Screenshot 2023-10-12 205718.png', 123123),
(39, 'download.jpg', 'uploads/66fe8547096ff_download.jpg', 123123),
(40, 'Screenshot 2023-08-09 132820.png', 'uploads/6703a02de8a2d_Screenshot 2023-08-09 132820.png', 123123),
(41, 'Screenshot 2023-08-09 132820.png', 'uploads/6703a06f18c76_Screenshot 2023-08-09 132820.png', 123123),
(42, 'Screenshot 2023-08-09 132820.png', 'uploads/6703a4208feb0_Screenshot 2023-08-09 132820.png', 123123),
(43, 'Screenshot 2023-08-15 121834.png', 'uploads/670672840625a_Screenshot 2023-08-15 121834.png', 123123);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `message_id` int(11) NOT NULL,
  `Admin_id` int(11) NOT NULL,
  `User_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` datetime NOT NULL DEFAULT current_timestamp(),
  `read_status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `rank`
--

CREATE TABLE `rank` (
  `eid` int(11) NOT NULL,
  `points` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `s1_winner`
--

CREATE TABLE `s1_winner` (
  `id` int(11) NOT NULL,
  `users_id_s1` int(11) NOT NULL,
  `Name_s1` varchar(255) DEFAULT NULL,
  `Date_s1` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `s1_winner`
--

INSERT INTO `s1_winner` (`id`, `users_id_s1`, `Name_s1`, `Date_s1`) VALUES
(25, 58, 'Benjamin L. Arcillo', '2024-10-07'),
(26, 58, 'Benjamin L. Arcillo', '2024-10-07'),
(27, 58, 'Benjamin L. Arcillo', '2024-10-07'),
(28, 58, 'Benjamin L. Arcillo', '2024-10-30'),
(29, 58, 'Benjamin L. Arcillo', '2024-10-09'),
(30, 0, '', '0000-00-00'),
(31, 0, '', '0000-00-00'),
(32, 0, '', '0000-00-00'),
(33, 0, '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `s2_winner`
--
-- Error reading structure for table sms.s2_winner: #1932 - Table &#039;sms.s2_winner&#039; doesn&#039;t exist in engine
-- Error reading data for table sms.s2_winner: #1064 - You have an error in your SQL syntax; check the manual that corresponds to your MariaDB server version for the right syntax to use near &#039;FROM `sms`.`s2_winner`&#039; at line 1

-- --------------------------------------------------------

--
-- Table structure for table `s3_winner`
--

CREATE TABLE `s3_winner` (
  `id` int(11) NOT NULL,
  `users_id_s3` int(11) NOT NULL,
  `Name_s3` varchar(255) DEFAULT NULL,
  `Date_s3` date NOT NULL,
  `prize_s3` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `s3_winner`
--

INSERT INTO `s3_winner` (`id`, `users_id_s3`, `Name_s3`, `Date_s3`, `prize_s3`) VALUES
(0, 1, 'Ahron Jake Manila', '0123-03-20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `s4_winner`
--

CREATE TABLE `s4_winner` (
  `id` int(11) NOT NULL,
  `users_id_s4` int(11) NOT NULL,
  `Name_s4` varchar(255) DEFAULT NULL,
  `Date_s4` date NOT NULL,
  `prize_s4` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `s4_winner`
--

INSERT INTO `s4_winner` (`id`, `users_id_s4`, `Name_s4`, `Date_s4`, `prize_s4`) VALUES
(0, 123, '123123123 Arcillo', '3123-02-13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `s22_winner`
--

CREATE TABLE `s22_winner` (
  `id` int(11) NOT NULL,
  `users_id_s2` int(11) NOT NULL,
  `Name_s2` varchar(255) DEFAULT NULL,
  `Date_s2` date NOT NULL,
  `prize_s2` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `s22_winner`
--

INSERT INTO `s22_winner` (`id`, `users_id_s2`, `Name_s2`, `Date_s2`, `prize_s2`) VALUES
(0, 1, 'jeron L. Manila', '2024-10-24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `User_id` int(11) NOT NULL,
  `notify` text NOT NULL,
  `name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `age` int(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `birthday` date NOT NULL,
  `contact_number` varchar(11) NOT NULL,
  `address` varchar(200) NOT NULL,
  `photo_path` varchar(250) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL,
  `login_attempts` int(11) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT 0,
  `lockout_time` int(11) DEFAULT NULL,
  `time_left` int(11) DEFAULT NULL,
  `animal_sound` varchar(255) NOT NULL,
  `silver_balance` int(10) NOT NULL,
  `notification_count` int(11) DEFAULT 0,
  `comment_subject` varchar(255) DEFAULT NULL,
  `comment_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`User_id`, `notify`, `name`, `middle_name`, `last_name`, `age`, `gender`, `birthday`, `contact_number`, `address`, `photo_path`, `email`, `password`, `login_attempts`, `Status`, `lockout_time`, `time_left`, `animal_sound`, `silver_balance`, `notification_count`, `comment_subject`, `comment_text`) VALUES
(54, '', 'Benjamin', 'L.', 'Arcillo', 123, 'Male', '0123-03-12', '91615256612', 'Prk. Kahilwayan Brgy. Bai S111aripinang Bagumbayan, Sulatan Kudarat', 'uploads/Screenshot 2023-08-09 132820.png', 'pro11@gmail.com', '$2y$10$ot2S6kJGrpiaQ0greULgxu04XWDy6s4f8nCcV0Tv8jjJFupbT2Uji', 0, 1, 0, NULL, '', 6, 1, '123', '123123'),
(58, '', 'BERDOGO', 'L.', 'Arcillo', 556, 'Male', '0000-00-00', '91615256621', 'Prk. Kahilwayan Brgy. Bai Saripinang Bagumbayan, Sulatan Kudarat', 'uploads/448369674_1610512483062721_8495255037784958342_n.jpg', 'pro111@gmail.com', '$2y$10$hP6NH69soj0ptp3wKdxJHuq4rZPelCDfa.ngf9MEIEqQ39ZLgPpRW', 0, 1, 0, NULL, '', 987, 0, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_entry_silver`
--

CREATE TABLE `user_entry_silver` (
  `id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `Lucky_number` int(11) DEFAULT NULL,
  `Name` varchar(255) DEFAULT NULL,
  `message` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_entry_silver`
--

INSERT INTO `user_entry_silver` (`id`, `users_id`, `Lucky_number`, `Name`, `message`) VALUES
(13, 54, 0, 'Benjamin', '12312'),
(14, 54, 132, 'Benjamin', '123123'),
(15, 54, 12312, 'Benjamin', '3123'),
(16, 54, 1231, 'Benjamin', '123123'),
(17, 54, 123, 'Benjamin', '123213'),
(18, 54, 123123, 'Benjamin', '123123'),
(19, 54, 66, 'Benjamin', '345'),
(20, 54, 77, 'Benjamin', '77777'),
(21, 58, 8, 'BERDOGO', 'hh'),
(22, 58, 69, 'BERDOGO', '123123'),
(23, 58, 76, 'BERDOGO', '1312');

-- --------------------------------------------------------

--
-- Table structure for table `user_entry_silver1`
--

CREATE TABLE `user_entry_silver1` (
  `id` int(11) NOT NULL,
  `users_id1` int(11) NOT NULL,
  `Lucky_number1` int(11) DEFAULT NULL,
  `Name1` varchar(255) DEFAULT NULL,
  `message1` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_entry_silver1`
--

INSERT INTO `user_entry_silver1` (`id`, `users_id1`, `Lucky_number1`, `Name1`, `message1`) VALUES
(0, 0, 0, '', ''),
(0, 58, 2147483647, 'BERDOGO', '123');

-- --------------------------------------------------------

--
-- Table structure for table `user_entry_silver2`
--

CREATE TABLE `user_entry_silver2` (
  `id` int(11) NOT NULL,
  `users_id2` int(11) NOT NULL,
  `Lucky_number2` int(11) DEFAULT NULL,
  `Name2` varchar(255) DEFAULT NULL,
  `message2` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_entry_silver2`
--

INSERT INTO `user_entry_silver2` (`id`, `users_id2`, `Lucky_number2`, `Name2`, `message2`) VALUES
(0, 58, 6, 'BERDOGO', 'gg'),
(0, 58, 1, 'BERDOGO', '123'),
(0, 0, 0, '', ''),
(0, 58, 77, 'BERDOGO', '123'),
(0, 58, 773, 'BERDOGO', '12312');

-- --------------------------------------------------------

--
-- Table structure for table `user_entry_silver3`
--

CREATE TABLE `user_entry_silver3` (
  `id` int(11) NOT NULL,
  `users_id3` int(11) NOT NULL,
  `Lucky_number3` int(11) DEFAULT NULL,
  `Name3` varchar(255) DEFAULT NULL,
  `message3` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_entry_silver3`
--

INSERT INTO `user_entry_silver3` (`id`, `users_id3`, `Lucky_number3`, `Name3`, `message3`) VALUES
(0, 58, 0, 'BERDOGO', 'hhihihi'),
(0, 58, 77, 'BERDOGO', '12321'),
(0, 58, 123, 'BERDOGO', '123'),
(0, 58, 124, 'BERDOGO', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alogin`
--
ALTER TABLE `alogin`
  ADD PRIMARY KEY (`Admin_id`);

--
-- Indexes for table `captcha_images`
--
ALTER TABLE `captcha_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `employee1`
--
ALTER TABLE `employee1`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `employee2`
--
ALTER TABLE `employee2`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `employee3`
--
ALTER TABLE `employee3`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `facebook_live_links`
--
ALTER TABLE `facebook_live_links`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`message_id`),
  ADD KEY `User_id` (`User_id`);

--
-- Indexes for table `rank`
--
ALTER TABLE `rank`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `s1_winner`
--
ALTER TABLE `s1_winner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`User_id`);

--
-- Indexes for table `user_entry_silver`
--
ALTER TABLE `user_entry_silver`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alogin`
--
ALTER TABLE `alogin`
  MODIFY `Admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `captcha_images`
--
ALTER TABLE `captcha_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `employee`
--
ALTER TABLE `employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `employee1`
--
ALTER TABLE `employee1`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `employee2`
--
ALTER TABLE `employee2`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `employee3`
--
ALTER TABLE `employee3`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `facebook_live_links`
--
ALTER TABLE `facebook_live_links`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `s1_winner`
--
ALTER TABLE `s1_winner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `User_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `user_entry_silver`
--
ALTER TABLE `user_entry_silver`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`User_id`) REFERENCES `user` (`User_id`);

--
-- Constraints for table `rank`
--
ALTER TABLE `rank`
  ADD CONSTRAINT `rank_ibfk_1` FOREIGN KEY (`eid`) REFERENCES `employee` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
