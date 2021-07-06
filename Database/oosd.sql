-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2021 at 07:24 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `oosd`
--

-- --------------------------------------------------------

--
-- Table structure for table `allusers`
--

CREATE TABLE `allusers` (
  `ID` int(11) NOT NULL,
  `Username` text NOT NULL,
  `Fname` text NOT NULL,
  `Lname` text NOT NULL,
  `Password` text NOT NULL,
  `Email` text NOT NULL,
  `Authority` text NOT NULL,
  `Department` text NOT NULL,
  `Phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `allusers`
--

INSERT INTO `allusers` (`ID`, `Username`, `Fname`, `Lname`, `Password`, `Email`, `Authority`, `Department`, `Phone`) VALUES
(1, 'Employee1', 'Alex', 'Pandiyan', 'Emp1pass', 'emp1@email.com', 'GovEmp', 'Police', '6379809850'),
(2, 'Admin', '', '', 'adminpass', 'admin@admin.com', 'Admin', 'NA', ''),
(3, 'TestUser', '', '', 'testpass', 'testuser@test.com', 'User', 'NA', ''),
(4, 'Emp2', '', '', 'Emp2pass', 'Emp2@email.com', 'GovEmp', 'Municipal', ''),
(5, 'Emp3', '', '', 'Emp3pass', 'Emp3@email.com', 'GovEmp', 'Postal', '');

-- --------------------------------------------------------

--
-- Table structure for table `chatbot`
--

CREATE TABLE `chatbot` (
  `id` int(11) NOT NULL,
  `queries` varchar(300) NOT NULL,
  `replies` varchar(300) NOT NULL,
  `intent` int(11) NOT NULL,
  `department` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chatbot`
--

INSERT INTO `chatbot` (`id`, `queries`, `replies`, `intent`, `department`) VALUES
(1, 'hey Hey Hola', 'hello , how may I help you?', 0, NULL),
(2, 'hello', 'hello, how may I help you?', 0, NULL),
(3, 'Hello', 'Hello, How may I help you?', 0, NULL),
(4, 'I would like to complain about an issue', 'Yes, please type your complaint. ', 0, NULL),
(5, 'I would like to complain', 'Yes, please type your complaint.', 0, NULL),
(6, 'Drainage sewage health building land road covid corona covid-19 transport mosquito mosquitos residents labors ', 'Im listening, I suppose this comes under municipal department', 1, 'municipal'),
(7, 'theft, robbery, thieves, thievery, murder killing burglary burglar housebreaking shoplifting crime cheating', 'Im listening , I suppose this comes under police department', 1, 'police'),
(8, 'Thanks thankyou thanks', 'It\'s always our pleasure', 0, NULL),
(9, 'electricity current streetlight street light pole', 'I\'m listening , I suppose this complaint is addressed to electricity department', 1, 'electricity'),
(10, 'postal post delivery courier cargo goods couriers', 'I\'m listening I suppose this complaint is addressed to postal department', 1, 'postal'),
(11, 'adyar kolathur tambaram mylapore chennai mumbai kolkata delhi patna indore jaipur hyderabad ahmedabad velachery trichy tanjore ', 'Your address has been recorded, thank you for your time.', 2, NULL),
(12, 'yes yep yeah yea', 'I,m listening , please type your address for further processing', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `ID` int(11) NOT NULL,
  `Name` text NOT NULL,
  `Address` text NOT NULL,
  `Department` text NOT NULL,
  `Subject` text NOT NULL,
  `Description` text NOT NULL,
  `UserId` int(11) NOT NULL,
  `Status` text NOT NULL DEFAULT 'Pending',
  `Latitude` float NOT NULL,
  `Longitude` float NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`ID`, `Name`, `Address`, `Department`, `Subject`, `Description`, `UserId`, `Status`, `Latitude`, `Longitude`, `Date`) VALUES
(18, 'TestUser', 'adyar', 'police', 'theft near', 'theft near my house', 3, 'Pending', 13.0009, 80.2383, '2021-06-06'),
(19, 'TestUser', 'Jayaram Nagar Kolathur Chennai', 'police', 'murder next', 'murder next door', 3, 'Pending', 13.0667, 80.2247, '2021-06-08'),
(20, 'Testuser', 'Jagaram Nagar Kolathur Chennai', 'Municipal', 'Drainage problem', 'Drainage leak near my house', 3, 'Pending', 13.0667, 80.2247, '2021-06-09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `allusers`
--
ALTER TABLE `allusers`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `allusers`
--
ALTER TABLE `allusers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `complaints`
--
ALTER TABLE `complaints`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
