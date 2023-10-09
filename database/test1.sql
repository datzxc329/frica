-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2023 at 09:32 AM
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
-- Database: `test1`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `idLSP` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`idLSP`, `name`) VALUES
(1, 'computers'),
(2, 'man_clothes'),
(3, 'woman_clothes'),
(4, 'phone'),
(5, 'camera'),
(6, 'watch');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `idLH` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`idLH`, `name`, `email`, `phone`, `message`) VALUES
(15, 'dat', 'phamtiendat1900@gmail.com', '0855352809', 'vgegqwf'),
(16, 'vinh', 'phamtiendat1900@gmail.com', '0855352809', 'fwaawf'),
(17, 'g3g', 'nongnguyen769@gmail.com', '1245251752', 'q3g'),
(22, 'dat', 'phamtiendat1900@gmail.com', '0855352809', 'agaeg'),
(23, '35463', 'phamtiendat1900@gmail.com', '0855352809', '343\r\n'),
(24, '35463', 'phamtiendat1900@gmail.com', '0855352809', '343\r\n'),
(25, '35463', 'phamtiendat1900@gmail.com', '0855352809', '343\r\n'),
(26, '35463', 'phamtiendat1900@gmail.com', '0855352809', '343\r\n'),
(27, 'dat', 'phamtiendat1900@gmail.com', '0855352809', 'q3gq3gqw3'),
(28, 'rru', '1ghcth@gmail.com', '1245251752', '2136\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `idDH` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `total_price` decimal(10,0) DEFAULT NULL,
  `date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`idDH`, `name`, `email`, `address`, `phone`, `total_price`, `date`) VALUES
(1, 'rru', '1ghcth@gmail.com', 't3t', 1245251752, 300000, '2023-10-09 10:58:36'),
(2, 'gegtwt142142', 'fwaafw@gmail.com', 'gaeasg', 1245251752, 1520000, '2023-10-09 11:11:44');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `idCTDH` int(11) NOT NULL,
  `idDH` int(11) DEFAULT NULL,
  `idSP` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `unit_price` decimal(10,0) DEFAULT NULL,
  `units_price` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`idCTDH`, `idDH`, `idSP`, `quantity`, `unit_price`, `units_price`) VALUES
(1, 1, 3, 2, 150000, 300000),
(2, 2, 6, 2, 400000, 800000),
(3, 2, 4, 3, 240000, 720000);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `idSP` int(11) NOT NULL,
  `idLSP` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `price` decimal(10,0) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`idSP`, `idLSP`, `name`, `price`, `quantity`, `description`, `img`) VALUES
(1, 1, 'Laptop HP', 10200000, 2, 'vjvjfv', 'hp1.png'),
(2, 1, 'Laptop Dell', 12000000, 4, '53464', 'dell1.png'),
(3, 2, 'Áo thể thao dành cho nam', 150000, 17, 'gư3gqw3', 'man1.png'),
(4, 3, 'Áo khoác nữ', 240000, 13, 'gưgg32g', 'woman1.png'),
(5, 1, 'Laptop HP vechai', 8000000, 15, 'wqfw', 'hp1.png'),
(6, 2, 'Áo khoác nam', 400000, 33, 'agfagw', 'man1.png'),
(7, 4, 'Samsung', 10000000, 13, 'ưgawtgf', 'mobile1.png'),
(8, 5, 'Camera X', 4000000, 23, 'gheghe', 'camera1.png'),
(9, 6, 'Watch gfeta', 10200000, 34, 'ehdygey', 'watch1.png');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `username`, `password`, `name`, `phone`, `email`, `address`) VALUES
(1, 'phamtiendat1900', '123456', 'dat', 855352809, 'dat@gmail.com', 'ewbhwehw'),
(20, 'phamtiendat80', '123456', 'gqg', 1245251752, 'nongnguyen769@gmail.com', 'egqwg'),
(21, 'phamtiendat79', '123456', 'qưừ', 0, '1ghcth@gmail.com', 'gq'),
(22, 'phamtiendat78', '123456', 'qưừ', 0, '1ghcth@gmail.com', 'gq'),
(23, 'phamtiendat1899', '123456', 'vưegqwf', 2147483647, 'phamtiendat80@gmail.com', 'qưgqw'),
(24, 'phamtiendat45', '123456', 'edgew', 1245251752, 'fwaafw@gmail.com', '54646'),
(25, 'phamtiendat165', '123456', 'g3g', 1245251752, 'nongnguyen769@gmail.com', 'egqwg'),
(26, 'phamtiendat1900$', '123456', 'edgew', 1245251752, 'fwaafw@gmail.com', '54646');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idLSP`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`idLH`) USING BTREE;

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`idDH`) USING BTREE;

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`idCTDH`) USING BTREE;

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idSP`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `idLSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `idLH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `idDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `idCTDH` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `idSP` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
