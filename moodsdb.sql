-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 24, 2023 at 06:03 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `moodsdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `moods`
--

CREATE TABLE `moods` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `value` varchar(255) NOT NULL,
  `context` varchar(255) DEFAULT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `moods`
--

INSERT INTO `moods` (`id`, `user_id`, `value`, `context`, `datetime`) VALUES
(67, 70, 'Happy', ' I am happy today', '2023-02-01 16:12:20'),
(69, 70, 'Productive', ' I am feeling rather productive today', '2023-02-01 16:12:43'),
(70, 70, 'Happy', ' I am really happy with how my project has turned out ', '2023-02-01 16:12:58'),
(71, 70, 'Tired', ' Didn\'t sleep much last night', '2023-02-01 16:13:20'),
(72, 70, 'Productive', ' Project report is done ', '2023-02-01 16:14:08'),
(76, 70, 'Productive', ' Demo text edited', '2023-02-02 15:33:23'),
(82, 70, 'Happy', ' The project is complete and submitted, time to celebrate ', '2023-02-13 18:05:42');

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `resourceID` int(11) NOT NULL,
  `ResourceName` varchar(255) NOT NULL,
  `ResourceDesc` text NOT NULL,
  `Link` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`resourceID`, `ResourceName`, `ResourceDesc`, `Link`) VALUES
(1, 'Samaritans', 'Free, anytime support for those who want someone to listen', 'https://www.samaritans.org/'),
(2, 'Young Minds', 'Mental health support for children and young adults ', 'https://www.youngminds.org.uk/'),
(3, 'Mind', 'Mental health support in England and Wales ', 'https://www.mind.org.uk/'),
(4, 'Aware NI', 'Mental health support and help with depression in Northern Ireland', 'https://aware-ni.org/'),
(5, 'Action Mental Health', 'Action Mental Health (AMH) actively promotes the mental health and well-being of people in Northern Ireland', 'https://www.amh.org.uk/');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varbinary(255) NOT NULL,
  `Name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `Name`) VALUES
(70, 'mattthebhoy@hotmail.co.uk', 0x2432792431302477535274752e39315452695467707379537170326d756a4262766a4d347069504f47355a4a2e4d7148694f57763574337278543857, 'Matthew McGrathffff');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `moods`
--
ALTER TABLE `moods`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`resourceID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `moods`
--
ALTER TABLE `moods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `resourceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `moods`
--
ALTER TABLE `moods`
  ADD CONSTRAINT `moods_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
