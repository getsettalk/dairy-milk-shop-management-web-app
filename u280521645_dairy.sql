-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Apr 23, 2022 at 10:11 AM
-- Server version: 10.5.12-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u280521645_dairy`
--

-- --------------------------------------------------------

--
-- Table structure for table `dairy_admin`
--

CREATE TABLE `dairy_admin` (
  `ad_id` int(11) NOT NULL,
  `ad_phone` bigint(14) NOT NULL,
  `ad_name` varchar(30) NOT NULL,
  `ad_pass` varchar(255) NOT NULL,
  `ad_passcode` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dairy_admin`
--

INSERT INTO `dairy_admin` (`ad_id`, `ad_phone`, `ad_name`, `ad_pass`, `ad_passcode`) VALUES
(1, 7371048400, 'Sujeet', '827ccb0eea8a706c4c34a16891f84e7b', '7000'),
(3, 8207366900, 'Raja Kumar Yadav', 'e856e6e5858e366bb34940bd4affe2bf', '5500');

-- --------------------------------------------------------

--
-- Table structure for table `dairy_sale_unit`
--

CREATE TABLE `dairy_sale_unit` (
  `unit_id` int(11) NOT NULL,
  `unit_name` varchar(30) NOT NULL,
  `unit_status` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `product_status` int(5) NOT NULL,
  `product_added_on` varchar(30) NOT NULL,
  `product_purchase_price` double NOT NULL,
  `product_selling_price` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`product_id`, `product_name`, `product_status`, `product_added_on`, `product_purchase_price`, `product_selling_price`) VALUES
(1, 'Pasta ', 1, '21-02-2022 05:15:45pm', 200, 215),
(3, 'Milk', 1, '21-02-2022 05:42:12pm', 25, 50),
(4, 'Cheese', 1, '21-02-2022 05:42:40pm', 56, 86),
(5, 'Chee', 1, '21-02-2022 05:43:13pm', 76, 88),
(6, 'Onion ', 1, '21-02-2022 05:43:41pm', 35, 40),
(7, 'Potato', 1, '21-02-2022 05:44:04pm', 45, 39),
(8, 'Peeza', 1, '21-02-2022 05:44:51pm', 249, 300),
(9, 'dahi', 1, '27-02-2022 05:32:58pm', 100, 150),
(10, 'aalu', 1, '05-03-2022 01:47:33pm', 100, 120);

-- --------------------------------------------------------

--
-- Table structure for table `product_sale`
--

CREATE TABLE `product_sale` (
  `sale_id` int(11) NOT NULL,
  `sale_customer` varchar(100) NOT NULL,
  `sale_customer_number` varchar(18) NOT NULL,
  `sale_product_name` mediumint(30) NOT NULL,
  `sale_method` varchar(30) NOT NULL,
  `sale_bill_id` varchar(100) NOT NULL COMMENT 'Make A bill I''d for customer',
  `sale_quantity` double NOT NULL,
  `sale_product_total_price` double NOT NULL,
  `sale_customer_address` varchar(255) NOT NULL,
  `sale_other_note` varchar(255) NOT NULL,
  `sale_date` varchar(30) NOT NULL,
  `sale_time` varchar(20) NOT NULL,
  `sale_month` varchar(20) NOT NULL,
  `sale_status` int(5) NOT NULL,
  `who_sale` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_sale`
--

INSERT INTO `product_sale` (`sale_id`, `sale_customer`, `sale_customer_number`, `sale_product_name`, `sale_method`, `sale_bill_id`, `sale_quantity`, `sale_product_total_price`, `sale_customer_address`, `sale_other_note`, `sale_date`, `sale_time`, `sale_month`, `sale_status`, `who_sale`) VALUES
(2, 'Ramesh', '7634087368', 1, 'Cash', '7634087368', 25, 50, 'Jajura Muzaffarpur', '', '21-02-2022', '05:31:52pm', 'February', 1, 1),
(3, 'Riya', '7634917880', 6, 'Cash', '7634917881', 71, 60, 'Ratanpur ', '', '21-02-2022', '05:24:55pm', 'February', 1, 1),
(4, 'Raushni', '6255444606', 3, 'Cash', '6255444608', 76, 85, 'Muzaffarpur', '', '21-02-2022', '05:16:57pm', 'February', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `purchased_product`
--

CREATE TABLE `purchased_product` (
  `purchase_id` int(11) NOT NULL,
  `purchase_product_name` mediumint(50) NOT NULL,
  `purchase_quantity` double NOT NULL,
  `purchase_product_cost_price` double NOT NULL COMMENT 'purchase_product_cost_price ,How much did you get this item for? this will get for already save in product table',
  `purchase_product_final_price` double NOT NULL COMMENT 'After multiplying the price of the commodity and the quantity of the commodity. Value.',
  `purchase_form_whom` varchar(100) NOT NULL COMMENT 'Where you buy this product.',
  `purchase_other_bill_id` varchar(105) NOT NULL,
  `purchase_other_note` varchar(255) NOT NULL,
  `purchase_gst_applied` int(5) NOT NULL,
  `purchase_gst_rate` varchar(30) NOT NULL COMMENT 'How many GST Charges on this Product as % like 5%,28%.',
  `purchase_gst_value` bigint(20) NOT NULL COMMENT 'GST charged on This Product value.',
  `purchase_status` int(5) NOT NULL COMMENT 'Show status as Active or Deactive',
  `purchase_date` varchar(30) NOT NULL,
  `purchase_month` varchar(30) NOT NULL,
  `purchase_product_year` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `purchased_product`
--

INSERT INTO `purchased_product` (`purchase_id`, `purchase_product_name`, `purchase_quantity`, `purchase_product_cost_price`, `purchase_product_final_price`, `purchase_form_whom`, `purchase_other_bill_id`, `purchase_other_note`, `purchase_gst_applied`, `purchase_gst_rate`, `purchase_gst_value`, `purchase_status`, `purchase_date`, `purchase_month`, `purchase_product_year`) VALUES
(1, 1, 5, 100, 500, 'R ltd', '', 'Past purchase', 0, '0', 0, 1, '21-02-2022', 'February', 2022),
(2, 2, 5, 75, 375, 'Rahul dairy', '', 'Osm product', 0, '0', 0, 1, '21-02-2022', 'February', 2022),
(4, 3, 5, 25, 125, 'Dfh', '', '', 1, '5', 6, 1, '22-02-2022', 'February', 2022),
(5, 9, 100, 100, 10000, 'gff', '', '', 1, '5', 500, 1, '27-02-2022', 'February', 2022);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dairy_admin`
--
ALTER TABLE `dairy_admin`
  ADD PRIMARY KEY (`ad_id`);

--
-- Indexes for table `dairy_sale_unit`
--
ALTER TABLE `dairy_sale_unit`
  ADD PRIMARY KEY (`unit_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_sale`
--
ALTER TABLE `product_sale`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `purchased_product`
--
ALTER TABLE `purchased_product`
  ADD PRIMARY KEY (`purchase_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dairy_admin`
--
ALTER TABLE `dairy_admin`
  MODIFY `ad_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `dairy_sale_unit`
--
ALTER TABLE `dairy_sale_unit`
  MODIFY `unit_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `product_sale`
--
ALTER TABLE `product_sale`
  MODIFY `sale_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `purchased_product`
--
ALTER TABLE `purchased_product`
  MODIFY `purchase_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
