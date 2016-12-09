-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 09, 2016 at 10:36 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etes`
--

-- --------------------------------------------------------

--
-- Table structure for table `drivers`
--

CREATE TABLE `drivers` (
  `user` int(255) NOT NULL,
  `name` text NOT NULL,
  `cardnum` varchar(255) NOT NULL,
  `expiration` varchar(255) NOT NULL,
  `security` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `drivers`
--

INSERT INTO `drivers` (`user`, `name`, `cardnum`, `expiration`, `security`) VALUES
(1, 'amy liu', '1234123412341234', '12/19', 111),
(2, 'amy', '876987098098098', '11/65', 990);

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `OrderID` int(255) NOT NULL,
  `ticketID` int(255) NOT NULL,
  `phonenumber` bigint(255) NOT NULL,
  `cardinfo` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `event` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`event`) VALUES
('opiuhgyftd');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `Event` longtext NOT NULL,
  `Venue` longtext NOT NULL,
  `date` date NOT NULL,
  `SeatNum` longtext NOT NULL,
  `Price` longtext NOT NULL,
  `TicketID` varchar(255) NOT NULL,
  `SellerID` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`Event`, `Venue`, `date`, `SeatNum`, `Price`, `TicketID`, `SellerID`) VALUES
('Nutcracker', 'Palace of Fine Arts-SF', '2016-12-17', 'general admission', '25.00', '0', 'atliu'),
('Bacon Festival', 'DT San Jose', '2017-05-11', 'general admission', '10.00', '1', 'johnsmith'),
('Christmas in the Park', 'DT San Jose', '2016-12-20', 'general admission', '5.00', '2', 'johnsmith'),
('Holiday Concert', 'Pier 39', '2016-12-25', '28B', '10.00', '3', 'kate098'),
('Holiday Concert', 'Pier 39', '2016-12-25', '32A', '10.00', '4', 'kate098'),
('SJ Sharks Game', 'SAP', '2016-12-24', '122a', '50.00', 'sj1', 'bobjones');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `address` varchar(40) NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `zip` int(10) NOT NULL,
  `email` varchar(25) NOT NULL,
  `userid` varchar(20) NOT NULL,
  `password` varchar(25) NOT NULL,
  `number` bigint(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`fname`, `lname`, `address`, `city`, `state`, `zip`, `email`, `userid`, `password`, `number`) VALUES
('Amir', 'Jabbari', '148 E William St', 'San Jose', 'California', 94583, 'amir.jabbari@sjsu.edu', 'amir', '1234', 9356838879),
('Amy', 'Liu', '375 S. 9th St', 'San Jose', 'California', 95112, 'amy.t.liu@sjsu.edu', 'atliu', '123', 9253058495),
('Bob ', 'Jones', '2290 14th Ave', 'San Francisco', 'California', 94116, 'bobjones@yahoo.com', 'bobjones', '098', 9182736478),
('John', 'Smith', '4611 Deermeadow Way', 'Antioch', 'California', 94531, 'johnsmith@gmail.com', 'johnsmith', 'abc', 5103948273),
('Kate', 'Johnson', '1000 N Rengstorff Ave', 'Mountain View', 'California', 94304, 'JohnsonK@gmail.com', 'kate098', 'abcd', 2938495098),
('Larry', 'Bee', '2210 Kingston Ave', 'San Bruno', 'California', 94066, 'larry@hotmail.com', 'larry', '1111', 1928376543),
('Stephen', 'Sing', '2610 Bishop Drive', 'San Ramon', 'California', 94583, 'stephensing@gmail.com', 'stephen123', '1234', 3847893847);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drivers`
--
ALTER TABLE `drivers`
  ADD PRIMARY KEY (`user`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`OrderID`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`TicketID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drivers`
--
ALTER TABLE `drivers`
  MODIFY `user` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
