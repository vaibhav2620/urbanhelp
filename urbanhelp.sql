-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2021 at 05:56 PM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `urbanhelp`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `a_id` int(10) NOT NULL,
  `cust_id` int(5) NOT NULL,
  `sp_id` int(10) DEFAULT NULL,
  `s_title` varchar(50) NOT NULL,
  `a_address` varchar(500) NOT NULL,
  `a_city` varchar(50) NOT NULL,
  `a_status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`a_id`, `cust_id`, `sp_id`, `s_title`, `a_address`, `a_city`, `a_status`) VALUES
(1, 4, 5, 'Plumbing', 'dfbsdfcxcvzxc', 'Mumbai', 'Completed'),
(2, 4, 5, 'salonathome', 'india', 'Jaipur', 'Assigned'),
(3, 4, 5, 'electrician', 'UK', 'Bangalore', 'Assigned'),
(4, 4, 5, 'plumbing', 'indiana', 'Mumbai', 'Assigned'),
(5, 4, 5, 'plumbing', 'asdvfva', 'Jaipur', 'Assigned'),
(6, 4, 5, 'sanatizing', 'maharashtra,india', 'Mumbai', 'Completed'),
(7, 4, NULL, 'plumbing', 'adsfadwe', 'Delhi', 'pending'),
(8, 4, 5, 'Car service', 'maharashtra India.', 'Mumbai', 'Assigned'),
(9, 4, NULL, 'refrigerator Repair', 'SOMEWHERE IN INDIA ', 'Jaipur', 'pending'),
(10, 4, NULL, 'refrigerator Repair', 'maharashtra', 'Mumbai', 'pending'),
(11, 4, 5, 'refrigerator Repair', 'india', 'Delhi', 'Assigned');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cust_id` int(5) NOT NULL,
  `cust_name` varchar(50) NOT NULL,
  `cust_location` varchar(50) NOT NULL,
  `cust_Address` varchar(200) NOT NULL,
  `cust_age` int(5) NOT NULL,
  `cust_gender` varchar(50) NOT NULL,
  `cust_email` varchar(100) NOT NULL,
  `pwd` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`cust_id`, `cust_name`, `cust_location`, `cust_Address`, `cust_age`, `cust_gender`, `cust_email`, `pwd`) VALUES
(4, 'vaibhav Mistry', 'Mumbai', 'SOME WHERE', 111, 'male', 'ABCDEF@gmail.com', '$2y$10$AwrAKfbOKFBr4Cst9RUq6.jjz8EfxzCo9exw0L.qNI9yVcZFPxj7m'),
(5, 'shraddha ', 'mumbai', 'adfkahldkfjhald', 20, 'Female', 'xzy123@gmail.com', '$2y$10$2hrYWFJ4IjQ0NYA9VD41UerpehmN3O82d1qgZqWh8CqGCi5MBE5oS'),
(6, 'Tester', 'Mumbai', 'tesing space', 20, 'male', 'test@gmail.com', '$2y$10$vLKun7td4ZDO5e51XvGr3uf8tDtB1z70tob8P0ms9bpG9S017LCyK');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `s_id` int(10) NOT NULL,
  `s_title` varchar(50) NOT NULL,
  `s_package` varchar(500) NOT NULL,
  `s_logo_address` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`s_id`, `s_title`, `s_package`, `s_logo_address`) VALUES
(1, 'Plumbing', '	- The Agent which will be coming to your house will be completely skilled for the job <br>\r\n	- He will examine the problem and explain the solution & tell you the cost involved in it.<br>\r\n	- Visiting charges will be applicable approximately Rs.300 \r\n', 'visuals/plumbing.png'),
(2, 'salonathome', '	- All the products used will be completely safe and will be included in the final cost\r\n	- All the equipments will be brought by the agent .\r\n	- Agents visiting charges will be Rs.500 + the cost of service you are offered \r\n', 'visuals/hair-salon.png'),
(3, 'electrician ', '	- The Agent which will be coming to your house will be completely skilled for the job \r\n	- He will examine the problem and explain the solution & tell you the cost involved in it.\r\n	- Visiting charges will be applicable approximately Rs.300 \r\n', 'visuals/electrician.png'),
(4, 'sanatizing', '	- Agent will come readily available  with all the equipment and have sufficient fluid required\r\n	- All safety norms will be followed while somatization.\r\n\r\nEveryone should co-operate with the agent .', 'visuals/spray.png'),
(5, 'AC service', '- Trained and skilled technicians who will be fully equipped \r\n- Warrantied  parts and guaranteed better cooling than never before.\r\n', 'visuals/AC service.png'),
(6, 'Car service', '- The professional will provide services according to your need.', 'visuals/car-service.png'),
(7, 'refrigerator Repair', '- The professional will provide services according to your need.', 'visuals/fridge.png'),
(8, 'Painting', '	- The professional will provide services according to your need. 	- Paint will be included in the package. 	- 10 years guarantee ', 'visuals/paint-roller.png');

-- --------------------------------------------------------

--
-- Table structure for table `service_provider`
--

CREATE TABLE `service_provider` (
  `sp_id` int(10) NOT NULL,
  `sp_name` varchar(50) NOT NULL,
  `sp_loction` varchar(50) NOT NULL,
  `sp_age` int(3) NOT NULL,
  `sp_gender` varchar(10) NOT NULL,
  `sp_qualification` varchar(50) NOT NULL,
  `sp_yearsofexperence` int(5) NOT NULL,
  `sp_email` varchar(50) NOT NULL,
  `sp_password` varchar(100) NOT NULL,
  `sp_activation` varchar(50) NOT NULL,
  `dateofjoining` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `service_provider`
--

INSERT INTO `service_provider` (`sp_id`, `sp_name`, `sp_loction`, `sp_age`, `sp_gender`, `sp_qualification`, `sp_yearsofexperence`, `sp_email`, `sp_password`, `sp_activation`, `dateofjoining`) VALUES
(1, 'vaibhav', 'mumbai', 1, 'male', 'engineer', 1, 'xyz@gmail.com', '$2y$10$EJaUFXcFFqMILgIroxtSLuHZFj.UdbSpUVBqBT/o6/OxegIvdaEq.', 'true', '0000-00-00'),
(4, 'shraddha ', 'mumbai', 20, 'female', 'CA', 20, 'xzy123@gmail.com', '$2y$10$hMaHd6oWFL0dchkQgenk0eui2hZG.Jd9wqQc3mHvL7U5ttArSXHNG', 'false', '0000-00-00'),
(5, 'shraddha ', 'mumbai', 23, 'female', 'CA', 23, 's@gmail.com', '$2y$10$GyNvK2m4C/80KNhAG8coxe1qFBbwiljaEvCYzZAMYCzruhD2k0l7e', 'true', '0000-00-00'),
(6, 'vaibhav', 'mumbai', 25, 'male', 'engineer', 10, 'v@gmail.com', '$2y$10$TYh8/3/fp5FM3qrUpv/VXueIWWXa6xYKebHIqxL1N6juhnbo8y84u', 'false', '0000-00-00'),
(7, 'Tester SP', 'mumbai', 20, 'male', 'engineer', 7, 'test@gmail.com', '$2y$10$rRuIVLg28Hs70foS2v5uCOnrkjFCfBarlsoNu0RuZz3r26lLRVym6', 'false', '0000-00-00'),
(8, 'Raj', 'gujarat', 20, 'male', 'CA', 10, 'r@gmail.com', '$2y$10$mvHK5YsfwORblqsqx5Xf7OBmG9odiBXaOLci./YpkknbSMHF/W9JK', 'false', '0000-00-00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `cust_id` (`cust_id`),
  ADD KEY `s_id` (`s_title`),
  ADD KEY `sp_id` (`sp_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cust_id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`s_id`),
  ADD KEY `s_title` (`s_title`);

--
-- Indexes for table `service_provider`
--
ALTER TABLE `service_provider`
  ADD PRIMARY KEY (`sp_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `a_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `cust_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `s_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `service_provider`
--
ALTER TABLE `service_provider`
  MODIFY `sp_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointments`
--
ALTER TABLE `appointments`
  ADD CONSTRAINT `appointments_ibfk_2` FOREIGN KEY (`cust_id`) REFERENCES `customer` (`cust_id`),
  ADD CONSTRAINT `appointments_ibfk_3` FOREIGN KEY (`s_title`) REFERENCES `services` (`s_title`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
