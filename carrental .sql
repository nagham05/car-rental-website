-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2024 at 07:48 PM
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
-- Database: `carrental`
--

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `id` int(11) NOT NULL,
  `model` varchar(25) NOT NULL,
  `year` year(4) NOT NULL,
  `price` int(11) NOT NULL,
  `type` varchar(25) NOT NULL,
  `status` varchar(25) NOT NULL,
  `image` longblob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`id`, `model`, `year`, `price`, `type`, `status`, `image`) VALUES
(1, 'Mercedes Maybach AMG G900', '2023', 350, 'family', 'available', 0x4d4159424143482d414d4720473930302e6a7067),
(2, 'Porsche 911', '2023', 300, 'sport', 'available', 0x436f6e6365707475616c20617274202d20506f7273636865203931312e6a7067),
(4, 'Mercedes Barbarus 900', '2023', 400, 'family', 'available', 0x6d6572636564657320414d47204736352062726162757320393030203232206f6e65206f662074656e2072657665616c65642061742049414120323031372e6a7067),
(5, 'Ferrari 488 GTB', '2024', 780, 'sport', 'available', 0x4665727261726920343838204754422e6a7067),
(6, 'McLaren 720', '2024', 753, 'Racing', 'not available', 0x4d634c6172656e203732302e6a7067),
(7, 'McLaren Senna', '2018', 350, 'Racing', 'available', 0x4d634c6172656e2053656e6e612e6a7067),
(8, 'Ferrari F8', '2022', 370, 'Racing', 'available', 0x4e6f76697465632046657272617269204638205472696275746f2e6a7067);

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `id` int(11) NOT NULL,
  `paymentmethod` text NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `Cardnumb` int(11) NOT NULL,
  `CVV` int(11) NOT NULL,
  `Cardholdername` varchar(25) NOT NULL,
  `expirydate` date NOT NULL,
  `paymentdate` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`id`, `paymentmethod`, `amount`, `Cardnumb`, `CVV`, `Cardholdername`, `expirydate`, `paymentdate`) VALUES
(1, 'Visa', 200, 223332, 344, 'Abdullah', '2024-03-12', '2024-03-27'),
(2, 'visa', 200, 223332, 344, 'Abdullah', '2024-03-12', '2024-03-27');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `id` int(11) NOT NULL,
  `startdate` date NOT NULL,
  `enddate` date NOT NULL,
  `pickuplocation` varchar(25) NOT NULL,
  `dropofflocation` varchar(25) NOT NULL,
  `pickuptime` time NOT NULL,
  `dropofftime` time NOT NULL,
  `UID` int(11) NOT NULL,
  `CID` int(11) NOT NULL,
  `PID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`id`, `startdate`, `enddate`, `pickuplocation`, `dropofflocation`, `pickuptime`, `dropofftime`, `UID`, `CID`, `PID`) VALUES
(1, '2024-04-16', '2024-04-24', 'saida', 'saida', '14:29:49', '18:30:49', 10, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `support`
--

CREATE TABLE `support` (
  `id` int(11) NOT NULL,
  `name` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `support`
--

INSERT INTO `support` (`id`, `name`, `email`, `message`) VALUES
(11, 'omar', 'omar@gmail.com', 'I would love to rent from you but there are no classic cars'),
(12, 'judy', 'judy@gmail.com', 'Are there any other colors than what is presented here? ');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(22) NOT NULL,
  `DOB` date NOT NULL,
  `gender` text NOT NULL,
  `phonenumb` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `DOB`, `gender`, `phonenumb`) VALUES
(2, 'Abdullah', 'Abdullah@gmail.com', '11111', '2009-11-04', 'male', 70981277),
(9, 'alaa', 'alaa@gmail.com', 'alaa123', '2000-06-06', 'female', 14785226),
(10, 'nagham ', 'nagham@gmail.com', '1478523', '2004-10-05', 'female', 81659927),
(11, 'riwa ', 'riwa@gmail.com', '741258', '2024-03-14', 'female', 14852369),
(12, 'ghida', 'ghida@gmail.com', '147852', '2005-01-15', 'female', 147852);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `test` (`UID`),
  ADD KEY `car` (`CID`),
  ADD KEY `pay` (`PID`);

--
-- Indexes for table `support`
--
ALTER TABLE `support`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `car`
--
ALTER TABLE `car`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `support`
--
ALTER TABLE `support`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `car` FOREIGN KEY (`CID`) REFERENCES `car` (`id`),
  ADD CONSTRAINT `pay` FOREIGN KEY (`PID`) REFERENCES `payment` (`id`),
  ADD CONSTRAINT `test` FOREIGN KEY (`UID`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
