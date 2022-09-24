-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2022 at 03:07 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `orange`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `reel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `reel_id`, `user_id`, `restaurant_id`, `comment`, `time`) VALUES
(2, 3, 4, 5, '2', '2022-09-19 16:29:12'),
(31, 21, 1, 2, 'حاضر', '2022-09-21 04:18:25'),
(33, 19, 1, 1, 'This is a comment', '2022-09-21 13:34:15'),
(43, 30, 1, 2, 'ملهمش امان بجد', '2022-09-22 17:36:33'),
(44, 30, 7, 4, 'ههههه', '2022-09-22 17:37:07'),
(45, 19, 7, 4, '1', '2022-09-22 17:38:44'),
(46, 19, 7, 4, '1', '2022-09-22 17:38:48');

-- --------------------------------------------------------

--
-- Table structure for table `followers`
--

CREATE TABLE `followers` (
  `id` int(11) NOT NULL,
  `following_id` int(11) NOT NULL,
  `followed_id` int(11) NOT NULL,
  `state` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `followers`
--

INSERT INTO `followers` (`id`, `following_id`, `followed_id`, `state`) VALUES
(54, 6, 5, 1),
(55, 6, 1, 1),
(56, 6, 2, 1),
(63, 7, 2, 1),
(64, 7, 5, 1),
(65, 7, 6, 1),
(71, 8, 7, 1),
(72, 1, 8, 1),
(75, 8, 5, 1),
(85, 9, 1, 1),
(86, 9, 2, 1),
(87, 9, 5, 1),
(88, 1, 9, 1),
(89, 1, 5, 1),
(95, 11, 2, 1),
(96, 11, 5, 1),
(97, 11, 6, 1),
(100, 11, 9, 1),
(101, 11, 10, 1),
(102, 2, 1, 1),
(103, 1, 6, 1),
(104, 5, 8, 1),
(105, 5, 6, 1),
(106, 5, 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `reel_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `reel_id`, `user_id`, `restaurant_id`) VALUES
(115, 29, 1, 1),
(117, 20, 7, 1),
(121, 13, 1, 1),
(122, 19, 1, 1),
(124, 30, 7, 1),
(125, 30, 1, 1),
(126, 49, 2, 0),
(127, 49, 1, 0),
(128, 20, 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `reels`
--

CREATE TABLE `reels` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `restaurant_id` int(11) NOT NULL,
  `video` varchar(255) NOT NULL,
  `description` text DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `cnt` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `rateStatus` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `restaurant`
--

INSERT INTO `restaurant` (`id`, `category`, `name`, `description`, `img`, `address`, `cnt`, `rate`, `rateStatus`) VALUES
(1, 'Restaurant', 'takka', 'Have A Look At Our Irresistible Offers! Order Online Now, Or Download Our App. Visit Our Website And Choose From Our Many Delicious Meals! Order Online In Egypt Now. Meals For Sharing. Full Menu Online. Super Dinner. Order Online. Dinner Combo. Chicken Buckets.', 'rest1.jpg', 'giza', 55, 50, 0),
(2, 'Restaurant', 'KFC', 'Have A Look At Our Irresistible Offers! Order Online Now, Or Download Our App. Visit Our Website And Choose From Our Many Delicious Meals! Order Online In Egypt Now. Meals For Sharing. Full Menu Online. Super Dinner. Order Online. Dinner Combo. Chicken Buckets.', 'KFC.png', 'cairo', 60, 52, 0),
(3, 'restaurant', 'بيتزا السلطان', 'Have A Look At Our Irresistible Offers! Order Online Now, Or Download Our App. Visit Our Website And Choose From Our Many Delicious Meals! Order Online In Egypt Now. Meals For Sharing. Full Menu Online. Super Dinner. Order Online. Dinner Combo. Chicken Buckets.', 'images.png', 'cairo', 200, 150, 0),
(4, 'عربية كبدة', 'كبدة علي بركة الله', 'اي سندوتش ب 10', 'fool.jpg', 'fayoum', 245, 210, 0),
(5, '', 'abo tareq', 'اصل الكشري ف مصررررررررر', 'koshary.jpg', 'giza', 200, 70, 0),
(6, 'Cafe`', 'COSTA', 'Cafe & Restaurant Lazort', 'ivancik.jpg', 'Cairo', 25, 21, 0),
(8, 'Cinema', 'El-Tahrir Cinema', 'سينيما لأداء جميع دور العرض واحدث الأفلام', 'home-decor-2.jpg', 'giza', 20, 15, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` int(11) DEFAULT NULL,
  `about` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `img`, `status`, `about`) VALUES
(1, 'ahmed', 'ahmed@gmail.com', '$2y$10$BQBw9h31m94gIuDUqQ625eLpWFWKsNFZsYkStz0d7BABQCFVcEpiu', 'bruce-mars.jpg', 0, 'Software Engineer'),
(2, 'fady', 'f@f.com', '$2y$10$BQBw9h31m94gIuDUqQ625eLpWFWKsNFZsYkStz0d7BABQCFVcEpiu', 'down-arrow.svg', NULL, 'assist'),
(5, 'nassef333', 'ahmednassef8111@gmail.com', '$2y$10$BQBw9h31m94gIuDUqQ625eLpWFWKsNFZsYkStz0d7BABQCFVcEpiu', '34387aec74a1b94a.jpg', NULL, 'software engineer'),
(6, 'ميدو', 'samar@gmail.com', '$2y$10$05yq2Ksc.HIiuWAUwx7SJe.EAakPRRJpRIUGNHx.PLPJDIpPTZuqq', 'team-1.jpg', NULL, 'Turkish live translator'),
(7, 'Alaa Youssif', 'alaa@gmail.com', '$2y$10$05yq2Ksc.HIiuWAUwx7SJe.EAakPRRJpRIUGNHx.PLPJDIpPTZuqq', 'ivana-square.jpg', NULL, 'Embeded Systems Developer'),
(8, 'ahmed', 'ahmedgamal@gmail.com', '$2y$10$BQBw9h31m94gIuDUqQ625eLpWFWKsNFZsYkStz0d7BABQCFVcEpiu', 'team-2.jpg', NULL, 'software engineer'),
(9, 'Omar Hamdy', 'omar@gmail.com', '$2y$10$BQBw9h31m94gIuDUqQ625eLpWFWKsNFZsYkStz0d7BABQCFVcEpiu', 'team-3.jpg', NULL, 'Pharmacist'),
(10, 'TEST', 'test@test.com', '$2y$10$05yq2Ksc.HIiuWAUwx7SJe.EAakPRRJpRIUGNHx.PLPJDIpPTZuqq', 'ivancik.jpg', NULL, 'test'),
(11, 'wokixe', 'noqola@mailinator.com', '$2y$10$BQBw9h31m94gIuDUqQ625eLpWFWKsNFZsYkStz0d7BABQCFVcEpiu', 'bruce-mars.jpg', NULL, 'cipyki');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reels`
--
ALTER TABLE `reels`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `video` (`video`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `followers`
--
ALTER TABLE `followers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `reels`
--
ALTER TABLE `reels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `restaurant`
--
ALTER TABLE `restaurant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
