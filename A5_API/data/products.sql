-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 03, 2019 at 05:25 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `A5ReadingList`
--

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `name` text NOT NULL,
  `url` text NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `date`, `name`, `url`, `description`) VALUES
(1, '2020-02-02 00:00:00', 'Lucy', 'https://www.codeofaninja.com/2017/02/create-simple-rest-api-in-php.html', 'My first description'),
(2, '0000-00-00 00:00:00', 'Emmag', '', 'My first description'),
(3, NULL, 'Update Name', '', ''),
(4, NULL, 'REST Tutorial', '', 'updating....'),
(5, NULL, 'REST Tutorial', 'https://www.emmas.com', 'How to use....'),
(6, NULL, 'REST Tutorial', '', 'Here again updating'),
(9, NULL, 'JQuery Ajax', '', 'Tutorial description about jquery and ajax'),
(10, NULL, 'REST Tutorial 2', '', '  Other description'),
(11, '2019-05-01 22:06:42', 'Example Name', 'https://www.example.com', '   Other description of example'),
(12, '2019-05-02 05:43:12', 'Api Api', 'https://www.apis.com', 'only apis'),
(13, '2019-05-02 10:29:13', 'Emma', 'https://www.example2.com', '  Other description'),
(14, '2019-05-02 12:44:35', 'Leeroy Jenkins', 'https://code.tutsplus.com/tutorials/how-to-use-ajax-in-php-and-jquery--cms-32494', '   Other description more'),
(15, '2019-05-02 16:05:48', '', '', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
