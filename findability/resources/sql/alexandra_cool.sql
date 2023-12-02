-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 02, 2023 at 01:14 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alexandra.cool`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `adminName` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` char(32) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `adminName`, `email`, `password`) VALUES
(1, 'Ali Adams', 'alisophiaa28@gmail.com', '0c75af13c992650118785608ba2506a3'),
(2, 'Tony Evans', 'tony.evans@nmtafe.wa.edu.au', '0c75af13c992650118785608ba2506a3'),
(3, 'admin', 'email@email.com', '0c75af13c992650118785608ba2506a3'),
(4, 'Jenny Smith', 'jenny@gmail.com', '0c75af13c992650118785608ba2506a3');

-- --------------------------------------------------------

--
-- Table structure for table `adminRoles`
--

CREATE TABLE `adminRoles` (
  `adminID` int(11) NOT NULL,
  `roleID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `adminRoles`
--

INSERT INTO `adminRoles` (`adminID`, `roleID`) VALUES
(1, 'Site Admin'),
(2, 'Account Administrator'),
(3, 'Site Admin'),
(4, 'Content Editor');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categoryID` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `adminID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categoryID`, `categoryName`, `adminID`) VALUES
(1, 'webmaster tools', 1),
(2, 'modrewrite and .htaccess', 1),
(3, 'copyright', 1),
(4, 'essential SEO tools', 1),
(5, 'microformats', 1),
(6, 'analytics tools', 1),
(7, 'sitemaps', 1);

-- --------------------------------------------------------

--
-- Table structure for table `resourceCategories`
--

CREATE TABLE `resourceCategories` (
  `resourceID` int(11) NOT NULL,
  `categoryID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resourceCategories`
--

INSERT INTO `resourceCategories` (`resourceID`, `categoryID`) VALUES
(3, 7),
(4, 2),
(5, 2),
(6, 1),
(7, 5),
(8, 4),
(9, 4),
(10, 6),
(11, 3);

-- --------------------------------------------------------

--
-- Table structure for table `resources`
--

CREATE TABLE `resources` (
  `resourceID` int(11) NOT NULL,
  `resourceName` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `resourceDate` date NOT NULL,
  `adminID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resources`
--

INSERT INTO `resources` (`resourceID`, `resourceName`, `url`, `resourceDate`, `adminID`) VALUES
(1, 'Google Trends', 'https://trends.google.com/trends/', '2023-11-30', 1),
(2, 'WCAG 2.2', 'https://www.w3.org/TR/WCAG/', '2023-11-30', 1),
(3, 'XML Sitemaps', 'https://www.xml-sitemaps.com/', '2023-11-30', 1),
(4, 'htpasswd Generator', 'https://www.htaccesseditor.com/en.shtml', '2023-11-30', 1),
(5, 'htaccess Generator', 'https://hostingcanada.org/htpasswd-generator/', '2023-11-30', 1),
(6, 'Google Search Central', 'https://developers.google.com/search', '2023-11-30', 1),
(7, 'Microformats Wiki', 'https://microformats.org/wiki/Main_Page', '2023-11-30', 1),
(8, 'W3C Markup Validation', 'https://validator.w3.org/', '2023-11-30', 1),
(9, 'W3C Link Checker', 'https://validator.w3.org/checklink', '2023-11-30', 1),
(10, 'Google Analytics', 'https://marketingplatform.google.com/about/analytics/', '2023-11-30', 1),
(11, 'Creative Commons Licenses', 'https://creativecommons.org/licenses/', '2023-11-30', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `roleID` varchar(255) NOT NULL,
  `roleDescription` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`roleID`, `roleDescription`) VALUES
('Account Administrator', 'Assign admin roles'),
('Content Editor', 'Update site content (add resources)'),
('Site Admin', 'Access everything');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`) USING BTREE,
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `adminRoles`
--
ALTER TABLE `adminRoles`
  ADD PRIMARY KEY (`adminID`,`roleID`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `resourceCategories`
--
ALTER TABLE `resourceCategories`
  ADD PRIMARY KEY (`resourceID`,`categoryID`);

--
-- Indexes for table `resources`
--
ALTER TABLE `resources`
  ADD PRIMARY KEY (`resourceID`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`roleID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `resources`
--
ALTER TABLE `resources`
  MODIFY `resourceID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
