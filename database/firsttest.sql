-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 05, 2018 at 04:58 PM
-- Server version: 5.7.19
-- PHP Version: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `firsttest`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `pass` varchar(40) NOT NULL,
  `fname` varchar(35) NOT NULL,
  `lname` varchar(35) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=52 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `pass`, `fname`, `lname`) VALUES
(1, 'thana.najem@outlook.com', '41c1068400a7dbb57d49802c513f4ce2fb108d94', 'Thana\'', 'Najem'),
(6, 'isra.said789@outlook.com', '978c406a58b31724377953a7509be1b9e7e88aea', 'thana', 'najem'),
(18, 'isra.sid789@outlook.com', '61952d36a9c54b1e9e867c37c0b4db1b8a82ccea', 'thana', 'najem'),
(22, 'isra.said78910@outlook.com', '41c1068400a7dbb57d49802c513f4ce2fb108d94', 'thana', 'najem'),
(26, 'aaaaaaaa@vvv.vom', '41c1068400a7dbb57d49802c513f4ce2fb108d94', 'thana', 'najem'),
(30, 'Q@outlook.com', '41c1068400a7dbb57d49802c513f4ce2fb108d94', 'thana', 'najem'),
(34, 'aaaaaaaffffa@vvv.vom', '41c1068400a7dbb57d49802c513f4ce2fb108d94', 'thana', 'najem'),
(45, 'aaaaaaffaa@vvv.vom', 'd89f670ca99d5a1463879cab4db56cb283ce646b', 'thana', 'najem'),
(46, 'Qeeeee@outlook.com', '34cd689287b6b8a2cc893d590d1ffd30de40f610', 'thana', 'najem'),
(47, 'aaaaaaajjjja@vvv.vom', 'bfbb3753a09f83824268cc16a149000fff0ee8a8', 'thana', 'najem'),
(48, 'Q88888@outlook.com', 'ea9043dc8f3dc4e9fadb12e2e772a5c616a6e659', 'thana', 'najem'),
(49, 'RRR4Q@outlook.com', '650606c124ae66fa54be81eb03a54f670d7b6deb', 'thana', 'najem'),
(50, 'aaaaaa1aa@yahoo.vom', '07b51cb56eddf7163bc0d4a245ab9ca345a2dc1f', 'thana', 'najem'),
(51, 'Qeeee@outlook.com', '930eb8948f83a9241ed79909c9df5c136a1f86c4', 'thana', 'najem');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
