-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2022 at 09:10 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `funolympic`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cid` int(11) NOT NULL,
  `category_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cid`, `category_title`) VALUES
(2, 'Basketball'),
(3, 'Football'),
(4, 'Ice Skating'),
(5, 'Skiing'),
(7, 'Bobsleigh'),
(9, 'Ice Hockey');

-- --------------------------------------------------------

--
-- Table structure for table `fixtures`
--

CREATE TABLE `fixtures` (
  `fid` int(255) NOT NULL,
  `fixture_date` date NOT NULL,
  `fixture_title` varchar(255) NOT NULL,
  `fixture_time` time NOT NULL,
  `fixture_category` varchar(255) NOT NULL,
  `fixture_countries` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `fixtures`
--

INSERT INTO `fixtures` (`fid`, `fixture_date`, `fixture_title`, `fixture_time`, `fixture_category`, `fixture_countries`) VALUES
(2, '2022-10-14', 'Argentina Vs Brazil', '20:41:00', 'Football', 'Argentina, Brazil'),
(4, '2022-10-13', 'Afghanistan vs Albania', '19:56:00', 'Ice Skating', 'Afghanistan, Albania'),
(7, '2022-10-13', 'Australia vs Bangladesh', '01:29:00', 'Basketball', 'Australia, Bangladesh');

-- --------------------------------------------------------

--
-- Table structure for table `live_videos`
--

CREATE TABLE `live_videos` (
  `lvid` int(11) NOT NULL,
  `video_title` varchar(255) NOT NULL,
  `video_description` varchar(255) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `video_category` varchar(255) NOT NULL,
  `uploaded_date` date NOT NULL,
  `uploaded_time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `live_videos`
--

INSERT INTO `live_videos` (`lvid`, `video_title`, `video_description`, `video_url`, `video_category`, `uploaded_date`, `uploaded_time`) VALUES
(1, 'Foodtball', 'foostball', 'https://www.youtube.com/watch?v=yHh9wvXt3tw?autoplay=1&mute=1', 'Football', '0000-00-00', '02:15:58pm'),
(2, 'Foodtball', 'foostball', 'https://www.youtube.com/watch?v=yHh9wvXt3tw?autoplay=1&mute=1', 'Football', '0000-00-00', '02:22:57pm');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_title` varchar(255) NOT NULL,
  `uploaded_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE `photos` (
  `pid` int(11) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `category_title` varchar(255) NOT NULL,
  `image_path` varchar(255) NOT NULL,
  `upload_date` date NOT NULL,
  `upload_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`pid`, `caption`, `category_title`, `image_path`, `upload_date`, `upload_time`) VALUES
(4, 'Basketball', 'Basketball', '1665422633basketball.jpg', '0000-00-00', '07:23:53'),
(5, 'Bobsleigh', 'Bobsleigh', '1665422646bobsleigh.jpg', '0000-00-00', '07:24:06'),
(6, 'Ice Hockey', 'Ice Hockey', '1665422661icehockey.jpg', '0000-00-00', '07:24:21'),
(7, 'Skiing', 'Skiing', '1665422676skiing.jpg', '0000-00-00', '07:24:36'),
(8, 'Curling', 'Curling', '1665422695curling.jpg', '0000-00-00', '07:24:55'),
(9, 'Ice Skating', 'Ice Skating', '1665591030iceskating.jpg', '0000-00-00', '06:10:30'),
(10, 'Ice Skating', 'Ice Skating', '1665591990iceskating.jpg', '0000-00-00', '06:26:30'),
(11, 'Basketball', 'Basketball', '1665592864basketball.jpg', '0000-00-00', '06:41:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `nationality` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `profile_image` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `registered_date` date NOT NULL,
  `is_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `phone`, `nationality`, `email`, `profile_image`, `username`, `password`, `status`, `registered_date`, `is_admin`) VALUES
(13, 'Admin', 12345, 'United Kingdom', 'admin@games.com', 'profile.png', 'admin', '$2y$12$Dztk3M1yqHNLGL7BB9kkBOV5Rezti5wooagY6IWw3XNQODz4VAY2K', 0, '0000-00-00', 1),
(18, 'Ram Gurung', 123456, 'Nepal', 'ram@gmail.com', 'profile.png', 'Ram123', '$2y$12$P.TtpNd.cP/X29nIulK35eAT4oPJHdT.2iHFC43JoqDnzoUTDMckW', 0, '0000-00-00', 0),
(25, 'Test1', 987654321, 'Nepal', 'test@gmail.com', 'profile.png', 'test1', '$2y$12$Pq7EB3Yqnxq.m2IMd8v/beIhpfTTjyFndy8Tb.eICf7UbloCou7Wi', 0, '0000-00-00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `vid` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `category_title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `video_path` varchar(255) NOT NULL,
  `tags` varchar(255) NOT NULL,
  `upload_date` date NOT NULL,
  `upload_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`vid`, `title`, `category_title`, `description`, `video_path`, `tags`, `upload_date`, `upload_time`) VALUES
(6, 'Alpine Skiing Beijing 2022', 'Skiing', 'Alpine Skiing Beijing 2022', '1665421439videoplayback1.mp4', '#Olympics #Skiing', '0000-00-00', '07:03:59'),
(8, '🏒 Finland 🆚 Sweden | Men\\\'s Ice Hockey Beijing 2022', 'Ice Hockey', 'Finland produced a superb comeback to beat Sweden 4-3 in overtime in the men\\\'s Ice Hockey and book their place in the quarter-finals at Beijing 2022. Trailing 3-0 in the final period, they scored three quick goals, before Harri Personen produced the winn', '1665422159videoplayback0.mp4', '#Olympics #IceHockey', '0000-00-00', '07:15:59'),
(11, 'Ice Skating', 'Ice Skating', 'Ice Skating', '1665592841videoplayback.mp4', '#Olympics #IceSkating', '0000-00-00', '06:40:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `fixtures`
--
ALTER TABLE `fixtures`
  ADD PRIMARY KEY (`fid`);

--
-- Indexes for table `live_videos`
--
ALTER TABLE `live_videos`
  ADD PRIMARY KEY (`lvid`);

--
-- Indexes for table `photos`
--
ALTER TABLE `photos`
  ADD PRIMARY KEY (`pid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`vid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `fixtures`
--
ALTER TABLE `fixtures`
  MODIFY `fid` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `live_videos`
--
ALTER TABLE `live_videos`
  MODIFY `lvid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `photos`
--
ALTER TABLE `photos`
  MODIFY `pid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `vid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
