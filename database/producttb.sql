-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 26, 2022 at 06:00 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `productdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `producttb`
--

CREATE TABLE `producttb` (
  `id` int(11) NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `product_price` varchar(255) NOT NULL,
  `product_image` varbinary(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `producttb`
--

INSERT INTO `producttb` (`id`, `product_name`, `product_price`, `product_image`) VALUES
(5, 'Bhawal Resort', '600000', 0x2e2f626177612e6a7067),
(6, 'Bangabandhu International Conference Center', '500000', 0x2e2f6269332e706e67),
(7, 'Golf  Garden, Army Golf Club', '250000', 0x2e2f676f6c662e706e67),
(8, 'Radison Blu Water Garden', '500000', 0x2e2f7261646861332e706e67),
(9, 'King of Chittagong', '300000', 0x2e2f4b696e675f6368692e6a7067),
(10, 'Radison Blu Bay View', '450000', 0x2e2f726564636869332e706e67),
(11, 'Hall 24', '400000', 0x2e2f68616c6c32362e706e67),
(12, 'Wedding Dairy', '500000', 0x2e2f707269746f2e6a7067),
(13, 'Dream Weaver', '350000', 0x2e2f647265322e6a7067),
(14, 'Reminiscence', '400000', 0x2e2f72656d692e6a7067),
(15, 'Sultans Dine', '20000', 0x2e2f73756c2e706e67),
(16, 'Fakhruddin Catering', '30000', 0x2e2f66616b682e6a7067);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `producttb`
--
ALTER TABLE `producttb`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `producttb`
--
ALTER TABLE `producttb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
