-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 28, 2021 at 07:03 PM
-- Server version: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `msm`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_brands`
--

CREATE TABLE `tbl_brands` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `brand_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_brands`
--

INSERT INTO `tbl_brands` (`brand_id`, `brand_name`, `date`, `brand_image`) VALUES
(1, 'samsung', '0000-00-00 00:00:00', ''),
(2, 'SONY', '0000-00-00 00:00:00', ''),
(3, 'samsung', '0000-00-00 00:00:00', ''),
(4, 'SONY', '0000-00-00 00:00:00', ''),
(5, 'samsung', '0000-00-00 00:00:00', ''),
(6, 'karban', '0000-00-00 00:00:00', ''),
(7, 'samsung', '0000-00-00 00:00:00', ''),
(8, 'SONY', '0000-00-00 00:00:00', ''),
(9, 'samsung', '0000-00-00 00:00:00', ''),
(10, 'samsung', '0000-00-00 00:00:00', ''),
(11, 'name', '0000-00-00 00:00:00', ''),
(12, 'test', '0000-00-00 00:00:00', ''),
(13, 'tests', '0000-00-00 00:00:00', ''),
(14, 'apple', '0000-00-00 00:00:00', ''),
(15, 'Nokiya', '0000-00-00 00:00:00', ''),
(16, 'Apple', '0000-00-00 00:00:00', ''),
(17, 'Sony', '2021-06-14 11:10:05', ''),
(18, 'oppo', '2021-06-14 11:11:54', ''),
(19, 'oppo', '2021-06-14 16:32:36', ''),
(20, 'Micromax', '2021-06-14 16:31:31', ''),
(21, '', '2021-06-14 16:50:12', ''),
(22, '', '2021-06-14 16:50:33', ''),
(23, 'Brand', '2021-06-14 17:40:09', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_product`
--

CREATE TABLE `tbl_product` (
  `product_id` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `prod_name` varchar(255) NOT NULL,
  `ram` varchar(50) NOT NULL,
  `inte_stor` varchar(100) NOT NULL,
  `bat_cap` varchar(70) NOT NULL,
  `oper_syst` varchar(200) NOT NULL,
  `net_typ` varchar(50) NOT NULL,
  `scr_size` varchar(100) NOT NULL,
  `prim_cam` varchar(50) NOT NULL,
  `seco_cam` varchar(50) NOT NULL,
  `mrp` int(100) NOT NULL,
  `product_brand_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_product`
--

INSERT INTO `tbl_product` (`product_id`, `brand_name`, `date`, `prod_name`, `ram`, `inte_stor`, `bat_cap`, `oper_syst`, `net_typ`, `scr_size`, `prim_cam`, `seco_cam`, `mrp`, `product_brand_id`) VALUES
(2, 'samsang', '2021-06-14 11:33:03', 'Galaxy j7 nxt', '2GB', '16 GB', '3000', 'Android 10', 'voLTE', '13.97 cm', '8 MP', '5 MP', 11000, 1),
(3, 'Sony', '2021-06-14 11:33:03', 'Xperia 1 III', '12', '256', '4500', 'Android 11', '4 G', '6.5', '12 ', '8 ', 64999, 1),
(4, 'Nokia', '2021-06-14 11:33:03', 'Nokia 3.4', '4', '64', '4000', 'Android 10.0', 'LTE', '6.39\'', '12', '8', 10999, 0),
(8, 'Apple', '2021-06-14 17:08:39', '12', '8', '64', '5000', 'ios', 'LTE', '16.6', '24', '12', 47000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_purchase`
--

CREATE TABLE `tbl_purchase` (
  `purchase_id` int(11) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `quantity` varchar(200) NOT NULL,
  `amount` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_purchase`
--

INSERT INTO `tbl_purchase` (`purchase_id`, `supplier_name`, `brand_name`, `date`, `quantity`, `amount`) VALUES
(1, 'pooja pandit', 'samsang', '2021-06-14 15:08:46', '2', '25000'),
(2, 'Ragini Desai', 'Sony', '2021-06-14 15:09:54', '3', '50000'),
(3, 'Rina Guru', 'Samsang', '2021-06-14 17:31:00', '1', '20000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_repair`
--

CREATE TABLE `tbl_repair` (
  `repair_id` int(11) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `address` varchar(255) NOT NULL,
  `mob_no` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `model` varchar(255) NOT NULL,
  `imei` varchar(255) NOT NULL,
  `fault_desc` varchar(255) NOT NULL,
  `amount` varchar(255) NOT NULL,
  `status` enum('1','2','3') NOT NULL DEFAULT '1' COMMENT '1=pending,2=in progress,3=complete',
  `date_comp` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_repair`
--

INSERT INTO `tbl_repair` (`repair_id`, `cust_name`, `date`, `address`, `mob_no`, `brand_name`, `model`, `imei`, `fault_desc`, `amount`, `status`, `date_comp`) VALUES
(1, 'Riya Pawar', '2021-05-21 00:00:00', 'pune', 2147483647, 'Samsang', 'galaxy j3', '1876897879234567', 'display', '4000', '1', '0000-00-00'),
(2, 'Palak Mehta', '2021-06-01 00:00:00', 'chakan', 2147483647, 'Sony', 'xperia e4', '1879589654747856', 'Battery ', '3000', '1', '0000-00-00'),
(3, 'Rina Mohite', '2021-06-14 21:12:00', 'Satara', 2147483647, 'Apple', '1245789856324567', '14523678965412314', 'Charging Socket', '2000', '1', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sale`
--

CREATE TABLE `tbl_sale` (
  `sale_id` int(11) NOT NULL,
  `cust_name` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mob_no` int(11) NOT NULL,
  `brand_name` varchar(255) NOT NULL,
  `ram` varchar(50) NOT NULL,
  `inte_stor` varchar(255) NOT NULL,
  `bat_cap` varchar(255) NOT NULL,
  `que` varchar(255) NOT NULL,
  `price` varchar(150) NOT NULL,
  `pur_price` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sale`
--

INSERT INTO `tbl_sale` (`sale_id`, `cust_name`, `date`, `mob_no`, `brand_name`, `ram`, `inte_stor`, `bat_cap`, `que`, `price`, `pur_price`) VALUES
(1, 'Kiran yadav', '2021-06-14 11:36:21', 2147483647, 'Samsang', '4', '12', '64', '1', '11000', '11000'),
(2, 'Rutuja chavan', '2021-06-14 11:36:21', 2147483647, 'Nokia', '6', '32', '4000', '1', '20000', '20000'),
(3, 'Rani Patil', '2021-06-11 18:30:00', 2147483647, 'Sony', '4', '32', '3500', '1', '19000', '19000');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_staff`
--

CREATE TABLE `tbl_staff` (
  `staff_id` int(11) NOT NULL,
  `staff_name` varchar(255) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `staff_add` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `mob_no` int(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `file_up` bigint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_staff`
--

INSERT INTO `tbl_staff` (`staff_id`, `staff_name`, `user_name`, `password`, `staff_add`, `date`, `mob_no`, `email`, `file_up`) VALUES
(1, 'Pooja Surve', 'Pooja', '123', 'karad', '2021-06-14 11:37:36', 2147483647, 'pooja@gmail.com', 0),
(2, 'Rutu patil', 'Rutu', '123', 'pune', '2021-06-14 11:37:36', 2147483647, 'ruru@gmail.com', 0),
(3, 'varad  mohite', 'varad', '123', 'katraj', '2021-06-14 11:37:36', 2147483647, 'varad@gmail.com', 0),
(4, 'kiran kirtane', 'kiran', '123', 'narhe', '2021-06-14 17:16:36', 2147483647, 'kiran@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_supplier`
--

CREATE TABLE `tbl_supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(255) NOT NULL,
  `supplier_add` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `supplier_email` varchar(150) NOT NULL,
  `mob_no` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_supplier`
--

INSERT INTO `tbl_supplier` (`supplier_id`, `supplier_name`, `supplier_add`, `date`, `supplier_email`, `mob_no`) VALUES
(1, 'Guru Pawar', 'Swarget', '2021-06-14 12:32:02', 'guru@gmail.com', 2147483647),
(2, 'ddsff', 'jhdhjd', '2021-06-14 12:34:32', 'fhjdj', 658989),
(3, 'Shreya Mohite', 'Chakan', '2021-06-14 17:25:50', 'shreya@gmail.com', 2147483647);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_brands`
--
ALTER TABLE `tbl_brands`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `tbl_product`
--
ALTER TABLE `tbl_product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `tbl_purchase`
--
ALTER TABLE `tbl_purchase`
  ADD PRIMARY KEY (`purchase_id`);

--
-- Indexes for table `tbl_repair`
--
ALTER TABLE `tbl_repair`
  ADD PRIMARY KEY (`repair_id`);

--
-- Indexes for table `tbl_sale`
--
ALTER TABLE `tbl_sale`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  ADD PRIMARY KEY (`staff_id`);

--
-- Indexes for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  ADD PRIMARY KEY (`supplier_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_brands`
--
ALTER TABLE `tbl_brands`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_product`
--
ALTER TABLE `tbl_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_purchase`
--
ALTER TABLE `tbl_purchase`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_repair`
--
ALTER TABLE `tbl_repair`
  MODIFY `repair_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_sale`
--
ALTER TABLE `tbl_sale`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_staff`
--
ALTER TABLE `tbl_staff`
  MODIFY `staff_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_supplier`
--
ALTER TABLE `tbl_supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
