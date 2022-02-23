-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 23, 2022 at 12:07 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `speedy`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_cars`
--

CREATE TABLE `tbl_cars` (
  `carID` int(11) NOT NULL,
  `ownerID` int(11) NOT NULL,
  `driverID` int(11) DEFAULT NULL,
  `typeID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `brandID` int(11) NOT NULL,
  `model` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `color` varchar(255) NOT NULL,
  `plateNumber` varchar(255) NOT NULL,
  `capacity` int(11) NOT NULL,
  `engine` varchar(255) NOT NULL,
  `transmission` varchar(60) NOT NULL,
  `compartment` varchar(255) NOT NULL,
  `AC` tinyint(1) NOT NULL,
  `speed` int(11) NOT NULL,
  `rate` double NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL,
  `deletedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_cars`
--

INSERT INTO `tbl_cars` (`carID`, `ownerID`, `driverID`, `typeID`, `name`, `brandID`, `model`, `year`, `color`, `plateNumber`, `capacity`, `engine`, `transmission`, `compartment`, `AC`, `speed`, `rate`, `status`, `createdAt`, `updatedAt`, `deletedAt`) VALUES
(2, 1, NULL, 5, 'Toyota Innova', 1, 'Innova', 2021, 'green', 'ABC123', 6, 'unleaded', 'automatic', 'large', 1, 150, 200, 1, '2022-02-23 15:56:03', NULL, NULL),
(3, 1, 1, 4, 'Toyota Fortuner', 1, 'Fortuner', 2019, 'silver', 'XYZ456', 6, 'diesel', 'automatic', 'large', 1, 170, 180, 1, '2022-02-23 16:21:23', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_car_brands`
--

CREATE TABLE `tbl_car_brands` (
  `brandID` int(11) NOT NULL,
  `brand` varchar(255) NOT NULL,
  `logo` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_car_brands`
--

INSERT INTO `tbl_car_brands` (`brandID`, `brand`, `logo`) VALUES
(1, 'Toyota', NULL),
(2, 'Ford', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_car_image`
--

CREATE TABLE `tbl_car_image` (
  `imageID` int(11) NOT NULL,
  `carID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` longtext NOT NULL,
  `displayImage` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_car_image`
--

INSERT INTO `tbl_car_image` (`imageID`, `carID`, `title`, `image`, `displayImage`, `status`) VALUES
(1, 2, 'Innova image 1', 'toyota_innova_jade.png', 1, 1),
(2, 3, 'Toyota Fortuner Image 1', 'toyota_fortuner.png', 1, 1),
(4, 3, 'Toyota Fortuner 2', 'toyota_fortuner2.jpg', NULL, 1),
(5, 3, 'Toyota Fortuner 3', 'toyota_fortuner3.jpg', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_car_types`
--

CREATE TABLE `tbl_car_types` (
  `typeID` int(11) NOT NULL,
  `name` varchar(60) NOT NULL,
  `icon` longtext NOT NULL,
  `image` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_car_types`
--

INSERT INTO `tbl_car_types` (`typeID`, `name`, `icon`, `image`) VALUES
(1, 'hatchback', 'hatchback-icon.png', 'hatchback.png'),
(2, 'sedan', 'sedan-icon.png', 'sedan.png'),
(3, 'coupe', 'coupe-icon.png', 'coupe.png'),
(4, 'suv', 'suv-icon.png', 'SUV.png'),
(5, 'minivan', 'minivan-icon.png', 'minivan.png'),
(6, 'van', 'van-icon.png', 'van.png'),
(7, 'pickup', 'pickup-icon.png', 'pickup.png'),
(8, 'jeep', 'jeep-icon.png', 'jeep.png'),
(9, 'supercar', 'supercar-icon.png', 'supercar2.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_credentials`
--

CREATE TABLE `tbl_credentials` (
  `credentialID` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `userType` varchar(60) NOT NULL,
  `photo` longtext NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customers`
--

CREATE TABLE `tbl_customers` (
  `customerID` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` longtext NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_drivers`
--

CREATE TABLE `tbl_drivers` (
  `driverID` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `vaccineType` tinyint(1) DEFAULT NULL,
  `locationID` int(11) DEFAULT NULL,
  `username` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` longtext NOT NULL,
  `rate` double NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_drivers`
--

INSERT INTO `tbl_drivers` (`driverID`, `firstName`, `lastName`, `birthdate`, `gender`, `vaccineType`, `locationID`, `username`, `phone`, `password`, `rate`, `createdAt`) VALUES
(1, 'Jane', 'Doe', '1995-02-11', 2, NULL, NULL, 'janedoe@gmail.com', '09123456789', '12345', 100, '2022-02-23 15:53:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_owners`
--

CREATE TABLE `tbl_owners` (
  `ownerID` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` longtext NOT NULL,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_owners`
--

INSERT INTO `tbl_owners` (`ownerID`, `firstName`, `lastName`, `username`, `phone`, `password`, `createdAt`) VALUES
(1, 'Juan', 'Dela Cruz', 'juandelacrus@gmail.com', '09123456789', '12345', '2022-02-23 15:52:01');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payment`
--

CREATE TABLE `tbl_payment` (
  `paymentID` int(11) NOT NULL,
  `rentalID` int(11) NOT NULL,
  `carAmount` double DEFAULT NULL,
  `driverAmount` double DEFAULT NULL,
  `payment` double NOT NULL,
  `deposit` double NOT NULL,
  `addCharge` double DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_rental`
--

CREATE TABLE `tbl_rental` (
  `rentalID` int(11) NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `carID` int(11) NOT NULL,
  `ownerID` int(11) DEFAULT NULL,
  `customerID` int(11) NOT NULL,
  `driverID` int(11) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `createdAt` datetime NOT NULL DEFAULT current_timestamp(),
  `updatedAt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_cars`
--
ALTER TABLE `tbl_cars`
  ADD PRIMARY KEY (`carID`),
  ADD KEY `fk_car_ownerID` (`ownerID`),
  ADD KEY `fk_car_type` (`typeID`),
  ADD KEY `fk_car_brand` (`brandID`),
  ADD KEY `fk_car_driverID` (`driverID`);

--
-- Indexes for table `tbl_car_brands`
--
ALTER TABLE `tbl_car_brands`
  ADD PRIMARY KEY (`brandID`);

--
-- Indexes for table `tbl_car_image`
--
ALTER TABLE `tbl_car_image`
  ADD PRIMARY KEY (`imageID`),
  ADD KEY `fk_image_carID` (`carID`);

--
-- Indexes for table `tbl_car_types`
--
ALTER TABLE `tbl_car_types`
  ADD PRIMARY KEY (`typeID`);

--
-- Indexes for table `tbl_credentials`
--
ALTER TABLE `tbl_credentials`
  ADD PRIMARY KEY (`credentialID`);

--
-- Indexes for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `tbl_drivers`
--
ALTER TABLE `tbl_drivers`
  ADD PRIMARY KEY (`driverID`);

--
-- Indexes for table `tbl_owners`
--
ALTER TABLE `tbl_owners`
  ADD PRIMARY KEY (`ownerID`);

--
-- Indexes for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD PRIMARY KEY (`paymentID`),
  ADD KEY `fk_payment_rentalID` (`rentalID`);

--
-- Indexes for table `tbl_rental`
--
ALTER TABLE `tbl_rental`
  ADD PRIMARY KEY (`rentalID`),
  ADD KEY `fk_rental_carID` (`carID`),
  ADD KEY `fk_rental_ownerID` (`ownerID`),
  ADD KEY `fk_rental_customerID` (`customerID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_cars`
--
ALTER TABLE `tbl_cars`
  MODIFY `carID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_car_brands`
--
ALTER TABLE `tbl_car_brands`
  MODIFY `brandID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbl_car_image`
--
ALTER TABLE `tbl_car_image`
  MODIFY `imageID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_car_types`
--
ALTER TABLE `tbl_car_types`
  MODIFY `typeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_credentials`
--
ALTER TABLE `tbl_credentials`
  MODIFY `credentialID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_customers`
--
ALTER TABLE `tbl_customers`
  MODIFY `customerID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_drivers`
--
ALTER TABLE `tbl_drivers`
  MODIFY `driverID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_owners`
--
ALTER TABLE `tbl_owners`
  MODIFY `ownerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  MODIFY `paymentID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_rental`
--
ALTER TABLE `tbl_rental`
  MODIFY `rentalID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_cars`
--
ALTER TABLE `tbl_cars`
  ADD CONSTRAINT `fk_car_brand` FOREIGN KEY (`brandID`) REFERENCES `tbl_car_brands` (`brandID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_car_driverID` FOREIGN KEY (`driverID`) REFERENCES `tbl_drivers` (`driverID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_car_ownerID` FOREIGN KEY (`ownerID`) REFERENCES `tbl_owners` (`ownerID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_car_type` FOREIGN KEY (`typeID`) REFERENCES `tbl_car_types` (`typeID`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_car_image`
--
ALTER TABLE `tbl_car_image`
  ADD CONSTRAINT `fk_image_carID` FOREIGN KEY (`carID`) REFERENCES `tbl_cars` (`carID`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_payment`
--
ALTER TABLE `tbl_payment`
  ADD CONSTRAINT `fk_payment_rentalID` FOREIGN KEY (`rentalID`) REFERENCES `tbl_rental` (`rentalID`) ON UPDATE CASCADE;

--
-- Constraints for table `tbl_rental`
--
ALTER TABLE `tbl_rental`
  ADD CONSTRAINT `fk_rental_carID` FOREIGN KEY (`carID`) REFERENCES `tbl_cars` (`carID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rental_customerID` FOREIGN KEY (`customerID`) REFERENCES `tbl_customers` (`customerID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rental_ownerID` FOREIGN KEY (`ownerID`) REFERENCES `tbl_owners` (`ownerID`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
