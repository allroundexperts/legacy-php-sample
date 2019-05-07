-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 07, 2019 at 10:08 AM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT
= 0;
START TRANSACTION;
SET time_zone
= "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy_manager`
--

-- --------------------------------------------------------

--
-- Table structure for table `Branch`
--

CREATE TABLE `branch`
(
  `BranchID` int
(11) NOT NULL,
  `Location` varchar
(255) DEFAULT NULL,
  `City` varchar
(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Branch`
--

INSERT INTO `branch` (`
BranchID`,
`Location
`, `City`) VALUES
(1, 'Faisal Town', 'Lahore'),
(4, 'Zero Point', 'Islamabad');

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `customer`
(
  `CustomerID` int
(11) NOT NULL,
  `Name` varchar
(255) DEFAULT NULL,
  `PrescriptionID` varchar
(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Customer`
--

INSERT INTO `customer` (`
CustomerID`,
`Name
`, `PrescriptionID`) VALUES
(9050, 'Junaid Ali', '4546'),
(9064, 'Pervez Tariq', '1932'),
(9066, 'Armeena Rana', '1549'),
(9067, 'Sohail Abrar', '3355'),
(9069, 'Khurram Ahmed', '2233'),
(9072, 'Fatima Bashir', '2558'),
(9076, 'Ahmed Sultan', '3023'),
(9077, 'Tariq Ali', '2331');

-- --------------------------------------------------------

--
-- Table structure for table `Employee`
--

CREATE TABLE `employee`
(
  `EmployeeID` int
(11) NOT NULL,
  `Name` varchar
(255) DEFAULT NULL,
  `Email` varchar
(255) NOT NULL,
  `Password` varchar
(255) NOT NULL,
  `Age` int
(11) DEFAULT NULL,
  `Gender` varchar
(255) DEFAULT NULL,
  `BranchID` int
(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Employee`
--

INSERT INTO `employee` (`
EmployeeID`,
`Name
`, `Email`, `Password`, `Age`, `Gender`, `BranchID`) VALUES
(1217, 'Jon Snow', 'jonsnow@gmail.com', 'test1234', 26, 'male', 1);

-- --------------------------------------------------------

--
-- Table structure for table `MedicineOrders`
--

CREATE TABLE `medicineOrders`
(
  `OrderID` int
(11) DEFAULT NULL,
  `MedNo` int
(11) DEFAULT NULL,
  `Quantity` int
(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Medicines`
--

CREATE TABLE `medicines`
(
  `MedNo` int
(11) NOT NULL,
  `Name` varchar
(255) DEFAULT NULL,
  `MfgDate` varchar
(255) DEFAULT NULL,
  `ExpDate` varchar
(255) DEFAULT NULL,
  `Price` int
(11) DEFAULT NULL,
  `Quantity` int
(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Medicines`
--

INSERT INTO `medicines` (`
MedNo`,
`Name
`, `MfgDate`, `ExpDate`, `Price`, `Quantity`) VALUES
(2, 'Zyloric', '2/2/2019', '12/12/2019', 250, 2);

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `orders`
(
  `OrderID` int
(11) NOT NULL,
  `CustomerID` int
(11) DEFAULT NULL,
  `BranchID` int
(11) DEFAULT NULL,
  `Payment` int
(11) DEFAULT NULL,
  `Date` varchar
(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;