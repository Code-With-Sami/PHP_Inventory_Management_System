-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2025 at 02:12 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php_ims`
--

-- --------------------------------------------------------

--
-- Table structure for table `billing_details`
--

CREATE TABLE `billing_details` (
  `id` int(11) NOT NULL,
  `bill_id` varchar(50) NOT NULL,
  `product_comapny` varchar(50) NOT NULL,
  `product_nme` varchar(50) NOT NULL,
  `product_unit` varchar(20) NOT NULL,
  `packing_size` varchar(30) NOT NULL,
  `price` varchar(10) NOT NULL,
  `qty` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `billing_details`
--

INSERT INTO `billing_details` (`id`, `bill_id`, `product_comapny`, `product_nme`, `product_unit`, `packing_size`, `price`, `qty`) VALUES
(15, '11', 'Nestlé', 'KitKat', 'Pack', '4 Fingers', '120', '5'),
(16, '11', 'PepsiCo', '7Up', 'Liter', '1.5 Liter', '150', '3'),
(18, '12', 'PepsiCo', 'Pepsi', 'Liter', '1.5 Liter', '150', '20'),
(19, '13', 'Nestlé', 'KitKat', 'Pack', '4 Fingers', '120', '5'),
(20, '13', 'PepsiCo', 'Pepsi', 'Liter', '1.5 Liter', '150', '7'),
(21, '13', 'PepsiCo', '7Up', 'Liter', '1.5 Liter', '150', '8');

-- --------------------------------------------------------

--
-- Table structure for table `billing_header`
--

CREATE TABLE `billing_header` (
  `id` int(11) NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `bill_type` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `bill_no` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `billing_header`
--

INSERT INTO `billing_header` (`id`, `full_name`, `bill_type`, `date`, `bill_no`, `username`) VALUES
(11, 'Umar Sheikh	', 'cash', '2025-04-22', '00011', 'admin'),
(12, 'Areeba Khalid	', 'debit', '2025-04-22', '00012', 'admin'),
(13, 'Basit Khan', 'cash', '2025-04-22', '00013', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `company_name`) VALUES
(18, 'Johnson & Johnson'),
(15, 'Nestlé'),
(17, 'PepsiCo'),
(16, 'Procter & Gamble'),
(14, 'Unilever');

-- --------------------------------------------------------

--
-- Table structure for table `party_info`
--

CREATE TABLE `party_info` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `businessname` varchar(50) NOT NULL,
  `phonenum` varchar(15) NOT NULL,
  `email` varchar(30) NOT NULL,
  `address` text NOT NULL,
  `city` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `party_info`
--

INSERT INTO `party_info` (`id`, `firstname`, `lastname`, `businessname`, `phonenum`, `email`, `address`, `city`) VALUES
(11, 'Ahmed', 'Khan', 'Ahmed General Store', '03001234567', 'ahmedkhan@gmail.com', 'Saddar, Karachi', 'Karachi'),
(12, 'Sana', 'Malik', 'Sana Traders	', '03112345678', 'sanamalik@hotmail.com', 'Model Town, Lahore	', 'Lahore'),
(13, 'Usman', 'Ali', 'Ali Mart	', '03219876543', 'usman.ali@yahoo.com', 'Shahrah-e-Faisal	', 'Karachi'),
(14, 'Ayesha', 'Raza	', 'Raza & Sons	', '03337654321', 'ayesha.raza@gmail.com', 'F-7 Markaz	', 'Islamabad'),
(15, 'Bilal', 'Sheikh', 'Sheikh Suppliers	', '03451239876', 'bilal@suppliers.com', 'Jail Road	', 'Lahore');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `company_name` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `packing_size` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `company_name`, `product_name`, `unit`, `packing_size`) VALUES
(23, 'Unilever', 'Surf Excel	', 'KG', '1 KG'),
(24, 'Unilever', 'Lifebuoy Soap	', 'Piece', '100g'),
(25, 'Nestlé', 'Nescafe Coffee	', 'Pack', '200g'),
(26, 'Nestlé', 'Nestlé Milk Pack	', 'Liter', '1 Liter'),
(27, 'Procter & Gamble', 'Ariel Detergent	', 'KG', '2 KG'),
(28, 'Procter & Gamble', 'Pampers Diapers	', 'Box', '12 Pcs'),
(29, 'PepsiCo', 'Pepsi', 'Liter', '1.5 Liter'),
(30, 'PepsiCo', 'Lays Chips	', 'Pack', '100 g'),
(31, 'Johnson & Johnson', 'Baby Shampoo	', 'Liter', '500 ml'),
(32, 'Johnson & Johnson', 'Baby Oil	', 'Liter', '200 ml'),
(33, 'Nestlé', 'KitKat', 'Pack', '4 Fingers'),
(34, 'Unilever', 'Dove Soap	', 'Piece', '90 g'),
(35, 'Procter & Gamble', 'Head & Shoulders Shampoo	', 'Liter', '1 Liter'),
(36, 'Unilever', 'Sunsilk Conditioner	', 'Liter', '250 ml'),
(37, 'PepsiCo', '7Up', 'Liter', '1.5 Liter'),
(38, 'PepsiCo', 'Mountain Dew	', 'Liter', '500 ml'),
(39, 'Nestlé', 'Milo Chocolate Drink	', 'Pack', '250g'),
(40, 'Johnson & Johnson', 'Cotton Buds	', 'Box', '100 Pcs'),
(41, 'Procter & Gamble', 'Gillette Razor	', 'Piece', '1 Piece'),
(42, 'Unilever', 'Vaseline Lotion	', 'Liter', '400 ml');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_master`
--

CREATE TABLE `purchase_master` (
  `id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `unit` varchar(50) NOT NULL,
  `packing_size` varchar(20) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `party_name` varchar(50) NOT NULL,
  `purchase_type` varchar(50) NOT NULL,
  `expiry_date` date NOT NULL,
  `purchase_date` date DEFAULT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `purchase_master`
--

INSERT INTO `purchase_master` (`id`, `company_name`, `product_name`, `unit`, `packing_size`, `quantity`, `price`, `party_name`, `purchase_type`, `expiry_date`, `purchase_date`, `username`) VALUES
(20, 'Nestlé', 'KitKat', 'Pack', '4 Fingers', 100, 100, 'Ahmed General Store', 'cash', '2025-09-25', '2025-04-22', 'admin'),
(21, 'PepsiCo', '7Up', 'Liter', '1.5 Liter', 500, 100, 'Ahmed General Store', 'debit', '2026-02-06', '2025-04-22', 'admin'),
(22, 'PepsiCo', 'Pepsi', 'Liter', '1.5 Liter', 500, 100, 'Ali Mart	', 'debit', '2026-09-28', '2025-04-22', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `return_products`
--

CREATE TABLE `return_products` (
  `id` int(11) NOT NULL,
  `return_by` varchar(50) NOT NULL,
  `bill_no` varchar(10) NOT NULL,
  `return_date` varchar(15) NOT NULL,
  `product_company` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_unit` varchar(20) NOT NULL,
  `packing_size` varchar(20) NOT NULL,
  `product_price` varchar(10) NOT NULL,
  `product_qty` varchar(10) NOT NULL,
  `total` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `return_products`
--

INSERT INTO `return_products` (`id`, `return_by`, `bill_no`, `return_date`, `product_company`, `product_name`, `product_unit`, `packing_size`, `product_price`, `product_qty`, `total`) VALUES
(5, '00012', 'admin', '2025-04-22', 'PepsiCo', '7Up', 'Liter', '1.5 Liter', '150', '10', '1500');

-- --------------------------------------------------------

--
-- Table structure for table `stock_master`
--

CREATE TABLE `stock_master` (
  `id` int(11) NOT NULL,
  `product_company` varchar(50) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_unit` varchar(20) NOT NULL,
  `product_packingsize` varchar(30) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `product_selling_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stock_master`
--

INSERT INTO `stock_master` (`id`, `product_company`, `product_name`, `product_unit`, `product_packingsize`, `product_quantity`, `product_selling_price`) VALUES
(16, 'Nestlé', 'KitKat', 'Pack', '4 Fingers', 90, 120),
(17, 'PepsiCo', '7Up', 'Liter', '1.5 Liter', 489, 150),
(18, 'PepsiCo', 'Pepsi', 'Liter', '1.5 Liter', 473, 150);

-- --------------------------------------------------------

--
-- Table structure for table `unit`
--

CREATE TABLE `unit` (
  `id` int(11) NOT NULL,
  `unitname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `unit`
--

INSERT INTO `unit` (`id`, `unitname`) VALUES
(15, 'Box'),
(12, 'KG'),
(13, 'Liter'),
(16, 'Pack'),
(14, 'Piece');

-- --------------------------------------------------------

--
-- Table structure for table `user_registration`
--

CREATE TABLE `user_registration` (
  `id` int(11) NOT NULL,
  `firstname` varchar(30) NOT NULL,
  `lastname` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` text NOT NULL,
  `role` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_registration`
--

INSERT INTO `user_registration` (`id`, `firstname`, `lastname`, `username`, `password`, `role`, `status`) VALUES
(2, 'admin', 'admin', 'admin', 'admin123', 'admin', 'active'),
(10, 'muhammad sami', 'khan', 'smaikhan', '123456789', 'user', 'active');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `billing_header`
--
ALTER TABLE `billing_header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `company_name` (`company_name`);

--
-- Indexes for table `party_info`
--
ALTER TABLE `party_info`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `product_name` (`product_name`);

--
-- Indexes for table `purchase_master`
--
ALTER TABLE `purchase_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `return_products`
--
ALTER TABLE `return_products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `stock_master`
--
ALTER TABLE `stock_master`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `unit`
--
ALTER TABLE `unit`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unitname` (`unitname`);

--
-- Indexes for table `user_registration`
--
ALTER TABLE `user_registration`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `billing_details`
--
ALTER TABLE `billing_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `billing_header`
--
ALTER TABLE `billing_header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `party_info`
--
ALTER TABLE `party_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `purchase_master`
--
ALTER TABLE `purchase_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `return_products`
--
ALTER TABLE `return_products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `stock_master`
--
ALTER TABLE `stock_master`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `unit`
--
ALTER TABLE `unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `user_registration`
--
ALTER TABLE `user_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
